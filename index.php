<!-- we are just including the header page which will be visible in the whole admin -->
<?php include 'header.php';  ?>
<!-- call databse connection -->
<?php include 'connection/connection.php'; ?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"><!-- <img src="assets/img/logo.png" style="width:5%;"> --> DASHBOARD</h1>
                        <h1 class="page-subhead-line">Manage chatbot information</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="users.php">
                                <i class="fa fa-users fa-5x"></i>
                                <h5>
                                <?php
                                // for the total number of members
                                $sql = "SELECT COUNT(id) as membercount FROM users";
                                $res = $con->query($sql);
                                if ($res->num_rows>0) {
                                    while ($membercount = $res->fetch_assoc()) {
                                        echo $membercount['membercount']." ";
                                    }
                                }
                                ?>
                                Chat Message(s)</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="general.php">
                                <i class="fa fa-file fa-5x"></i>
                                <h5>
                                <?php
                                $sql = "SELECT COUNT(id) as question FROM general_question";
                                $res = $con->query($sql);
                                if ($res->num_rows>0) {
                                    while ($question = $res->fetch_assoc()) {
                                        echo $question['question']." ";
                                    }
                                }
                                ?>
                                Questions</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="unrecognize.php">
                                <i class="fa fa-copy fa-5x"></i>
                                <h5>
                                <?php
                                $sql = "SELECT COUNT(id) as unrecognize FROM unrecognize";
                                $res = $con->query($sql);
                                if ($res->num_rows>0) {
                                    while ($unrecognize = $res->fetch_assoc()) {
                                        echo $unrecognize['unrecognize']." ";
                                    }
                                }
                                ?>
                                Unrecognize</h5>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">

                                <div id="reviews" class="carousel slide" data-ride="carousel">

                                    <div class="carousel-inner">
                                        <div class="item active">

                                            <div class="col-md-10 col-md-offset-1">
                                                <!-- displayeed qquote, replace it with anythign you want -->
                                                <h4><i class="fa fa-quote-left"></i>This website is intended to manage the chabot integrated to Facebook Messenger.<i class="fa fa-quote-right"></i></h4>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="col-md-10 col-md-offset-1">
                                                <!-- displayeed qquote, replace it with anythign you want -->
                                                <h4><i class="fa fa-quote-left"></i>The chatbot answers the general information about the school. It also generates quotes or jokes for the users.<i class="fa fa-quote-right"></i></h4>
                                            </div>

                                        </div>
                                        <div class="item">
                                            <div class="col-md-10 col-md-offset-1">
                                                <!-- displayeed qquote, replace it with anythign you want -->
                                                <h4><i class="fa fa-quote-left"></i>The chatbot recognizes the words that are not save on the question and will learn from user's settings the response to give next time.<i class="fa fa-quote-right"></i></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!--INDICATORS-->
                                    <ol class="carousel-indicators">
                                        <li data-target="#reviews" data-slide-to="0" class="active"></li>
                                        <li data-target="#reviews" data-slide-to="1"></li>
                                        <li data-target="#reviews" data-slide-to="2"></li>
                                    </ol>
                                    <!--PREVIUS-NEXT BUTTONS-->

                                </div>

                            </div>

                        </div>
                        <!-- /. ROW  -->
                        <hr />
                    </div>
                    <!-- /.REVIEWS &  SLIDESHOW  -->
                    <div class="col-md-4">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Unrecognized Words
                            </div>
                            <div class="panel-body" style="padding: 0px;">
                                <div class="chat-widget-main">

                                    <?php
                                    // top 25 tutorials order by date and time admin uploaded it
                                    $sql = "select question from unrecognize order by date_save desc, time_save desc limit 25";
                                    $res = $con->query($sql);
                                    if ($res->num_rows>0) {
                                        while ($tut=$res->fetch_assoc()) {
                                    ?>
                                    <div class="chat-widget">
                                        <?php echo $tut['question']; ?>
                                    </div>
                                    <?php
                                        }
                                    }else{
                                    ?>
                                    <div class="chat-widget">
                                        No unrecognize words yet.
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="unrecognize.php"><button class="btn btn-success" style="width: 100%;" type="button">View All</button></a>
                            </div>
                        </div>


                    </div>
                    <!--/.Chat Panel End-->
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

<?php include 'footer.php'; ?>
