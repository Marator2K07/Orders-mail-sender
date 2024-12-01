<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    private function selectView(): string
    {
        $clientIsNew = $this->data['client']['new'] ?? null;
        $orderStatus = $this->data['order']['status'];

        if ($clientIsNew === 'Y') {
            return 'emails.order_notification_new_client';
        } elseif ($orderStatus === 'new') {
            return 'emails.order_notification_status_new';
        } elseif ($orderStatus === 'sent') {
            return 'emails.order_notification_status_sent';
        } else {
            return 'emails.order_notification_status_completed';
        }
    }

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build(): OrderNotification
    {
        $view = $this->selectView();
        return $this->view($view, ['data' => $this->data]);
    }
}
