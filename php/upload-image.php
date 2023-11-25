<?php
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