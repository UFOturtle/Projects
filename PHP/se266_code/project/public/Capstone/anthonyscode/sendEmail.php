<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
	
</head>
<body>
	 <!-- Send email to reset password -->
        <form class="text-center border border-light p-5" action="#!">
            <div class="form group">
                <p class="h4 mb-4">Send Email</p>

                <div class="d-flex justify-content-around">
                        <div>
                            <!-- Forgot password -->
                            <p>Please enter your email so we can send you a password reset link.</p>
                        </div>
                    </div>

                <!-- Email -->
                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Incorrect information</div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" onclick="window.location.navigate.href='resetPassword.html'" type=" button">Send Email</button>
            </div>
        </form>
    <!-- Send email to reset password -->

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