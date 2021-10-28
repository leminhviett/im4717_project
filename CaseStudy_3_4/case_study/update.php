<!DOCTYPE html>
<html>

<body>

<?php
    $mappings = array("price_1_single" => array(1, "SING"), "price_2_single" => array(2, "SING"), "price_2_double" => array(2, "DOUB"), "price_3_single" => array(3, "SING"), "price_3_double" => array(3, "DOUB"));
    
    @ $db = new mysqli('localhost', 'root', '', 'f32ee');
    if (mysqli_connect_errno()) {
        echo mysqli_connect_errno();
        // echo "Error: Could not connect to database.  Please try again later.";
        exit;
     }

    foreach ($_POST as $prod_info => $price) {
        if (!get_magic_quotes_gpc()) {
            $prod_info = addslashes($prod_info);
            $price = doubleval($price);
        }

        $prod_id = $mappings[$prod_info][0];
        $type = $mappings[$prod_info][1];
        
        $query = "update price set price = ".$price." where product_id = ".$prod_id." and type = '".$type."'";
        $result = $db->query($query);

        if ($result) {
            $query = "select name from product where id = ".$prod_id;
            $result = $db->query($query);
            $row = $result->fetch_assoc();

            echo  "<p><b>".$row['name']. "</b> type: <b>". $type ."</b> updated to <b>".$price."</b></p>" ;
        } else {
            echo "An error has occurred.  The item was not updated.";
        }

    }
  
    $db->close();

?>   

</body>
<link rel="stylesheet" type="text/css" href="css/style.css" />

</html>