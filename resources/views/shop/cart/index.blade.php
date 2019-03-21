@extends('layouts.shop.app')

@section('content')
    <div class="register">
        <div class="container">
            @if(isset($cart_products) and $cart_products !== false and $cart_products->count() > 0)
                @php
                $total_price = 0;
                @endphp
                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table">
                        <tbody>
                        <tr>
                            <!-- Header -->
                            <!-- ID -->
                            <th>#</th>
                            <!-- Image -->
                            <th>Image</th>
                            <!-- Product Name -->
                            <th>Product Name</th>
                            <!-- Price -->
                            <th>Price</th>
                            <!-- Quantity -->
                            <th>Discount</th>
                            <!-- Total Price -->
                            <th>Total Price</th>
                            <!-- Action -->
                            <th class="text-center">Action</th>
                        </tr>

                        @foreach($cart_products as $key => $product)
                            <tr>
                                <!-- Data -->
                                <!-- ID -->
                                <td>{{ $key + 1 }}</td>
                                <!-- Image -->
                                <td><a href="{{ route('shop.product', $product->slug) }}"><img
                                                src="{{ asset($product->thumb_img) }}"
                                                style="width: 100%; max-width: 150px;" alt=""></a></td>
                                <td>
                                    <!-- Product Name -->
                                    <h5><a href="{{ route('shop.product', $product->slug) }}">{{ $product->title }}</a>
                                    </h5>
                                </td>
                                <!-- Price -->
                                <td class="lblue">
                                    @if($product->price)
                                        {{ $product->price }} RUB
                                    @endif
                                </td>
                                <!-- Discount -->
                                <td>
                                    @if($product->discount > 0)
                                        {{ $product->discount }}%
                                    @else
                                        {{ $product->price }} RUB
                                    @endif
                                </td>
                                <!-- Total Price -->
                                <td class="green">
                                    @if($product->discount > 0)
                                        @php $total_price += $product->price * ((100 - $product->discount) / 100) @endphp
                                        {{ $product->price * ((100 - $product->discount) / 100) }} RUB
                                    @else
                                        @php $total_price += $product->price @endphp
                                        {{ $product->price }} RUB
                                    @endif</td>
                                <!-- Action -->
                                <td class="text-center">
                                    <form action="{{ route('shop.cart.delete', $product->pivot->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">X</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <!-- Data -->
                            <!-- Total-->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="red">{{ $total_price }} RUB</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('shop.order.create') }}" class="btn btn-success btn-lg btn-block">Заказать</a>
            @else
                <h3>Тут пока пусто</h3>
            @endif
        </div>
    </div>
@endsection