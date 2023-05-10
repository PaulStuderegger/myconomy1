<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <link rel="stylesheet" href="../styles/styles.css">
	    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

        <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}

            input[type=email], input[type=password]{
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            input[type=submit] {
                background-color: #028A0F;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #3CB043;
            }

            .container {
                border-radius: 5px;
                /* background-color: #f2f2f2; */
                background-color: black;
                padding: 20px;
            }
        </style>
    </head>

    <body>

        <div class="wrapper">
            <?php include '../components/sidebar_beforeLogin.php' ?>
  
            <div class="main_content">
                <div class="header">Login</div>  
                    <div class="info">
                        <h3>Login Form</h3>

                        <div class="container">
                            <form action="/action_page.php">
                                <input type="email" id="email" name="email" placeholder="E-Mail-Adresse">
                                <input type="password" id="password" name="password" placeholder="Passwort">
                                <br>
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </body>
</html>