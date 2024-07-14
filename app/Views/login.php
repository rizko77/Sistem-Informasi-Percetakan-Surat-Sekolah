<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa; /* Background color */
            font-family: Arial, sans-serif;
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }
        .login-form {
            background-color: #ffffff; /* Form background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 360px; /* Max width of the form */
            width: 100%;
        }
        .login-form h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333; /* Heading color */
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 4px;
        }
        .btn-primary {
            background-color: #007bff; /* Button background */
            border-color: #007bff; /* Button border */
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Hover color */
            border-color: #0056b3; /* Hover border */
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
        .form-footer {
            margin-top: 20px;
            text-align: center;
        }
        .form-footer a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h1>Login Admin</h1>
        <form action="/auth/loginCheck" method="POST">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <?php if (isset($error)) : ?>
            <p class="error-message"><?= $error ?></p>
        <?php endif; ?>
        <div class="form-footer">
            <a href="/" class="btn btn-link">Kembali ke Halaman Awal</a>
            <a href="/forgot-password" class="btn btn-link">Lupa Sandi?</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
