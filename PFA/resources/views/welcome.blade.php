<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: center;
        }
        h1 {
            margin-top: 0;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }
        nav ul li {
            margin-right: 20px;
        }
        nav ul li:last-child {
            margin-right: 0;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #0056b3;
        }
        .hero-section {
            background-image: url('https://via.placeholder.com/1200x400');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #00000;
        }
        .hero-content {
            text-align: center;
        }
        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .hero-content p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Utilisateurs</a></li>
                    <li><a href="#">Missions</a></li>
                    <li><a href="#">Déconnexion</a></li>
                </ul>
            </nav>
        </header>
        <section >
            <div >
                <h1>Bienvenue</h1>
            </div>
        </section>
    
    </div>
</body>
</html>
