<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </head>
    <body>

        <div class="container">
          <h1>Books</h1>
        </div>

        <div class="container">
        <table class="table table-responsive">
            <thead>
                <tr>
                <th>Code</th><th>Name</th><th>Credit</th><th>Level</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli("localhost", "uwicourse", "password", "uwicourse");
                $sql = "SELECT * FROM courses";
                $res = $conn->query($sql);
                //var_dump($res->fetch_assoc());

                while (($row = $res->fetch_assoc()) != null)
                {
                    echo "<tr>";
                    echo "<td>" . $row['Code'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Credit'] . "</td>";
                    echo "<td>" . $row['Level'] . "</td>";
                    echo "</tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
  </body>
</html>


