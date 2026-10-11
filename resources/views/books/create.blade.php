<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj książkę</title>
</head>
<body>
    <h1>Dodaj książkę</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <!-- 1. Tytuł książki (tekstowe) -->
        <div>
            <label for="title">Tytuł książki:</label>
            <input type="text" id="title" name="title" placeholder="np. Limes inferior">
        </div>
        <br>

        <!-- 2. Rok wydania (liczbowe) -->
        <div>
            <label for="year">Rok wydania:</label>
            <input type="number" id="year" name="year" placeholder="np. 1982">
        </div>
        <br>

        <!-- 3. Kategoria (lista rozwijana select) -->
        <div>
            <label for="category">Kategoria:</label>
            <select id="category" name="category">
                <option value="Literatura piękna">Literatura piękna</option>
                <option value="Sci-Fi / Fantasy">Sci-Fi / Fantasy</option>
                <option value="Biografie">Biografie</option>
                <option value="Naukowe">Naukowe</option>
            </select>
        </div>
        <br>

        <!-- 4. Opis książki (textarea) -->
        <div>
            <label for="description">Opis książki:</label><br>
            <textarea id="description" name="description" rows="4" cols="40" placeholder="Krótki opis fabuły..."></textarea>
        </div>
        <br>

        <!-- 5. Dostępność w bibliotece (checkbox) -->
        <div>
            <label>
                <input type="checkbox" name="is_available" value="1">
                Dostępna w bibliotece
            </label>
        </div>
        <br>

        <button type="submit">Zapisz książkę</button>
    </form>
</body>
</html>