<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Login</title>
</head>
<body>
    <form method="POST" action="{{ route('mentor.login') }}">
        @csrf

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Senha:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>
