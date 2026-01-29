<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('books') }}" class="text-gray-400 hover:text-indigo-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <div>
                    <h2 class="font-bold text-2xl text-gray-900 leading-tight">Edit Book</h2>
                    <p class="text-sm text-gray-500">Updating: <span class="font-medium text-indigo-600">{{ $book->title }}</span></p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-8">
                    <form action="{{ route('books.update', $book) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <div>
                                <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Book Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" 
                                    class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-200">
                                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="author" class="block text-sm font-semibold text-gray-700 mb-1">Author</label>
                                    <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" 
                                        class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-200">
                                    @error('author') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="categorie_id" class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
                                    <select name="categorie_id" id="categorie_id" 
                                        class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-200">
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id }}" {{ old('categorie_id', $book->categorie_id) == $categorie->id ? 'selected' : '' }}>
                                                {{ $categorie->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="w-full md:w-1/2">
                                <label for="quantity" class="block text-sm font-semibold text-gray-700 mb-1">Stock Quantity</label>
                                <div class="relative">
                                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $book->quantity) }}"
                                        class="w-full pl-4 pr-12 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-200">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                        <span class="text-gray-400 text-sm">units</span>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-gray-50 flex items-center justify-between">

                                <div class="flex items-center gap-4">
                                    <a href="{{ route('books') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">
                                        Cancel
                                    </a>
                                    <button type="submit" 
                                        class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-xl font-bold text-sm text-white hover:bg-indigo-700 shadow-lg shadow-indigo-100 transition-all">
                                        Update Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <script>
        
    </script>
</x-app-layout>