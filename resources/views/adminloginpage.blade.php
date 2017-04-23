<!DOCTYPE html>
<html xmlns:text-color="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link href="css/app.css" rel="stylesheet">
    <script src="js/app.js"></script>
    <title>BBMS</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 style="color: #e82f74"><b>Admin Panel</b>
                <?php if (!\App\Http\Controllers\LoginController::isLoggedIn()){?>
                <a class="text-right" style="float: right;font-size: .5em;margin-left: 80px"
                   href="logout">Log Out</a>
                <button style="float: right;font-size: .5em;margin-left: 80px" onclick="showDonors()"
                        class="btn btn-info">{{$donors_count}} Donors
                </button>
                <button class="btn btn-info" style="float: right;font-size: .5em;margin-left: 80px"
                        onclick="showReceivers()">{{$receivers_count}} Receivers
                </button>

                <?php } else { ?>
                <a class="text-right" style="float: right;font-size: .7em;margin-left: 80px" href="adminlogin">Log
                    In</a>
                <?php }?>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <h4 class="text-center panel-heading">Available Bloods</h4>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td>A+</td>
                            <td><?php echo \App\Blood::getAvailableBlood("A+")?> ml</td>
                        </tr>
                        <tr>
                            <td>A-</td>
                            <td><?php echo \App\Blood::getAvailableBlood("A-")?> ml</td>
                        </tr>
                        <tr>
                            <td>B+</td>
                            <td><?php echo \App\Blood::getAvailableBlood("B+")?> ml</td>
                        </tr>
                        <tr>
                            <td>B-</td>
                            <td><?php echo \App\Blood::getAvailableBlood("B-")?> ml</td>
                        </tr>
                        <tr>
                            <td>AB+</td>
                            <td><?php echo \App\Blood::getAvailableBlood("AB+")?> ml</td>
                        </tr>
                        <tr>
                            <td>AB-</td>
                            <td><?php echo \App\Blood::getAvailableBlood("AB-")?> ml</td>
                        </tr>
                        <tr>
                            <td>O+</td>
                            <td><?php echo \App\Blood::getAvailableBlood("O+")?> ml</td>
                        </tr>
                        <tr>
                            <td>O-</td>
                            <td><?php echo \App\Blood::getAvailableBlood("O-")?> ml</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div id="donors" class="col-md-10" style="display: none;">
            <div class="panel panel-default">
                <h4 class="text-center panel-heading">Requested Donors</h4>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">
                        @foreach($donors as $receiver)
                            <tr id="id_{{$receiver->id}}">
                                <td>{{\App\Signup::getName($receiver->people_id)}}</td>
                                <td>{{$receiver->blood_group}}</td>
                                <td>{{$receiver->quantity}} ml</td>
                                <td>{{$receiver->order_date}}</td>
                                <td><a href="#"
                                       onclick="confirmDonation({{$receiver->id}})">Confirm</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
        <div id="receivers" class="col-md-10">
            <div class="panel panel-default">
                <h4 class="text-center panel-heading">Requested Receivers </h4>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">

                        @foreach($receivers as $receiver)
                            <tr id="id_{{$receiver->id}}">
                                <td>{{\App\Signup::getName($receiver->people_id)}}</td>
                                <td>{{$receiver->blood_group}}</td>
                                <td>{{$receiver->quantity}} ml</td>
                                <td>{{$receiver->order_date}}</td>
                                <td><a href="#"
                                       onclick="confirmReception({{$receiver->id}})">Confirm</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-center">
            <div class="footer">
                <div style="background:#000;color: #FFF;margin-bottom: 20px;padding: 10px">Copyright &copy; Student of
                    University of Chittagong,CSE Department. <?php echo date("Y", time());?></div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function showDonors() {
        $("#receivers").hide();
        $("#donors").show();
    }
    function showReceivers() {
        $("#donors").hide();
        $("#receivers").show();
    }

    function confirmReception(id) {
        $.ajax({
            url: "/confirm/receiver/" + id,
            method: 'get',
            data: {},
            success: function () {
                $("#id_" + id).remove();
            },
            error: function (a, b, c) {
                alert(c.toString())
            }
        });
    }
    function confirmDonation(id) {
        $.ajax({
            url: "/confirm/donation/" + id,
            method: 'get',
            data: {},
            success: function () {
                $("#id_" + id).remove();
            },
            error: function (a, b, c) {
                alert(c.toString())
            }
        });
    }
</script>
</html>