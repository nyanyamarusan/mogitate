@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__head">
        <a href="/products" class="link">商品一覧</a>
        <p class="item-name">>{{ $product['name'] }}</p>
    </div>
    <form action="/products/{{ $product->id }}/update" class="update-form" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PAtCH')
        <input type="hidden" name="productId" value="{{ $product['id'] }}">
        <div class="update-form__top">
            <div class="update-form__image">
                @if (!$errors->any())
                <img class="update__image" src="{{ asset('storage/fruits-img/'. $product->image) }}" alt="{{ $product['name'] }}">
                @endif
                <div class="update-form__image-container">
                    <input type="file" name="image"  id="file" class="update-form__image-input">
                    <label for="file" class="update-form__image-label">ファイルを選択</label>
                    @if ($product->image)
                    <span class="image-name">{{ basename($product->image) }}</span>
                    @endif
                </div>
                
                @error('image')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="update-form__info">
                <label for="name" class="label">商品名</label>
                <input type="text" class="update-form__input" name="name"
                    value="{{ $errors->has('name') ? '' : old('name', $product['name']) }}" placeholder="商品名を入力">
                @error('name')
                <p class="error">{{ $message }}</p>
                @enderror
                <label for="price" class="label">値段</label>
                <input type="text" class="update-form__input" name="price"
                    value="{{ $errors->has('price') ? '' : old('price', $product['price']) }}" placeholder="値段を入力">
                @error('price')
                <p class="error">{{ $message }}</p>
                @enderror
                <label for="season" class="label">季節</label>
                @foreach ($seasons as $season)
                <label class="season-label">
                    <input type="checkbox" class="checkbox" name="seasonId[]" value="{{ $season->id }}"
                    {{ $errors->has('seasonId') ? '' : (old('seasonId') ? (in_array($season->id, old('seasonId')) ? 'checked' : '')
                    : ($product->seasons->contains($season->id) ? 'checked' : '')) }}>
                    <span class="custom-checkbox"></span>
                    {{ $season->name }}
                </label>
                @endforeach
                @error('seasonId')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <label for="description" class="label">商品説明</label>
        @php
            $value = $errors->has('description') ? '' : old('description', $product->description);
        @endphp
        <textarea name="description" class="textarea" placeholder="商品説明を入力">{{ $value }}</textarea>
        @error('description')
        <p class="error">{{ $message }}</p>
        @enderror
        <div class="update-form__button">
            <button type="button" class="update-form__button-back"><a href="/products" class="back">戻る</a></button>
            <button type="submit" class="update-form__button-submit">変更を保存</button>
        </div>
    </form>
    <form action="/products/{{ $product->id }}/delete" class="delete-form" method="post">
        @csrf
        @method('DELETE')
        <button class="delete-button"><i class="bi bi-trash"></i></button>
    </form>
</div>
@endsection