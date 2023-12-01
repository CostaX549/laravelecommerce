<!-- Modal Adicionar Marca -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicione Marcas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
            </div>
            <!-- Formulário de adicionar marca -->
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                <div class="mb-3">
                            <label>Selecione a categoria</label>
                            <select wire:model.defer="category_id" required class="form-control">
                                
                                @foreach($categories as $cateItem)
                                <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                                @endforeach
                           
                            </select>
                            @error('category_id') 
                            <small>{{ $message }}</small>
                            @enderror 
                        </div>
                    <div class="mb-3">
                        <label>Nome da Marca</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name') 
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Slug da Marca</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') 
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label><br/>
                        <input type="checkbox" wire:model.defer="status" /> Checado = Escondido, Não checado = Visível
                        @error('status') 
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal">Fechar</button>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="storeBrand" data-bs-dismiss="modal">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Marca -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edite a sua marca</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
            </div>
        
         
                <!-- Formulário de editar marca -->
                <form wire:submit.prevent="updateBrand">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Selecione a categoria</label>
                            <select wire:model.defer="category_id" required class="form-control">
                                
                                @foreach($categories as $cateItem)
                                <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                                @endforeach
                           
                            </select>
                            @error('category_id') 
                            <small>{{ $message }}</small>
                            @enderror 
                        </div>
                        <div class="mb-3">
                            <label>Nome da Marca</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name') 
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Slug da Marca</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug') 
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Status</label><br/>
                            <input type="checkbox" wire:model.defer="status" /> Checado = Escondido, Não checado = Visível
                            @error('status') 
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" wire:click.prevent="updateBrand" data-bs-dismiss="modal">Editar</button>
                    </div>
                </form>
           

        </div>
    </div>
</div>


<!-- Modal Deletar Marca -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete a sua marca</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
            </div>
          
                <!-- Formulário de deletar marca -->
                <form wire:submit.prevent="destroyBrand">
                   <div class="modal-body">
                    <h4>Você tem certeza que quer deletar essa marca ?</h4>
                   </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger" wire:click.prevent="destroyBrand" data-bs-dismiss="modal">Deletar</button>
                    </div>
                </form>
           

        </div>
    </div>
</div>

