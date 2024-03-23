<?php
    include("config.php");
    if (is_int(intval($_GET["id"]))) {
        $sql = "SELECT id ,user_from ,user_to ,content ,subject ,created_at FROM emails WHERE id=" . $_GET["id"] . "";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gmail | register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <!-- single mail -->
        <div class="card text-center">
            <div class="card-header">
                <?php echo $row["user_to"] ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $row["subject"] ?>
                </h5>
                <p class="card-text">
                    <?php echo $row["content"] ?>
                </p>
            </div>
            <div class="card-footer text-muted">
                <?php echo $row["created_at"] ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    } else {
        echo "404";
    }
?>