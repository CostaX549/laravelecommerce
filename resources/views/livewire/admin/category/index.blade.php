<div>
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="destroyCategory">
      <div class="modal-body">
        <h6>Você tem certeza que quer deletar essa categoria?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" wire:click.prevent="destroyCategory" class="btn btn-primary" data-bs-dismiss="modal">Deletar</button>
      </div>
      </form>
    </div>
  </div>
  </div>





<div class="row">
<div class="col-md-12 grid-margin">
    @if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
    @endif
   <div class="card">
    <div class="card-header">
        <h4>Categoria
        <a href="{{ url ('admin/category/create') }}" class="btn btn-primary btn-sm text-white float-end">Adicionar categoria</a>
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->status === '1' ? 'Escondido':'Visível'}}</td>
                    <td>
                        <a href="{{ url ('admin/category/'.$category->id.'/edit') }}"class="btn btn-sm btn-success">Editar</a>
                        <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger">Deletar</a>
                     </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        <div>
        {{$categories->links()}}
        </div>
    </div>
   </div>
 </div>
