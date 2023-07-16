<?php
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Get the user's email address and password
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the user's credentials are correct
$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    // The user is logged in
    $_SESSION['user_id'] = mysqli_fetch_assoc($result)['id'];
    header("Location: mail.php");
    exit;
} else {
    // The user's credentials are incorrect
    echo "Invalid email address or password.";
}
?>
