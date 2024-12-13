@extends('products.layout.product-layout')

@section('title', 'Products List')

@section('content')

    <div class="m-4 flex flex-wrap gap-5 justify-center">
        @foreach ($products as $product)
            <div class="w-1/4 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                @if ($product->image)
                    <div class="flex justify-center m-2">
                        <a href="{{ route('products.details', $product) }}">
                            <img class="rounded-t-lg" src="/storage/{{ $product->image[0] }}" alt="{{ $product->name }}" />
                        </a>
                    </div>
                @endif

                <div class="p-5">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $product->name }}
                    </p>
                    <p>
                        $ {{ $product->unit_price }}
                    </p>
                    <a class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        href="{{ route('products.details', $product) }}">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
