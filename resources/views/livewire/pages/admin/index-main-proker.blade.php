<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Management Proker') }}
        </h2>
    </x-slot>

    <div class="mt-4">
        <div class="flex justify-end gap-8 items-center mb-6">
            <input type="text" wire:model.live="search" placeholder="Search for Proker..."
                class="form-control border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 p-2">

            <a href="{{ route('admin.addmainproker') }}"
                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">Add New Proker</a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                {{ session('message') }}
            </div>
        @endif
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2 font-medium text-gray-700">ID</th>
                        <th class="px-4 py-2 font-medium text-gray-700">Judul</th>
                        <th class="px-4 py-2 font-medium text-gray-700">Deskripsi</th>
                        <th class="px-4 py-2 font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prokers as $proker)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $proker->id }}</td>
                            <td class="px-4 py-2">{{ $proker->judul }}</td>
                            <td class="px-4 py-2">{{ $proker->deskripsi }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.editmainproker', $proker->id) }}"
                                    class="bg-blue-500 text-white py-1 px-3 rounded-md hover:bg-blue-600 transition">Edit</a>
                                <button wire:confirm="Kamu Yakin Hapus Data Ini?" wire:click="deleteMainProker({{ $proker->id }})"
                                    class="bg-red-500 text-white py-1 px-3 rounded-md hover:bg-red-600 transition">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="py-6">
            {{ $prokers->links() }}
        </div>
    </div>
</div>