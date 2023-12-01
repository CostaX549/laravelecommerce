@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Lista de Sliders
                    <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm text-white float-end">Adicionar Slider</a>
                </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach($sliders as $slider)
                 <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->description }}</td>
                    <td>
                    <img src="{{ asset("$slider->image") }}" style="width: 70px; height: 70px; object-fit: cover;" alt="">
                    </td>
                    <td>{{ $slider->status == '0' ? 'Visivel':'Escondido'}}</td>
                    <td>
                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-success">Editar</a>
                        <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}"
                        onclick="return confirm('Você tem certeza que quer deletar esse slider ?');"
                         class="btn btn-danger">
                        Deletar</a>
                    </td>
                 </tr>

                 @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
       