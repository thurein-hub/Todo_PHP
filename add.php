<?php
    require 'config.php';
    if(!empty($_POST)){
        $title = $_POST['title'];
        $description = $_POST['description'];

        $stmt=$pdo->prepare("INSERT INTO posts(title,description) VALUES(:title, :description)");
        $result=$stmt->execute(
            array(
                ':title' => $title ,
                'description' => $description
            )
            );
        if($result){
            echo "<script>alert('Added record is successfully');
            window.location.href='index.php';
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h1>Create News</h1>
            <hr>
            <form action="add.php" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <button class="btn btn-primary">Add</button>
                <a href="index.php" type="button"  class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
</body>
</html>