<?php require_once "./inc/functions.php"; ?>
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
    <div class="container mt-3">
        <div class="card mx-auto">
            <div class="card-header">
                <div class="row">
                    <h4 class="ml-2">Simple Test App</h4> <h5>View all Records</h5>
                    <a href="search.php">
                        <button class="btn btn-primary ml-3">Search Specific Record</button></a>
                </div>
            </div>
            <div class="card card-body">
                <table class="table table-hover table-striped">
                    <h4><small><i>Static Data from XML file</i></small></h4>
                    <form action="" method="post">
                        <thead>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Name</th>
                        </thead>
                        <tbody>
                            <?php
                            $records = $obj->readData();
                            foreach ($records as $record) : ?>
                                <tr>
                                    <td><?php echo $record->id;?><input type="hidden" name="id" value="<?php echo $record->id; ?>"></td>
                                    <td><?php echo $record->author; ?><input type="hidden" name="author" value="<?php echo $record->author; ?>"></td>
                                    <td><?php echo $record->name; ?><input type="hidden" name="name" value="<?php echo $record->name; ?>"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </form>
                </table>
                <form action="" method="post">
                    <?php $obj->saveAllToDb(); ?>
                    <button name="saveAll" class="btn btn-success btn-block">Push All Data to DB</button>
                </form>
            </div>
            <div class="card card-body">
                <table class="table table-hover table-striped">
                    <h4><small><i>Dynamic Data from DB</i></small></h4>
                    <form action="" method="post">
                        <thead>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Name</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                        <?php
                        $records = $obj->readFromDb();
                        foreach ($records as $record) : ?>
                            <tr>
                                <td><?php echo $record['id'];?></td>
                                <td><?php echo $record['book_author']; ?></td>
                                <td><?php echo $record['book_name'] ?></td>
                                <td><?php echo $record['date']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </form>
                </table>


            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>