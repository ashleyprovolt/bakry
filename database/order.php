<?php

/* 
 * Date:     Auther:
 * 9/13/19   Ashley Provolt
 * Description: adding a function to the thank you page.
 */

function add_order ($orderName, $orderPhone, $orderEmail, $orderstreet, $ordercity,
        $orderstate, $orderZipCode, $orderspecial, $deserts, $flavors){
           // Add the product to the database 
    $db = Database::getDB();
           $query = 'INSERT INTO orderinfo
                         (orderName, orderPhone, orderEmail, 
                         orderstreet, ordercity, orderstate, orderZipCode,
                         orderspecial, deserts, flavors, employeeID)
                      VALUES
                         (:orderName, :orderPhone, :orderEmail, 
                         :orderstreet, :ordercity, :orderstate, :orderZipCode,
                         :orderspecial, :desters, :flavors, 1)';
            $statement = $db->prepare($query);
            $statement->bindValue(':orderName', $orderName);
            $statement->bindValue(':orderPhone', $orderPhone);
            $statement->bindValue(':orderEmail', $orderEmail);
            $statement->bindValue(':orderstreet', $orderstreet);
            $statement->bindValue(':ordercity', $ordercity);
            $statement->bindValue(':orderstate', $orderstate);
            $statement->bindValue(':orderZipCode', $orderZipCode);
            $statement->bindValue(':orderspecial', $orderspecial);
            $statement->bindValue(':desters', $deserts);
            $statement->bindValue(':flavors', $flavors);
            $statement->execute();
            $statement->closeCursor();
}
function  deleteorder($orderID){
        //Add the delete
    $db = Database::getDB();
    $orderID = filter_input(INPUT_POST, 'orderID', FILTER_VALIDATE_INT);
     $query = 'DELETE FROM orderinfo
                WHERE  orderID = :orderID';
            $statement = $db->prepare($query);
             $statement->bindValue(':orderID', $orderID);
            $success = $statement->execute();
            $statement->closeCursor();
}

?>