<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $product->nombre }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="detalle">Detalle</label>
                            <textarea name="detalle" id="detalle" class="form-control">{{ $product->detalle }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" id="sku" class="form-control" value="{{ $product->sku }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="puntos">Puntos</label>
                            <input type="number" name="puntos" id="puntos" class="form-control" value="{{ $product->puntos }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="precio_MXN">Precio (MXN)</label>
                            <input type="number" step="0.01" name="precio_MXN" id="precio_MXN" class="form-control" value="{{ $product->precio_MXN }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="active">Activo</label>
                            <select name="active" id="active" class="form-control">
                                <option value="1" {{ $product->active ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ !$product->active ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

