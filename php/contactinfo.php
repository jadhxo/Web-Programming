<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../login.php"); exit();
}

if(isset($_GET['logout'])){
    unset($_SESSION['user']);
    session_destroy();
    header("Location: ../login.php"); 
    exit();
}

    // Extract username from email and store it in a variable
    list($username, $domain) = explode('@', $_SESSION['user']);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Info</title>
    <link rel="stylesheet" href="../contactinfostyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<h3 class="h3"> Welcome <?php echo $username; ?></h3>
    <a href = "?logout" class="logout">Log out</a>
    <div class="dropdown">
        <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i>Menu</button>
        <div class="dropdown-content">
            <a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i>Main Page</a>
            <a href="../myCV.php"><i class="fa fa-file" aria-hidden="true"></i>CV</a>
            <a href="../gallery.php"><i class="fa fa-picture-o" aria-hidden="true"></i>Gallery</a>
            <a href="../contactinfo.php"><i class="fa fa-user" aria-hidden="true"></i>Contact Me</a>
        </div>
    </div>

    <div class="contact-info">
        <h1>Contact Information</h1>
        <p>Phone: <a href="tel:+96171404961">+961 71 404 961</a></p>
        <p>Email: <a href="mailto:jad.alhalabi02@lau.edu">jad.alhalabi02@lau.edu</a></p>
        <p>LinkedIn: <a href="https://www.linkedin.com/in/jad-al-halabi-90182a217" target="_blank">linkedin.com/in/jad-al-halabi-90182a217</a></p>
        <p>Location: Beirut, Lebanon</p>
    </div>
</body>
</html>