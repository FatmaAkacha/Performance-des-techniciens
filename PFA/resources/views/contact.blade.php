<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <h1>Send Email</h1>
    <form method="POST" action="{{ route('send') }}">
        @csrf
        <input type="email" name="email" required>
        <input type="submit" value="Send email">
    </form>
</body>
</html>
