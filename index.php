<?php
include 'authService.php';
include 'controller.php';

$authService = new AuthService();
$authController = new AuthController($authService);

// Check if the action is provided in the request
if (isset($_GET['action']) && isset($_POST['data'])) {
    $action = $_GET['action'];
    $data = json_decode($_POST['data'], true);

    // Handle the request
    $response = $authController->handleRequest($action, $data);

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Rizwan Fazal">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS file -->
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
  <div class="login-container">
    <h2>Login</h2>
    <form id="loginForm">
      <div class="form-group">
        <label for="inputEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" required>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
      </div>
      <div class="form-group form-check remember-me">
        <input type="checkbox" class="form-check-input" id="inputRememberMe">
        <label class="form-check-label" for="inputRememberMe">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary login-button">Login</button>
    </form>
  </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- JavaScript file -->
<script src="external.js"></script>

</body>
</html>
