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
    <!-- Default form register -->
        <form class="text-center border border-light p-5" action="registerFunc.php" method="post">
            <div class="form group">
                <p class="h4 mb-4">Sign up</p>

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <input type="text" name="fname" class="form-control" placeholder="First name" required pattern="/^[a-zA-Z]+(([\'\,\.\-][a-zA-Z])?[a-zA-Z]*)*$/m">
                        <div class="valid-feedback">Valid</div>
                        <div class="invalid-feedback">Incorrect information</div>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <input type="text" name="lname" class="form-control" placeholder="Last name" required pattern="/^[a-zA-Z]+(([\'\,\.\-][a-zA-Z])?[a-zA-Z]*)*$/m">
                        <div class="valid-feedback">Valid</div>
                        <div class="invalid-feedback">Incorrect information</div>
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- Age -->
                        <input type="number" name="age" class="form-control" placeholder="Age">
                    </div>
                    <div class="col">
                        <!-- Weight -->
                        <input type="number" name="weight" class="form-control" placeholder="Weight">
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- Height -->
                        <select name="height" class="form-control" placeholder="Height">
                            <option value="selectHeight">Height</option>
                            <option value="4'0">4'0"</option>
                            <option value="4'1">4'1"</option>
                            <option value="4'2">4'2"</option>
                            <option value="4'3">4'3"</option>
                            <option value="4'4">4'4"</option>
                            <option value="4'5">4'5"</option>
                            <option value="4'6">4'6"</option>
                            <option value="4'7">4'7"</option>
                            <option value="4'8">4'8"</option>
                            <option value="4'9">4'9"</option>
                            <option value="4'10">4'10"</option>
                            <option value="4'11">4'11"</option>
                            <option value="5'0">5'0"</option>
                            <option value="5'1">5'1"</option>
                            <option value="5'2">5'2"</option>
                            <option value="5'3">5'3"</option>
                            <option value="5'4">5'4"</option>
                            <option value="5'5">5'5"</option>
                            <option value="5'6">5'6"</option>
                            <option value="5'7">5'7"</option>
                            <option value="5'8">5'8"</option>
                            <option value="5'9">5'9"</option>
                            <option value="5'10">5'10"</option>
                            <option value="5'11">5'11"</option>
                            <option value="6'0">6'0"</option>
                            <option value="6'1">6'1"</option>
                            <option value="6'2">6'2"</option>
                            <option value="6'3">6'3"</option>
                            <option value="6'4">6'4"</option>
                            <option value="6'5">6'5"</option>
                        </select>
                    </div>
                    <div class="col">
                        <!-- Gender -->
                        <select  name="gender" class="form-control" placeholder="Gender">
                            <option value="selectGender">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

            <!-- Username -->
                <input type="username" name="uname" class="form-control mb-4" placeholder="Username" required>
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Incorrect information</div>

            <!-- E-mail -->
                <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" required>
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Incorrect information</div>
                <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Confirm E-mail" required>
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Email does not match</div>

            <!-- Password -->
                <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required placeholder="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{6,50})">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Incorrect information</div>
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 8 characters, 1 digit, no spaces 
                </small>
                <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required placeholder="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{6,50})">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Passwords do not match</div>
                
                <br/>
                
                <div class="form-row mb-4">
                    <div class="col">
                        <input type="number" name="caloriegoal" class="form-control" placeholder="Calorie Goal">
                </div>
                
            <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="submit" name="register">Register</button>
                <hr>

        </form>
    <!-- Default form register -->

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