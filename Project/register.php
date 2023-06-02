<?php

include("connection2.php");

if (isset($_POST["submit"]))
{
    $name=$_POST["name_surname"];
    $nickname=$_POST["nickname"];
    $email=$_POST["email"];
    $password=password_hash($_POST["password"],PASSWORD_DEFAULT);

    $insert="INSERT INTO records(name_surname, nickname, email, password) VALUES ('".$name."','".$nickname."','".$email."','".$password."')";
    $runInsert = mysqli_query($conn, $insert);

    if ($runInsert)
    {
        echo '<div class="alert alert-success" role="alert">
              Record successfully added.
              </div>';
    }
    else
    {
        echo '<div class="alert alert-danger" role="alert">
              An error occurred while adding the record.
              </div>';
    }
    mysqli_close($conn);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REGISTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        #register{
            font-size: 40px;
            color: #f7d6c3;
            font-weight: 500;
            text-align: center;
        }
    </style>


</head>
<body>

<div class="container p-5">
    <div class="card p-5">
        <form action="register.php" method="post">
            <h2 id="register">REGISTER</h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name Surname</label>
                <input type="text" class="form-control" id="exampleInputNameSurname1" name="name_surname">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nickname</label>
                <input type="text" class="form-control" id="exampleInputNickname1" name="nickname">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
        </form>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>