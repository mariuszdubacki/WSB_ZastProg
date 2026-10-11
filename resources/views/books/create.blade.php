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

    {{-- Zbiorcze błędy walidacji --}}
    @if ($errors->any())
        <div class="alert-errors">
            <strong>Proszę poprawić błędy w formularzu:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        {{-- Pole: Tytuł książki --}}
        <div>
            <label for="title">Tytuł książki:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="np. Wiedźmin">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        {{-- Pole: Autor --}}
        <div>
            <label for="author">Autor:</label><br>
            <input type="text" id="author" name="author" value="{{ old('author') }}" placeholder="np. Andrzej Sapkowski">
            @error('author')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        {{-- Pole: Rok wydania --}}
        <div>
            <label for="published_year">Rok wydania:</label><br>
            <input type="number" id="published_year" name="published_year" value="{{ old('published_year') }}" placeholder="np. 1993">
            @error('published_year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit">Dodaj książkę</button>
    </form>
</body>
</html>