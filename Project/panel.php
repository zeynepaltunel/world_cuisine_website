<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#out{
    cursor: pointer;
    background-color: rgb(131, 106, 75);
    font-size: 15px;
    letter-spacing: 1px;
    padding: 5px 15px;
    color: wheat;
    border: 2px solid wheat;
    border-radius: 5px;
    margin-left: 10px;
    margin-top: 10px;
}

#username{
    color: rgb(131, 106, 75);
    font-size: 15px;
    letter-spacing: 1px;
}


#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(131, 106, 75);
  color: wheat;
}
#title{
    font-size: 30px;
    color: #f7d6c3;
    text-align: left;
}
</style>
</head>
<body>

<h1 id="title">ADMIN PANEL</h1>

<table id="customers">
  <tr>
    <th>Name</th>
    <th>Surname</th>
    <th>E-mail</th>
    <th>Topic</th>
    <th>Message</th>
    <th>Message Date</th>
  </tr>

    <?php

    session_start();

    if ($_SESSION["USER"]=="")
    {
        echo "<script>window.location.href='logout.php'</script>";
    }
    else
    {
        echo "<b id='username'>Username:</b> ".$_SESSION['USER']."<br><br>";
        echo "<a id='out' href='logout.php' >logout</a>";
        echo "<a id='out' href='index.php' >home</a><br><br>";

        include("connection.php");

        $select="Select * From contact";
        $result=$connected->query($select);

        if ($result->num_rows>0)
        {
            while($pull=$result->fetch_assoc())
            {
                echo " 
                  <tr>
                      <td>".$pull['name']."</td>
                      <td>".$pull['surname']."</td>
                      <td>".$pull['email']."</td>
                      <td>".$pull['topic']."</td>
                      <td>".$pull['message']."</td>
                      <td>".$pull['message_date']."</td>
                  </tr>
            
            ";
            }
        }
        else{
            echo "Data not found in database";
        }
    }
?>
  
</table>

</body>
</html>

