<h1>Новый заказ</h1>

<p>Телефон клиента: {{ preg_replace('/[^0-9]/', '', $data['client']['phone']) }}</p>

@include('emails.order_details')  {{-- общий шаблон деталей заказа --}}
