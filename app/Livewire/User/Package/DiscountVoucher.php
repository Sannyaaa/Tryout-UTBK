<?php

namespace App\Livewire\User\Package;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Discount;
use Illuminate\Http\Request;
use Livewire\Attributes\Rule;
use App\Models\Package_member;

class DiscountVoucher extends Component
{

    public $package;
    public $discount = 0;
    public $totalPrice = 0; // Contoh total harga sebelum diskon
    public $discountedPrice;

    #[Rule('required')]
    public string $voucherCode = '';

    public function  mount(Request $request)
    {
        $id = $request->segment(3);

        $this->package = Package_member::find($id);

        $this->totalPrice = $this->package->price;    
    }

    public function voucher(Request $request)
    {
        $this->validate();
        $voucher = Discount::where('code', $this->voucherCode)
            ->where('start_date', '<=', Carbon::today())
            ->where('end_date', '>=', Carbon::today())
            ->first();

        if ($voucher) {

            if($voucher->discount_type == 'percentage'){
                // Jika voucher valid dan dalam masa berlaku
                $this->discount = $this->package->price * $voucher->discount_value / 100;
            }else{
                // Jika voucher valid dan dalam masa berlaku
                $this->discount = $voucher->discount_value;
            }

            $this->discount = $this->totalPrice - $this->discount;
            
        } else {
            // Jika voucher tidak ditemukan atau sudah tidak berlaku
            $this->addError('voucherCode', 'Voucher tidak valid atau sudah kedaluwarsa.');
            $this->discount = 0;
            $this->discountedPrice = $this->totalPrice;
        }

        $this->reset();
    }
    public function render()
    {
        return view('livewire.user.package.discount-voucher', [
            'discount' => $this->discount,
        ]);
    }
}
