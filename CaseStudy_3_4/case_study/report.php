<!DOCTYPE html>
<html>
<body>

<?php
    
    @ $db = new mysqli('localhost', 'root', '', 'f32ee');
    if (mysqli_connect_errno()) {
        // echo mysqli_connect_errno();
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
     }

     if (isset($_POST["query_1"])) {
        $query = "select sum(revenue) as total_rev, product_id, date from sales WHERE DATE(date) = CURDATE() group by product_id order by sum(revenue)";
        $result = $db->query($query);
        
        if ($result) {
            $length = $result->num_rows;
            echo "<h1>Sales by product </h1>";

            for ($i=0; $i <$length; $i++) {
                $row = $result->fetch_assoc();
                // echo $row['total_rev'];

                // echo $row['product_id'];

                $query2 = "select name from product where id = ".$row['product_id'];
                $result2 = $db->query($query2);

                echo "<p> <b>Name: ". $result2->fetch_assoc()["name"]."</b> </p>";
                echo "<p> Total revenue: " .$row['total_rev']. " dollar </p>"; 
             }
        } else {
            echo "An error has occurred.  The item was not updated.";
        }
     }

     if (isset($_POST["query_2"])) {
        $query = "select sum(quantity) as quantity, type as category from sales WHERE DATE(date) = CURDATE() group by type order by sum(quantity)";
        $result = $db->query($query);
        
        if ($result) {
            $length = $result->num_rows;
            echo "<h1>Sales by quantity </h1>";

            for ($i=0; $i <$length; $i++) {
                $row = $result->fetch_assoc();
                echo "<p> <b>Category ". $row['category']."</b> </p>";
                echo "<p> Total quantity: " .$row['quantity']. "</p>"; 
             }
        } else {
            echo "An error has occurred.  The item was not updated.";
        }
     }

     $query3 = "SELECT max(total_rev) as total_rev, product_id, type from (SELECT sum(revenue) as total_rev, product_id, type FROM `sales` WHERE DATE(date) = CURDATE() GROUP BY product_id, type) as table1";
     $result3 = $db->query($query3);
     $row3 = $result3->fetch_assoc();

     $query4 = "select name from product where id = ".$row3["product_id"];
     $result4 = $db->query($query4);
     $row4 = $result4->fetch_assoc();

     echo "<br><p><b>Highest sale</b>: ".$row3["total_rev"]." dollars, by product name: <b>".$row4["name"]."</b>, type: <b>".$row3["type"]."</b></p>";
    // echo $row3["total_rev"];

    $query3 = "SELECT max(total_rev) as total_rev, type from (SELECT sum(revenue) as total_rev, type FROM `sales` WHERE DATE(date) = CURDATE() GROUP BY type) as table1";
    $result3 = $db->query($query3);
    $row3 = $result3->fetch_assoc();

    echo "<p><b>Highest sale</b>: ".$row3["total_rev"]." dollars, by type: <b>".$row3["type"]."</b></p>";

  
    $db->close();

    
?>   
<link rel="stylesheet" type="text/css" href="css/style.css" />

</body>
</html>