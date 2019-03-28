<h1>Ваш заказ № {{ $order->id }} успешно оформлен</h1>
<p>Имя: {{ $order->first_name }}</p>
<p>Фамилия: {{ $order->last_name }}</p>
<p>Почта: {{ $order->email }}</p>
<p>Комментарий: {{ $order->description }}</p>
<h2>Состав заказа:</h2>
@foreach($order_products as $product)
    <div>{{ $product->title }} - @if($product->discount > 0)
            {{ $product->price * ((100 - $product->discount) / 100) }} RUB
        @else
            {{ $product->price }} RUB
        @endif
    </div>
@endforeach
<h3>Сумма заказа: {{ $order->total_price }} RUB</h3>
