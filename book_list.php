<?php

echo $createBookMessage;

?>
<div class="card" style="width: 60rem; margin:auto">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h5>Books List</h5>
            <a class="btn btn-success btn-sm" href="create_book.php" role="button">Create New Book</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Book Image</th>
                <th>Book Name</th>
                <th>Book Pages</th>
                <th>Book Count</th>
                <th>Author Id</th>
                <th>Actions</th>
            </tr>
            <?php
            if (count($books) > 0) {
                $i = 1;
                foreach ($books as $book) { ?>

                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td style="text-align: center;">
                            <img src="./uploads/<?php echo $book["book_image"] ?>" alt="Book Image" style="width: 100px;" >
                        </td>
                        <td><?php echo $book["book_name"] ?></td>
                        <td><?php echo $book["book_pages"] ?></td>
                        <td><?php echo $book["book_count"] ?></td>
                        <td><?php echo $book["author_id"] ?></td>
                        <td>
                            <a class="btn btn-info" href="edit_book.php?book_id=<?php echo $book["id"] ?>" role="button">Edit</a>
                            <a class="btn btn-danger" href="index.php?book_id=<?php echo $book["id"] ?>&action=delete" role="button">Delete</a>
                        </td>
                    </tr>

                <?php }
            } else { ?>
                <tr>
                    <td colspan="6" class="my-6" style="text-align: center;">
                        <h5>No Data</h5>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>
</div>