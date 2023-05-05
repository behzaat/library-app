<?php
// include header.php file
include('header.php');

echo $createBookMessage;
?>


    <div class="card" style="width: 60rem; margin:auto">
        <form method="post" action="create_book.php" enctype="multipart/form-data">
            <div class="card-header">
                
            <div class="d-flex justify-content-between">
                <h5>Create Book</h5>
                <a class="btn btn-info btn-sm" href="index.php" role="button"> Back to Book List</a>
            </div>
                
            </div>
            <div class="card-body">

            <!-- <div class="d-flex justify-content-start align-items-center">
                <?php
                // if ($book->image) {
                //     echo '<img src="./uploads/<?php echo $book->image ?>" alt="Book Image" style="width: 100px; margin: 20px;">';
                // }
                ?>
            </div> -->
                <div class="row g-3">
                    <input type="text" class="form-control" name="book_id" hidden value="<?php echo $book_id; ?>">

                    <div class="col-md-6">
                        <label for="book_name" class="form-label">Book Name</label>
                        <input type="text" class="form-control" name="book_name" id="book_name" value="<?php echo $book->name; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="book_pages" class="form-label">Book Pages</label>
                        <input type="number" class="form-control" name="book_pages" id="book_pages" value="<?php echo $book->pages; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="book_count" class="form-label">Book Count</label>
                        <input type="number" class="form-control" name="book_count" id="book_count" value="<?php echo $book->count; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="author_id" class="form-label">Author</label>
                        <select id="author_id" name="author_id" class="form-select">
                            <option value="1" <?php if ($book->author_id == 1) {
                                                    echo "selected";
                                                } ?>>Mohammad</option>
                            <option value="2" <?php if ($book->author_id == 2) {
                                                    echo "selected";
                                                } ?>>Reza</option>
                            <option value="3" <?php if ($book->author_id == 3) {
                                                    echo "selected";
                                                } ?>>Ali</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="book_img" class="form-label">Select image to upload</label>
                        <input type="file" name="book_img" id="book_img">
                    </div>

                    <div class="col-12">
                        <button type="submit" name="create_book" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


<?php
// include footer.php file
include('footer.php');
?>