<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css">
    <title>Register</title>
    <link rel="shortcut icon" href="assets/images/ciologo.png" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('assets/images/bglogin.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Nunito', sans-serif;
            font-weight: bold;
            position: relative;
        }

        .back-button {
            position: absolute;
            top: 10px;
            right: 10px;
            text-decoration: none;
            color: white;
            font-size: 1.5em;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 30px;
            max-width: 800px;
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

        .form-container input[type=text],
        .form-container input[type=email],
        .form-container input[type=password],
        .form-container select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        .form-container input[type=checkbox] {
            margin-right: 5px;
            vertical-align: middle;
        }

        .form-container button[type=submit] {
            width: 100%;
            padding: 12px;
            background-color: #a86add;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
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

        .form-grid {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .form-column {
            flex: 1;
            max-width: calc(50% - 20px);
            /* Adjust the width as needed */
        }

        @media screen and (max-width: 600px) {
            .form-column {
                max-width: 100%;
            }
        }

        .profile-image-label {
            display: block;
            margin-bottom: 10px;
            color: #4a4a4a;
            font-weight: bold;
            text-align: left;
        }

        /* Style for profile image input */
        .profile-image-input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        /* Hover effect for profile image input */
        .profile-image-input:hover {
            border-color: #a86add;
        }

        /* Focus effect for profile image input */
        .profile-image-input:focus {
            outline: none;
            border-color: #a86add;
            box-shadow: 0 0 0 2px rgba(168, 106, 221, 0.2);
        }

        .required-sign {
            color: red;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.com/libraries/bootstrap-datetimepicker/4.17.37" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container d-flex justify-content-center p-4">
        <div class="form-container">
            <h2>Register Now</h2>
            <form method="post" action="<?= base_url('/save');?>" enctype="multipart/form-data" class="form-grid" autocomplete="off">
                <?= csrf_field();?>
                <?php if (!empty(session()->getFlashdata('fail'))) :?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) :?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>
                <div class="row gx-3">
                    <div class="col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Insert your firstname" value="<?= set_value('firstname'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'firstname'): ''?></span>
                    </div>

                    <div class="col-md-6">
                        <label for="lastname">Last Name</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Insert your lastname" value="<?= set_value('lastname'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'lastname'): ''?></span>
                    </div>

                    <div class="col-md-6">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Create your address" value="<?= set_value('address'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'address'): ''?></span>
                    </div>

                    <div class="col-md-6">
                        <label for="email">E-mail Address</label>
                        <input type="email" id="email" name="email" placeholder="Insert your e-mail address" value="<?= set_value('email'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email'): ''?></span>
                    </div>

                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Create your password" value="<?= set_value('password'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password'): ''?></span>
                    </div>

                    <div class="col-md-6">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Rather not say">Rather not say</option>
                        </select>
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'gender'): ''?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" placeholder="Create your contact_number" value="<?= set_value('contact_number'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'contact_number'): ''?></span>
                    </div>

                    <div class="col-md-6">
                        <label for="image" class="image-label">Profile Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                aria-describedby="inputFileAddon" aria-label="Upload" value="<?= set_value('image'); ?>">
                        </div>
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'image'): ''?></span>
                    </div>

                    <div class="col-md-12">
                        <button type="submit">Sign Up</button>
                        <label for="terms">
                            <input type="checkbox" id="terms" name="terms">
                            I have read the Terms & Conditions
                        </label>
                    </div>
                </div>
            </form>
            <p>I have an account! <a href="/login">Sign in</a></p>
            <button type="button" onclick="goBack()">Back</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script>
function goBack() {
    window.history.back();
}
</script>
</body>

</html>