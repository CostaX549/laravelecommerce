@extends('layouts.admin')
@section('content')
<div class="row">
<div class="col-md-12 grid-margin">
   <div class="card">
    <div class="card-header">
        <h4>Adicionar Produtos
        <a href="{{ url ('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Voltar</a>
        </h4>
    </div> 
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-warning">
            @foreach($errors->all() as $error)
           <div>{{$error}}</div>
            @endforeach
        </div>
        @endif
        <form action="{{ url ('admin/products') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
    
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag" type="button" role="tab" aria-controls="seotag" aria-selected="false">Seo Tags</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Detalhes</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Imagem do Produto</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color" type="button" role="tab" aria-controls="color" aria-selected="false">Cor do Produto</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="mb-3">
        <label for="">Selecionar Categoria</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Nome do Produto</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="mb-3">
        <label>URL do Produto</label>
        <input type="text" name="slug" class="form-control" />
    </div>
    <div class="mb-3">
         <label for="">Selecionar Marca</label>
        <select name="brand" class="form-control">
            @foreach($brands as $brand)
            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Descrição Pequena (500 palavras)</label>
        <textarea name="small_description" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>
  </div>
  
 
  <div class="tab-pane fade border p-3" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
  <div class="mb-3">
        <label>Título Alternativo</label>
        <input type="text" name="meta_title" class="form-control" />
    </div>
     <div class="mb-3">
        <label>Descrição Alternativa</label>
        <textarea name="meta_description" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3">
        <label>Palavra Chave</label>
        <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
    </div>
  </div>
  <div class="tab-pane fade border p-3" id="details" role="tabpanel" aria-labelledby="details-tab">
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="">Preço Original</label>
                <input type="text" name="original_price" class="form-control" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="">Preço de Venda</label>
                <input type="text" name="selling_price" class="form-control" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="">Quantidade</label>
                <input type="number" name="quantity" class="form-control" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="">Tendência</label>
                <input type="checkbox" name="trending" style="width:50px; height:50px;"  />
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="">Status</label>
                <input type="checkbox" name="status" style="width:50px; height:50px;"  />
            </div>
         </div>
    </div>
  </div>
  <div class="tab-pane fade border p-3" id="image" role="tabpanel" aria-labelledby="details-tab">
    <div class="mb-3">
        <label>Enviar a imagem do produto</label>
        <input type="file" name="image[]" multiple class="form-control"/>
    </div>
</div>
    <div class="tab-pane fade border p-3" id="color" role="tabpanel" aria-labelledby="details-tab">
    <div class="mb-3">
        <label class="mb-3">Selecione a cor</label>
        <div class="row">
            @forelse($colors as $coloritem)
            <div class="col-md-3">
                <div class="p-2 border mb-3">

               
            Cor: <input type="checkbox" name="colors[{{ $coloritem->id }}]" value="{{ $coloritem->id }}"/> 
            {{ $coloritem->name }}
            <br/>
            Quantidade: <input type="number" name="colorquantity[{{ $coloritem->id }}]" style="width: 70px; border: 1px solid;">
            </div>

            </div>
            @empty
                <div class="col-md-12">
                    <h1>Nenhuma cor encontrada.</h1>
                </div>
            @endforelse
        </div>
       
    </div>
   

</div>
</div>
<div>
    <button type="submit" class="btn btn-primary float-end mt-3">Salvar</button>
</div>
</form>
    </div>
</div>
</div>
</div>
@endsection
