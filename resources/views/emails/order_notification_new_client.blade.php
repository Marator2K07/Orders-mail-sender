<h1>Новый заказ от нового клиента!</h1>

<p>Имя и фамилия клиента: {{ $data['client']['name'] }} {{ $data['client']['lastName'] }}</p>
<p>Телефон: {{ $data['client']['phone'] }}</p>
<p>Email: {{ $data['client']['email'] }}</p>

@include('emails.order_details')  {{-- общий шаблон деталей заказа --}}
