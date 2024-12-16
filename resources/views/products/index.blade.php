<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('products.create') }}" class="btn-primary-custom mb-3">Nuevo Producto</a>
                    <div class="overflow-x-auto">
                        <br>
                        <div class="mb-4">
                            <span class="font-bold">Ordenar por:</span>
                            <a href="{{ route('products.index', ['order' => 'precio_MXN', 'direction' => 'desc']) }}" class="btn-action btn-action-info">
                                Precio (Mayor a menor)
                            </a>
                            <a href="{{ route('products.index', ['order' => 'precio_MXN', 'direction' => 'asc']) }}" class="btn-action btn-action-info">
                                Precio (Menor a mayor)
                            </a>
                            <a href="{{ route('products.index', ['order' => 'nombre', 'direction' => 'asc']) }}" class="btn-action btn-action-info">
                                Nombre (A-Z)
                            </a>
                            <a href="{{ route('products.index', ['order' => 'nombre', 'direction' => 'desc']) }}" class="btn-action btn-action-info">
                                Nombre (Z-A)
                            </a>
                        </div>
                        <table class="table-custom table table-striped mx-auto">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>
                                        <a href="{{ route('products.index', ['order' => 'nombre', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            Nombre
                                            @if(request('order') === 'nombre')
                                                {{ request('direction') === 'asc' ? '↑' : '↓' }}
                                            @endif
                                        </a>
                                    </th>
                                    <th>SKU</th>
                                    <th>
                                        <a href="{{ route('products.index', ['order' => 'precio_MXN', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            Precio (MXN)
                                            @if(request('order') === 'precio_MXN')
                                                {{ request('direction') === 'asc' ? '↑' : '↓' }}
                                            @endif
                                        </a>
                                    </th>
                                    <th>Precio (USD)</th>
                                    <th>Puntos</th>
                                    <th>Activo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->nombre }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>${{ number_format($product->precio_MXN, 2) }}</td>
                                    <td>${{ number_format($product->precio_usd, 2) }}</td>
                                    <td>{{ $product->puntos }}</td>
                                    <td>{{ $product->active ? 'Sí' : 'No' }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product) }}" class="btn-action btn-action-info">Detalle</a>
                                        <a href="{{ route('products.edit', $product) }}" class="btn-action btn-action-warning">Editar</a>
                                        <form action="{{ route('products.updateStatus', $product) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn-action btn-action-warning">
                                                {{ $product->active ? 'Desactivar' : 'Activar' }}
                                            </button>
                                        </form>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-action-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No hay productos registrados.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
