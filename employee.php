 <?php
 /****************************
  * file: employee.php 
  * Date: 09/06/2019
  * Auther: Ashley Provolt 
  *  added the table with the information and 
  *     made the delete ability.
  * 9/12/19 Add the login page and password
  * 9/13/2019 Add a function to the delete order.
  *************************************/
// $username = filter_input(INPUT_POST, 'username');
//// $password = filter_input(INPUT_POST, 'password');
//// 

try {
    include_once './database/database.php';
    include './database/order.php';
    $db = Database::getDB();
} catch (Exception $ex) {
    echo 'Connection error'.$e->getMessage();
}
$action = filter_input(INPUT_POST, 'act');
echo $action;
if($action == NULL) {
    $action = 'listorder';
}

if($action == 'listorder') {
    //getting order infromation from order name
     $query = 'SELECT * FROM orderinfo
                ORDER BY orderName';
            $statement = $db->prepare($query);
            $statement->execute();
            $order = $statement->fetchALL();
            $statement->closeCursor();
            
} else if($action == 'deleteorder') {

            deleteorder($orderID);
            header('location: employee.php');
           
} 

?>
<html>
    <head>
   <title>Ashy's Bakery employees</title>
                <meta charset="utf-8" />
                <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrap">
        <header>
            <br>
             <h2>Ashley's bakery employee page</h2>
         <nav class="horizontal" id="top">
                    <ul class="menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="page_two.html">Order</a></li>
                        <li><a href="page_three.html">Contact us</a></li>
                    </ul>
                </nav>
           
        </header>
        <br>
        <!--display order table -->
        <table>
            <header>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>street</th>
                <th>City</th>
                <th>State</th>
                <th>Zip code</th>
                <th>news letter</th>
                <th>dessert</th>
                <th>Flavor</th>
                <th>employee ID</th>
                <th>&nbsp;</th>
            </tr>
            </header>
             <?php foreach ($order as $orderinfo) : ?>
            <tr>
                <td><?php echo $orderinfo['orderName']; ?></td>
                <td><?php echo $orderinfo['orderPhone']; ?></td>
                <td><?php echo $orderinfo['orderEmail']; ?></td>
                <td><?php echo $orderinfo['orderstreet']; ?></td>
                <td><?php echo $orderinfo['ordercity']; ?></td>
                <td><?php echo $orderinfo['orderstate']; ?></td>
                <td><?php echo $orderinfo['orderZipCode']; ?></td>
                <td><?php echo $orderinfo['orderspecial']; ?></td>
                <td><?php echo $orderinfo['deserts']; ?></td>
                <td><?php echo $orderinfo['flavors']; ?></td>
                <td><?php echo $orderinfo['employeeID']; ?></td>
                <td><form action="employee.php" method="post">
                   <input type="hidden" name="act" value="deleteorder">
                    <input type="hidden" name="orderID"
                           value="<?php echo $orderinfo['orderID']; ?>">
                    <input type="submit" value="Delete" class="button">
                </form></td>
                
                    
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <br><br>

        </div>
    </body>
</html>
