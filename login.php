 <?php
 /****************************
  * file: employee.php 
  * Date: 09/06/2019
  * Auther: Ashley Provolt 
  *  added the table with the information and 
  *     made the delete ability.
  * 9/12/19 Add the login page and password
  *************************************/
 $action = filter_input(INPUT_POST, 'action');
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');
 
 if($action == NULL) {
     
} else if(empty($username) || empty($password)){
     header("location: login.php");
 } else {
     header("Location: employeee.php");
}
  
?>
<!DOC>

        <html>
        
        <head>
                <!--
                    This page is for Portfolio project: Web Styling
        
                    home page
                    Auther: Ashley P
                    Date: 2/7/2019
        
                    Filename: page_one.html
                -->
        
                <title>Ashy's Bakery</title>
                <meta charset="utf-8" />
                <link href="css/style.css" rel="stylesheet">

                <script src="port_formsubmit"></script>
        
        </head>
        
        <body>
            <div id=wrap2>
            <header>
                <h1>Ashy's bakery login page</h1>
        
                <nav class="horizontal">
                    <ul class="menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="page_two.html">Order</a></li>
                        <li><a href="page_three.html">Contact us</a></li>
                    </ul>
                </nav>
            </header>
            <br>
            <p>
            </p>
            <br>
            <form action="employee.php" method="POST">
                <fieldset>
                <label id="firstlabel">Login</label>
                <br>
                <br> <br>
                <label for="username">Username:</label>
                <input type="text" name="username" size="30" id="username" required/>
                <br>
                <br>
                <label for="password">password</label>
                <input type="password" name="password" size="30" id="password" required />
                <input type="hidden" name="action" value="action" >
                <br>
                <br>
                <div>
		         <input type="submit" id="submit2" value="Submit" class="login">
               </div><div></div>
            </fieldset>
            </form>
        
            <footer>
                <a href="https://github.com/" target="_blank"><img src="image/github.png" alt="github icon" /></a>
                <a href="https://www.linkedin.com/" target="_blank"><img src="image/linkedin.png" alt="linkedin icon" /></a>
                <br>
                &copy; Copyright 2017. All Rights Reserved<br>
        <p>Email: <a href="mailto:ashleyprovolt@mycwi.cc">ashleyprovolt@mycwi.cc</a></p> 
            </footer>
        </div>
        </body>
        
        </html>
