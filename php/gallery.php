<?php require("upload-image.php") ?>
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

$uploadDir = '..';  // Directory to store uploaded files

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['my_image'];

    // Check if file was uploaded without errors
    if ($file['error'] === 0) {
        $fileName = uniqid() . '_' . $file['name'];
        $uploadPath = $uploadDir . $fileName;

        // Move the uploaded file to the specified directory
        move_uploaded_file($file['tmp_name'], $uploadPath);

        // Redirect back to the gallery page or do other actions
        header('Location: ../gallery.php');echo $uploadPath;
        
        exit;
    } else {
        echo 'Error uploading the file!';
    }
}
?>
<?php
  $images = glob($uploadDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
  ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../gallerystyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/t1qEzWgB1w0Yv8bujl23I96AOpzjx1f7h0kkA=" crossorigin="anonymous"></script>
<body>
<h3> Welcome <?php echo $username; ?></h3>
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

<div class="Photos">
    <div class="gallery">
      <a href="../superman.html">
        <img src="../superman.jpg" alt="Superman" width="600" height="400">
      </a>
      <div class="desc">Superman</div>
    </div>
    
   <div class="gallery">
      <a href="../batmanvssuperman.html">
        <img src="../batmanvssuperman.jpg" alt="Batman VS Superman" width="600" height="400">
      </a>
      <div class="desc">Batman VS Superman</div>
   </div>
    
   <div class="gallery">
      <a href="../batman.html">
        <img src="../batman.jpg" alt="Batman" width="600" height="400">
      </a>
      <div class="desc">Batman</div>
    </div>

   <!-- <div class="gallery" id="uploadedImageCointainer">
        <a href="#">-
            <img src="<?php echo $uploadPath; ?>" alt="Uploaded Image">
        </a>-->
        <?php
        foreach ($images as $image) {
            echo '<div class="gallery" id="uploadedImageContainer">';
            echo '<a href="#"><img src="' . $image . '" alt="Gallery Image"></a>';
            echo '<div class="desc">' . pathinfo($image, PATHINFO_FILENAME) . '</div>';
            echo '</div>';
        }
        ?>

<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="my_image">
  <input type="submit" value="Upload">
</form>
</div>
<script>  // jQuery AJAX request example
    $.ajax({
        type: 'POST',
        url: '../gallery.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            // Handle the success response
            console.log(data);
        },
        error: function(error) {
            // Handle the error response
            console.error('Error:', error);
        }
    });
  </script>
<!--<script>
        // JavaScript to handle the file upload form submission
        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault();

            var formData = new FormData(this);

            // Make an AJAX request to handle the file upload
            fetch('upload-image.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(uploadPath => {
                // Display the uploaded image dynamically
                var uploadedImageContainer = document.getElementById('uploadedImageContainer');
                uploadedImageContainer.innerHTML = `
                    <a href="#">
                        <img src="${uploadPath}" alt="Uploaded Image">
                    </a>
                    <div class="desc">Newly Uploaded Image</div>
                `;
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
      -->    
  </body>
</html>