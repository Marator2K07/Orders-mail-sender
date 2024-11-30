<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class OrderNotification extends Mailable
{
    private $data;

    private function selectView(): string
    {
        $clientIsNew = $this->data['client']['new'] === 'Y';
        $orderStatus = $this->data['order']['status'];

        if ($clientIsNew) {
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
