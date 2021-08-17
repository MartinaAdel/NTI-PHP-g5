<?php 

require 'dbConnection.php';


function CleanInputs($input)
{

  // return stripslashes(htmlspecialchars(trim($input)));
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);

  return $input;
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $errors = [];

  $title  = CleanInputs($_POST['title']);
  $content = $_POST['content'];
  $imageName = '';




  if (empty($title)) {

    $errors['title'] = " Field Required";
  } elseif (!preg_match("/^[a-zA-Z\s*']+$/", $title)) {

    $errors['title'] = "Invalid String";
  }

  if (!empty($_FILES['image']['name'])) {

    $temp = $_FILES['image']['tmp_name'];
    $type = $_FILES['image']['type'];

    $nameArray =  explode('/', $type);
    $extension =  strtolower($nameArray[1]);

    $imageName = rand() . time() . '.' . $extension;

    $allowedExt = array('png', 'jpg', 'jpeg');

    if (in_array($extension, $allowedExt)) {

      $folder = "./uploads/";
      $finalPath = $folder . $imageName;

      if (!move_uploaded_file($temp, $finalPath)) {
        $errors['image'] = "Error in uploading image please try again";
      }
    } else {
      $errors['image'] =  'Invalid Extension';
    }
  } else {
    $errors['image'] =  "Image Required";
  }

  if (count($errors) > 0) {

    foreach ($errors as $key => $error) {

      echo '* ' . $key . ' : ' . $error . '<br>';
    }
  } else {



    $sql = "INSERT INTO `post`(`Title`, `content`, `image`) VALUES ('$title','$content','$imageName')";

    $op =  mysqli_query($con, $sql);

    if ($op) {

      echo 'data inserted';
    } else {
      echo 'Error Try Again';
    }
  }
}






?>







<!DOCTYPE html>
<html lang="en">

<head>
  <title>add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>add post</h2>
    <form method="post" action="add post.php" enctype="multipart/form-data">



      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" name="title" value="<?php echo $data['title']; ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1">content</label>
        <input type="text" name="content" value="<?php echo $data['content']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Enter email">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword2">Upload Image</label>
        <input type="file" name="image">
      </div>



      <button type="submit" class="btn btn-primary">add</button>
    </form>
  </div>

</body>

</html>