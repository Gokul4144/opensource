<?php include "db.php"; ?>
<h2>Bus Bookings</h2>
<a href="add_booking.php">+ Add New Booking</a><br><br>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Phone</th>
        <th>Seat</th><th>Date</th><th>Actions</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM bookings");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['id']}</td><td>{$row['passenger_name']}</td>
            <td>{$row['email']}</td><td>{$row['phone']}</td>
            <td>{$row['seat_number']}</td><td>{$row['journey_date']}</td>
            <td>
                <a href='edit_booking.php?id={$row['id']}'>Edit</a> |
                <a href='delete_booking.php?id={$row['id']}' onclick=\"return confirm('Delete this booking?')\">Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>
