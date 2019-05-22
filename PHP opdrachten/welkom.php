<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responsive vertical menu navigation</title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="main.css">

    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="main.js"></script>
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <style>
        .ad {
            position: absolute;
            width: 300px;
            height: 250px;
            border: 1px solid #ddd;
            left: 50%;
            transform: translateX(-50%);
            top: 250px;
            z-index: 10;
        }
        .ad .close {
            position: absolute;
            font-family: 'ionicons';
            width: 20px;
            height: 20px;
            color: #fff;
            background-color: #999;
            font-size: 20px;
            left: -20px;
            top: -1px;
            display: table-cell;
            vertical-align: middle;
            cursor: pointer;
            text-align: center;
        }
    </style>
    <script type="text/javascript">
        $(function() {
            $('.close').click(function() {
                $('.ad').css('display', 'none');
            })
        })
    </script>


</head>
<body>
<div class="page-header">
    <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Admin Panel.</h1>
</div>
<p>
    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
</p>

<div class="header">
    <div class="logo">
        <i class="fa fa-tachometer"></i>
        <span>Admin menu</span>
    </div>
    <a href="#" class="nav-trigger"><span></span></a>
</div>
<div class="side-nav">
    <div class="logo">
        <a href="welcome.php">
        <i class="fas fa-user-tie"></i>
        <span>Admin menu</span>
    </div>
    <nav>
        <ul>
            <li>
                <a href="users.php">
                    <i class="fas fa-edit"></i>
                    <span>All Users</span>
                </a>
            </li>
            <li>
                <a href="profile.php">

                    <span><i class="fa fa-user"></i></span>
                    <span>Mijn Profiel</span>
                </a>
            </li>
            <li class="active">
                <a href="news.php">
                    <span><i class="fa fa-bar-chart"></i></span>
                    <span>News feed</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<div class="main-content">
    <div class="title">
        Analytics
    </div>
    <div class='ad'>
        <div class="close">
            <i class="ion-ios-close-empty"></i>
        </div>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- kodhus demos -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:250px"
             data-ad-client="ca-pub-8408356133845039"
             data-ad-slot="8154430505"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <div class="main">
        <div class="widget">
            <div class="title">Number of views</div>
            <div class="chart"></div>
        </div>
        <div class="widget">
            <div class="title">Number of likes</div>
            <div class="chart"></div>
        </div>
        <div class="widget">
            <div class="title">Number of comments</div>
            <div class="chart"></div>
        </div>
    </div>
</div>
</body>
</html>