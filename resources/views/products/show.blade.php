<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> {{ $product->id }}</li>
                        <li class="list-group-item"><strong>Nombre:</strong> {{ $product->nombre }}</li>
                        <li class="list-group-item"><strong>Detalle:</strong> {{ $product->detalle }}</li>
                        <li class="list-group-item"><strong>SKU:</strong> {{ $product->sku }}</li>
                        <li class="list-group-item"><strong>Puntos:</strong> {{ $product->puntos }}</li>
                        <li class="list-group-item"><strong>Precio (MXN):</strong> ${{ number_format($product->precio_MXN, 2) }}</li>
                        <li class="list-group-item"><strong>Activo:</strong> {{ $product->active ? 'Sí' : 'No' }}</li>
                        <li class="list-group-item"><strong>Creado en:</strong> {{ $product->created_at }}</li>
                        <li class="list-group-item"><strong>Actualizado en:</strong> {{ $product->updated_at }}</li>
                    </ul>

                    <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
