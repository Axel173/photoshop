<div class="row justify-content-center">
    <div class="col md 12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col md 12">
        <div class="card">
            <div class="card-body">

                <ul class="list-unstyled">
                    <li>ID: {{ $order->id }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row justify-content-center">
    <div class="col md 12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Создано</label>
                    <input value="{{ $order->created_at }}"
                           type="text"
                           class="form-control"
                           disabled>
                </div>
                <div class="form-group">
                    <label for="title">Изменено</label>
                    <input value="{{ $order->updated_at }}"
                           type="text"
                           class="form-control"
                           disabled>
                </div>
                <div class="form-group">
                    <label for="title">Удалено</label>
                    <input value="{{ $order->deleted_at }}"
                           type="text"
                           class="form-control"
                           disabled>
                </div>
            </div>
        </div>
    </div>
</div>



