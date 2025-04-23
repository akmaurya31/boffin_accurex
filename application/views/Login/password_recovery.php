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
    <title>Accurex Accounting | Our Knowledge Our Solutions Your Achievements</title>
    <link rel="icon" type="image/png" href="https://accurexaccounting.com/assets/img/favicon.png">
    <meta name="google-site-verification" content="O59BDNFa90DPuPYJ1Cb-Y_KL9TOQQrGULh-okq4exA4" />
    <meta name="keywords" content="accounting, outsourcing, UK-based firm, financial solutions, growth support">
    <meta name="description"
        content="Accurex Accounting: A UK-based outsourcing firm offering innovative solutions to help businesses focus on growth and strategic decisions.">
    <meta property="og:title" content="Accurex Accounting - Innovative UK-Based Outsourcing Solutions">
    <meta property="og:description"
        content="Accurex Accounting: A UK-based outsourcing firm offering innovative solutions to help businesses focus on growth and strategic decisions.">
    <meta property="og:image" content="<?php echo base_url('assets/img/logo.png');?>">
    <meta property="og:url" content="https://accurexaccounting.com">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="https://accurexaccounting.com/assets/img/banner_1.png">
    <meta name="twitter:title" content="Accurex Accounting - UK Outsourcing Experts">
    <meta name="twitter:description"
        content="Accurex Accounting: A UK-based outsourcing firm offering innovative solutions to help businesses focus on growth and strategic decisions.">
    <meta name="twitter:image" content="https://accurexaccounting.com/assets/img/logo.png">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://accurexaccounting.com">
    <style>
    body {
        background-color: #f5f7ff;
        font-family: "Poppins", sans-serif;
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
        background-color: #14264d;
        color: #fff;
        line-height: 35px;
        font-weight: 600;
    }

    .btn-purple:hover {
        background-color: #14264d;
        color: #fff;
    }

    .text-purple {
        color: #14264d;
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
    </style>
</head>

<body>

    <div class="container">
        <div class="login-box">
            <h1 class="mb-4 fw-bold text-orange text-center">Forget Password </h1>
            <p class="text-center">Forget Your Password ? Don't Worry We Recover your Password. Just follw the steps.</p>

            <form id="loginForm" action="<?php echo base_url('verify-email');?>" method="POST">
                <div class="mb-3 text-start">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <?php if(isset($error)){?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Error!</strong> <?php echo $error;?>.
                        </div>
                <?php }?>

                <button type="submit" class="btn btn-purple w-100 mt-3">Verify Email</button>

                <div class="mt-3 text-center">
                    <p>Remember Your Password ? <a href="<?php echo base_url('Login');?>" class="text-orange" >Go To Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</body>

</html>