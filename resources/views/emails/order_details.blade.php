<?php header('Content-Type: text/html; charset=utf-8'); ?>

<p>Номер заказа: {{ $data['order']['id'] }}</p>
<p>Дата: {{ \Carbon\Carbon::parse($data['order']['date'])->format('d.m.Y H:i:s') }}</p>
<p>Статус: {{ $data['order']['status'] }}</p>

@if ($data['order']['status'] !== 'completed' && $data['order']['status'] !== 'sent')
    <p>Товары:</p>
    <ul>
        @foreach ($data['order']['products'] as $product)
            <li>{{ $product['title'] }}: {{ $product['quantity'] }} x {{ $product['price'] }} = {{ $product['quantity'] * $product['price'] }}</li>
        @endforeach
    </ul>
    <p>Общая сумма: {{ array_sum(array_map(function ($product) { return $product['quantity'] * $product['price']; }, $data['order']['products'])) }}</p>
@endif
