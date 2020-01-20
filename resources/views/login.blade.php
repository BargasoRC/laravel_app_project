<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/a1813e4a30.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

        <style>
            /*login styling*/
            body{
                margin:0px;
                font-family: "Comfortaa";
            }
            .card {
                margin-top: 15%;
                width: 350px;
                height:400px;
                border:1px solid gray;
            }

            .card-footer {
                height: 130px;
                background: #E25822;
                opacity: 0.8;
            }

            .username,.password{
                position: relative;
                width: 100%;
                height: 40px;
                line-height: 44px;
                margin-bottom:10px;
            }

            label {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                color: black;
                transition: 0.2s all;
                cursor: text;
                text-align: left;
            }

            input {
                width: 100%;
                border: 0;
                outline: 0;
                padding: 0.5rem 0;
                border-bottom: 2px solid #d3d3d3;
                box-shadow: none;
            }

            input:invalid {
                outline: 0;
                color: #ff2300;
                border-color: #ff2300;
            }

            input:focus,
            input:valid {
                border-color: #4049ff;

            }

            input:focus~label,
            input:valid~label {
                font-size: 14px;
                top: -24px;
                color: #4049ff;
            }

            #login{
                width:200px;
                height:50px;
                background:#4049ff;
                border-radius:20px;
                color:white;
                margin-top:60px;
                margin-bottom:60px;
                outline:none;
            }

            #avatar{
                font-size:100px;
                margin-top:-45px;
                background:white;
            }

            /*--end of login styling--*/
        </style>
    </head>
    <body>
        <div class="container">
            <center>
                <div class="card shadow">
                    <div class="card-body ">
                        <i id="avatar" class="fas fa-user-circle"></i>
                        <br>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="username">
                                <input type="text" id="username" required />
                                <label for="name">Username</label>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="password">
                                <input type="text" id="password" required />
                                <label for="name">Password</label>
                            </div>
                        </div>
                        <center>
                            <a href="/home"><button id="login" type="submit" class="btn">LogIn</button></a>
                        </center>
                    </div>
                </div>
            <center>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
