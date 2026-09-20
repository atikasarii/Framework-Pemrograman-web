<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Uji Coba Komponen x-badge</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <h3 class="text-lg font-semibold mb-4">Status Stok Produk</h3>
                <div class="space-x-2">
                    <x-badge status="Aman" />
                    <x-badge status="Menipis" />
                    <x-badge status="Habis" />
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>