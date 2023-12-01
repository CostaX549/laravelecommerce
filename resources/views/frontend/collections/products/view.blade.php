@extends('layouts.app')

@section('title')
{{ $product->meta_title }}
@endsection

@section('meta_keyword')
{{ $product->meta_keyword}}
@endsection

@section('meta_description')
{{ $product->description}}
@endsection

@section('content')

<div>
<livewire:frontend.product.view :category="$category" :product="$product" />  
</div>

@endsection