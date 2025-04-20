@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="content">
    <h2 class="content__title">商品登録</h2>
    <form action="/products" class="create-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="label-item">
            <label for="name" class="label">商品名</label>
            <span class="required">必須</span>
        </div>
        <input type="text" class="create-form__input" name="name" placeholder="商品名を入力">
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror
        <div class="label-item">
            <label for="price" class="label">値段</label>
            <span class="required">必須</span>
        </div>
        <input type="text" class="create-form__input" name="price" placeholder="値段を入力">
        @error('price')
        <p class="error">{{ $message }}</p>
        @enderror
        <div class="label-item">
            <label for="name" class="label">商品画像</label>
            <span class="required">必須</span>
        </div>
        <div class="create-form__image">
            @if (!empty($product->image))
            <img class="create__image" src="{{ asset('storage/fruits-img/'. $product->image) }}">
            @endif
            <input type="file" name="image" id="file" class="create-form__image-input">
            <label for="file" class="create-form__image-label">ファイルを選択</label>
        </div>
        @error('image')
        <p class="error">{{ $message }}</p>
        @enderror
        <div class="label-item">
            <label for="season" class="label">季節</label>
            <span class="required">必須</span>
        <p class="select-message">複数選択可</p>
        </div>
        @foreach ($seasons as $season)
        <label class="season-label">
            <input type="checkbox" class="checkbox" name="seasonId[]" value="{{ $season->id }}">
            <span class="custom-checkbox"></span>
            {{ $season->name }}
        </label>
        @endforeach
        @error('seasonId')
        <p class="error">{{ $message }}</p>
        @enderror
        <div class="label-item">
            <label for="description" class="label">商品説明</label>
            <span class="required">必須</span>
        </div>
        <textarea name="description" class="textarea" placeholder="商品説明を入力"></textarea>
        @error('description')
        <p class="error">{{ $message }}</p>
        @enderror
        <div class="create-form__button">
            <button type="button" class="create-form__button-back"><a href="/products" class="link">戻る</a></button>
            <button type="submit" class="create-form__button-submit">登録</button>
        </div>
    </form>
</div>
@endsection