<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link of CSS files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <title>Client Portal | Accurex Account</title>
    <link rel="icon" type="image/png" href="https://accurexaccounting.com/assets/img/favicon.png">
    
    <style>
        body {
            background-color: #f5f7ff;
            font-family: "Poppins", sans-serif;
        }
        form#loginForm {
            padding-top: 30px;
        }

        .login-box {
            max-width: 450px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 12px;
            background: #fff;
            border: 1px solid lightgray;
        }

        .form-control:focus {
            border-color: #f75c1e;
            box-shadow: 0 0 0 0.2rem rgba(123, 44, 191, 0.25);
        }

        .btn-purple {
            background-color: #f75c1e;
            color: #fff;
            line-height: 35px;
            font-weight: 600;
        }

        .btn-purple:hover {
            background-color: #14264d;
            color: #fff;
        }

        .text-purple {
            color: #f75c1e;
        }

        .text-purple:hover {
            text-decoration: underline;
        }

        #togglePassword {
            border-color: lightgray;
            position: absolute;
            right: 0;
            z-index: 9;
            border: transparent;
            line-height: 45px;
        }

        #togglePassword:hover,
        #togglePassword:active,
        #togglePassword:focus {
            background-color: transparent !important;
            box-shadow: none !important;
            color: #f75c1e;
        }

        .text-orange {
            color: #f75c1e;
        }

        .form-control:focus,
        .form-control:active {
            box-shadow: none !important;
        }

        .input-group>.custom-file,
        .input-group>.custom-select,
        .input-group>.form-control,
        .input-group>.form-control-plaintext {
            width: 100%;
        }

        .form-control {
            height: 50px;
        }

        #togglePassword .fa {
            font-size: 25px;
        }

        .active>.fa {
            color: #f75c1e;
        }

        .text-blue,
        .text-blue:hover {
            color: #14264d;
            text-decoration: none;
            font-weight: 700;
        }
        .bg-img{
                background: url('<?php echo base_url();?>assets/images/login_background.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                overflow: hidden;
                position: relative;
                    background-position: center;
        }
        .bg-img:before{
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color:rgb(216 226 251 / 75%);/* black overlay with 50% transparency */
            z-index: 1;
        }
        .loginForm{
            position: relative;
            z-index: 2; /* above the overlay */
            text-align: center;
            padding: 2rem;
        }
        .error-box h3 {
            font-size: 20px;
            margin-top: 30px;
            color: #f75c1e;
        }
        .error-box {
            padding: 15px;
        }
    </style>
</head>

<body>
<section class=" d-flex align-items-center justify-content-center min-vh-100 bg-img">
    <div class="container">
        <div class="row">
            <div class="col-4 d-none d-sm-block"></div>
            <div class="col-md-4 col-12 loginForm">
                <div class="card p-4">
                    <div class="error-box">
                        <h3><i class="fa fa-warning"></i> Oops! Access Denied!</h3>
                        <p>The page you requested was not accessible because your IP is not whitelisted.</p>
                        <a href="mailto:contact@accurexaccounting.com" class="mt-3 btn btn-purple w-100">Contact to us!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

