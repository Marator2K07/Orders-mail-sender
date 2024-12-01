<?php header('Content-Type: text/html; charset=utf-8'); ?>

<h1>Заказ отправлен</h1>

<p>Номер заказа: {{ $data['order']['id'] }}</p>
<p>Дата: {{ \Carbon\Carbon::parse($data['order']['date'])->format('d.m.Y H:i:s') }}</p>
<p>Статус: {{ $data['order']['status'] }}</p>
<p>Общая сумма: {{ array_sum(array_map(function ($product) { return $product['quantity'] * $product['price']; }, $data['order']['products'])) }}</p>
