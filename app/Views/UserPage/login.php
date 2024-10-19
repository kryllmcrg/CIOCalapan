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
        .form-container input[type=password],
        .form-container input[type=text] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            border: 1px solid #ccc;
            box-sizing: border-box; /* Ensure padding and border are included in width */
        }

        .form-container input + .text-danger {
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

        /* Styles for OTP modal */
        .modal {
        display: none; /* Hidden by default */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7); /* Black with opacity */
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .modal-content {
        background-color: #fff; /* White background for the modal */
        border-radius: 10px;
        padding: 30px;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        position: relative; /* Relative positioning for close button */
        transition: transform 0.3s ease; /* Smooth animation */
    }

    .modal-content h2 {
        margin-bottom: 20px;
        font-family: 'Oswald', sans-serif;
        color: #333;
    }

    .modal-content label {
        display: block;
        margin-bottom: 10px;
        color: #666;
        font-weight: bold;
        text-align: left;
    }

    .modal-content input[type=text] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 20px;
        border: 1px solid #ccc;
        box-sizing: border-box; /* Ensure padding and border are included in width */
        transition: border-color 0.3s; /* Smooth border color transition */
    }

    .modal-content input[type=text]:focus {
        border-color: #a86add; /* Change border color on focus */
        outline: none; /* Remove outline */
    }

    .modal-content button[type=submit] {
        width: 100%;
        padding: 12px;
        background-color: #a86add;
        color: white;
        border: none;
        border-radius: 20px; /* Rounded corners */
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s; /* Smooth background color transition */
    }

    .modal-content button[type=submit]:hover {
        background-color: #a86add; /* Darker shade on hover */
    }

    .modal-content p {
        margin-top: 15px;
        font-size: 14px;
        color: #666;
    }

    .modal-content p a {
        color: #a86add;
        text-decoration: none;
        font-weight: bold;
    }

    .modal-content p a:hover {
        text-decoration: underline; /* Underline on hover */
    }

    .close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        position: absolute;
        right: 10px;
        top: 10px;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
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

        <form id="loginForm" action="<?= base_url('/check') ?>" method="post" autocomplete="off">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <span class="text-danger"><?= isset($validation) ? $validation->getError('email') : ''; ?></span>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <span class="text-danger"><?= isset($validation) ? $validation->getError('password') : ''; ?></span>

            <button type="submit" id="loginBtn">Sign In</button>
            <p>Don't have an account? <a href="/register">Sign up</a></p>
            <p>I don't want to have an account. <a href="/">Not Now</a></p>
        </form>
    </div>

    <!-- OTP Modal -->
    <div class="modal" id="otpModal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2>Enter OTP</h2>
        <form id="otpForm" action="<?= base_url('/verify-otp') ?>" method="post" autocomplete="off">
            <label for="otp">OTP</label>
            <input type="text" id="otp" name="otp" placeholder="Enter OTP" required>
            <span class="text-danger"><?= isset($validation) ? $validation->getError('otp') : ''; ?></span>

            <button type="submit">Verify OTP</button>
        </form>
        <p>Didn't receive the OTP? <a href="#" id="resendOtp">Resend OTP</a></p>
    </div>
</div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            fetch('<?= base_url('/check') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                },
                body: new URLSearchParams({
                    email: email,
                    password: password
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Show the OTP modal
                    document.getElementById('otpModal').style.display = 'flex';
                } else {
                    alert(data.message || 'Login failed. Please check your credentials.');
                }
            })
            .catch(error => console.error('Error:', error));
        });

        // Close the modal when the user clicks on <span> (x)
        document.getElementById('closeModal').onclick = function() {
            document.getElementById('otpModal').style.display = 'none';
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            if (event.target == document.getElementById('otpModal')) {
                document.getElementById('otpModal').style.display = 'none';
            }
        }
    </script>
</body>
</html>
