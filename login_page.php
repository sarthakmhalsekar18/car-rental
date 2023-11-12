<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .form {
            text-align: center;
            margin-top: 50px; /* Adjust the top margin as needed */
        }

        .username {
            margin-bottom: 15px;
        }

        .text-wrapper-4 {
            font-size: 18px; /* Adjust the font size as needed */
            margin-bottom: 5px;
        }

        .login-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .password-rem {
            margin-bottom: 15px;
        }

        .password {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border: 1px solid #ccc; /* Add a border for better visibility */
        }

        .login-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            transition-duration: 0.4s;
        }

        .login-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login">
        <div class="overlap-wrapper">
            <div class="overlap">
                <div class="overlap-group">
                    <div class="text-wrapper">Welcome Back .!</div>
                    <div class="frame"><div class="div">Skip the lag ?</div></div>
                    <div class="ellipse"></div>
                    <div class="ellipse-2"></div>
                    <div class="frame-wrapper">
                        <div class="frame-2">
                            <div class="frame-3">
                                <div class="upper-section">
                                    <div class="login-text">
                                        <div class="text-wrapper-2">Login</div>
                                        <div class="text-wrapper-3">Glad you’re back.!</div>
                                    </div>
                                    <div class="credentials">
                                        <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                require('db.php');
                                                session_start();

                                                $username = stripslashes($_POST['username']);
                                                $username = mysqli_real_escape_string($con, $username);
                                                $password = stripslashes($_POST['password']);
                                                $password = mysqli_real_escape_string($con, $password);

                                                $query = "SELECT * FROM `customer` WHERE username='$username' AND password='" . md5($password) . "'";
                                                $result = mysqli_query($con, $query) or die(mysql_error());
                                                $rows = mysqli_num_rows($result);

                                                if ($rows == 1) {
                                                    $_SESSION['username'] = $username;
                                                    header("Location: home.php");
                                                } else {
                                                    echo "<div class='form'>
                                                          <h3>Incorrect Username/password.</h3><br/>
                                                          <p class='link'>Click here to <a href='login_page.php'>Login</a> again.</p>
                                                          </div>";
                                                }
                                            }
                                        ?>
                                      <form class="form" method="post" name="login">
        <!-- <div class="username">
            <div class="text-wrapper-4">Username</div>
        </div> -->
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        
        <!-- <div class="password-rem">
            <div class="password">
                <div class="text-wrapper-4">Password</div>
            </div>
        </div> -->
        
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" name="submit" value="Login" class="login-button"/>
    </form>
    <div class="frame-5">
                                <p class="link"><a href="sign_up.php">Don’t have an account? Signup</a></p>
                            </div>

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
