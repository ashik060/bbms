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
            <h1 style="color: #e82f74"><b>BLOOD BANK MANAGEMENT SYSTEM</b>
                <?php if (!\App\Http\Controllers\LoginController::isLoggedIn()){?>
                <a class="text-right" style="float: right;font-size: .7em;margin-left: 80px" href="login">Log In</a>
                <a class="text-right" style="float: right;font-size: .7em" href="signup">Sign Up</a>
                <?php } else { ?>
                <a class="text-right" style="float: right;font-size: .5em;margin-left: 80px" href="logout">Log Out</a>
                <a class="text-right" style="float: right;font-size: .5em;margin-left: 80px" href="/order">Donate or
                    Receive Blood</a>
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
                            <td><?php echo \App\Blood::getAvailableBlood("A+")?> bag</td>
                        </tr>
                        <tr>
                            <td>A-</td>
                            <td><?php echo \App\Blood::getAvailableBlood("A-")?> bag</td>
                        </tr>
                        <tr>
                            <td>B+</td>
                            <td><?php echo \App\Blood::getAvailableBlood("B+")?> bag</td>
                        </tr>
                        <tr>
                            <td>B-</td>
                            <td><?php echo \App\Blood::getAvailableBlood("B-")?> bag</td>
                        </tr>
                        <tr>
                            <td>AB+</td>
                            <td><?php echo \App\Blood::getAvailableBlood("AB+")?> bag</td>
                        </tr>
                        <tr>
                            <td>AB-</td>
                            <td><?php echo \App\Blood::getAvailableBlood("AB-")?> bag</td>
                        </tr>
                        <tr>
                            <td>O+</td>
                            <td><?php echo \App\Blood::getAvailableBlood("O+")?> bag</td>
                        </tr>
                        <tr>
                            <td>O-</td>
                            <td><?php echo \App\Blood::getAvailableBlood("O-")?> bag</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8" style="overflow-y: scroll;max-height: 500px">
            <script type="text/javascript">
                function displayNextImage() {
                    x = (x === images.length - 1) ? 0 : x + 1;
                    document.getElementById("img").src = images[x];
                }
                function startTimer() {
                    setInterval(displayNextImage, 2000);
                }
                var images = [], x = -1;
                images[0] = "images/blood5.jpg";
                images[1] = "images/blood6.jpg";
                images[2] = "images/blood7.jpg";
                images[3] = "images/blood8.jpg";
                images[4] = "images/blood9.jpg";
                startTimer();
            </script>
            <img style="border-radius: 10px;padding: 3px;border: 1px solid #dddddd" id="img" src="images/blood9.jpg"
                 height="400px" width="100%"/>
            <h3 style="color: #083ce1">Features of the System:</h3>
            <p style="color: #000"><em>
                    - Donor Management <b>:</b> Donor Registration, Managing donor database.<br>
                    - Inventory management in blood bank for storage and issuance of blood.<br/>
                    - Blood requisition and issuance of blood.<br/>
                    - Separate user accounts can be created for each blood bank.<br/>
                    - Patient Register/Blood Sample Receiving Register, Donor Register, Blood Issue Register and
                    Discarded Blood report.<br/>
                    - List of Donors who are eligible for donation on a particular date with contact Number.
                </em></p>
            <div class="row">
                <div class="col-md-4">
                    <h3><a href="contact">Contact Us</a></h3>
                </div>
                <div class="col-md-4">
                    <h3><a href="about">About Us</a></h3>
                </div>
                <div class="col-md-4">
                    <?php if (!\App\Http\Controllers\LoginController::isLoggedIn()){?>
                    <h3><a href="adminlogin">Admin Login</a></h3>
                    <?php }?>

                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="list-group">
                <div class="list-group-item" style="color: #000"><em>"Give your blood to save human life" </em></div>
                <div class="list-group-item" style="color: #000"><em>"Your blood is replaceable but life is not!" </em>
                </div>
                <div class="list-group-item" style="color: #000"><em>"A life may depend on a gesture from you, a bottle
                        of blood" </em></div>
                <div class="list-group-item" style="color: #000"><em>"Blood donation will cost you nothing but it wiil
                        save a life" </em></div>
                <div class="list-group-item" style="color: #000"><em>"Tears of a mother can not save her child.But your
                        blood can." </em></div>
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
</html>