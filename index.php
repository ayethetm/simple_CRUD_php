<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Todo Sample Project</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">##Todo Sample Project##</h3>
            </div>
            <div class="card-body">
            <div>
            <a type="button" href="add.php" class="btn btn-primary">Create New</a>
            </div><br>
            <?php
                require 'config.php';

                $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
                $pdostatement->execute();
                $result = $pdostatement->fetchAll();

            ?>
            <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    if($result)
                    {
                        foreach($result as $value){
                            ?>
                        <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['description']; ?></td>
                <td><?php echo date('Y-m-d',strtotime($value['created_at'])); ?></td>
                <td>
                    <a type="button" href="edit.php?id=<?php echo $value['id']; ?>" class="btn btn-warning">Edit</a>
                    <a type="button" href="delete.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
                </tr>   
                <?php       
                    $i++;  }
                    }
                ?>
                
            </tbody>
            </table>
            </div>
        </div>   
    </div>
</body>
</html>