<?php
    require 'config.php';
    
    if($_POST)
    {
    
    // $title = $_POST['title'];
    // $description = $_POST['description'];

    $query = "INSERT INTO todo(title,description) VALUES(:title,:description)";
    $pdostatement = $pdo->prepare($query);
    $result = $pdostatement->execute(
        array(
            ':title' => $_POST['title'],
            ':description' => $_POST['description']
        )
    );

    if($result)
    {
        echo "<script>alert('Success');window.location.href = 'index.php';</script>";
    }

    }
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Content</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Add New Content Form</h3>
            </div>
            <div class="card-body">
            <form method="POST" action="add.php">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="" rows="3" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                <button type="reset" class="btn btn-secondary mt-3">Cancel</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>