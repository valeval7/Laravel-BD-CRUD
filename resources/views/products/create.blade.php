@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Crear Producto</h2>
    <a href="{{ route('products.index') }}"
      class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
      Volver
    </a>
  </div>

  <form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Nombre *
      </label>
      <input type="text"
        name="name"
        id="name"
        value="{{ old('name') }}"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror">
      @error('name')
      <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="sku">
        SKU *
      </label>
      <input type="text"
        name="sku"
        id="sku"
        value="{{ old('sku') }}"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('sku') border-red-500 @enderror">
      @error('sku')
      <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
        Descripción
      </label>
      <textarea name="description"
        id="description"
        rows="3"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
      @error('description')
      <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
          Precio *
        </label>
        <input type="number"
          name="price"
          id="price"
          step="0.01"
          value="{{ old('price') }}"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('price') border-red-500 @enderror">
        @error('price')
        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="stock">
          Stock *
        </label>
        <input type="number"
          name="stock"
          id="stock"
          value="{{ old('stock', 0) }}"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('stock') border-red-500 @enderror">
        @error('stock')
        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
        Categoría *
      </label>
      <select name="category_id"
        id="category_id"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('category_id') border-red-500 @enderror">
        <option value="">Seleccione una categoría</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
          {{ $category->name }}
        </option>
        @endforeach
      </select>
      @error('category_id')
      <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label class="flex items-center">
        <input type="hidden" name="active" value="0">
        <input type="checkbox"
          name="active"
          value="1"
          {{ old('active', true) ? 'checked' : '' }}
          class="mr-2">
        <span class="text-gray-700 text-sm font-bold">Producto Activo</span>
      </label>
    </div>

    <div class="flex items-center justify-between">
      <button type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Crear Producto
      </button>
    </div>
  </form>
</div>
@endsection