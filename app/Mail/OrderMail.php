<?php

namespace App\Mail;

use App\Models\ShopOrder;
use App\Models\ShopOrderedProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $order;
    protected $order_products;

    public function __construct($order, $order_products)
    {
        $this->order = $order;
        $this->order_products = $order_products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('shop.mail.order')
            ->subject('Заказ оформлен')
            ->with([
                'order' => $this->order,
                'order_products' => $this->order_products,
            ]);
    }
}
