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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Poppins:wght@200;300;400;500;600;700;800;900&family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../myCVstyle.css">
  </head>
  <title>Jad's CV</title>
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
    <div class="Container" >
      <div class="left_Side">
        <div class="profileText">
          <div class="imgBx">
            <img src="../jad (3)(1).jpg">
          </div>
          <h2>Jad Al Halabi<br><span>Senior Computer Science Student</span></h2>
        </div>

        <div class="contactInfo">
          <h3 class="title">Contact Info</h3>
          <ul>
            <li>
              <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
              <span class="text">+961 71 404 961</span>
            </li>
            <li>
              <span class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
              <span class="text">jad.alhalabi02@lau.edu</span>
            </li>
            <li>
              <span class="icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
              <span class="text">linkedin.com/in/jad-al-halabi-90182a217</span>
            </li>
            <li>
              <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              <span class="text">Beirut, Lebanon</span>
            </li>
          </ul>
        </div>

        <div class="contactInfo education">
          <h3 class="title">Education</h3>
          <ul>
            <li>
              <h5>2021 - Present</h5>
              <h4>Bachelor's in Computer Science</h4>
              <h4>Lebanese American University</h4>
              <p class="acheivements">- Dean's Honor List (Fall 2022)</p>
            </li>
            <li>
              <h5>2019 - 2021</h5>
              <h4>Second & Third Secondary</h4>
              <h4>Jebran Tweini 2nd Achrafieh</h4>
            </li>
            <li>
              <h5>2018 - 2019</h5>
              <h4>First Secondary</h4>
              <h4>Beirut Baptist School</h4>
            </li>
          </ul>
        </div>

        <div class="contactInfo language">
          <h3 class="title">Languages</h3>
          <ul>
            <li>
              <span class="text">English</span>
              <span class="percent">
                <div style="width: 100%;"></div>
              </span>
            </li>
            <li>
              <span class="text">Arabic</span>
              <span class="percent">
                <div style="width: 100%;"></div>
              </span>
            </li>
          </ul>
        </div>
      </div>

      <div class="right_Side">
        <div class="about">
          <h2 class="title2">Profile</h2>
          <p>I am a senior computer science student at Lebanese American University who's full of ambition, drive, and motivation.
             I hold on to various skills, including excel spread sheets, Microsoft Word, assembly language, and hardware language (Verilog), designing databases, as well as great knowledge and application management in Java, C Language, SQL, HTML, CSS, and JavaScript. 
             I can manage Web Development through Microsoft SQL Server an Visual Studio. Thus, I am looking to work for companies dealing with developing and designing Websites (Full-Stack) through .NET Framework .</p>
        </div>

        <div class="about">
          <h2 class="title2">Experience</h2>
          <div class="box">
            <div class="year_company">
              <h5>July 2023 - Septemper 2023</h5>
              <h5>Integrated Digital Systems</h5>
            </div>
            <div class="text">
              <h4>Web-Developer Intern</h4>
              <p>My mission is to utilize HTML, CSS, and JavaScript to complete tasks that cover related topics in web development, covering both back-end and front-end-related issues while using Microsoft SQL Server and Visual Studio.</p>
            </div>
          </div>
          
          <div class="box">
            <div class="year_company">
              <h5>May 2023 - Present</h5>
              <h5>Private Tutor</h5>
            </div>
            <div class="text">
              <h4>Private Tutor</h4>
              <p>Private tutor for middle school students teaching them sciences and mathematics.</p>
            </div>
          </div>
          
          <div class="box">
            <div class="year_company">
              <h5>April 2023 - Present</h5>
              <h5>Appen LTD</h5>
            </div>
            <div class="text">
              <h4>Data-Entry Specialist</h4>
              <p>Particpated in translation, data entry, and data analysis projects.</p>
            </div>
          </div>
          </div>

          <div class="about skills">
            <h2 class="title2">Professional Skills</h2>
            <div class="box">
              <h4>Html</h4>
              <div class="percent">
                <div style="width: 90%;"></div>
              </div>
            </div>
          
          <div class="box">
            <h4>CSS</h4>
            <div class="percent">
              <div style="width: 85%;"></div>
            </div>
          </div>
          
          <div class="box">
            <h4>JavaScript</h4>
            <div class="percent">
              <div style="width: 80%;"></div>
            </div>
          </div>
          
          <div class="box">
            <h4>Java</h4>
            <div class="percent">
              <div style="width: 95%;"></div>
            </div>
          </div>
          
          <div class="box">
            <h4>C</h4>
            <div class="percent">
              <div style="width: 75%;"></div>
            </div>
          </div>
          
          <div class="box">
            <h4>SQL</h4>
            <div class="percent">
              <div style="width: 100%;"></div>
            </div>
          </div>
          
          <div class="box">
            <h4>.NET</h4>
            <div class="percent">
              <div style="width: 75%;"></div>
            </div>
          </div>
        </div>

          <div class="about Projects">
            <h2 class="title2">Personal Projects</h2>
            <ul>
              <li><i class="fa fa-microchip" aria-hidden="true"></i><h4>Micro-processor design (08/2022 - 12/2022)</h4></li>
              <p>Designed a Micro-processor and wrote it's program in assembly language.</p>
              <li><i class="fa fa-database" aria-hidden="true"></i><h4>Airport Database System (03/2023 - 05/2023)</h4></li>
              <p>Creating a JAVA application on netbeans IDE that manipulates different entities of the
                database while being linked to the localhost server through WAMP server.<p>
              <li><i class="fa fa-code" aria-hidden="true"></i><h4>Full-Stack Web Development (08/2023 - 10/2023)</h4></li>
              <p>My mission is to utilize HTML, CSS, and JavaScript to complete tasks that cover related topics in web development, covering both back-end and front-end-related issues while using Microsoft SQL Server and Visual Studio.</p>
            </ul>
          </div>

        </div>
      </div>
  </body>