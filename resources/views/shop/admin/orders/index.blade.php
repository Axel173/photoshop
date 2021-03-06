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
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Дата</th>
                                <th>Сумма</th>
                                <th>Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('shop.admin.orders.edit', $item->id) }}">
                                            {{ $item->id }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('shop.admin.orders.edit', $item->id) }}">
                                            {{ \Carbon\Carbon::parse($item->created_at )->format('d M Y, H:i') }}
                                        </a>
                                    </td>

                                    <td>
                                        {{ $item->total_price }} RUB
                                    </td>
                                    <td>
                                        {{ $item->status->title }}
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
