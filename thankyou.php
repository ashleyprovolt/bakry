<?php
    /* 
 * Date:     Auther:
 * 9/13/19   Ashley Provolt
 * Description: adding a function to the add order.
 */
    $orderName = filter_input(INPUT_POST, 'ordername');
    $orderPhone = filter_input(INPUT_POST, 'orderphone');
    $orderEmail = filter_input(INPUT_POST, 'orderemail');
    $orderstreet = filter_input(INPUT_POST, 'street');
    $ordercity = filter_input(INPUT_POST, 'city');
    $orderstate = filter_input(INPUT_POST, 'state');
    $orderZipCode = filter_input(INPUT_POST, 'zipcode');
    
    $orderspecial = filter_input(INPUT_POST, 'sendemail');
        if ($orderspecial == null) {
         $orderspecial = 'no';
     } else {
         $orderspecial = 'yes';
     }
    
    $deserts = filter_input(INPUT_POST, 'orderitems');
    
    $flavors = filter_input(INPUT_POST, 'itemsflavor');


   /* echo "Fields: " . $orderName . $orderPhone . $orderEmail . $orderspecial .
            $flavors . $deserts; */
    
    // Validate inputs
    if ($orderName == null || $orderPhone == null || $orderEmail == null || 
            $orderstreet == null || $ordercity == null || $orderstate == null ||
            $orderZipCode == null || $orderspecial == null) {
        $error = "Invalid input data. Check all fields and try again.";
        /* include('error.php'); */
       echo "Form Data Error: " . $error; 
        exit();
        } else {
            $dsn = 'mysql:host=localhost;dbname=bakerydb';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                //$db = new PDO($dsn, $username, $password);
                require './database/database.php';
                require './database/order.php';

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }
            add_order($orderName, $orderPhone, $orderEmail, $orderstreet, $ordercity,
        $orderstate, $orderZipCode, $orderspecial, $deserts, $flavors);

//            
/* echo "Fields: " . $orderName . $orderPhone . $orderEmail . $orderspecial .
            $flavors . $deserts; */
}

?>
   <title>Ashy's Bakery</title>
                <meta charset="utf-8" />
                <link href="css/style.css" rel="stylesheet">

    <body>
        <div id="wrap">
        <header>
         <nav class="horizontal" id="top">
                    <ul class="menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="page_two.html">Order</a></li>
                        <li><a href="page_three.html">Contact us</a></li>
                    </ul>
                </nav>
            
        </header>
        <br><br><br>

<h2>Thank you, <?php echo $orderName; ?>, for ordering from Ashley's Bakery!</h2>
 
        <br><br><br>
        </div>
    </body>