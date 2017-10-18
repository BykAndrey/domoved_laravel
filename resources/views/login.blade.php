<html>
<head>
    <style>
        body{
            background-color: #3a6c7e;
        }
        .login{
            width: 350px;
            margin: auto;
            margin-top: 20%;
            margin-bottom: 20%;
            box-shadow: 0px 0px 14px 2px #2424244d;
        }
        input{
            width: 100%;
            border: none;
            height: 30px;
        }
        input[type='password']{
            border-radius: 3px 3px 0px 0px;

        }
        input[type='submit']{
            border-radius: 0px 0px 3px 3px;
            background-color: #2d392580;
            color: wheat;

            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="login">
    <form action="" method="post">
        {{csrf_field()}}
        <input type="password" name="password">
        <br>
        <input type="submit" value="ВОЙТИ">
    </form>
</div>
</body>
</html>