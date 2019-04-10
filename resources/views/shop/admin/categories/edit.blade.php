@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\ShopCategory $item*/
    @endphp
    @if($item->exists)
        <form method="POST" action="{{ route('shop.admin.categories.update', $item->id) }}">
            @method('PATCH')
            @else
                <form method="POST" action="{{ route('shop.admin.categories.store') }}">
                    @endif
                    @csrf
                    <div class="container">
                        @php
                            /** @var \Illuminate\Support\ViewErrorBag $errors */
                        @endphp
                        @if($errors->any())
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                        {{ $errors->first() }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                        {{ session()->get('success') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                @include('shop.admin.includes.left_menu')
                            </div>
                            <div class="col-md-7">
                                @include('shop.admin.categories.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('shop.admin.categories.includes.item_edit_add_col')
                            </div>
                        </div>
                    </div>
                </form>
@endsection