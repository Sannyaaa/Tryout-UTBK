<?php

namespace App\Livewire\User\Package;

use Carbon\Carbon;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use Livewire\Component;
use App\Models\Discount;
use Illuminate\Http\Request;
use Livewire\Attributes\Rule;
use App\Models\Package_member;

class Item extends Component
{
    public $package;
    public $voucher;
    public $discounted_price;
    public $final_price;
    public $applied_voucher = null;

    // Rules untuk validasi
    protected $rules = [
        'voucher' => 'nullable'
    ];

    public function mount($id)
    {
        $this->package = Package_member::findOrFail($id);
        $this->final_price = $this->package->price;
        $this->discounted_price = $this->package->price;
    }

    public function applyVoucher()
    {
        if (empty($this->voucher)) {
            return;
        }

        $this->validate();

        $voucher = Discount::where('code', $this->voucher)
            ->where('start_date', '<=', Carbon::today())
            ->where('end_date', '>=', Carbon::today())
            ->first();
        // dd($voucher);
        if ($voucher) {

            // Hitung discount
            if ($voucher->discount_type === 'percentage') {
                $discount = ($this->package->price * $voucher->discount_value) / 100;
            } else {
                $discount = $voucher->discount_value;
            }

            $this->discounted_price = $this->package->price - $discount;
            $this->final_price = $this->discounted_price;
            $this->applied_voucher = $voucher;

            session(['applied_voucher' => $voucher->id]);
            
        } else {
            // Jika voucher tidak ditemukan atau sudah tidak berlaku
            $this->addError('voucher', 'Voucher tidak valid atau sudah kedaluwarsa.');
            // $this->discount = 0;
            // $this->discountedPrice = $this->totalPrice;
        }
    }

    // protected function validateVoucher($voucher)
    // {
    //     $voucher = 

    //     // Tambahkan validasi lain sesuai kebutuhan
    //     // Contoh: minimum pembelian, maksimum penggunaan, dll

    //     return true;
    // }

    public function removeVoucher()
    {
        $this->voucher = null;
        $this->applied_voucher = null;
        $this->discounted_price = $this->package->price;
        $this->final_price = $this->package->price;
        session()->forget('applied_voucher');
    }

    public function checkout()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        try {
            // Set konfigurasi Midtrans
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $user = auth()->user();
            
            // Buat order baru
            $order = Order::create([
                'user_id' => $user->id,
                'package_id' => $this->package->id,
                'voucher_id' => $this->applied_voucher?->id,
                'invoice' => Order::generateInvoice(),
                'original_price' => $this->package->price,
                'final_price' => $this->final_price,
                'payment_status' => 'pending',
            ]);

            // Siapkan parameter untuk Midtrans
            $transaction_details = [
                'order_id' => $order->invoice,
                'gross_amount' => (int) $this->final_price,
            ];

            $customer_details = [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '',
            ];

            $item_details = [[
                'id' => $this->package->id,
                'price' => (int) $this->final_price,
                'quantity' => 1,
                'name' => $this->package->name,
            ]];

            $midtrans_params = [
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
                'callbacks' => [
                    'finish' => route('payment.finish', ['invoice' => $order->invoice]),
                    'unfinish' => route('payment.unfinish', ['invoice' => $order->invoice]),
                    'error' => route('payment.error', ['invoice' => $order->invoice]),
                ]
            ];

            // Dapatkan Snap URL dari Midtrans
            $snapToken = Snap::getSnapToken($midtrans_params);

            // Update order dengan snap token
            $order->update([
                'snap_token' => $snapToken,
            ]);

            // Redirect langsung ke Midtrans
            return redirect()->away($this->getMidtransRedirectUrl($snapToken));

        } catch (\Exception $e) {
            logger()->error('Midtrans Error: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat memproses pembayaran');
        }
    }

    private function getMidtransRedirectUrl($snapToken)
    {
        $isProduction = config('midtrans.is_production');
        $baseUrl = $isProduction 
            ? 'https://app.midtrans.com/snap/v2/vtweb/' 
            : 'https://app.sandbox.midtrans.com/snap/v2/vtweb/';
        
        return $baseUrl . $snapToken;
    }

    public function render(Request $request)
    {
        $id = $request->segment(3);

        $package = Package_member::find($id);

        $except = Package_member::where('id', '!=',$package)->get();

        return view('livewire.user.package.item');
    }
}
