<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // 1. Pobranie pojedynczej wartości dla pola title
        $title = $request->input('title');

        // 2. Pobranie pełnej tablicy wszystkich przesłanych pól
        $allData = $request->all();

        // 3. Pobranie wyłącznie podzbioru pól obejmującego title oraz category
        $subset = $request->only(['title', 'category']);

        // Wyświetlenie wszystkich 3 wariantów na ekranie (do weryfikacji zadania):
        dd([
            'single_title' => $title,
            'all_data'     => $allData,
            'subset_only'  => $subset,
        ]);

        // Standardowe przekierowanie (gdy nie używamy dd):
        // return redirect()->route('books.index')->with('status', 'Formularz został odebrany!');
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
            'id' => $id,
            'title' => 'Limes inferior',
            'year' => 1982,
            'category' => 'Sci-Fi / Fantasy',
            'description' => 'Klasyka polskiej fantastyki socjologicznej.',
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