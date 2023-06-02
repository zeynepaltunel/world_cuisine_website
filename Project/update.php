<?php

include("connection2.php");

if (isset($_POST['update'])){
    $sql = "UPDATE records 
            SET `name_surname` = ?, 
                `nickname` = ?, 
                `email` = ?, 
                `password` = ? 
            WHERE id = '".$_GET["id"]."'";
    $array=[
            $_POST['name_surname'],
            $_POST['nickname'],
            $_POST['email'],
            $_POST['password']
    ];

    $result=$conn->prepare($sql);
    $result->execute($array);

    header('Location:panel.php');
}

$sql="Select * From records WHERE id = '".$_GET["id"]."'";
$result=$conn->query($sql);

$pull = $result->fetch_assoc();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-1 text-center"  style="color: #f7d6c3">Admin Panel</h1>
            </div>
        </div>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <a href="panel.php" class="btn btn-outline-primary">All Records</a>
            <a href="panel.php" class="btn btn-outline-primary">New Record</a>
            <a href="index.php" class="btn btn-outline-primary">Homepage</a>
            <a href="logout.php" class="btn btn-outline-primary">Logout</a>
        </div>
    </div>

</header>
<main>
    <div class="container">
        <form action="" method="post" class="row mt-4 g-3">
        <input type="hidden" name="id" value="<?=$pull['id']?>" >
            <div class="col-6">
                <label for="fullName" class="form-label">Name Surname</label>
                <input type="text" class="form-control" name="name_surname" value="<?=$pull['name_surname']?>">
            </div>
            <div class="col-6">
                <label for="nickname" class="form-label">Nickname</label>
                <input type="text" class="form-control" name="nickname" value="<?=$pull['nickname']?>">
            </div>
            <div class="col-6">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" value="<?=$pull['email']?>">
            </div>
            <div class="col-6">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" value="<?=$pull['password']?>">
            </div>

            <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
        </form>
    </div>
</main>
</body>
</html>
