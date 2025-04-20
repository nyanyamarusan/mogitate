@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__head">
        <h2 class="content__title">
            @if (!empty($keyword))
                “{{ $keyword }}”の商品一覧
            @else
                商品一覧
            @endif
        </h2>
        <button class="jump-button">
            <a href="/products/register" class="register">+ 商品を追加</a>
        </button>
    </div>
    <div class="content__body">
        <form action="/products/search" class="search-form" method="POST">
            @csrf
            <input type="text" name="keyword" class="search-form__input" placeholder="商品名で検索" value="{{ old('keyword') }}">
            <button type="submit" class="search-form__button">検索</button>
            <h3 class="sort-info__title">
                価格順で表示
            </h3>
            <div class="sort-info">
                <select name="sort_direction" class="sort-info__select">
                    <option value="" class="sort-info__placeholder" selected hidden>価格で並べ替え</option>
                    <option value="desc" class="sort-info__option">高い順に表示</option>
                    <hr class="sort-info__line">
                    <option value="asc" class="sort-info__option">安い順に表示</option>
                </select>
            </div>
            @if (!empty($sortDirection))
            <div class="tag">
                <p class="tag__text">
                    {{ $sortDirection === 'asc' ? '安い順に表示' : '高い順に表示' }}
                </p>
                <a href="/products/search" class="tag__remove">×</a>
            </div>
            @endif
        </form>
        <div class="product-list">
            <div class="product-list__content">
                @foreach ($products as $product)
                <div class="product-list__item">
                    <a href="/products/{{ $product->id }}" class="product-list__link">
                        <img src="{{ asset('storage/fruits-img/'. $product->image) }}" alt="{{ $product->name }}" class="product-list__image">
                        <div class="product-list__info">
                            <p class="product-list__name">{{ $product->name }}</p>
                            <p class="product-list__price">¥{{ number_format($product->price) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
            <div class="pagination">
                {{ $products->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>

@endsection
