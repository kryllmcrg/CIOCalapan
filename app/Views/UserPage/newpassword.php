<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-sr9OO8F4UAxJLT8KgGr9Vj2ZhaorSzBfFz/Tq2JHZIzB0IuMvqQFcFUpI6InZIlB" crossorigin="anonymous">
    <title>Reset Password</title>
    <link rel="shortcut icon" href="assets/images/ciologo.png" />
    <style>
        /* General Styling */
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
        }

        /* Form Container Styling */
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

        .form-container input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .form-container .text-danger {
            color: red;
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

        .form-container p a {
            color: #a86add;
            text-decoration: none;
            font-weight: bold;
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal-content {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            position: relative;
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

        .modal-content input[type=text],
        .modal-content input[type=email],
        .modal-content input[type=password] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .modal-content button[type=submit] {
            width: 100%;
            padding: 12px;
            background-color: #a86add;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 18px;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }

        /* Responsive Design */
        @media only screen and (max-width: 768px) {
            .form-container {
                max-width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Reset Password</h2>
        <?= csrf_field(); ?>
        <?php if (!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <form id="resetPasswordForm" method="post" autocomplete="off">
            <input type="hidden" id="user_id" name="user_id" value="<?= $user_id ?>">
            <label for="newPassword">New Password</label>
            <input type="password" id="newPassword" name="newPassword" placeholder="Enter your new password" required>
            <span class="text-danger"><?= isset($validation) ? $validation->getError('newPassword') : ''; ?></span>

            <label for="confirmNewPassword">Confirm New Password</label>
            <input type="password" id="confirmNewPassword" name="confirmNewPassword"
                placeholder="Enter your new password" required>
            <span
                class="text-danger"><?= isset($validation) ? $validation->getError('confirmNewPassword') : ''; ?></span>
            <button type="submit" id="loginBtn">Submit</button>
        </form>
    </div>

    <!-- OTP Modal -->
    <div class="modal" id="otpPasswordModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Check your email for OTP code to confirm password reset</h2>
            <h2>Enter OTP</h2>
            <form id="otpPasswordForm" method="post" autocomplete="off">
                <label for="otp">OTP</label>
                <input type="text" id="otpInput" name="otpInput" placeholder="Enter OTP" required>
                <span class="text-danger"><?= isset($validation) ? $validation->getError('otp') : ''; ?></span>

                <button type="submit">Verify OTP</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('resetPasswordForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            const user_id = document.getElementById('user_id').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmNewPassword').value;

            const urlParams = new URLSearchParams(window.location.search);
            const token = urlParams.get('token');

            if (confirmPassword != newPassword) {
                alert('Passwords do not match.');
                return;
            }

            fetch('<?= base_url('/check-password-reset') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                },
                body: new URLSearchParams({
                    user_id: user_id,
                    password: newPassword,
                    token: token
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Show the OTP modal
                        document.getElementById('otpPasswordModal').style.display = 'flex';
                    } else {
                        alert(data.message || 'Reset Password Failed. Please try again later.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        // Close the modal when the user clicks on <span> (x)
        document.getElementById('closeModal').onclick = function () {
            document.getElementById('otpPasswordModal').style.display = 'none';
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function (event) {
            if (event.target == document.getElementById('otpPasswordModal')) {
                document.getElementById('otpPasswordModal').style.display = 'none';
            }
        }

        document.getElementById('otpPasswordForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            const user_id = document.getElementById('user_id').value;
            const otpInput = document.getElementById('otpInput').value;
            const newPassword = document.getElementById('newPassword').value;
            const urlParams = new URLSearchParams(window.location.search);
            const token = urlParams.get('token');


            fetch('<?= base_url('/confirm-password-reset') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                },
                body: new URLSearchParams({
                    user_id: user_id,
                    password: newPassword,
                    token: token,
                    otp: otpInput
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'error') {
                        alert(data.message || 'Reset Password Failed. Please try again later.');
                    }

                    if (data.status ==='success') {
                        alert('Password reset successfully. You can now login with your new password.');
                        window.location.href = '<?= base_url('/login')?>';
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>

</html>