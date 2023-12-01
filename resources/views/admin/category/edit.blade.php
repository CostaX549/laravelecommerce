@extends('layouts.admin')
@section('content')
<div class="row">
<div class="col-md-12 grid-margin">
   <div class="card">
    <div class="card-header">
        <h4>Editar Categoria
        <a href="{{ url ('admin/category') }}" class="btn btn-primary float-end">Voltar</a>
        </h4>
    </div>
    <div class="card-body">
     <form action="{{ url ('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-md-6 mb-3">
            <label>Nome</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" />
            @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>Slug</label>
            <input type="text" name="slug"  value="{{ $category->slug }}" class="form-control" />
            @error('slug')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class=" col-md-12 mb-3">
            <label>Descrição</label>
            <textarea type="text" name="description" class="form-control" rows="3">{{ $category->description }} </textarea>
            @error('description')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class=" col-md-6 mb-3">
            <label>Imagem</label>
           
            <input type="file" name="image" class="form-control" />
            <img src="{{ asset("$category->image") }}" alt="{{ $category->name }}"  style="width:80px; height:80px; object-fit:cover;"/>
            @error('image')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class=" col-md-6 mb-3">
            <label>Status</label>
            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':'' }} />
            @error('status')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="col-md-12">
            <h4>SEO(OMB) Tags</h4>
        </div>

        <div class=" col-md-6 mb-3">
            <label>Meta Título</label>
            <input type="text" name="meta_title"  value="{{ $category->meta_title }}" class="form-control" />
            @error('meta_title')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class=" col-md-12 mb-3">
            <label>Meta Palavra-Chave</label>
           <textarea name="meta_keyword" class="form-control"  rows="3">{{ $category->meta_keyword }}</textarea>
           @error('meta_keyword')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class=" col-md-12 mb-3">
            <label>Meta Descrição</label>
           <textarea name="meta_description" class="form-control"  rows="3">{{ $category->meta_description }}</textarea>
           @error('meta_description')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class=" col-md-12 mb-3">
           <button type="submit" class="btn btn-primary float-end">Salvar</button>
        </div>
</div>
     </form>
    </div>
   </div>
</div>
</div>

@endsection