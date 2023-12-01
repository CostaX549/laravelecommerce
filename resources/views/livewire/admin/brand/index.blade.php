<div>
@include('livewire.admin.brand.modal-form')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>
            Lista de Marcas
            <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal">Adicionar Marcas</a>
          </h4>
        </div>
        <div class="card-body">
       <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          @forelse($brands as $brand)
          <tr>
            <td>{{$brand->id }}</td>
            <td>{{$brand->name }}</td>
            <td>
              @if($brand->category)
              {{$brand->category->name }}
             @else
              Nenhuma categoria.
             @endif
            </td>
            <td>{{$brand->slug }}</td>
            <td>{{$brand->status == '1' ? 'Escondido':'Visível'}}</td>
            <td>
              <a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success">Editar</a>
              <a href="#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-sm btn-danger">Deletar</a>
            </td>
          </tr>
          @empty
          <td colspan="4">Nenhuma marca disponível.</td>
          @endforelse

        
        </tbody>
       </table>
       <div>
        {{$brands->links()}}
       </div>
        </div>
      </div>
    </div>
  </div>
</div>