@extends('layouts.shop.app')

@section('content')
    <div class="register">
        <div class="container">
            <div class="row mb-3">
                @include('shop.personal.includes.left_menu')
                <div class="col-md-9 themed-grid-col">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Дата</th>
                                    <th>Сумма</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <a href="{{ route('shop.personal.orders.show', $order->id) }}">
                                                {{ $order->id }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('shop.personal.orders.show', $order->id) }}">
                                                {{ \Carbon\Carbon::parse($order->created_at )->format('d M Y, H:i') }}
                                            </a>
                                        </td>

                                        <td>
                                            {{ $order->total_price }} RUB
                                        </td>
                                        <td>
                                            {{ $order->status->title }}
                                        </td>
                                        <td>
                                            @if($order->status->id !== 2)
                                                <a href="{{ route('shop.personal.orders.cancel', $order->id) }}">
                                                    Отменить
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if($orders->total() > $orders->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col md 12">
                            <div class="card">
                                <div class="card-body">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection