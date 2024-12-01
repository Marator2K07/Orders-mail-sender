<?php header('Content-Type: text/html; charset=utf-8'); ?>

<h1>Заказ завершен</h1>

<p>Номер заказа: {{ $data['order']['id'] }}</p>
<p>Статус: {{ $data['order']['status'] }}</p>
