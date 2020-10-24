<?php
session_start();
?>
    <!DOCTYPE html>
    <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
       <head>
        <meta http-equiv='content-type' content='text/html;charset=utf-8' />
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="CSS/user.css">
       </head>

       <body>
        <div class="header">
          <a class="Logo">SimonDoes</a>
        </div>
        <div class="form">
        <form name='input' action='Home.php? name=username' method='post'>
          <label for='username'> User:</label>
            <input type='text' value='' id='username' name='username'  required autofocus/>
            <label for='password'>Pass:</label>
            <input type='password' value='' id='password' name='password' required/>
        <input type='submit' value='Home' name="submit" />
      </form>
      <?php
      if (isset($_POST["submit"])){
        $_SESSION["username"] = $_POST["username"]; 
        $_SESSION["password"] = $_POST["password"];}
      ?>
      </div>
      <div class="footer">
        <p>Adrian Pradas - Carlos Jurado - Pablo Martin</p>
      </div>
    </body>
    </html>

</body>
</html>