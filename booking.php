<?php
require('db.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_page.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch user's bookings
$query = "SELECT * FROM booking b
          INNER JOIN customer c ON b.cust_id = c.cust_id
          INNER JOIN car ca ON b.car_id = ca.car_id
          WHERE c.username = '$username'
          ORDER BY b.book_date DESC";

$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <!-- Add your CSS styles here -->
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- Box icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/20af9b7f0f.js" crossorigin="anonymous"></script>
    <style>
        bodyy {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        h2 {
            text-align: center;
            padding: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: blue;
            color: white;
        }

        tr:hover {
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="bodyy">
<header>
        <a href="#" class="logo"><img src="img/jeep.png" alt=""></a>
        <h4>Car Rent</h4>

        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="home.php">Home</a></li>
            <li><a href="ride.php">Ride</a></li>
            <li><a href="services.php">Service</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="reviews.php">Review</a></li>
        </ul>
        <div class="header-btn">
            <!-- <a href="login_page.php" class="sign-up">Login</a>
            <a href="sign_up.php" class="sign-in">Sign In</a> -->
            <a href="emp_login.php" class="admin">Admin</a>
            <?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, $username! <a href='logout.php'>Logout</a>";
} else {
    echo "<a href='login_page.php' class='sign-up'>Login</a>
          <a href='sign_up.php' class='sign-in'>Sign In</a>
          <a href='emp_login.php' class='admin'>Admin</a>";
}
            ?>

        </div>
    </header>
<div class="container">
    <h2>Your Bookings</h2>
    
    <?php if (mysqli_num_rows($result) > 0) { ?>
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Car</th>
                <th>Booking Date</th>
                <th>Arrival Date</th>
                <th>Departure Date</th>
                <th>Booking Place</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['book_id']; ?></td>
                    <td><?php echo $row['car_name']; ?></td>
                    <td><?php echo $row['book_date']; ?></td>
                    <td><?php echo $row['arrival_date']; ?></td>
                    <td><?php echo $row['departure_date']; ?></td>
                    <td><?php echo $row['book_place']; ?></td>
                </tr>
            <?php } ?>

        </table>
    <?php } else { ?>
        <p>No bookings found.</p>
    <?php } ?>

</div>
    </div>

</body>
</html>