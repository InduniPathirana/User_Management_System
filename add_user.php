<?php
require_once "db.php"; // Database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $telephone = $_POST["telephone"];

    $sql = "INSERT INTO users (name, dob, address, telephone) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $dob, $address, $telephone);

    if ($stmt->execute()) {
        $success_message = "User added successfully!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navigation Bar -->
<?php include "navbar.php"; ?>

<div class="container mt-5">
    <h2>Add User</h2>
    <?php if (isset($success_message)) echo "<div class='alert alert-success'>$success_message</div>"; ?>
    <?php if (isset($error_message)) echo "<div class='alert alert-danger'>$error_message</div>"; ?>

    <form method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="telephone">Telephone</label>
            <input type="text" name="telephone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add User</button>
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>
