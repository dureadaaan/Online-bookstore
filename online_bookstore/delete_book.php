<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    $sql = "DELETE FROM books WHERE book_id = $book_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error deleting book: " . mysqli_error($conn);
    }
} else {
    header("Location: admin_dashboard.php");
    exit;
}
