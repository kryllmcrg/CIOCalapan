<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-sr9OO8F4UAxJLT8KgGr9Vj2ZhaorSzBfFz/Tq2JHZIzB0IuMvqQFcFUpI6InZIlB" crossorigin="anonymous">
    <title>Login</title>
    <link rel="shortcut icon" href="assets/images/ciologo.png" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('assets/images/bglogin.png'); 
            background-size: cover; 
            background-position: center; 
            height: 100vh; 
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Nunito', sans-serif;
            font-weight: bold;
            position: relative;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-family: 'Oswald', sans-serif;
            color: #4a4a4a;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            color: #4a4a4a;
            font-weight: bold;
            text-align: left;
        }

        .form-container input[type=email],
        .form-container input[type=password] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            border: 1px solid #ccc;
            box-sizing: border-box; /* Ensure padding and border are included in width */
        }

        .form-container input[type=email] + .text-danger,
        .form-container input[type=password] + .text-danger {
            color: red; /* Set color to red for error messages */
        }

        .form-container button[type=submit] {
            width: 100%;
            padding: 12px;
            background-color: #a86add;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .form-container p {
            margin-top: 15px;
            font-size: 14px;
            color: #4a4a4a;
        }

        .form-container p a {
            color: #a86add;
            text-decoration: none;
            font-weight: bold;
        }

        @media only screen and (max-width: 768px) {
            .form-container {
                max-width: 90%;
            }
        }

        .required-sign {
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <?= csrf_field(); ?>

        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <form action="<?= base_url('/check') ?>" method="post" autocomplete="off">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?= set_value('email'); ?>">
            <span class="text-danger"><?= isset($validation) ? $validation->getError('email') : ''; ?></span>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" value="<?= set_value('password'); ?>">
            <span class="text-danger"><?= isset($validation) ? $validation->getError('password') : ''; ?></span>

            <button type="submit">Sign In</button>
            <p>Don't have an account? <a href="/register">Sign up</a></p>
            <p>I don't want to have an account. <a href="/">Not Now</a></p>
        </form>
    </div>
</body>
</html>
