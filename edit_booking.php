<?php include "db.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM bookings WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $seat = $_POST['seat'];
    $date = $_POST['date'];

    mysqli_query($conn, "UPDATE bookings SET passenger_name='$name', email='$email', phone='$phone', seat_number='$seat', journey_date='$date' WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>

<h2>Edit Booking</h2>
<form method="post">
    <input type="text" name="name" value="<?= $row['passenger_name'] ?>"><br>
    <input type="email" name="email" value="<?= $row['email'] ?>"><br>
    <input type="text" name="phone" value="<?= $row['phone'] ?>"><br>
    <input type="text" name="seat" value="<?= $row['seat_number'] ?>"><br>
    <input type="date" name="date" value="<?= $row['journey_date'] ?>"><br>
    <input type="submit" value="Update Booking">
</form>
<a href="index.php">Back</a>
