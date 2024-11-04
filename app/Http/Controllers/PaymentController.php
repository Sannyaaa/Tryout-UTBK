<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function finish($invoice)
    {
        $order = Order::where('invoice', $invoice)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        
        $order->payment_status = 'paid';

        $order->save();

        return redirect()->route('user.payment.success', ['invoice' => $invoice]);
    }

    public function unfinish($invoice)
    {
        $order = Order::where('invoice', $invoice)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Tambahkan logika untuk status belum selesai
        // Misalnya, kembali ke halaman pembayaran atau dashboard
        return redirect()->route('user.package.item', ['id' => $order->package_id])
            ->with('warning', 'Pembayaran belum selesai');
    }

    public function error($invoice)
    {
        $order = Order::where('invoice', $invoice)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Update status order
        $order->update(['payment_status' => 'failed']);

        // Redirect ke halaman error
        return redirect()->route('payment.error')
            ->with('error', 'Terjadi kesalahan dalam proses pembayaran');
    }

    public function success($invoice)
    {
        $order = Order::where('invoice', $invoice)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('livewire.user.payment.success', compact('order'));
    }
}
