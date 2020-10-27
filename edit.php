<?php
    require 'config.php';
    if($_POST){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $id = $_POST['id'];

        $stmt = $pdo->prepare("UPDATE posts SET title='$title', description='$description' WHERE id='$id'");
        $result = $stmt->execute();
        if($result){
            echo "<script>alert('Update record is successfully');
            window.location.href='index.php';
            </script>";
        }

    }else{
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id=".$_GET['id']);
        $stmt->execute();
        $result = $stmt->fetchAll();
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
            <h1>Edit Page</h1>
            <hr>
            <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $result[0]['id'];?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $result[0]['title'];?>" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" required><?php echo $result[0]['description'];?></textarea>
                </div>
                <button class="btn btn-primary">Update</button>
                <a href="index.php" type="button"  class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
</body>
</html>