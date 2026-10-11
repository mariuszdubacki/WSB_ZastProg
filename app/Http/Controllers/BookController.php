<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
{
    // Walidacja wykonuje się automatycznie przed wejściem do tej metody
    $validated = $request->validated();

    return redirect()->route('books.index')->with('status', 'Formularz przeszedł walidację i został odebrany!');
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