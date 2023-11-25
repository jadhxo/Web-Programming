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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../mainpagestyle.css">
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

    
    <div class="container">
        <header>
            <h1>My Portfolio</h1>
        </header>

        <div id="about">
            <h2>About Me</h2>
            <p>
                I am a senior computer science student at Lebanese American University who's full of ambition, drive, and motivation.
                    I hold on to various skills, including excel spread sheets, Microsoft Word, assembly language, and hardware language (Verilog), designing databases, as well as great knowledge and application management in Java, C Language, SQL, HTML, CSS, and JavaScript. 
                    I can manage Web Development through Microsoft SQL Server an Visual Studio. Thus, I am looking to work for companies dealing with developing and designing Websites (Full-Stack) through .NET Framework .
            </p>
        </div>

        <div id="contact">
            <h2>Contact</h2>
            <p>
                You can reach me at <a href="mailto:jad.alhalabi02@lau.edu">jad.alhalabi02@lau.edu</a>.
            </p>
        </div>
    </div>
</body>
</html>
