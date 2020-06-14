<?php require_once "./inc/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Project - TM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container col-6 mt-3">
    <div class="card mx-auto">
        <div class="card-header">
            <div class="row">
                <h4 class="ml-2">Simple Test App - Search</h4>
                <a href="index.php"><button class="btn btn-primary ml-3">View Records</button></a>
            </div>
        </div>
        <div class="card card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="search">Search by Author</label>
                    <input type="text" class="form-control" name="author" placeholder="Enter the author of the book" required>
                    <button class="btn btn-primary btn-block mt-2" name="search">Search</button>
                </div>
                <?php
                if(isset($_POST['search'])) {
                    echo "<div class='card card-header'>Results from the search</div>";
                    $result = $obj->searchByAuthor();
                    if(is_object($result)) {
                        foreach ($result as $record) {
                            echo "<div class='card card-body alert alert-success'>There is a match</div>";
                            echo "<div class='card card-body'>Book author: <i><b>{$record['book_author']}</b></i></div>";
                            echo "<div class='card card-body'>Book name: <i><b>{$record['book_name']}</b></i></div>";
                        }
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>