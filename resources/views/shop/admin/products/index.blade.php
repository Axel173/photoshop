@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('shop.admin.includes.left_menu')
            </div>
            <div class="col-md-10">
                @include('shop.admin.includes.result_messages')

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('shop.admin.products.create') }}" class="btn btn-primary">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>№</th>
                                <!-- Image -->
                                <th>Image</th>
                                <!-- Product Name -->
                                <th>Product Name</th>
                                <!-- Price -->
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                @php /** @var \App\Models\ShopProduct $item*/ @endphp
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a href="{{ route('shop.admin.products.edit', $item->id) }}">
                                            <img class="img-thumbnail" style="max-width: 150px;" src="{{ asset($item->thumb_img) }}" alt="{{ $item->title }}">
                                        </a>
                                    </td>
                                    <td>
                                        {{ $item->title }}
                                    </td>
                                    <td>
                                        {{ $item->price }} RUB
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col md 12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
