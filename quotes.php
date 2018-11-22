<!-- we are just including the header page which will be visible in the whole admin -->
<?php include 'header.php';  ?>
<!-- call databse connection -->
<?php include 'connection/connection.php'; ?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line"><!-- <img src="assets/img/logo.png" style="width:5%;"> --> QUOTES</h1>
                <button onclick="loadAddModal()" class="btn btn-success btn-sm pull-right" data-target="#addModal" data-toggle="modal"><i class="fa fa-plus"></i> Add </button>
                <h1 class="page-subhead-line">Manage quotes responses</h1>
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
                                    <th style="width: 90%;">Content</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select * from creative where status = 1 and type = 'quotes' order by content";
                                $res=$con->query($sql);
                                if ($res->num_rows>0) {
                                    while ($data = $res->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $data['content']; ?></td>
                                            <td style="text-align: center;"><button class="btn btn-primary btn-sm" style="width: 70px;" data-toggle="modal" data-target="#addModal" onclick="editModal(<?php echo $data['id']; ?>)">Edit</button></td>
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
    <!-- Add Modal Class -->
  <div class="modal fade in" id="addModal" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Quotes Responses</h4>
         </div>
          <div class="modal-body" style=" height: 150px;">
             <table style="width: 100%;">
              <input type="hidden" id="id">
               <tr>
                <td style="width: 20%">Quote</td>
                <td style="padding-top: 10px;">
                    <textarea class="form-control" id="word" rows="4"></textarea>
                </td>
               </tr>
             </table>
          </div>
          <div class="modal-footer">
            <!-- clear fields and close modal -->
              <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
              <!-- add student -->
              <button type="button" class="btn btn-success" onclick="save()">Save</button>
          </div>
       </div>
       <!-- </form> -->
    </div>
  </div>
  <!-- Close Modal -->
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

    function loadAddModal(){
        $(".modal-title").text("Add Quotes Responses");
        $("#id").val();
        $("#word").val();
    }

    function save(){
        var task = $(".modal-title").text();
        var word = $("#word").val();

        if ((word == "")) {
            swal({
                type: 'warning',
                title: 'Saving Failed',
                text: 'Quote is required. Please try again.'
            })
        }else{
            if (task == "Add Quotes Responses") {
                add(word);
            }else{
                edit(word);
            }
        }
    }

    function add(word){
        $.ajax({
            type: 'POST',
            url: 'php/quotesADD.php',
            data: {word: word},
            success: function(res){
                if(res == 1){
                    swal({
                        title: 'Adding Successful',
                        text: 'Successfully added quote',
                        type: 'success'
                    }, function(){
                        location.reload();
                    })
                }else{
                    swal({
                        title: 'Adding Failed',
                        text: 'Adding failed, please try again',
                        type: 'error'
                    })
                }
            }
        });
    }

    function editModal(id){
      loadAddModal();
      $(".modal-title").text("Edit Jokes Responses");

      $.ajax({
        type: 'POST',
        url: 'php/jokesLOAD.php',
        dataType: 'JSON',
        data: {id : id},
        success: function(response){
          $("#id").val(id);
          $("#word").val(response.word);
        }
      })
  }

  function edit(word){
    var id = $("#id").val();
        $.ajax({
            type: 'POST',
            url: 'php/jokesEDIT.php',
            data: {word: word, id: id},
            success: function(res){
                if(res == 1){
                    swal({
                        title: 'Update Successful',
                        text: 'Successfully updated quote',
                        type: 'success'
                    }, function(){
                        location.reload();
                    })
                }else{
                    console.log(res)
                    swal({
                        title: 'Update Failed',
                        text: 'Update failed, please try again',
                        type: 'error'
                    })
                }
            }
        });
    }
</script>