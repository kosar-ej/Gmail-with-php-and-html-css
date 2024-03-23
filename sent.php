
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gmail | sent</title>
    <link rel="sty //cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="container-xl">
        <!-- navbar -->
        <?php 
        include("navbar.php"); 
        ?>
        <br>
        <div>
            <h1 class="text-center ">
                sent mail
            </h1>
        </div>
        <br>
        <!--select data from emails and users table-->
        <?php
            include("config.php"); 
            $sql = "SELECT id ,user_from ,user_to ,content ,subject ,created_at FROM emails WHERE user_from=1";
            $result = mysqli_query($conn, $sql);           
        ?>
        <!-- show sent mail -->
        <?php
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="card">
                    <div class="d-flex justify-content-between card-header">
                        <h5>
                            <?php echo $row["user_to"] ?>
                        </h5>
                        <p>
                            <?php echo $row["created_at"] ?>
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row["subject"] ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $row["content"] ?>
                        </p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-primary" href="<?php echo "singleEmailSent.php?id=" . $row["id"] ?>">
                                Detail
                            </a>
                            <a href="<?php echo "deleteSent.php?id=" . $row["id"] ?>" class="btn btn-danger">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
                <br>
        <?php       
                } 
                } else {
            echo "0 results";
            }
            mysqli_close($conn);
        ?>
</body>
</html> 
    