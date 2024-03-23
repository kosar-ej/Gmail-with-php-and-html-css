
<?php
    include("config.php");
    //check login
    function check_login (){
        if (isset($_SESSION['login']))
        {
            if (!empty($_SESSION['login']) )
            {
                return $_SESSION['login'];
            }
            return false;
        }
        return false;
    }

    //do login
    function do_login($username,$password){
         
        $sql = "SELECT * FROM users WHERE username=\"$username\"";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            return false;
            
        }
        $user="";
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $user=$row;
            break;
        }
        if(empty($user)){
            $_SESSION['message']="username and password is not match";

            return false;
        }
        if (!password_verify($password, $user['password'])){
            $_SESSION['message']="username and password is not match";
            return false;
        }
        $_SESSION['login']=$user['id'];
        return true;

    }
    
?>