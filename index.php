<?php
    require 'config.php';
    $stmt = $pdo->prepare("SELECT * FROM posts  ORDER BY  id DESC");
    $stmt->execute();
    $result = $stmt->fetchAll();
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
            <h1>Todo Home Page</h1>
            <div class="mb-3">
                <a href="add.php" type="button" class="btn btn-success">Create News</a>
            </div>
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if($result){
            $i=1;
            foreach($result as $output){
            ?>
            <tr>
                <th><?php echo $i ?></th>
                <td><?php echo $output['title'] ?></td>
                <td><?php echo $output['description'] ?></td>
                <td><?php echo date('d-m-Y',strtotime($output['created_at'])) ?></td>
                <td>
                <a href="edit.php?id=<?php echo $output['id'];?>" type="button" class="btn btn-warning">Edit</a>
                <a href="delete.php?id=<?php echo $output['id'];?>" type="button" class="btn btn-danger">Delete</a>
                </td>
                </tr>
            <?php
            $i++;
            }
            }   
            ?>
                
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>