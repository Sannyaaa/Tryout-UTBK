<?php

namespace App\Livewire\User\Payment;

use App\Models\Order;
use Livewire\Component;

class Success extends Component
{

    public $invoice;

    public function mount($invoice)
    {
        $this->invoice = $invoice;
    }

    public function render()
    {
        $order = Order::where('invoice', $this->invoice)->first();

        $order->payment_status = 'paid';

        $order->save();

        return view('livewire.user.payment.success',[
            'order' => $order,
        ]);
    }
}
