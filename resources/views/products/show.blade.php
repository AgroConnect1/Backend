<x-layout>
    <x-slot:heading>
        All Products
    </x-slot:heading>
    @foreach ($products as $product)
        <a href="/products/{{ $product['id'] }}"
            class="block px-5 py-6 hover:bg-cyan-950 hover:text-white rounded-lg border border-gray-500">


            <div>
                <strong>{{ $product['title'] }}</strong>:{{ $product['price'] }}
            </div>

        </a>
    @endforeach

</x-layout>
