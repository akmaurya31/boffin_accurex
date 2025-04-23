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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Loader CSS */
        #loader {
            display: none;
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
            margin-top: 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        #successMessage {
            color: green;
            font-size: 16px;
            display: none;
        }

        #errorMessage {
            color: red;
            font-size: 16px;
            display: none;
        }
    </style>
