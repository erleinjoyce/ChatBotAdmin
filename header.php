<?php
// start session of the webpage
session_start();
// call database connection
include 'connection/connection.php';

// if there is admin id in the website session then, we will use it.
if (isset($_SESSION['hitek_admin'])) {
    $admin_id = $_SESSION['hitek_admin'];
    // retrieving the admin name for displaying later
   $sql = "select * from admin_tbl where id = ".$admin_id;
   $res=$con->query($sql);
   if ($res->num_rows>0) {
       while ($admin=$res->fetch_assoc()) {
           $admin_name = $admin['admin_name'];
       }
   }
}else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HiTek-Chatbot : Admin</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="assets/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/datatable/dataTables.checkboxes.css">
    <link href="assets/css/sweetalert.min.css" rel="stylesheet" />
</head>

<!-- for activating links on side bar -->
<?php
$url = $_SERVER['REQUEST_URI'];
$dashboard = "";
$users = "";
$general = "";
$unrecognize = "";
$jokes = "";
$quotes = "";
$banned = "";

if (strpos($url, "index.php") !== false) {
    $dashboard = "active-menu";
}
if (strpos($url, "users.php") !== false) {
    $users = "active-menu";
}
if (strpos($url, "general.php") !== false) {
    $general = "active-menu";
}
if (strpos($url, "unrecognize.php") !== false) {
    $unrecognize = "active-menu";
}
if (strpos($url, "jokes.php") !== false) {
    $jokes = "active-menu";
}
if (strpos($url, "quotes.php") !== false) {
    $quotes = "active-menu";
}
if (strpos($url, "banned.php") !== false) {
    $banned = "active-menu";
}
?>
<!-- for activating links on side bar -->

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color: #202020">
                    <!-- for the upper logo design of the admin, actually there is already a logo but it does not compliment well on the admin, just tell that you will add the logo later on -->
                    <span style="color: white;">HiTek</span>Chatbot</a>
            </div>

            <div class="header-right">

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <!-- <img src="assets/img/user.png" class="img-thumbnail" /> -->

                            <div class="inner-text">
                                <!-- display admin name -->
                                <?php echo $admin_name; ?>
                            <br />
                            <!-- logout link -->
                                <small onclick="logout()" class="log-out">Logout <i class="fa fa-sign-out"></i></small>
                            </div>
                        </div>

                    </li>


                    <li>
                        <!-- go to dashboard -->
                        <a class="<?php echo $dashboard; ?>" href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="<?php echo $users; ?>" href="users.php"><i class="fa fa-users "></i>Users</a>
                    </li>
                    <li>
                        <a class="<?php echo $general; ?>" href="general.php"><i class="fa fa-book"></i>General Questions</a>
                    </li>
                    <li>
                        <a class="<?php echo $jokes; ?>" href="jokes.php"><i class="fa fa-smile-o"></i>Jokes</a>
                    </li>
                    <li>
                        <a class="<?php echo $quotes; ?>" href="quotes.php"><i class="fa fa-heart "></i>Inspirational Quotes</a>
                    </li>
                    <li>
                        <a class="<?php echo $unrecognize; ?>" href="unrecognize.php"><i class="fa fa-question"></i>Unrecognized Words<span class="pull-right badge unrecognizeNotif"></span></a>
                    </li>
                    <li>
                        <a class="<?php echo $banned; ?>" href="banned.php"><i class="fa fa-trash"></i>Banned Words</a>
                    </li>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->


