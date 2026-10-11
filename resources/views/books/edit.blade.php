<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edycja książki</title>
</head>
<body>
    <h1>Edycja książki</h1>

    @if (session('status'))
        <p style="color: green; font-weight: bold;">
            {{ session('status') }}
        </p>
    @endif

    <!-- FORMULARZ EDYCJI (PUT) -->
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tytuł -->
        <div>
            <label for="title">Tytuł książki:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}">
        </div>
        <br>

        <!-- Rok wydania -->
        <div>
            <label for="year">Rok wydania:</label>
            <input type="number" id="year" name="year" value="{{ old('year', $book->year) }}">
        </div>
        <br>

        <!-- Kategoria -->
        <div>
            <label for="category">Kategoria:</label>
            <select id="category" name="category">
                @php
                    $selectedCategory = old('category', $book->category);
                @endphp
                <option value="Literatura piękna" {{ $selectedCategory == 'Literatura piękna' ? 'selected' : '' }}>Literatura piękna</option>
                <option value="Sci-Fi / Fantasy" {{ $selectedCategory == 'Sci-Fi / Fantasy' ? 'selected' : '' }}>Sci-Fi / Fantasy</option>
                <option value="Biografie" {{ $selectedCategory == 'Biografie' ? 'selected' : '' }}>Biografie</option>
                <option value="Naukowe" {{ $selectedCategory == 'Naukowe' ? 'selected' : '' }}>Naukowe</option>
            </select>
        </div>
        <br>

        <!-- Opis -->
        <div>
            <label for="description">Opis książki:</label><br>
            <textarea id="description" name="description" rows="4" cols="40">{{ old('description', $book->description) }}</textarea>
        </div>
        <br>

        <!-- Dostępność (checkbox) -->
        <div>
            <label>
                <input type="checkbox" name="is_available" value="1" 
                    {{ old('is_available', $book->is_available) ? 'checked' : '' }}>
                Dostępna w bibliotece
            </label>
        </div>
        <br>

        <button type="submit">Zaktualizuj książkę</button>
    </form>

    <hr style="margin: 30px 0;">

    <!-- OSOBNY FORMULARZ USUWANIA (DELETE) -->
    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" style="background-color: #ff4d4d; color: white; padding: 6px 12px; border: none; cursor: pointer;">
            Usuń książkę
        </button>
    </form>
</body>
</html>