@extends('layouts.shop.app')

@section('content')
    <div class="register">
        <div class="container">
            <div class="row mb-3">
                @include('shop.personal.includes.left_menu')
                <div class="col-md-9 themed-grid-col">
                    <div class="row justify-content-center">

                        @if($order->status->id !== 2)
                            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">

                                <a class="btn btn-primary"
                                   href="{{ route('shop.personal.orders.cancel', $order->id) }}">
                                    Отменить
                                </a>

                            </nav>
                        @endif
                        <div class="col md 12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title"></div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="maindata" role="tabpanel">
                                            <h1>Заказ №{{ $order->id }} ({{ $order->status->title }})</h1>
                                            <h4>
                                                Создан {{ \Carbon\Carbon::parse($order->created_at )->format('d M Y, H:i') }}
                                            </h4>
                                            <h4>
                                                Изменен {{ \Carbon\Carbon::parse($order->updated_at )->format('d M Y, H:i') }}
                                            </h4>
                                            <h4>
                                                Имя: {{ $order->first_name }}
                                            </h4>
                                            <h4>
                                                Фамилия: {{ $order->last_name }}
                                            </h4>
                                            <h4>
                                                Почта для связи: {{ $order->email }}
                                            </h4>
                                            <h4>
                                                Дополнительные данные: {{ $order->description }}
                                            </h4>
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
                                                    </tr>

                                                    @foreach($order->products as $key => $product)
                                                        <tr>
                                                            <!-- Data -->
                                                            <!-- ID -->
                                                            <td>{{ $key + 1 }}</td>
                                                            <!-- Image -->
                                                            <td>
                                                                <a href="{{ route('shop.product', $product->slug) }}"><img
                                                                            src="{{ asset($product->thumb_img) }}"
                                                                            style="width: 100%; max-width: 150px;"
                                                                            alt=""></a></td>
                                                            <td>
                                                                <!-- Product Name -->
                                                                <h5>
                                                                    <a href="{{ route('shop.product', $product->slug) }}">{{ $product->title }}</a>
                                                                </h5>
                                                            </td>
                                                            <!-- Price -->
                                                            <td class="lblue">
                                                                @if($product->pivot->price)
                                                                    {{ $product->pivot->price }} RUB
                                                                @endif
                                                            </td>
                                                            <!-- Discount -->
                                                            <td>
                                                                @if($product->pivot->discount > 0)
                                                                    {{ $product->pivot->discount }}%
                                                                @else
                                                                    {{ $product->pivot->price }} RUB
                                                                @endif
                                                            </td>
                                                            <!-- Total Price -->
                                                            <td class="green">
                                                                @if($product->pivot->discount > 0)
                                                                    {{ $product->pivot->price * ((100 - $product->pivot->discount) / 100) }}
                                                                    RUB
                                                                @else
                                                                    {{ $product->pivot->price }} RUB
                                                                @endif</td>
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
                                                        <td class="red">{{ $order->total_price }} RUB</td>
                                                        <td></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection