<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista książek</title>
</head>
<body>
    <h1>Lista książek</h1>

    @if (session('status'))
        <p style="color: green; font-weight: bold;">
            {{ session('status') }}
        </p>
    @endif
</body>
</html>