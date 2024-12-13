@extends('products.layout.product-layout')

@section('title', 'Detalle del Producto')

@section('content')
    <div class="max-w-4xl mx-auto p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        {{-- Título del producto --}}
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
            {{ $product->name }}
        </h1>

        {{-- Galería de imágenes --}}
        @if ($product->image && is_array($product->image))
            <div class="flex flex-wrap gap-4 justify-center mb-6">
                @foreach ($product->image as $image)
                    <div class="w-48 h-48 overflow-hidden rounded-lg border border-gray-300 shadow-sm">
                        <img class="w-full h-full object-cover" 
                             src="{{ asset('storage/' . $image) }}" 
                             alt="Imagen de {{ $product->name }}" />
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex justify-center mb-6">
                <img class="rounded-lg w-48 h-48 object-cover border border-gray-300" 
                     src="{{ asset('images/default-product.png') }}" 
                     alt="Imagen no disponible" />
            </div>
        @endif

        {{-- Descripción del producto --}}
        <div class="mb-4 text-gray-700 dark:text-gray-400 text-lg">
            {!! Str::markdown($product->description) !!}
        </div>
        

        {{-- Precio del producto --}}
        <p class="text-2xl font-semibold text-green-600 dark:text-green-400 mb-4">
            $ {{ $product->unit_price }}
        </p>

        {{-- Categoría --}}
        @if ($product->category)
            <p class="text-gray-600 dark:text-gray-400">
                <strong>Categoría:</strong> {{ $product->category->name }}
            </p>
        @endif

        {{-- Botón para regresar --}}
        <div class="mt-6">
            <a href="{{ route('products.index') }}" 
               class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Volver al listado
            </a>
        </div>
    </div>
@endsection
