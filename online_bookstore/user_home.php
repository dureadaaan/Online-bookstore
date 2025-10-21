<?php
session_start();
include 'db_connect.php';
include 'header.php';
if (isset($_SESSION['success'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" >
        ' .($_SESSION['success']) . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
    </div>';
    unset($_SESSION['success']);
}
?>

<div class="container mt-4">
    <?php
    // Get all categories
    $cat_query = "SELECT * FROM categories";
    $cat_result = mysqli_query($conn, $cat_query);

    while ($cat = mysqli_fetch_assoc($cat_result)) {
        $category_id = $cat['category_id'];
        $category_name = $cat['category_name'];

        // Get all books in this category
        $book_query = "SELECT * FROM books WHERE category_id = $category_id";
        $book_result = mysqli_query($conn, $book_query);

        if (mysqli_num_rows($book_result) == 0) continue;
    ?>
    
    <!-- Category Title -->
   <table class=" table table-outlined">
   <tr>
    <td><h3 class="mb-3 mt-5 "><?php echo htmlspecialchars($category_name); ?></h3></td>
    </tr>
   </table>
    <!-- Horizontally scrollable row of books -->
<div class="d-flex overflow-auto mb-4" style="gap: 1rem; max-width: 100%; overflow-x: auto;">
    <?php while ($book = mysqli_fetch_assoc($book_result)) { ?>
        <div class="card" style="min-width: 220px; max-width: 220px; flex: 0 0 auto;">
    <!-- Make image clickable -->
    <a href="book_details.php?id=<?php echo $book['book_id']; ?>">
        <img src="<?php echo htmlspecialchars($book['image_url']); ?>"
             class="card-img-top"
             alt="Book Image"
             style="height: 200px; object-fit: cover;">
    </a>

    <div class="card-body text-center">
        <!-- Make title clickable -->
        <h6 class="card-title mb-1">
            <a href="book_details.php?id=<?php echo $book['book_id']; ?>" 
               class="text-decoration-none text-dark">
               <?php echo htmlspecialchars($book['title']); ?>
            </a>
        </h6>

        <p class="card-text text-muted" style="font-size: 0.85rem;">
            <?php echo htmlspecialchars($book['author']); ?>
        </p>

        <p class="fw-bold text-success">
            Rs <?php echo number_format($book['price']); ?>
        </p>
    </div>

    <div class="card-footer text-center">
        <a href="add_to_cart.php?id=<?php echo $book['book_id']; ?>"
           class="btn btn-success btn-sm">Cart</a>
    </div>
</div>
        <?php } ?>
    </div>

    <?php } // end while for category ?>
</div>

<?php include 'footer.php'; ?>
