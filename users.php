<?php
    session_start();
    $username = $password = $userError = $passError = '';
    if(isset($_POST['sub'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      if($username === '' && $password === ''){
        $_SESSION['login'] = true; 
        header('LOCATION:Home.php');
        die();
      }
      
      if($username !== ''){$userError = 'Invalid Username';}
      if($password !== ''){$passError = 'Invalid Password';}
    }
    ?>

    <!DOCTYPE html>
    <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
       <head>
         <meta http-equiv='content-type' content='text/html;charset=utf-8' />
         <title>Login</title>
       </head>
       <body>
        <form name='input' action='Home.php? name=username' method='post'>
          <label for='username'></label><input type='text' value='' id='username' name='username' />
          <div class='error'><?php echo $userError;?></div>
          <label for='password'></label><input type='password' value='' id='password' name='password' />
          <div class='error'><?php echo $passError;?></div>
        <input type='submit' value='Home' name='sub' />
      </form>

    </body>
    </html>

</body>
</html>