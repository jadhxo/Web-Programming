<?php require("register.class.php")?>
<?php 
    if(isset($_POST['submit'])){
      $user = new RegisterUser($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['pass'],$_POST['sex']);
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration </title> 
    <link rel="stylesheet" href="../signupstyle.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="" method="POST" name="signup-form">
        <label for="fn">First Name</label>
      <div class="input-box">
        <input type="text" name="firstname" placeholder="Enter your first name" required>
      </div>
        <label for="ln">Last Name</label>
      <div class="input-box">
        <input type="text" name="lastname" placeholder="Enter your last name" required>
      </div>
        <label for="email">Email</label>
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
        <label for="pass">Password</label>
      <div class="input-box">
        <input type="password" name="pass" placeholder="Create password" required>
      </div>
        <label for="confirmpass">Confirm Password</label>
      <div class="input-box">
        <input type="password" name="confirmpass" placeholder="Confirm password" required>
      </div>
        <label for="sex">Gender</label>
      <div class="input-box">
        <input type="radio" id="male" name="sex" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="sex" value="female" required>
        <label for="female">Female</label>
       </div>

      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" name="submit" onclick="Signup()">
      </div>
      <p class="error"><?php echo @$user->error ?></p>
      <p class="success"><?php echo @$user->success ?></p>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
    <script>
        function SignUp(){
            var mForm=document.querySelector("form[name='signup-form']");
            var fn=mForm.elements["firstname"].value;
            var ln=mForm.elements["lastname"].value;
            var email=mForm.elements["email"].value;
            var pass=mForm.elements["pass"].value;
            var confpass=mForm.elements["confirmpass"].value;
            var sex=mForm.elements["sex"].value;
            console.log("fn:"+fn);
            console.log("ln:"+ln);
            console.log("email:"+email);
            console.log("pass:"+pass);
            console.log("confPass:"+confPass);
            console.log("sex:"+sex);
    
            if ((pass!=confPass)||(pass==""))
                alert("Passwords must be equal.");
            else
                mForm.submit();        
        }
        function ClearForm(){
            var mForm=document.querySelector("form[name='signup-form']");
            mForm.elements["firstname"].value="";
            mForm.elements["lastname"].value="";
            mForm.elements["email"].value="";
            mForm.elements["pass"].value="";
            mForm.elements["confirmpass"].value="";
            mForm.elements["sex"].value="male";
        }
    </script>
  </div>
</body>
</html>