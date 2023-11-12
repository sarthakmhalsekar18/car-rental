
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="signup">
        <div class="overlap-wrapper">
            <div class="overlap">
                <div class="overlap-group">
                    <div class="text-wrapper">Roll the Carpet.!</div>
                    <div class="frame">
                        <div class="div">Skip the lag ?</div>
                    </div>
                </div>
                <div class="overlap-group-2">
                    <div class="ellipse"></div>
                    <div class="ellipse-2"></div>
                    <div class="frame-wrapper">
                        <div class="frame-2">
                            <div class="frame-3">
                                <div class="upper-section">
                                    <div class="login-text">
                                        <div class="text-wrapper-2">Signup</div>
                                        <p class="p">Just some details to get you in.!</p>
                                    </div>
                                    <div class="credentials">
                                        <?php
                                            require('db.php');

                                            if (isset($_REQUEST['username'])) {

                                                $fname    = stripslashes($_REQUEST['fname']);
                                                $fname     = mysqli_real_escape_string($con, $fname );
                                                $Lname    = stripslashes($_REQUEST['Lname']);
                                                $Lname     = mysqli_real_escape_string($con, $Lname );
                                                $address    = stripslashes($_REQUEST['address']);
                                                $address     = mysqli_real_escape_string($con, $address );
                                                $username = stripslashes($_REQUEST['username']);
                                                $username = mysqli_real_escape_string($con, $username);
                                                $email    = stripslashes($_REQUEST['email']);
                                                $email    = mysqli_real_escape_string($con, $email);
                                                $password = stripslashes($_REQUEST['password']);
                                                $password = mysqli_real_escape_string($con, $password);

                                                $query    = "INSERT into `customer` (fname,Lname,email,username,password, address)
                                                             VALUES ('$fname','$Lname','$email','$username', '" . md5($password) . "','$address')";
                                                $result   = mysqli_query($con, $query);
                                                if ($result) {
                                                    echo "<div class='form'>
                                                          <h3>You are registered successfully.</h3><br/>
                                                          <p class='link'>Click here to <a href='login_page.php'>Login</a></p>
                                                          </div>";
                                                } else {
                                                    echo "<div class='form'>
                                                          <h3>Required fields are missing.</h3><br/>
                                                          <p class='link'>Click here to <a href='login_page.php'>registration</a> again.</p>
                                                          </div>";
                                                }
                                            } else {
                                        ?>
                                        <form class="form" action="" method="post">
                                        <!-- <div class="div-wrapper">
                                        <div class="div-wrapper">
                                        <div class="div-wrapper"> -->
                                        <div class="div-wrapper">
        <div class="text-wrapper-3">first name</div>
        <input type="text" class="text-wrapper-3" name="fname" style="color: black;" required />
    </div>                         
        

    <div class="div-wrapper">
        <div class="text-wrapper-3">Last name</div>
        <input type="text" class="text-wrapper-3" name="Lname" style="color: black;" required />
    </div> 

    <div class="div-wrapper">
        <div class="text-wrapper-3">Address</div>
        <input type="text" class="text-wrapper-3" name="address" style="color: black;" required />
    </div> 

    <div class="div-wrapper">
        <div class="text-wrapper-3">Username</div>
        <input type="text" class="text-wrapper-3" name="username" style="color: black;" required />
    </div> 

    <div class="div-wrapper">
        <div class="text-wrapper-3">Email</div>
        <input type="text" class="text-wrapper-3" name="email" style="color: black;" required />
    </div> 

    <div class="password-rem">
        <input class="password" placeholder="Password" type="password" name="password" style="color: black;" required />
        <input class="password" placeholder="Confirm Password" type="password" id="input-1" style="color: black;" required />
    </div>

    
<input type="submit" name="submit" value="Signup" class="login-button"> <style> .login-button { background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; transition-duration: 0.4s; }
.login-button:hover { background-color: #45a049; } </style>
    <p class="link"><a href="login_page.php">Already Registered? Login</a></p>
</form>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <img class="line-2" src="img/line-3.svg" />
            </div>
        </div>
    </div>
</body>
</html>
