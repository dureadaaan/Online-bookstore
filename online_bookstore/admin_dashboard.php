<?php
session_start();
include 'db_connect.php';

// Access control: allow only if logged in as admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5 pt-5">
    <h2 class="mb-4">📚 Admin Dashboard</h2>

    <div class="mb-3">
        <a href="add_book.php" class="btn btn-primary">➕ Add New Book</a>
        <a href="manage_users.php" class="btn btn-secondary ms-2">👥 Manage Users</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price (Rs.)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM books";
            $result = mysqli_query($conn, $sql);
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$count}</td>";
                echo "<td><img src='{$row['image_url']}' width='60'></td>";
                echo "<td>{$row['title']}</td>";
                echo "<td>{$row['author']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td>
                        <a href='edit_book.php?id={$row['book_id']}' class='btn btn-sm btn-warning'>✏️ Edit</a>
                        <a href='delete_book.php?id={$row['book_id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure?')\">🗑️ Delete</a>
                      </td>";
                echo "</tr>";
                $count++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
