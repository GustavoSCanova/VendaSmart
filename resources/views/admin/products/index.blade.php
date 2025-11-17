@extends('layouts.admin')

@section('content')
    <div x-data="{
        showCreateModal: false,
        showEditModal: false,
        editProduct: {},
    
        openEdit(product) {
            this.editProduct = JSON.parse(JSON.stringify(product));
            this.showEditModal = true;
        }
    }" class="p-6">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Produtos</h2>
            <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition"
                @click="showCreateModal = true">
                Adicionar Produto
            </button>
        </div>

        <!-- Modal Criar Produto -->
        <div x-show="showCreateModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
            x-transition.opacity style="display: none">
            <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md" x-transition.scale>
                <h3 class="text-xl font-semibold mb-4">Cadastrar Produto</h3>

                <form method="POST" action="{{ route('admin.products.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="block font-medium mb-1">Nome</label>
                        <input type="text" name="name" class="w-full border rounded-lg p-2" required>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium mb-1">Descrição</label>
                        <textarea name="description" class="w-full border rounded-lg p-2"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium mb-1">Preço</label>
                        <input type="text" name="price" class="w-full border rounded-lg p-2" required>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium mb-1">Categoria</label>
                        <input type="text" name="category" class="w-full border rounded-lg p-2" required>
                    </div>

                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg"
                            @click="showCreateModal = false">
                            Cancelar
                        </button>

                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Editar Produto -->

        <!-- MODAL EDITAR PRODUTO -->
        <div x-show="showEditModal" x-transition.opacity
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" style="display: none">
            <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md" x-transition.scale>
                <h3 class="text-xl font-semibold mb-4">Editar Produto</h3>

                <form method="POST" :action="`{{ url('/admin/products') }}/${editProduct.id}`">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="block font-medium mb-1">Nome</label>
                        <input type="text" class="w-full border rounded-lg p-2" x-model="editProduct.name" name="name"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium mb-1">Descrição</label>
                        <textarea class="w-full border rounded-lg p-2" x-model="editProduct.description" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium mb-1">Preço</label>
                        <input type="text" class="w-full border rounded-lg p-2" x-model="editProduct.price"
                            name="price" required>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium mb-1">Categoria</label>
                        <input type="text" class="w-full border rounded-lg p-2" x-model="editProduct.category"
                            name="category" required>
                    </div>

                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg"
                            @click="showEditModal = false">
                            Cancelar
                        </button>

                        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Tabela -->
        <div class="bg-white shadow rounded-xl p-4">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b bg-gray-100">
                        <th class="py-2 px-3 text-left">ID</th>
                        <th class="py-2 px-3 text-left">Nome</th>
                        <th class="py-2 px-3 text-left">Preço</th>
                        <th class="py-2 px-3 text-left">Descrição</th>
                        <th class="py-2 px-3 text-left">Categoria</th>
                        <th class="py-2 px-3 text-center">Ações</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-3">{{ $product->id }}</td>
                            <td class="py-2 px-3">{{ $product->name }}</td>
                            <td class="py-2 px-3">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="py-2 px-3">{{ $product->description }}</td>
                            <td class="py-2 px-3">{{ $product->category }}</td>
                           <td class="py-2 px-3 flex items-center justify-center gap-2">
    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition"
        @click="openEdit({
            id: {{ $product->id }},
            name: @js($product->name),
            description: @js($product->description),
            price: '{{ $product->price }}',
            category: @js($product->category)
        })">
        Editar
    </button>
    <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" class="inline-block" onsubmit="return confirm('Tem certeza que deseja deletar este produto?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
            Deletar
        </button>
    </form>
</td>  
                        </tr>    
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection
