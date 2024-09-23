<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('images/'.$setting->tab_icon)?>">
    <title><?=$setting->judul_website?></title>
    <!-- Custom CSS -->
    <link href="<?=base_url('assets/extra-libs/c3/c3.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/libs/chartist/dist/chartist.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')?>" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?=base_url('dist/css/style.min.css')?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v8.2.0/ol.css">
<script src="https://cdn.jsdelivr.net/npm/ol@v8.2.0/dist/ol.js"></script>
<style>
     .hebutton{
            width: 30px;
            height: 30px;
            margin-left: auto;
        }
    .buttonhe{
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 10px;
        }
</style>
</head>
<body></body>