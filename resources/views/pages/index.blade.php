@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    @include('components.general.homepage.herosection')
    @include('components.general.homepage.testimonies-section', [
        'testimonies' => $testimonies,
    ])
@endsection
