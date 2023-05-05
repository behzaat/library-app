<?php
// include header.php file
include('header.php');

echo $updateBookMessage;
?>

<div class="card" style="width: 50rem; margin:auto">
    <form method="post" action="edit_book.php" enctype="multipart/form-data">
        <div class="card-header">

            <div class="d-flex justify-content-between">
                <h5>Edit Book</h5>
                <a class="btn btn-info btn-sm" href="index.php" role="button"> Back to Book List</a>
            </div>

        </div>
        <div class="card-body">
            <div class="d-flex justify-content-start align-items-center">
                <img src="./uploads/<?php echo $book["book_image"] ?>" alt="Book Image" style="width: 100px; margin: 20px;">
            </div>

            <div class="row g-3">
                <input type="text" class="form-control" name="book_id" hidden value="<?php echo $book["id"]; ?>">

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Book Name</label>
                    <input type="text" class="form-control" name="book_name" id="inputEmail4" value="<?php echo $book["book_name"]; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Book Pages</label>
                    <input type="number" class="form-control" name="book_pages" id="inputPassword4" value="<?php echo $book["book_pages"]; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Book Count</label>
                    <input type="number" class="form-control" name="book_count" id="inputPassword4" value="<?php echo $book["book_count"]; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Author</label>
                    <select id="inputState" name="author_id" class="form-select">
                        <option value="1" <?php if ($book["author_id"] == 1) {
                                                echo "selected";
                                            } ?>>Mohammad</option>
                        <option value="2" <?php if ($book["author_id"] == 2) {
                                                echo "selected";
                                            } ?>>Reza</option>
                        <option value="3" <?php if ($book["author_id"] == 3) {
                                                echo "selected";
                                            } ?>>Ali</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="book_img" class="form-label">Select image to upload</label>
                    <input type="file" name="book_img" id="book_img">
                </div>

                <div class="col-12">
                    <button type="submit" name="update_book" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>


<?php
// include footer.php file
include('footer.php');
?>