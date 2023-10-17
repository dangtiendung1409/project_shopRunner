<?php

namespace App\Listeners;

use App\Events\CreateNewOrder;
use App\Mail\OrderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class DispatchNewOrder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateNewOrder $event): void
    {
        $order = $event->order;
        Mail::to($order->email)
//            ->cc("mail nhan vien")
            ->bcc("dungdtth2209011@fpt.edu.vn")
            ->send(new OrderMail($order));
    }
}
