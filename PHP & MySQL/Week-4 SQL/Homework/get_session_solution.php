   <?php
   session_start();
   ?>
   <!DOCTYPE html>
   <html>
   <body>
   
   <?php
   echo "Username: " . $_SESSION["username"] . "<br>";
   echo "Email: " . $_SESSION["email"];
   ?>
   
   </body>
   </html>