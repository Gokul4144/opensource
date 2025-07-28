<?php include "db.php";

$name = $email = $phone = $seat = $date = "";
$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $seat = trim($_POST['seat']);
    $date = $_POST['date'];

    if ($name && $email && $phone && $seat && $date) {
        $stmt = mysqli_prepare($conn, "INSERT INTO bookings (passenger_name, email, phone, seat_number, journey_date) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $seat, $date);
        mysqli_stmt_execute($stmt);
        header("Location: index.php");
        exit;
    } else {
        $err = "All fields are required!";
    }
}
?>

<h2>Add Booking</h2>
<form method="post">
    <input type="text" name="name" placeholder="Passenger Name"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="text" name="phone" placeholder="Phone"><br>
    <input type="text" name="seat" placeholder="Seat Number"><br>
    <input type="date" name="date"><br>
    <input type="submit" value="Add Booking">
</form>
<p style="color:red;"><?php echo $err; ?></p>
<a href="index.php">Back to Bookings</a>
