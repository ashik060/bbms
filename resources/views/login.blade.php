<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link href="css/app.css" rel="stylesheet">
    <script src="js/app.js"></script>
    <title>Login Page</title>
</head>
<body>
<form class="login" method="post">
    {{csrf_field()}}
    <fieldset class="col-md-4"></fieldset>
    <fieldset class="col-md-4 text-center" style="margin-top: 80px;background-color: #33e1c6;padding: 30px">
        <table>
            <div>
                <tr>
                    <td><input type="email" name="email" size="70" placeholder="Enter your email or username"
                               style="margin-bottom: 30px" required/></td>
                </tr>
            </div>
            <div style="margin-bottom: 60px">
                <tr>
                    <td><input type="password" name="password" size="70" placeholder="Enter your password"
                               style="margin-bottom: 30px" required/></td>
                </tr>
            </div>
            <div>
                <tr>
                    <td><input name="submit" type="Submit" value="Login" style="color:#e12a31;font-size: 20px"/><br/>
                        <a href="passwordrecover" style="color:#000">Forgot Password?</a><br/>
                    </td>
                </tr>
            </div>
            <div>
                <tr>
                    <td><a href="signup" style="color: #1b2ae1">Create a new Account?</a></td>
                    <br/>
                </tr>
            </div>
            <div>
                <tr>
                    <td><a href="home" style="color:#000;font-size: 30px">Home</a></td>
                </tr>
            </div>
        </table>
    </fieldset>
</form>
</body>
</html>