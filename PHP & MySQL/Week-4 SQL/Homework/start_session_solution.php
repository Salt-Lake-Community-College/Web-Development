   <?php
   session_start();
   $_SESSION["username"] = "JohnDoe";
   $_SESSION["email"] = "john.doe@example.com";
   ?>
   <!DOCTYPE html>
   <html>
   <body>
   
   <?php
   echo "Session variables are set.";
   ?>
   
   </body>
   </html>