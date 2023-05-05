<?php

// require MySQL Connection
require('models/DBController.php');

// require Product Class
require('models/Book.php');



// DBController object
$db = new DBController();

// Product object
$book = new Book($db);
$books = $book->getList();


$createBookMessage = "";
$updateBookMessage = "";
$deleteBookMessage = "";

$target_dir = "uploads/";
$uploadOk = 1;






if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fileName = basename($_FILES["book_img"]["name"]);
    $target_file = $target_dir . basename($_FILES["book_img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $book->id = test_input($_POST["book_id"]);
    $book->name = test_input($_POST["book_name"]);
    $book->pages = test_input($_POST["book_pages"]);
    $book->count = test_input($_POST["book_count"]);
    $book->author_id = test_input($_POST["author_id"]);
    $book->image = $fileName;

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["book_img"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["book_img"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["book_img"]["tmp_name"], $target_file)) {
            if (isset($_POST['create_book'])) {
                if ($book->create() === TRUE) {
                    $createBookMessage = '<div class="alert alert-success" role="alert">New Record created successfully!</div>';
                } else {
                    $createBookMessage = '<div class="alert alert-danger" role="alert">"Error creating record: "' . $this->db->con->error . '</div>';
                }
            } elseif (isset($_POST['update_book'])) {
                if ($book->update() === TRUE) {
                    $book = $book->get();
                    $updateBookMessage = '<div class="alert alert-success" role="alert">Record updated successfully!</div>';
                } else {
                    $updateBookMessage = '<div class="alert alert-danger" role="alert">"Error updating record: "' . $this->db->con->error . '</div>';
                }
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["action"]) && $_GET["action"] = "delete") {
        $book->id = $_GET["book_id"];
        if ($book->delete() === TRUE) {
            $books = $book->getList();
            $deleteBookMessage = '<div class="alert alert-success" role="alert">Record deleted successfully!</div>';
        } else {
            $deleteBookMessage = '<div class="alert alert-danger" role="alert">"Error deleting record: "' . $this->db->con->error . '</div>';
        }
    } else if (isset($_GET["book_id"])) {
        $book->id = $_GET["book_id"];
        $book = $book->get();
    }
}






function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
