<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];
    $description = $_POST['description'];

    $sql = "INSERT INTO books (title, author, price, image_url, description) 
            VALUES ('$title', '$author', '$price', '$image_url', '$description')";

    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error adding book: " . mysqli_error($conn);
    }
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5 pt-5">
    <h2>Add New Book</h2>
    <form method="post">
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Author:</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Price:</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Image URL:</label>
            <input type="text" name="image_url" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Book</button>
        <a href="admin_dashboard.php" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>

<?php include 'footer.php'; ?>
