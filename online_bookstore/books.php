<?php
// books.php
include 'db_connect.php';
include 'header.php';

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
?>

<div class="container mt-5 pt-5">
    <h2 class="mb-4">All Books</h2>
    <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100 d-flex flex-row">
                    <!-- Clickable Image -->
                    <a href="book_details.php?id=<?php echo $row['book_id']; ?>">
                        <img src="<?php echo $row['image_url']; ?>" class="img-fluid" style="width: 150px; height: auto; border-radius: 10px 0 0 10px;" alt="Book Image">
                    </a>

                    <div class="card-body">
                        <!-- Clickable Title -->
                        <a href="book_details.php?id=<?php echo $row['book_id']; ?>" class="text-decoration-none text-dark">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        </a>

                        <p class="card-text"><strong>Author:</strong> <?php echo $row['author']; ?></p>
                        <p class="card-text"><strong>Price:</strong> Rs. <?php echo $row['price']; ?></p>

                        <!-- Add to Cart Button -->
                        <form action="add_to_cart.php" method="post">
                            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                            <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'footer.php'; ?>
