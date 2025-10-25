<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookShelf</title>
    <link rel="stylesheet" href="style.css">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<header class="main-header">
    <!-- Row 2: Navigation -->
<nav class="navbar navbar-expand-sm bg-light fixed-top">
  <div class="container-fluid text text-dark d-flex justify-content-between align-items-center me-3 ms-3">

    <!-- Left Nav Links -->
    <ul class="navbar-nav">
     <li class="nav-item">
     <img src="uploads/logo.png" width = 70>
     </li>
      <li class="nav-item p-2">

        <a class="nav-link" href="user_home.php">Home</a>
      </li>
      <li class="nav-item p-2">
        <a class="nav-link" href="books.php">Books</a>
      </li>
    </ul>

  <form class="d-flex mx-auto stylish-search" role="search" action="search.php" method="GET">
  <div class="input-group">
    <input type="text" class="form-control stylish-input" placeholder="🔍 Search for books..." aria-label="Search" name="query">
    <button class="btn stylish-btn" type="submit">Go</button>
  </div>
</form>

    <!-- Right Icons (Cart & Account) -->
    <ul class="nav-links right-links d-flex">
     <li><a href="#"><i class="fas fa-shopping-cart"></i> <span class="emoji-icon">🛒</span></a></li>
<li><a href="login.php"><i class="fas fa-user"></i> <span class="emoji-icon">👤</span></a></li>
<li><a href="logout.php" class="btn btn-danger">Logout</a></li>

 
    </ul>

  </div>
</nav>

    



    <!-- Row 3: Banner -->
  <!-- Banner Row -->
<div class="banner">
    <img src="uploads/ban.png" alt="Banner Image">
</div>


</header>
