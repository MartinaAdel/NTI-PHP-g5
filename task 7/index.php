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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
    <div class="container-fluid">


        <div class="page-header">
            <h1>All Posts </h1>

        </div>


        <?php

        while ($data = mysqli_fetch_assoc($op)) {

        ?>

            <div class="card m-3">
                <div class="card-header">
                    <h5><?php echo $data['Title']; ?></h5>
                </div>

                <div class="card-body">
                    <img class="card-img-top" src="uploads/<?php echo $data['image']; ?>" alt="Card image cap">

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