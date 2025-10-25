<?php
include 'db_connect.php';
include 'header.php';

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE book_id = $book_id";
    $result = mysqli_query($conn, $sql);
    $book = mysqli_fetch_assoc($result);
}
?>

<div class="container mt-5 pt-5">
    <?php if ($book): ?>
        <div class="row">
            <!-- Book Image -->
            <div class="col-md-4">
                <img src="<?php echo $book['image_url']; ?>" class="img-fluid rounded shadow" alt="Book Cover">
            </div>

            <!-- Book Info -->
            <div class="col-md-8">
                <h2 class="mb-3"><?php echo $book['title']; ?></h2>
                <p><strong>Author:</strong> <?php echo $book['author']; ?></p>
                <p><strong>Price:</strong> Rs. <?php echo $book['price']; ?></p>
                <hr>
                <p style="font-size: 1.1rem; text-align: justify;">
                    <?php echo nl2br($book['description']); ?>
                </p>

                <form action="add_to_cart.php" method="post" class="mt-3">
                    <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <p class="text-danger">Book not found.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
