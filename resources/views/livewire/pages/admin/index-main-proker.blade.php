<div>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ __('Program Kerja Management') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Manage and organize your organizational programs
                </p>
            </div>
            <div class="flex items-center space-x-3 w-full md:w-auto">
                <div class="relative flex-1 md:flex-none">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center justify-center w-full md:w-40 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                                {{ __('Filters') }}
                            </button>
                        </x-slot>
                        <x-slot name="content" class="py-1">
                            <x-dropdown-link wire:click="toggleFilter('active')" class="flex items-center">
                                <span class="w-2 h-2 mr-2 bg-green-500 rounded-full"></span>
                                {{ __('Active') }}
                            </x-dropdown-link>
                            <x-dropdown-link wire:click="toggleFilter('upcoming')" class="flex items-center">
                                <span class="w-2 h-2 mr-2 bg-yellow-500 rounded-full"></span>
                                {{ __('Upcoming') }}
                            </x-dropdown-link>
                            <x-dropdown-link wire:click="toggleFilter('completed')" class="flex items-center">
                                <span class="w-2 h-2 mr-2 bg-gray-500 rounded-full"></span>
                                {{ __('Completed') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
                
                <!-- <a href="{{ route('admin.addmainproker') }}" class="flex items-center justify-center w-full md:w-auto px-4 py-2 text-sm font-medium text-white bg-merah border border-transparent rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    {{ __('New Program') }}
                </a> -->
            </div>
        </div>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-4 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="relative">
                        <input type="text" wire:model.live.debounce.300ms="search" 
                               placeholder="Search programs..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-merah focus:border-merah dark:bg-gray-900 dark:text-gray-100">
                        <svg class="absolute left-3 top-3 w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <select wire:model.live="category" 
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-merah focus:border-merah dark:bg-gray-900 dark:text-gray-100">
                        <option value="">{{ __('All Categories') }}</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                    <div class="flex items-center justify-end space-x-3">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Total: {{ $prokers->total() }}</span>
                    </div>
                </div>

                @if (session()->has('message'))
                <div class="p-4 bg-green-50 dark:bg-green-900 border-l-4 border-green-400 dark:border-green-600">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 dark:text-green-300 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-green-700 dark:text-green-200">{{ session('message') }}</span>
                    </div>
                </div>
                @endif
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer" wire:click="sortBy('judul2')">
                                    Program Name
                                    @if($sortField === 'judul2')
                                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                    @endif
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Timeline
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer" wire:click="sortBy('kategori')">
                                    Category
                                    @if($sortField === 'kategori')
                                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                    @endif
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer" wire:click="sortBy('status')">
                                    Status
                                    @if($sortField === 'status')
                                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                    @endif
                                </th>
                                <!-- <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Actions
                                </th> -->
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($prokers as $proker)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $proker->judul2 }}
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                {{ $proker->judul }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">
                                        {{ $proker->tanggal_mulai?->format('M d, Y') ?? '-' }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        @if($proker->tanggal_selesai)
                                            to {{ $proker->tanggal_selesai->format('M d, Y') }}
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-merah/10 text-merah">
                                        {{ $proker->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($proker->status)
                                        @case('active')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                                Active
                                            </span>
                                            @break
                                        @case('upcoming')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                Upcoming
                                            </span>
                                            @break
                                        @default
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                                    <path d="M2 2l4 4m0-4L2 6"/>
                                                </svg>
                                                Completed
                                            </span>
                                    @endswitch
                                </td>
                                <!-- <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <div class="flex justify-end space-x-3">
                                        <a href="{{ route('admin.editmainproker', $proker->id) }}" 
                                           class="text-gray-400 hover:text-merah dark:hover:text-merah-300 transition"
                                           title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                            </svg>
                                        </a>
                                        <button wire:click="deleteMainProker({{ $proker->id }})" 
                                                wire:confirm="Are you sure you want to delete this program?"
                                                class="text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition"
                                                title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td> -->
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center">
                                    <div class="text-gray-400 dark:text-gray-500">
                                        <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <p class="mt-4 text-sm font-medium">
                                            No programs found matching your criteria
                                        </p>
                                        <p class="mt-1 text-xs max-w-xs mx-auto">
                                            Try adjusting your search or filters, or create a new program
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-3">
                    {{ $prokers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>