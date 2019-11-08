

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
       
    <!-- Default form login -->
    <form class="text-center border border-light p-5" action="../Controllers/MainController.php" class="was-validated" method="post">
            <div class="form group">
                <p class="h4 mb-4">Sign in</p>

                <!-- Email -->
                <?php 
                if(isset($_SESSION['failedlogin']))
                {
                    echo'<p style="color: red"> Invalid Username or Password</p>';
                }
                ?>
                <input type="email" id="loginEmail" class="form-control mb-4" placeholder="E-mail" required name="email">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Incorrect information</div>

                <!-- Password -->
                <input type="password" id="loginPW" class="form-control mb-4" placeholder="Password" required placeholder="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{6,50})" name="password">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Incorrect information</div>
                
                <!--Action-->
                <input type="hidden" name="action" value="Login" >
                
                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit" name="login">Sign in</button>

                <!-- Register -->
                <p>Not a member?
                    <a href="../Views/register.php">Register</a>
                </p>
            </div>
        </form>
    <!-- Default form login -->

    <!-- Default form register -->

    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>