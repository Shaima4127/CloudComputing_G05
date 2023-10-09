<?php
$hostname = "db";
$username = "root";
$password = "password";
$dbname = "contacts";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM contact_info");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Page</title>
</head>
<body>
    <h1>Contact Information</h1>
    <form action="submit.php" method="post">
        Name: <input type="text" name="name"><br>
        Phone: <input type="text" name="phone"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Contact List</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>