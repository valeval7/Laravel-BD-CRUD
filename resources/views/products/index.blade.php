@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Productos</h2>
    <a href="{{ route('products.create') }}"
      class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      Nuevo Producto
    </a>
  </div>

  <div class="overflow-x-auto">
    <table class="min-w-full bg-white">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">ID</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">SKU</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Nombre</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Categoría</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Precio</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Stock</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Estado</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @forelse($products as $product)
        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4">{{ $product->id }}</td>
          <td class="px-6 py-4">{{ $product->sku }}</td>
          <td class="px-6 py-4 font-medium">{{ $product->name }}</td>
          <td class="px-6 py-4">{{ $product->category->name }}</td>
          <td class="px-6 py-4">${{ number_format($product->price, 2) }}</td>
          <td class="px-6 py-4">{{ $product->stock }}</td>
          <td class="px-6 py-4">
            <span class="px-2 py-1 text-xs rounded {{ $product->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
              {{ $product->active ? 'Activo' : 'Inactivo' }}
            </span>
          </td>
          <td class="px-6 py-4">
            <div class="flex space-x-2">
              <a href="{{ route('products.show', $product) }}"
                class="text-blue-600 hover:text-blue-900">Ver</a>
              <a href="{{ route('products.edit', $product->id) }}"
                class="text-yellow-600 hover:text-yellow-900">Editar</a>
              <form action="{{ route('products.destroy', $product) }}"
                method="POST"
                onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900">
                  Eliminar
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="8" class="px-6 py-4 text-center text-gray-500">
            No hay productos registrados
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $products->links() }}
  </div>
</div>
@endsection