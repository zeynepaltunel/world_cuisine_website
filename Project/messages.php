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
        <div class="row mt-3">
            <div class="col">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>E-mail</th>
                        <th>Topic</th>
                        <th>Message</th>
                        <th>Message Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include("connection.php");

                    $select2="Select * From messages";
                    $result2=$conn->query($select2);

                    while($pull = $result2->fetch_assoc()) { ?>
                        <tr>
                            <td><?=$pull['id']?></td>
                            <td><?=$pull['f_name']?></td>
                            <td><?=$pull['l_name']?></td>
                            <td><?=$pull['email']?></td>
                            <td><?=$pull['topic']?></td>
                            <td><?=$pull['message']?></td>
                            <td><?=$pull['message_date']?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
</body>
</html>
