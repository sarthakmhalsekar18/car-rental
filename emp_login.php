<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login_page.css"/>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            justify-content: ; /* Align to the left */
            height: 100vh;
            background-image: url('img/Car Website – 1@2x.png'); /* Replace 'your-background-image.jpg' with the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Arial', sans-serif;
            margin: 80px 80px;
        }

        .login-page {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: left;
            width: 300px;
            
        }

        .login-title {
            color: #333;
        }

        .login-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition-duration: 0.4s;
        }

        .login-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <?php
        require('db.php');
        session_start();
       
        if (isset($_POST['employee_id'])) {
            $employee_id = stripslashes($_REQUEST['employee_id']);
            $employee_id = mysqli_real_escape_string($con, $employee_id);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
          
            $query = "SELECT * FROM `employee` WHERE emp_id='$employee_id' AND emp_password='$password'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $_SESSION['emp_id'] = $employee_id;
                header("Location: admin_panel/index.php");
            } else {
                echo "<div class='form'>
                      <h3>Incorrect Username/password.</h3><br/>
                      
                      </div>";
            }
        } else {
        ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title"> ADMIN LOGIN</h1>
            <input type="text" class="login-input" name="employee_id" placeholder="Employee ID" autofocus="true"/>
            <input type="password" class="login-input" name="password" placeholder="Password"/>
            <input type="submit" value="Login" name="submit" class="login-button"/>
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html>

