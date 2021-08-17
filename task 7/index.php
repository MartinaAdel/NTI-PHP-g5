<?php

require 'dbConnection.php';

$sql = "select * from post";


$op = mysqli_query($con, $sql);


?>





<!DOCTYPE html>
<html>

<head>
    <title>My Posts</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>All Posts </h1>

        </div>


        <?php

        while ($data = mysqli_fetch_assoc($op)) {

        ?>

            <div class="card">
                <h5 class="card-header"><?php echo $data['title']; ?></h5>

                <img class="card-img-top" src="upload/<?php echo $data['image']; ?>" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><?php echo $data['content']; ?></p>
               
                </div>

              
            </div>

        <?php } ?>


    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>












<!--
      Task 

      posts table [title,content,image]

      CURD SYSTEM .... [CREATE,READ];
      FORM [TITLE,CONTENT,IMAGE] [CREATE]

      DISPLAY [TITLE,CONTENT,IMAGE ]  // TABLE 



      delete , edit ..... []





    TASK 


    users Table (name,email,password)

    read users & change password .. .







 -->