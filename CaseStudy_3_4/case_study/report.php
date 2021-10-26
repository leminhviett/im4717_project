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
                echo "<p> <b>Product_id ". $row['product_id']."</b> </p>";
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

  
    $db->close();

    
?>   

</body>
</html>