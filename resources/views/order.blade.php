<!DOCTYPE html>
<html xmlns:text-color="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    @if($msg != null)
        <meta http-equiv="refresh" content="1,home"/>
    @endif
    <link href="css/app.css" rel="stylesheet">
    <script src="js/app.js"></script>
    <title> BBMS</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 50px">
            <form method="post">
                @if($err != null)
                    <div class="alert alert-danger">
                        {{$err}}
                    </div>
                @elseif($msg != null)
                    <div class="alert alert-success">
                        {{$msg}}
                    </div>
                @endif
                {{csrf_field()}}
                <div class="form-group">
                    <label>Date of Transaction :</label>
                    <input class="form-control" placeholder="YYYY-MM-DD" name="donate_date" type="datetime"
                           required/>
                </div>
                <div class="form-group">
                    <label>Quantity of Blood (bag): <span style="color: #cc1;" id="amount"> {{$amount}}
                            bag Available</span></label>
                    <input class="form-control" name="quantity" type="text" placeholder="1 bag" required/>
                </div>
                <div class="form-group">
                    <label>Blood Group</label>
                    <select class="form-control" name="blood" >
                        <option @if($blood == "A+") selected @endif>A+</option>
                        <option @if($blood == "A-") selected @endif>A-</option>
                        <option @if($blood == "B+") selected @endif>B+</option>
                        <option @if($blood == "B-") selected @endif>B-</option>
                        <option @if($blood == "O+") selected @endif>O+</option>
                        <option @if($blood == "O-") selected @endif>O-</option>
                        <option @if($blood == "AB+") selected @endif>AB+</option>
                        <option @if($blood == "AB-") selected @endif>AB-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Transaction Type :</label><br/>
                    <input type="radio" value="2" name="type" checked/> Reception <br/>
                    <input type="radio" value="1" name="type"/> Donation
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Submit"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>