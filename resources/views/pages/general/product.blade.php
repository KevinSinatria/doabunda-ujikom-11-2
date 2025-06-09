@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    @include('components.general.products.products-section', [
        'products' => $products,
        'title' => 'Produk',
        'subtitle' => 'Temukan produk-produk yang kamu butuhkan di DoaBunda',
        'search' => $search,
        'categories' => $categories,
        'filterCategory' => $filterCategory,
        'categoryIsNotFound' => $categoryIsNotFound,
    ])
@endsection
