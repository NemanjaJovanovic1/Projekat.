<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Fudbalska liga - Register</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        .bg {
            background-image: url('slike/stadion.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-box {
            background-color: rgba(34, 139, 34, 0.9);
            padding: 20px;
            border-radius: 10px;
            color: white;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            font-family: 'Lalezar', cursive;
            margin-bottom: 20px;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control {
            background-color: #333;
            color: #ccc;
            border: none;
            border-radius: 5px;
        }
        .form-control::placeholder {
            color: #888;
        }
        .btn-primary {
            background-color: #fff;
            color: #228b22;
            border: none;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #ccc;
            color: #228b22;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="bg">
        <div class="register-box">
            <h1 class="text-center">Fudbalska liga</h1>
            <form action="php/register.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Unesite email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Unesite password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            <div class="text-center mt-3">
                <a href="index.php">Imate nalog?</a>
            </div>
        </div>
    </div>
</body>
</html>
