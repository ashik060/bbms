<!DOCTYPE html>
<html xmlns:text-color="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link href="css/app.css" rel="stylesheet">
    <script src="js/app.js"></script>
    <title> BBMS</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1><b>BLOOD BANK MANAGEMENT SYSTEM <a class="text-right" style="float: right" href="login">Log in</a></b></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <b><a href="search">Check Blood Availability</a></b>
        </div>

        <div class="col-md-8">
            <script type="text/javascript">
                function displayNextImage() {
                    x = (x === images.length - 1) ? 0 : x + 1;
                    document.getElementById("img").src = images[x];
                }
                function startTimer() {
                    setInterval(displayNextImage, 2000);
                }
                var images = [], x = -1;
                images[0] = "images/blood1.jpg";
                images[1] = "images/blood2.jpg";
                images[2] = "images/blood3.jpg";
                images[3] = "images/blood4.jpg";
                images[4] = "images/blood5.jpg";
                images[5] = "images/blood6.jpg";
                images[6] = "images/blood7.jpg";
                images[7] = "images/blood8.jpg";
                images[8] = "images/blood9.jpg";
                images[9] = "images/blood10.jpg";
                images[10] = "images/blood11.jpg";
                startTimer();
            </script>
            <img id="img" src="images/blood10.jpg" height="400px" width="100%"/>
            <h3>Features of the System:</h3>

            - Blood Donation Camp & Camp Organiser Management.
            - Donor Management - Donor Registration, Managing donor database, recording their physical and medical statistics.
            - Inventory management in blood bank for storage and issuance of blood.
            - Blood requisition and issuance of blood.
            - Separate user accounts can be created for each blood bank.
            - Patient Register/Blood Sample Receiving Register, Donor Register, Blood Issue Register and Discarded Blood report.
            - List of Donors who are eligible for donation on a particular date with contact Number.
            - Camp Wise Donor List and Printing of Donor Cards.

            <div class="row">
                <div class="col-md-4">
                    <h3><a href="contact">Contact Us</a></h3>
                </div>
                <div class="col-md-4">
                    <h3><a href="about">About Us</a></h3>
                </div>
                <div class="col-md-4">
                    <h3><a href="adminlogin">Admin Login</a></h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div><i>"Give your blood to save human life" </i></div>

        </div>
        <div class="col-md-12 text-center">
            <div class="footer">
                <div style="background:#b2ffe4">Copyright &copy; Student of University of Chittagong,CSE Department. <?php echo date("Y", time());?></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>