   <?php
   session_start();
   session_unset();
   session_destroy();
   ?>
   <!DOCTYPE html>
   <html>
   <body>
   
   <?php
   echo "Session destroyed.";
   ?>
   
   </body>
   </html>