@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('shop.admin.orders.update', $order->id) }}">
        @method('PATCH')
        @csrf
        <div class="container">

            @include('shop.admin.includes.result_messages')

            <div class="row justify-content-center">
                <div class="col-md-2">
                    @include('shop.admin.includes.left_menu')
                </div>
                <div class="col-md-7">
                    @include('shop.admin.orders.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('shop.admin.orders.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
    <br>
    <form method="POST" action="{{ route('shop.admin.orders.destroy', $order->id) }}">
        @method('DELETE')
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-block">
                    <div class="card-body ml-auto">
                        <button type="submit" class="btn btn-link">Удалить</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>


@endsection