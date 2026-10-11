<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj książkę</title>
    <style>
        .alert-errors {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .text-danger {
            color: red;
            font-size: 0.9em;
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <h1>Dodaj książkę</h1>

    {{-- Zbiorcze komunikaty na górze --}}
    @if ($errors->any())
        <div class="alert-errors">
            <strong>Proszę poprawić błędy w formularzu</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <!-- Tytuł książki -->
        <div>
            <label for="title">Tytuł książki:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="np. Limes inferior">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <!-- Rok wydania -->
        <div>
            <label for="year">Rok wydania:</label><br>
            <input type="number" id="year" name="year" value="{{ old('year') }}" placeholder="np. 1982">
            @error('year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <!-- Kategoria -->
        <div>
            <label for="category">Kategoria:</label><br>
            <select id="category" name="category">
                <option value="Literatura piękna" {{ old('category') == 'Literatura piękna' ? 'selected' : '' }}>Literatura piękna</option>
                <option value="Sci-Fi / Fantasy" {{ old('category') == 'Sci-Fi / Fantasy' ? 'selected' : '' }}>Sci-Fi / Fantasy</option>
                <option value="Biografie" {{ old('category') == 'Biografie' ? 'selected' : '' }}>Biografie</option>
                <option value="Naukowe" {{ old('category') == 'Naukowe' ? 'selected' : '' }}>Naukowe</option>
            </select>
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <!-- Opis książki -->
        <div>
            <label for="description">Opis książki:</label><br>
            <textarea id="description" name="description" rows="4" cols="40" placeholder="Krótki opis fabuły...">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <!-- Dostępność w bibliotece -->
        <div>
            <label>
                <input type="checkbox" name="is_available" value="1" {{ old('is_available') ? 'checked' : '' }}>
                Dostępna w bibliotece
            </label>
        </div>
        <br>

        <!-- Numer półki (wymagany, jeśli zaznaczono dostępność) -->
        <div>
            <label for="shelf">Numer półki:</label><br>
            <input type="text" id="shelf" name="shelf" value="{{ old('shelf') }}" placeholder="np. Półka A-12">
            @error('shelf')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <!-- Tagi / Słowa kluczowe (3 osobne pola) -->
        <div>
            <label>Tagi / Słowa kluczowe:</label><br>
            <input type="text" name="tags[]" value="{{ old('tags.0') }}" placeholder="Tag 1"><br>
            <input type="text" name="tags[]" value="{{ old('tags.1') }}" placeholder="Tag 2" style="margin-top: 5px;"><br>
            <input type="text" name="tags[]" value="{{ old('tags.2') }}" placeholder="Tag 3" style="margin-top: 5px;"><br>
            @error('tags.*')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit">Zapisz książkę</button>
    </form>
</body>
</html>