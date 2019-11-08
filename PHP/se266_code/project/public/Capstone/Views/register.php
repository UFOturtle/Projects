 <!-- Default form register -->
    <form class="text-center border border-light p-5" action="../Controllers/MainController.php" method="post">
            <div class="form group">
                <p class="h4 mb-4">Sign up</p>

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="First name" required pattern="/^[a-zA-Z]+(([\'\,\.\-][a-zA-Z])?[a-zA-Z]*)*$/m">
                        <div class="valid-feedback">Valid</div>
                        <div class="invalid-feedback">Incorrect information</div>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Last name" required pattern="/^[a-zA-Z]+(([\'\,\.\-][a-zA-Z])?[a-zA-Z]*)*$/m">
                        <div class="valid-feedback">Valid</div>
                        <div class="invalid-feedback">Incorrect information</div>
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- Age -->
                        <input type="number" name="age" id="age" class="form-control" placeholder="Age">
                    </div>
                    <div class="col">
                        <!-- Weight -->
                        <input type="number" name="weight"id="weight" class="form-control" placeholder="Weight">
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- Height -->
                        <select id="height" name="height" class="form-control" placeholder="Height">
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
                        <select name="gender" id="gender" class="form-control" placeholder="Gender">
                            <option value="selectGender">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

            <!-- Username -->
                <input type="username" id="uname" name="uname" class="form-control mb-4" placeholder="Username" required>
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Incorrect information</div>

            <!-- E-mail -->
                <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail" required>
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Incorrect information</div>
                <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Confirm E-mail" required>
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Email does not match</div>
            <!--Action-->
                <input type="hidden" name="action" value="Register" >
            <!-- Password -->
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required placeholder="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{6,50})">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Incorrect information</div>
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 8 characters, 1 digit, no spaces 
                </small>
                <input type="password" id="confPW" class="form-control" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required placeholder="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{6,50})">
                <div class="valid-feedback">Valid</div>
                <div class="invalid-feedback">Passwords do not match</div>
                
            <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="button">Sign in</button>

                <hr>

   </form>