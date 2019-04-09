@extends('layouts.shop.app')

@section('content')
    <div class="register">
        <div class="container">
            <div class="row mb-3">
                @include('shop.personal.includes.left_menu')
                <div class="col-md-9 themed-grid-col">
                    @if(!empty($last_order))
                        <h3>Последний заказ</h3>
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
                            <tr>
                                <td>
                                    <a href="{{ route('shop.personal.orders.show', $last_order->id) }}">
                                        {{ $last_order->id }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('shop.personal.orders.show', $last_order->id) }}">
                                        {{ \Carbon\Carbon::parse($last_order->created_at )->format('d M Y, H:i') }}
                                    </a>
                                </td>

                                <td>
                                    {{ $last_order->total_price }} RUB
                                </td>
                                <td>
                                    {{ $last_order->status->title }}
                                </td>
                                <td>
                                    @if($last_order->status->id !== 2)
                                        <a href="{{ route('shop.personal.orders.cancel', $last_order->id) }}">
                                            Отменить
                                        </a>
                                    @endif
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    @else
                        <h3>Последний заказ</h3>
                        <p>У вас нет активных заказов</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection