@extends('layouts.shop.app')

@section('content')
    <div class="register">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-3 themed-grid-col">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#">Личный кабинет</a></li>
                        <li><a href="#">Заказы</a></li>
                    </ul>
                </div>
                <div class="col-md-9 themed-grid-col">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Сумма</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>
                                    <a href="">
                                    </a>
                                </td>
                                <td>
                                    <a href="">
                                        Отменить
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection