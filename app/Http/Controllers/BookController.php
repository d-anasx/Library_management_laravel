<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('categorie')->get();
        return view('books.index', compact('books'));
    }
    public function userBooks()
    {
        $user = auth()->user;
        $books = $user->books()->with('categorie')->get();
        return view('books.user_books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create', [
            'categories' => Categorie::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect()->route('books')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book,
            'categories' => Categorie::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()->route('books')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books')->with('success', 'Book deleted successfully.');
    }
}
