<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // 1. Walidacja danych z obiektu żądania
        $validated = $request->validate([
            'title'          => 'required|string|max:200',
            'author'         => 'required|string|max:160',
            'published_year' => 'nullable|integer|between:0,65535',
        ]);

        // 2. Bezpieczny zapis za pomocą surowego SQL (DB::insert) z bindowaniem parametrów
        DB::insert(
            'INSERT INTO books (title, author, published_year, created_at, updated_at) VALUES (?, ?, ?, ?, ?)',
            [
                $validated['title'],
                $validated['author'],
                $validated['published_year'] ?? null,
                now(),
                now(),
            ]
        );

        // 3. Przekierowanie na adres /books (trasa books.index) z komunikatem sukcesu
        return redirect()->route('books.index')->with('status', 'Książka została pomyślnie zapisana w bazie danych!');
    }

    public function index()
    {
        return view('books.index');
    }

    // Wyświetlenie widoku edycji z początkowymi danymi
    public function edit($id)
    {
        // Przykładowy obiekt/tablica książki do wypełnienia formularza
        $book = (object) [
            'id'           => $id,
            'title'        => 'Limes inferior',
            'year'         => 1982,
            'category'     => 'Sci-Fi / Fantasy',
            'description'  => 'Klasyka polskiej fantastyki socjologicznej.',
            'is_available' => true,
        ];

        return view('books.edit', compact('book'));
    }

    // Obsługa aktualizacji (emulacja PUT)
    public function update(Request $request, $id)
    {
        // Przekierowanie wsteczne z zachowaniem wpisanych wartości (old input)
        return back()->withInput()->with('status', 'Książka została zaktualizowana!');
    }

    // Obsługa usunięcia (emulacja DELETE)
    public function destroy($id)
    {
        return redirect()->route('books.index')->with('status', "Książka o ID $id została usunięta!");
    }
}