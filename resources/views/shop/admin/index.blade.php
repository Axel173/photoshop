@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('shop.admin.includes.left_menu')
        </div>
        <div class="col-md-10">
            @include('shop.admin.includes.result_messages')
            <div class="card">
                <h3>Всего заказов: {{ $countOrders }}, на сумму: {{ $sumOrders }} RUB</h3>
                <h3>Всего товаров: {{ $countProducts }}</h3>
                <h3>Всего категорий: {{ $countCategories }}</h3>
            </div>
        </div>
    </div>
</div>

@endsection
