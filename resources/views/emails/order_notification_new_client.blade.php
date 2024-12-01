<?php header('Content-Type: text/html; charset=utf-8'); ?>

<h1>Заказ от нового клиента!</h1>

<p>Клиент: {{ $data['client']['name'] }} {{ $data['client']['lastName'] }}</p>
<p>Телефон: {{ preg_replace('/[^0-9]/', '', $data['client']['phone']) }}</p>
<p>Email: {{ $data['client']['email'] }}</p>

@include('emails.order_details')  {{-- общий шаблон деталей заказа --}}
