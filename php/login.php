<?php require("login.class.php") ?>
<?php
      if(isset($_POST['submit'])){
        $user = new LoginUser($_POST['email'],$_POST['password']);
      }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title> 
    <link rel="stylesheet" href="../loginstyle.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Login</h2>
    <form action="" method="POST" enctype="multipart/form-data" name="login-form" id="loginform">
        <label for="email">Email</label>
      <div class="input-box">
        <input type="email" name="email" id="email" placeholder="Enter Email" required>
      </div>
        <label for="pass">Password</label>
      <div class="input-box">
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
      </div>
      <div class="input-box button">
        <input type="Submit" name="submit" value="Log in" onclick="login()">
      </div>
      <div class="text">
        <h3>Don't have an account? <a href="signup.php">Sign up now</a></h3>
      </div>
    </form>
    <script>
        function login() {
            var email = $('#email').val();
            var password = $('#password').val();

            // Send AJAX request to validate login
            $.ajax({
                type: 'POST',
                url: '../login.php', // Change this to your server-side script
                data: { email: email, password: password },
                success: function(response) {
                    if (response === 'success') {
                        // Redirect to the main page upon successful login
                        window.location.href = '../index.php';
                    } else {
                        // Display error message
                        $('#error-message').text('Wrong email or password');
                    }
                }
            });
        }
    </script>
  </div>
</body>
</html>