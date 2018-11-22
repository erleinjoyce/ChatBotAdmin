<!-- we are just including the header page which will be visible in the whole admin -->
<?php include 'header.php';  ?>
<!-- call databse connection -->
<?php include 'connection/connection.php'; ?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line"><!-- <img src="assets/img/logo.png" style="width:5%;"> --> USERS</h1>
                <h1 class="page-subhead-line">Facebook users who sent message to the page</h1>
            </div>
        </div>
        <div class="content mt-3">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 25%;">FB ID</th>
                                    <th style="width: 25%;">FB Name</th>
                                    <th style="width: 25%;">Date Save</th>
                                    <th style="width: 25%;">Time Save</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select * from users order by date_save, time_save DESC";
                                $res=$con->query($sql);
                                if ($res->num_rows>0) {
                                    while ($data = $res->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $data['fb_id']; ?></td>
                                            <td><?php echo $data['fb_name']; ?></td>
                                            <td><?php echo $data['date_save']; ?></td>
                                            <td><?php echo $data['time_save']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
 <!-- /. PAGE WRAPPER  -->
<?php include 'footer.php' ?>

<style type="text/css">
    textarea{
        resize: none;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.table').DataTable();
    } );
</script>