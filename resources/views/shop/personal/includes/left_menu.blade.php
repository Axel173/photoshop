<div class="col-md-3 themed-grid-col">
    <ul class="nav nav-pills nav-stacked">
        <li {{ (Route::currentRouteName() == 'shop.personal') ? 'class=active' : '' }}><a href="{{ route('shop.personal') }}">Личный кабинет</a></li>
        <li {{ (Route::currentRouteName() == 'shop.personal.orders.index') ? 'class=active' : '' }}><a href="{{ route('shop.personal.orders.index') }}">Заказы</a></li>
    </ul>
</div>