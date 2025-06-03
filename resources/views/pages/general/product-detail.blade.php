@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    {{-- Product Details --}}
    @include('components.general.products.product-detail-section', [
        'product' => $product,
    ])

    {{-- Other Products --}}
    @include('components.general.products.products-section', [
        'title' => 'Other Products',
        'products' => $other_products,
    ])
@endsection
