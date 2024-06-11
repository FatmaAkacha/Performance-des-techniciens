<!-- resources/views/users/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Liste des utilisateurs</h1>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Localisation</th>
                <th>Localisation spécifique</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->location }}</td>
                    <td>{{ $user->specific_location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
