<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-100 leading-tight flex items-center gap-2">
                <span class="p-2 bg-indigo-500/20 rounded-lg text-indigo-400">📖</span>
                Digital Bookshelf
            </h2>
            <a href="{{ route('books.create') }}" 
               class="inline-flex items-center px-5 py-2.5 bg-indigo-600 border border-transparent rounded-xl font-bold text-sm text-white tracking-wide hover:bg-indigo-500 transition-all shadow-lg shadow-indigo-500/30">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add New Volume
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-950 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-10 flex flex-wrap items-center justify-between gap-4">
                <div class="inline-flex items-center px-4 py-2 bg-slate-900 border border-slate-800 rounded-2xl shadow-xl">
                    <span class="text-indigo-400 font-bold mr-2">{{ $books->count() }}</span>
                    <span class="text-slate-400 text-sm font-medium">Volumes in Library</span>
                </div>

                @if (session('success'))
                    <div id="toast" class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-4 py-2 rounded-xl text-sm flex items-center gap-3 animate-fade-in">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        {{ session('success') }}
                        <button onclick="document.getElementById('toast').remove()" class="hover:text-white">✕</button>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse ($books as $book)
                    <div class="group relative bg-slate-900 rounded-tr-2xl rounded-br-2xl p-6 border-l-[12px] border-indigo-600 shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between min-h-[320px] overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent pointer-events-none"></div>
                        
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <span class="text-[10px] uppercase tracking-widest font-bold text-indigo-400 px-2 py-1 bg-indigo-500/10 rounded border border-indigo-500/20">
                                    {{ $book->categorie->title ?? 'General' }}
                                </span>
                                <div class="flex gap-1">
                                    <a href="{{ route('books.edit', $book) }}" class="p-1.5 text-slate-500 hover:text-amber-400 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </a>
                                </div>
                            </div>

                            <h3 class="text-xl font-serif font-bold text-white leading-tight group-hover:text-indigo-300 transition-colors">
                                {{ $book->title }}
                            </h3>
                            <p class="text-slate-400 text-sm mt-2 italic">by {{ $book->author }}</p>
                        </div>

                        <div class="mt-8">
                            <div class="flex items-end justify-between">
                                <div>
                                    <p class="text-[10px] text-slate-500 uppercase font-bold tracking-tighter mb-1">Stock Status</p>
                                    @if($book->quantity > 0)
                                        <div class="flex items-center text-emerald-400 font-mono text-sm">
                                            <span class="text-lg font-bold mr-1">{{ $book->quantity }}</span> 
                                            <span class="text-[10px] opacity-70 uppercase">Available</span>
                                        </div>
                                    @else
                                        <span class="text-rose-500 text-xs font-bold uppercase">Archive Only</span>
                                    @endif
                                </div>
                                
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="opacity-0 group-hover:opacity-100 transition-opacity">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Burn this record?')" class="p-2 text-rose-500/50 hover:text-rose-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center border-2 border-dashed border-slate-800 rounded-3xl">
                        <p class="text-slate-500 text-lg italic italic">The shelves are currently empty...</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>