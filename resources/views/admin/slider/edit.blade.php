@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Edite o Slider
                    <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm text-white float-end">Voltar</a>
                </h4>
            </div>
            <div class="card-body">
            <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                    <div class="mb-3">
                        <label>Título</label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Link</label>
                        <input type="text" value="{{ $slider->link }}" name="link" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Conteúdo do botão (Ex: Compre Agora)</label>
                        <input type="text" value="{{ $slider->text }}" name="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Descrição</label>
                       <textarea name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Imagem</label>
                        <input type="file" name="image" class="form-control">
                        <img class="mt-3" src="{{ asset("$slider->image") }}" style = "width:50px; height:50px; object-fit: cover;" alt="">
                    </div>
                    <div class="mb-3">
                        <label>Status</label><br/>
                        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked':''}} style="width:30px; height:30px;"> Checado = Escondido, Não Checado = Visível
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
       