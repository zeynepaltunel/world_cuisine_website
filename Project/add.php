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
                    <a href="add.php" class="btn btn-outline-primary">New Record</a>
                    <a href="messages.php" class="btn btn-outline-primary">Messages</a>
                    <a href="index.php" class="btn btn-outline-primary">Homepage</a>
                    <a href="logout.php" class="btn btn-outline-primary">Logout</a>
                </div>
            </div>

        </header>
        <main>
            <div class="container">
                <form action="" method="post" class="row mt-4 g-3">
                    <div class="col-6">
                        <label for="fullName" class="form-label">Name Surname</label>
                        <input type="text" class="form-control" id="exampleInputNameSurname1" name="name_surname">
                    </div>
                    <div class="col-6">
                        <label for="nickname" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="exampleInputNickname1" name="nickname">
                    </div>
                    <div class="col-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                    </div>
                    <div class="col-6">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">SAVE</button>
                </form>
            </div>

        </main>
    </body>
</html>

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
