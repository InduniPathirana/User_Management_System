<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $success_message = "User removed successfully!";
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
    <title>Remove User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navigation Bar -->
<?php include "navbar.php"; ?>

<div class="container mt-5">
    <h2>Remove User</h2>
    <?php if (isset($success_message)) echo "<div class='alert alert-success'>$success_message</div>"; ?>
    <?php if (isset($error_message)) echo "<div class='alert alert-danger'>$error_message</div>"; ?>

    <form method="POST">
        <div class="form-group">
            <label for="id">User ID</label>
            <input type="number" name="id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger">Remove User</button>
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>
