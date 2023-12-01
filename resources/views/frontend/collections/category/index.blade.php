@extends('layouts.app')

@section('title', 'Todas as Categorias')

@section('content')

<div class="container" id="trending">
    <div class="main-text">
        <h4 class="mb-4">Nossas Categorias</h4>
    </div>
    <div class="row">
        @forelse($categories as $categoryItem)
        <div class="col-md-4">
            <div class="category-card">
                <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                    <div class="category-card-img">
                        <img src="{{ asset("$categoryItem->image") }}" alt="Laptop">
                        <div class="category-card-text">
                            <h5>{{ $categoryItem->name }}</h5>
                        </div>
                   
                </a>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <h5>Nenhuma categoria disponível.</h5>
        </div>
        @endforelse
    </div>
</div>
<style>
    .main-text {
        padding-top: 50px;
        color: #fff;
    }

    .container {
        max-width: 1500px;
       
    }

    .category-card {
        position: relative;
    }

    img {
   object-fit: contain;
        border-radius: 5px;
        margin-bottom: 15px;
        height: 1500px; /* Aumente a altura desejada, por exemplo, 300px */
    }

    .category-card-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 10px;
        font-size: 25px;
        border-radius: 5px;
    }
</style>

@endsection
