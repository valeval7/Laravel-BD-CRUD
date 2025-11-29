@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Detalle del Producto</h2>
    <div class="space-x-2">
      <a href="{{ route('products.edit', $product) }}"
        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
        Editar
      </a>
      <a href="{{ route('products.index') }}"
        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
        Volver
      </a>
    </div>
  </div>

  <div class="space-y-4">
    <div class="border-b pb-3">
      <label class="text-gray-600 text-sm font-semibold">ID:</label>
      <p class="text-gray-800 text-lg">{{ $product->id }}</p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 text-sm font-semibold">SKU:</label>
      <p class="text-gray-800 text-lg">{{ $product->sku }}</p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 text-sm font-semibold">Nombre:</label>
      <p class="text-gray-800 text-lg">{{ $product->name }}</p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 text-sm font-semibold">Descripción:</label>
      <p class="text-gray-800">{{ $product->description ?? 'Sin descripción' }}</p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 text-sm font-semibold">Categoría:</label>
      <p class="text-gray-800 text-lg">{{ $product->category->name }}</p>
    </div>

    <div class="grid grid-cols-2 gap-4 border-b pb-3">
      <div>
        <label class="text-gray-600 text-sm font-semibold">Precio:</label>
        <p class="text-gray-800 text-lg font-bold">
          ${{ number_format($product->price, 2) }}
        </p>
      </div>
      <div>
        <label class="text-gray-600 text-sm font-semibold">Stock:</label>
        <p class="text-gray-800 text-lg">{{ $product->stock }} unidades</p>
      </div>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 text-sm font-semibold">Estado:</label>
      <p>
        <span class="px-3 py-1 text-sm rounded {{ $product->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
          {{ $product->active ? 'Activo' : 'Inactivo' }}
        </span>
      </p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 text-sm font-semibold">Fecha de Creación:</label>
      <p class="text-gray-800">{{ $product->created_at->format('d/m/Y H:i:s') }}</p>
    </div>

    <div class="border-b pb-3">
      <label class="text-gray-600 text-sm font-semibold">Última Actualización:</label>
      <p class="text-gray-800">{{ $product->updated_at->format('d/m/Y H:i:s') }}</p>
    </div>
  </div>

  <div class="mt-6">
    <form action="{{ route('products.destroy', $product) }}"
      method="POST"
      onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
      @csrf
      @method('DELETE')
      <button type="submit"
        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
        Eliminar Producto
      </button>
    </form>
  </div>
</div>
@endsection