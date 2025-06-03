@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    @include('components.general.products.products-section', [
        'products' => $products,
        'title' => 'Products',
    ])
@endsection
