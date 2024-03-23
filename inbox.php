<div>
    <h1 class="text-center ">
        inbox
    </h1>
</div>
<br>
<!--select data from emails and users table-->
<?php
    include("config.php"); 
    $sql = "SELECT id ,user_from ,user_to ,content ,subject ,created_at FROM emails WHERE user_to=2";
    $result = mysqli_query($conn, $sql);            
?>
<!-- show inbox mails -->
<?php
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
?>
    <div class="card">
        <div class="d-flex justify-content-between card-header">
            <h5>
                <?php echo $row["user_from"] ?>
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
                <a class="btn btn-primary" href="<?php echo "singleEmailInbox.php?id=" . $row["id"] ?>">
                    Detail
                </a>
                <a href="<?php echo "deleteInbox.php?id=" . $row["id"] ?>" class="btn btn-danger">
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