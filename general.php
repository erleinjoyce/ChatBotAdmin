<!-- we are just including the header page which will be visible in the whole admin -->
<?php include 'header.php';  ?>
<!-- call databse connection -->
<?php include 'connection/connection.php'; ?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line"><!-- <img src="assets/img/logo.png" style="width:5%;"> --> GENERAL QUESTIONS</h1>
                <button onclick="loadAddModal()" class="btn btn-success btn-sm pull-right" data-target="#addModal" data-toggle="modal"><i class="fa fa-plus"></i> Add </button>
                <h1 class="page-subhead-line">Manage general questions</h1>
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
                                    <th style="width: 42%;">Word</th>
                                    <th style="width: 42%;">Response</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select * from general_question where status = 1 order by question";
                                $res=$con->query($sql);
                                if ($res->num_rows>0) {
                                    while ($data = $res->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $data['question']; ?></td>
                                            <td><?php echo $data['response']; ?></td>
                                            <td style="text-align: center;"><button class="btn btn-primary btn-xs" style="width: 70px;" data-toggle="modal" data-target="#addModal" onclick="editModal(<?php echo $data['id']; ?>)">Edit</button>
                                            <button class="btn btn-danger btn-xs" style="width: 70px;" onclick="deleteWord(<?php echo $data['id']; ?>)">Delete</button></td>
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
            <h4 class="modal-title">Add General Question</h4>
         </div>
          <div class="modal-body" style=" height: 220px;">
             <table style="width: 100%;">
              <input type="hidden" id="id">
               <tr>
                <td style="width: 20%">Word</td>
                <td style="padding-top: 10px;">
                    <textarea class="form-control" id="word" rows="3"></textarea>
                </td>
               </tr>
               <tr>
                <td style="width: 20%">Response</td>
                <td style="padding-top: 10px;">
                    <textarea class="form-control" id="response" rows="3"></textarea>
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
        $(".modal-title").text("Add General Question");
        $("#id").val();
        $("#word").val();
        $("#response").val();
    }

    function save(){
        var task = $(".modal-title").text();
        var word = $("#word").val();
        var response = $("#response").val();

        if ((word == "") || (response == "")) {
            swal({
                type: 'warning',
                title: 'Saving Failed',
                text: 'Word and response are required. Please try again.'
            })
        }else{
            if (task == "Add General Question") {
                add(word,response);
            }else{
                edit(word,response);
            }
        }
    }

    function add(word,response){
        $.ajax({
            type: 'POST',
            url: 'php/generalADD.php',
            data: {word: word, response: response},
            success: function(res){
                if(res == 1){
                    swal({
                        title: 'Adding Successful',
                        text: 'Successfully added general question',
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
      $(".modal-title").text("Edit General Question");

      $.ajax({
        type: 'POST',
        url: 'php/generalLOAD.php',
        dataType: 'JSON',
        data: {id : id},
        success: function(response){
          $("#id").val(id);
          $("#word").val(response.word);
          $("#response").val(response.response);
        }
      })
  }

  function edit(word,response){
    var id = $("#id").val();
        $.ajax({
            type: 'POST',
            url: 'php/generalEDIT.php',
            data: {word: word, id: id, response: response},
            success: function(res){
                if(res == 1){
                    swal({
                        title: 'Update Successful',
                        text: 'Successfully updated general question',
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

    function deleteWord(id) {
        swal({
            title: "Delete general question?",
            text: "This action cannot be undone.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes",
            cancelButtonText: "No, cancel",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function (isConfirm){
             if (isConfirm){
              // if yes
               $.ajax({
                url: "php/bannedDELETE.php",
                data: {id: id},
                type: "POST",
                success: function(result){
                  if (result == 1){
                    swal({
                        title: 'Delete Successful',
                        text: 'Successfully deleted general question',
                        type: 'success'
                    }, function(){
                        location.reload();
                    })
                  }else{
                    swal({
                        title: 'Delete Failed',
                        text: 'Delete failed, please try again',
                        type: 'error'
                    })
                  }
                }
               });
             }else{
              // if no
              swal.close();
            }
          });
    }
</script>