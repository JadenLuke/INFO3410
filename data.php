<?php

      $res = addCourse($_POST['code'],
                        $_POST['name'],
                        $_POST['credit'],
                        $_POST['level']);

      // if isset($_POST)
      function addCourse($Code, $Name, $Credit, $Level)
      {
        $conn = new mysqli("localhost", "uwicourse", "password", "uwicourse");
        $insql2 = "INSERT INTO courses(`Code`, `Name`, `Credit`, `Level`) values ('$Code', '$Name', $Credit, '$Level')";
        $conn->query($insql2); 
        $id = $conn->insert_id; 
  
        $conn->close();
      }
?>