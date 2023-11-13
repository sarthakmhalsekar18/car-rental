<?php
// Include your database connection file
include_once "./config/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["toggle_status"])) {
    $car_id = $_POST["car_id"];

    // Fetch the current status
    $sql = "SELECT status FROM car WHERE car_id = $car_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $current_status = $row["status"];

        // Toggle the status
        $new_status = ($current_status == "available") ? "not available" : "available";

        // Start a transaction for consistency
        $conn->begin_transaction();

        try {
            // Update the car table
            $update_car_sql = "UPDATE car SET status = '$new_status' WHERE car_id = $car_id";
            $conn->query($update_car_sql);

            // Update the car_availability table
            $update_availability_sql = "UPDATE car_availability SET status = '$new_status' WHERE car_id = $car_id";
            $conn->query($update_availability_sql);

            // Commit the transaction
            $conn->commit();
        } catch (Exception $e) {
            // Rollback the transaction in case of an error
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
}

// Redirect back to the specified page with the anchor
$redirect_url = 'http://localhost/car-rental-master/admin_panel/index.php#cars';
header("Location: $redirect_url");
exit();
?>
