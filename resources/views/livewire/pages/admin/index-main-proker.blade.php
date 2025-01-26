<div>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Management Proker') }}
        </h2>
    </x-slot>

    <div class="mt-4 px-8 container mx-auto">
        <div class="flex justify-between items-center mb-6 space-x-4">
            <div class="relative w-full max-w-md">
                <input type="text" wire:model.live="search" placeholder="Search for Proker..."
                    class="w-full py-2 pl-4 pr-10 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-merah dark:bg-gray-800 dark:text-white dark:border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-0 right-0 mt-3 mr-4 w-5 h-5 text-gray-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 18l6-6-6-6" />
                </svg>
            </div>
            <a href="{{ route('admin.addmainproker') }}"
                class="bg-merah text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition ease-in-out duration-300">
                Add New Proker
            </a>
        </div>

        @if (session()->has('message'))
        <div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
            {{ session('message') }}
        </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto text-sm text-gray-700">
                <thead class="bg-merah text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Judul</th>
                        <th class="px-4 py-3 text-left">Deskripsi</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50">
                    @foreach ($prokers as $proker)
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-4 py-3">{{ $proker->id }}</td>
                        <td class="px-4 py-3">
                            <div class="font-semibold">{{ $proker->judul }}</div>
                        </td>
                        <td class="px-4 py-3">{!! Str::limit($proker->deskripsi, 100) !!}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('admin.editmainproker', $proker->id) }}"
                                class="bg-blue-500 text-white py-1 px-3 rounded-md hover:bg-blue-600 transition ease-in-out duration-200">
                                Edit
                            </a>
                            <button wire:click="deleteMainProker({{ $proker->id }})"
                                wire:confirm="Are you sure you want to delete this?"
                                class="bg-red-500 text-white py-1 px-3 rounded-md hover:bg-red-600 transition ease-in-out duration-200">
                                <span class="text-sm">Delete</span>
                            </button>
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