
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="https://simulator.sandbox.midtrans.com/assets/favicon.ico">

    <title>Midtrans Mock Payment Provider</title>

    <!-- Bootstrap core CSS -->
    <link href="https://simulator.sandbox.midtrans.com/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://simulator.sandbox.midtrans.com/assets/sticky-footer-navbar.css" rel="stylesheet">
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="https://midtrans.com"><img src="https://midtrans.com/assets/images/logo-midtrans-color.png" class="navbar-brand" alt="Midtrans" width="150px" height="150px"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/assets/index.html">About</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Payment Page <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Internet Banking</li>
                        <li><a href="/bca/klikbca/index">BCA KlikBCA</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">ATM / Virtual Account</li>
                        <li><a href="/bni/va/index">BNI Virtual Account</a></li>
                        <li><a href="/bri/va/index">BRI Virtual Account</a></li>
                        <li><a href="/permata/va/index">Permata Virtual Account</a></li>
                        <li><a href="/bca/va/index">BCA Virtual Account</a></li>
                        <li><a href="/mandiri/bill/index">Mandiri Bill Payment</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Electronic Money</li>
                        <li><a href="/xl/tunai/index">XL Tunai</a></li>
                        <li><a href="/mandiri/ecash/payment">Mandiri e-cash</a></li>
                        <li><a href="/gopay/ui/index">GoPay</a></li>
                        <li><a href="/qris/index">QRIS</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Customer Financing</li>
                        <li><a href="/akulaku/ui/pending">Akulaku</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Over the Counter</li>
                        <li><a href="/alfamart/index">Alfamart</a></li>
                        <li><a href="/indomaret/index">Indomaret</a></li>
                        <li><a href="/indomaret/phoenix/index">Indomaret (Phoenix)</a></li>
                        <li><a href="/indomaret-endpoint/index">Indomaret Endpoint</a></li> <!-- TODO: Remove Endpoint word after migration later-->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>


<!-- Begin page content -->
<div class="container">

    <div class="page-header">
        <h1>QRIS</h1>
    </div>

    <form class="form-horizontal" role="form" action="payment" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">QR Code Image Url</label>

            <div class="col-sm-10">
                <input name="qrCodeUrl" type="text" class="form-control" id="qrCodeUrl"
                       placeholder="Copy-Paste QR Code Image Url Here">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Scan QR</button>
            </div>
        </div>
    </form>

</div>

<div id="footer">
    <div class="container">
        <p class="text-muted">&copy; 2020 PT Midtrans. All Rights Reserved</p>
    </div>
</div>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://simulator.sandbox.midtrans.com/assets/jquery.js"></script>
<script src="https://simulator.sandbox.midtrans.com/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
