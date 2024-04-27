<!DOCTYPE html>
<html lang='ru'>

    <head>
        <link href="./css/styles.css" rel="stylesheet">
        <link href="./css/authstyles.css" rel="stylesheet">
        <script src="./js/jquery.js" ></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    </head>

    <body>
        
        <form action="action_page.php" class="inputform not-visible" method="post" id="regForm">
            <div class="container not-visible">
                <h1 class="title">регистрация</h1>
                <input type="text" placeholder="Логин" name="uname" required class="input">

                <input type="password" placeholder="Пароль" name="psw" required class="input">
                <input type="password" placeholder="Подтвердите пароль" name="psw" required class="input">

                <button type="submit" class="button">Зарегестрироваться</button>
                
                <span class="small-button"><span id="backToAuth" onclick="ChangeToAuth()">Обратно</span></span>
                
            </div>
        </form>
        
    </body>

</html>
