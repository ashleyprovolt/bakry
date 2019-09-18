<?php
    class Database {
    private static $dsn = 'mysql:host=localhost;dbname=bakerydb';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
class Employee {
    private $id;
    private $employeeFirstName;
    private $employeeLastName;

    public function __construct($id, $employeeFirstName, $employeeLastName) {
        $this->id = $id;
        $this->employeeFirstName = $employeeFirstName;
        $this->employeeLastName = $employeeLastName;    
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getemployeeFirstName() {
        return $this->employeeFirstName;
    }

    public function setemployeeFirstName($value) {
        $this->employeeFirstName = $value;
    }
    
        public function getemployeeLastName() {
        return $this->employeeLastName;
    }

    public function setemployeeLastName($value) {
        $this->employeeLastName = $value;
    }
}
class EmployeeDB {
    public static function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT * FROM employee
                  ORDER BY employeeID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['employeeID'],
                                     $row['employeeFisrtName'],
                                     $row['employeeLastName']);
            $employees[] = $employee;
        }
        return $employees;
    }


}
$employees = EmployeeDB::getEmployees(); 

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


<h2>employee list</h2>
<ul>
    <?php foreach ($employees as $employee): ?>
    <li><?php echo $employee->getemployeeFirstName()." ".$employee->getemployeeLastName(); ?></li>
    <?php    endforeach; ?>
</ul>
        <br><br><br>
        </div>
    </body>