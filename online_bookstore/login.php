
<?php
session_start();
?>

<?php
if (isset($_SESSION['error'])) {
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        ' . htmlspecialchars($_SESSION['error']) . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        ' . htmlspecialchars($_SESSION['success']) . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['success']);
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
 <title>login page</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light" style="min-height: 100vh;">
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
<div class="card shadow p-0" style="width: 100%; max-width: 400px;">

<div class="text-center mt-3">
    <img src="uploads/logo.png" alt="Logo" class="rounded-circle" style="max-width: 150px;">
</div>      
<h3 class="text-center mt-2">Login In</h3>




<form  action="logged.php" method="POST" >

<div class="card-body">
          <input type="hidden" name="action" value="login">

          <div class="mb-3">
      <select name="login_type" class="form-select text-center" required>
        <option value="user" selected>👤 User</option>
        <option value="admin">🔐 Admin</option>
      </select>
    </div>        

          <div class="mb-3">
            <input type="text" name="email" placeholder="Enter your email" 
              class="form-control text-center" style="background-color: #f8f9fa;">
          </div>

          <div class="mb-4">
            <input type="password" name="password" placeholder="Enter your password" 
              class="form-control text-center" style="background-color: #f8f9fa;">
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success"><strong>Login</strong></button>
            <div class="text-center">
          <div class="container text-center">
           <a href="signup.php">Don't have Account click here👇</a>
           </div>
          </div>

        </div>
</form>
</div>
</div>

</body>
</html>