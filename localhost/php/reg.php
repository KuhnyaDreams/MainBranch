<!DOCTYPE html>
<html lang='ru'>

    <head>
        <script src="https://api-maps.yandex.ru/2.1/?apikey=c472441-ed32-4bed-a362-addea55b0252&lang=ru_RU" type="text/javascript">
        </script>
        <link href="../css/styles.css" rel="stylesheet">
        <link href="../css/authstyles.css" rel="stylesheet">
        <script src="../js/jquery.js" ></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    </head>

    <body>
        <form action="action_page.php" class="inputform" method="post">
            <div class="container">
                <h1 class="title">регистрация</h1>
                <input type="text" placeholder="Логин" name="uname" required class="input">

                <input type="password" placeholder="Пароль" name="psw" required class="input">
                <input type="password" placeholder="Подтвердите пароль" name="psw" required class="input">

                <button type="submit" class="button">Зарегестрироваться</button>
                
                <span class="small-button"><a href="../php/auth.php" >Обратно</a></span>
                
            </div>
            
        </form>
    </body>

</html>
