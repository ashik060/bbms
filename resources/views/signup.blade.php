<!DOCTYPE HTML>
<html>
<head>
    <title>SignUp Form</title>
    <meta name="viewport" content="width=device-width"/>
    <link href="/css/app.css" rel="stylesheet"/>
    <script src="/js/app.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="post" style="padding: 15px;border: 1px solid gray;margin:10px auto">
                <h3 class="text-center">Signup Form</h3>
                <hr/>
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name</label><input class="form-control" type="text" maxlength="64" name="name" required/>
                </div>
                <div class="form-group">
                    <label>Email</label><input class="form-control" type="email" maxlength="200" name="email"
                                               required/>
                </div>
                <div class="form-group">
                    <label>Password</label><input class="form-control" type="password" maxlength="64" name="pass"
                                                  required/>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label>Retype Password</label><input class="form-control" type="password" maxlength="64"--}}
                                                         {{--name="pass2" required/>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label>Address</label><input class="form-control" type="text" maxlength="250" name="address"
                                                 required/>
                </div>
                <div class="form-group">
                    <label>Contact No.</label><input class="form-control" type="text" maxlength="20" name="phone"
                                                     required/>
                </div>
                <div class="form-group">
                    <label>Birth Date</label><input placeholder="YYYY-MM-DD" class="form-control" type="date" name="birth" required/>
                </div>
                <div class="form-group">
                    <label>Blood Group</label>
                    <select class="form-control" name="blood">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <input type="submit" class="form-control btn btn-primary" value="Submit" onclick="return verifyForm()"
                       required/>
            </form>
        </div>
        <div class="col-md-3" style="margin-top: 50px">
            <a href="/login" class="btn btn-info" style="float: right;color:#2a15e1;font-size: 20px;">Login Here</a>
        </div>
    </div>
</div>
<script>
    function verifyForm() {
        var email = document.getElementsByName("email")[0].value;
        return true;
    }
</script>
</body>
</html>