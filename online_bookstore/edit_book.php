<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$book_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];
    $description = $_POST['description'];

    $sql = "UPDATE books SET 
                title='$title', 
                author='$author', 
                price='$price', 
                image_url='$image_url', 
                description='$description' 
            WHERE book_id=$book_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error updating book: " . mysqli_error($conn);
    }
} else {
    $sql = "SELECT * FROM books WHERE book_id=$book_id";
    $result = mysqli_query($conn, $sql);
    $book = mysqli_fetch_assoc($result);
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5 pt-5">
    <h2>Edit Book</h2>
    <form method="post">
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="<?= $book['title'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Author:</label>
            <input type="text" name="author" class="form-control" value="<?= $book['author'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Price:</label>
            <input type="number" name="price" class="form-control" value="<?= $book['price'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Image URL:</label>
            <input type="text" name="image_url" class="form-control" value="<?= $book['image_url'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" required><?= $book['description'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
        <a href="admin_dashboard.php" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>

<?php include 'footer.php'; ?>
