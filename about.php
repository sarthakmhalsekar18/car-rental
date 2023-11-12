<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Website</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="about.css">
    <!-- Box icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/20af9b7f0f.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
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
            <li><a href="booking.php">My booking</a></li>
        </ul>
        <div class="header-btn">
            <?php
            session_start();
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

    <section class="about" id="about">
        <div class="heading">
            <h1>ABOUT US</h1>
            <h3>Best Customer Experience</h3> 
        </div>
    </section>

    <div class="about-container">
        <div class="about-img">
            <img src="img/about.png" alt="">
        </div>
        <div class="about-text">
            <span>About Us</span>
            <p>Welcome to Car Rent, your go-to destination for hassle-free and reliable car rentals. At Car Rent, we are committed to providing the best customer experience, ensuring that your journey is comfortable, convenient, and memorable.</p>
            <p>Our mission is to offer a diverse fleet of well-maintained vehicles to cater to your travel needs. Whether you're planning a family vacation, a business trip, or a weekend getaway, Car Rent has the perfect ride for you.</p> 
            <p>Why choose Car Rent?</p>
            <ul>
                <li>Extensive Fleet: Choose from a wide range of vehicles, including sedans, SUVs, and luxury cars.</li>
                <li>Customer Satisfaction: We prioritize your satisfaction and strive to exceed your expectations.</li>
                <li>Easy Booking: Our user-friendly platform allows you to book your ride with just a few clicks.</li>
                <li>Reliable Service: Count on us for reliable and punctual service, ensuring you reach your destination on time.</li>
            </ul>
            <a href="home.php" class="btn">Learn More</a>
        </div>
    </div>

    <div class="copyright">
        <p>&#169; Car Rent. All Rights Reserved</p>
        <div class="social">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </div>

    <script type="text/javascript" src="main.js"></script>
</body>
</html>
