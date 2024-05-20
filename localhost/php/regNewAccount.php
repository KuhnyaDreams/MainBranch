<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');
    if (isset($_POST['password']) && isset($_POST['login']) && $_POST['login']!=''){  
        $login = $_POST['login'];
        $psw = $_POST['password'];
        $query=mysqli_query($link,"SELECT * FROM `Users` WHERE `login`='$login'");
        $numrows=mysqli_num_rows($query);
        if($numrows==0)
        {
            $sql = "INSERT INTO `Users` (`login`, `password`, `User_logo`) VALUES ('$login', '$psw', 'not-login-user.jpg')";
            mysqli_query($link, $sql);
            $query=mysqli_query($link,"SELECT * FROM `Users` WHERE `login`='$login' AND `password`='$psw'");
            $getUser = mysqli_fetch_array($query);
            setcookie("userlogin", $getUser[1], time()+(60*60*24), '/');  
            setcookie("userID", $getUser[0], time()+(60*60*24), '/'); 
        } else {
            $response = "That username already exists! Please try another one!";
            echo json_encode($response);
        }
    }
    mysqli_close($link);
?>
