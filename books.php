<!DOCTYPE html> 
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title></title>
        </head>
    <body>

        <div class="container">
          <h1>Books</h1>
        </div>

        <div class="container">
        <table>
            <thead>
                <tr>
                <th>ID</th><th>Title</th><th>Author</th><th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_SESSION['email']))//Q11
                {
                $conn = new mysqli("localhost", "uwibooks", "db_u_pass", "uwibooks");
                $sql = "SELECT id, title, author, type
                        FROM books";
                $res = $conn->query($sql);


                while (($row = $res->fetch_assoc()) != null)
                {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['author'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "</tr>";
                }
                $conn->close();
                }
                else
                echo "Please <a href =users.php";
                ?>
            </tbody>
        </table>
    </div>
  </body>
</html>


