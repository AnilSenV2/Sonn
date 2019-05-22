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
        All usernames
    </div>

    <p>Zoek op id</p>

    <?php

    $host = "localhost";
    $user = "root";
    $database = "login";

    $id = "";
    $username = "";
    $password = "";
    $created_at = "";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // connect to mysql database
    try{
        $connect = mysqli_connect($host, $user, "", $database);
    } catch (mysqli_sql_exception $ex) {
        echo 'Error';
    }

    // get values from the form
    function getPosts()
    {
        $posts = array();
        $posts[0] = $_POST['id'];
        $posts[1] = $_POST['username'];
        $posts[2] = $_POST['password'];
        $posts[3] = $_POST['created_at'];
        return $posts;
    }

    // Search

    if(isset($_POST['search']))
    {
        $data = getPosts();

        $search_Query = "SELECT * FROM users WHERE id = $data[0]";

        $search_Result = mysqli_query($connect, $search_Query);

        if($search_Result)
        {
            if(mysqli_num_rows($search_Result))
            {
                while($row = mysqli_fetch_array($search_Result))
                {
                    $id = $row['id'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $created = $row['created_at'];
                }
            }else{
                echo 'No Data For This Id';
            }
        }else{
            echo 'Result Error';
        }
    }

    // Delete
    if(isset($_POST['delete']))
    {
        $data = getPosts();
        $delete_Query = "DELETE FROM `users` WHERE `id` = $data[0]";
        try{
            $delete_Result = mysqli_query($connect, $delete_Query);

            if($delete_Result)
            {
                if(mysqli_affected_rows($connect) > 0)
                {
                    echo 'Data Deleted';
                }else{
                    echo 'Data Not Deleted';
                }
            }
        } catch (Exception $ex) {
            echo 'Error Delete '.$ex->getMessage();
        }
    }

    // Edit
    if(isset($_POST['update']))
    {
        $data = getPosts();
        $update_Query = "UPDATE `users` SET `username`='$data[1]',`password`='$data[2]',`created_at`=$data[3] WHERE `id` = $data[0]";
        try{
            $update_Result = mysqli_query($connect, $update_Query);

            if($update_Result)
            {
                if(mysqli_affected_rows($connect) > 0)
                {
                    echo 'Data Updated';
                }else{
                    echo 'Data Not Updated';
                }
            }
        } catch (Exception $ex) {
            echo 'Error Update '.$ex->getMessage();
        }
    }



    ?>

    <form action="users.php" method="post">
        <input type="number" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br>
        <input type="text" name="username" placeholder="Username" value="<?php echo $username;?>"><br><br>
        <input type="text" name="password" placeholder="password" value="<?php echo $password;?>"><br><br>
        <input type="datetime-local" name="created_at" placeholder="created at" value="<?php echo $created_at;?>"><br><br>
        <div>
            <!-- Input For Edit Values -->
            <input type="submit" name="update" value="Update">

            <!-- Input For Clear Values -->
            <input type="submit" name="delete" value="Delete">

            <!-- Input For Find Values With The given ID -->
            <input type="submit" name="search" value="Find">
        </div>
    </form>

</body>
</html>