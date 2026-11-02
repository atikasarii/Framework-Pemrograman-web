<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Kategori</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded-md">{{ session('success') }}</div>
            @endif

            <a href="{{ route('categories.create') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md">
                + Tambah Kategori
            </a>

            <x-card>
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Nama</th>
                            <th class="py-2">Deskripsi</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="border-b">
                                <td class="py-2">{{ $category->name }}</td>
                                <td class="py-2">{{ $category->description }}</td>
                                <td class="py-2 space-x-2">
                                    <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </x-card>
        </div>
    </div>
</x-app-layout>