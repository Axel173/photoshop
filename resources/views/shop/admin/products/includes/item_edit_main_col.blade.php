@php
    /** @var \App\Models\ShopProduct $item */
    /** @var \Illuminate\Database\Eloquent\Collection $categoryList */
@endphp
<div class="row justify-content-center">
    <div class="col md 12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Не опубликовано
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" data-toggle="tab" role="tab" class="nav-link active">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a href="#adddata" data-toggle="tab" role="tab" class="nav-link">Доп. данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="maindata">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ old('title', $item->title) }}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="image">Картинка</label>
                            @if($item->original_img)
                                <img class="img-thumbnail" style="max-width: 150px;" src="{{ asset($item->original_img) }}" alt="{{ $item->title }}">
                            @endif

                        </div>

                        <div class="form-group">
                            <input name="image" id="image" type="file" class="file" multiple=true data-preview-file-type="any">
                        </div>

                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input name="price" value="{{ old('price', $item->price) }}"
                                   id="price"
                                   type="number"
                                   class="form-control"
                                   minlength="1"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="discount">Скидка</label>
                            <input name="discount" value="{{ old('discount', $item->discount) }}"
                                   id="discount"
                                   type="number"
                                   class="form-control">
                        </div>


                    </div>
                    <div role="tabpanel" class="tab-pane" id="adddata">
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description"
                                      id="description"
                                      rows="10"
                                      class="form-control">{{ old('description', $item->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id"
                                    id="category_id"
                                    type="text"
                                    class="form-control"
                                    placeholder="Выберите категорию"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{ $item->slug }}"
                                   id="slug"
                                   type="text"
                                   class="form-control">
                        </div>
                        <div class="form-check">
                            <input type="hidden"
                                   value="0"
                                   name="is_published">

                            <input type="checkbox"
                                   value="1"
                                   name="is_published"
                                   class="form-check-input"
                                   @if($item->is_published)
                                   checked="checked"
                                    @endif
                            >
                            <label for="is_published" class="form-check-label">Опубликованно</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



