<!--insert data to users table-->
<?php
            include("config.php");
            $user_from=1;
            $user_to=$_POST['user_to'];
            $subject=$_POST['subject'];
            $content=$_POST['content'];

            if(empty($user_to) || empty($subject) || empty($content)){
                echo "<script type='text/javascript'>alert('Please fill in all the fields!');</script>";
            }

            $sql = "INSERT INTO emails (user_from, user_to, subject, content)
            VALUES ('$user_from', '$user_to', '$subject', '$content')";

            if (mysqli_query($conn, $sql)) {
            echo "<h1>mail sent successfully</h1>";
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
            header('Location: '.'sent.php')
        ?>