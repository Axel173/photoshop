@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\ShopProduct $item*/
    @endphp
    @if($item->exists)
        <form method="POST" action="{{ route('shop.admin.products.update', $item->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @else
                <form method="POST" action="{{ route('shop.admin.products.store') }}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">

                        @include('shop.admin.includes.result_messages')

                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                @include('shop.admin.includes.left_menu')
                            </div>
                            <div class="col-md-7">
                                @include('shop.admin.products.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('shop.admin.products.includes.item_edit_add_col')
                            </div>
                        </div>

                    </div>
                </form>
                @if($item->exists)
                    <br>
                    <form method="POST" action="{{ route('shop.admin.products.destroy', $item->id) }}">
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
    @endif
@endsection