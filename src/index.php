<?php

$db = new mysqli("localhost", "root", "", "test");
$data = $db->query("SELECT * from cols");

?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
    </head>
    <body>
    <table class="container">
        <thead>
            <tr>
                <th><h1>ID</h1></th>
                <th><h1>Name</h1></th>
                <th><h1>Action</h1></th>
            </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0;$i<$data->num_rows;$i++) {
            $data->data_seek($i);
            $row = $data->fetch_assoc();
            $id = $row['id'];
            $name = $row['name'];
            echo "<tr><td>$id</td><td class='name' id='$id'>$name</td><td><a href='/delete.php?id=$id'>Delete</a></td></tr>"; 
        }
        ?>
        </tbody>
    </table>
    <div class="sixteen columns">
    <form action="/create.php" method="GET" class="four columns offset-by-six">
        <input type="text" placeholder="Name" name="name" autocomplete='off'>
        <input type="submit" value="Add">
    </form>
    </div>
    
    <script>
        var x = document.getElementsByClassName("name");
        for (let index = 0; index < x.length; index++) {
            x[index].onclick = function() {
                var name = prompt('New name')
                if (name.length > 1) {
                    window.location.replace("/update.php?name=" + name + "&id=" + x[index].id);
                } else {
                    //
                }
            }
        }
    </script>
    </body>
</html>