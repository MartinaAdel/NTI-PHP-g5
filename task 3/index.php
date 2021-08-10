

<?php

$form_submitted = false;

function CleanInputs($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    return $input;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $form_submitted = true;
    $errors = [];

    $name  = CleanInputs($_POST['name']);
    $email = CleanInputs($_POST['email']);
    $password = $_POST['password'];
    $address = trim($_POST['address']);
    $gender = $_POST['gender'];
    $linkedin = $_POST['linkedIn'];

    if (empty($name)) {
        array_push($errors, "Name Field Required");
    } elseif (!is_string($name)) {
        array_push($errors, "invalid Name");
    }

    if (empty($email)) {
        array_push($errors, "Email Field Required");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "invalid email");
    }

    if (empty($password)) {
        array_push($errors, "Password Field Required");
    } elseif (strlen($password) < 6) {
        array_push($errors,  "Password is too short, minimum is 6 characters ");
    }

    if (empty($address)) {
        array_push($errors, "address Field Required");
    } elseif (strlen($address) < 10) {
        array_push($errors,  "address is too short, minimum is 10 characters ");
    }

    if (empty($linkedin)) {
        array_push($errors, "linkedin Field Required");
    } elseif (!filter_var($linkedin, FILTER_VALIDATE_URL)) {
        array_push($errors, "invalid linkedin link");
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Task 3</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">Register</h3>
                <div class="card-text">
                    <?php

                    if ($form_submitted && count($errors) > 0) {
                        echo '
			            <div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        foreach ($errors as $value) {
                            echo $value . '<br>';
                        }
                        echo '</div> ';
                    }

                    ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                        <!-- to error: add class "has-danger" -->

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" id="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" name="email" class="form-control form-control-sm" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" id="password">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" name="address" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label >Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                                <label class="form-check-label" for="exampleRadios2">
                                    Female
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">LinkedIn url</label>
                            <input type="text" name="linkedIn" class="form-control form-control-sm">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Sign up</button>


                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>