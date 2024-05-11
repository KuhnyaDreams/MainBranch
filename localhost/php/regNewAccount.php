<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');
    if (isset($_POST['password'] && isset($_POST['login']))){  
        $login = $_POST['login'];
        $psw = $_POST['password'];

        $query=mysql_query("SELECT * FROM Users WHERE `login`='".$login."'");
        $numrows=mysql_num_rows($query);
        if($numrows==0)
        {
            $sql = "INSERT INTO `Users` (`login`, `password`) VALUES ('$login', '$psw')";
            mysqli_query($link, $sql);     
        if($result){
            $message = "Account Successfully Created";
            } else {
                $message = "Failed to insert data information!";
            }
        } else {
        $message = "That username already exists! Please try another one!";
        }

           
    }
    mysqli_close($link);
    ?>
<?php if (!empty($message)) {echo "<p class="error">" . "MESSAGE: ". $message . "</p>";} ?>