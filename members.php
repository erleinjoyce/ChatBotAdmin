<!-- for member adding, editing and viewing -->
<?php include 'header.php';  ?>
<?php include 'connection/connection.php'; ?>
<link href="assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">MEMBERS</h1>
                        <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-addMember" style="margin-right: 5px;"><i class="fa fa-plus"></i> Add New</button>
                        <h1 class="page-subhead-line">Add / Modify Members</h1>

                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">
                          <!-- table of member information -->
                            <table class="table table-striped table-bordered table-hover" id="memberTbl">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Birthdate</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Username</th>
                                        <th>Registration Date</th>
                                        <th>Badge</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // get all the data from datbase
                                    $sql = "SELECT *, badge as bid, (SELECT badge FROM badge_tbl WHERE badge_id = bid) as badgenem FROM member_tbl ORDER BY firstname, lastname";
                                    $res = $con->query($sql);
                                    if ($res->num_rows>0) {
                                        while ($member=$res->fetch_assoc()) {
                                          // convert data into html rows
                                    ?>
                                    <tr>
                                        <td><?php echo $member['firstname']." ".$member['lastname']; ?></td>
                                        <td><?php echo $member['birthdate']; ?></td>
                                        <td><?php echo $member['address']; ?></td>
                                        <td><?php echo $member['email']; ?></td>
                                        <td><?php echo $member['contact_number']; ?></td>
                                        <td><?php echo $member['username']; ?></td>
                                        <td><?php echo $member['reg_date']; ?></td>
                                        <td><?php echo $member['badgenem']; ?></td>
                                        <td><?php $status = $member['status'];
                                        if ($status == 1) {
                                          // convert numeric value of status into caption
                                          echo "Active";
                                        }else{
                                          echo "Inactive";
                                        }; ?></td>
                                        <!-- if clicked, will open edit modal -->
                                        <td><button class="btn btn-primary" onclick="loadMember(<?php echo $member['member_id']; ?>)" data-toggle="modal" data-target="#modal-editMember"><i class="fa fa-edit"></i></button></td>
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
                <!--/.Row-->

<!-- modals -->
<!-- adding popup -->
  <div class="modal fade in" id="modal-addMember" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
     <iframe name="resultAdd" id="resultAdd" style="display: none;" onload="addModal()"></iframe>
     <!-- form submission -->
       <form enctype="multipart/form-data" action="php/addMember.php" method="POST" class="ADDMemberFrm" target="resultAdd">
       <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Add Member</h4>
         </div>
          <div class="modal-body" style=" height: 480px; overflow-y: scroll;">
            <div class="form-group">
              <label for="addFirstname" class="col-sm-3 control-label">Firstname</label>
              <div class="col-sm-9">
                <!-- firstname input -->
                <input type="text" class="form-control" id="addFirstname" placeholder="Firstname" name="addFirstname" required/>
              </div>
            </div>
          <br>
            <div class="form-group">
              <label for="addMiddlename" class="col-sm-3 control-label">Middlename</label>
              <div class="col-sm-9">
                <!-- middlename input -->
                <input type="text" class="form-control" id="addMiddlename" placeholder="Middlename" name="addMiddlename"/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="addLastname" class="col-sm-3 control-label">Lastname</label>
              <div class="col-sm-9">
                <!-- lastname input -->
                <input type="text" class="form-control" id="addLastname" placeholder="Lastname" name="addLastname" required/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="addBirthdate" class="col-sm-3 control-label">Birthdate</label>
              <div class="col-sm-9">
                <!-- birthdate input, will change this to datepicker, let them see this first -->
                <input type="text" class="form-control" id="addBirthdate" placeholder="Birthdate" name="addBirthdate" required/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="addAddress" class="col-sm-3 control-label">Address</label>
              <div class="col-sm-9">
                <!-- address input -->
                <input type="text" class="form-control" id="addAddress" placeholder="Address" name="addAddress"/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="addEmail" class="col-sm-3 control-label">Email Address</label>
              <div class="col-sm-9">
                <!-- email input -->
                <input type="text" class="form-control" id="addEmail" placeholder="Email Address" name="addEmail"/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="addContact" class="col-sm-3 control-label">Contact</label>
              <div class="col-sm-9">
                <!-- contact number input -->
                <input type="number" class="form-control" id="addContact" placeholder="Contact Number" name="addContact" required/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="addUsername" class="col-sm-3 control-label">Username</label>
              <div class="col-sm-9">
                <!-- username input -->
                <input type="text" class="form-control" id="addUsername" placeholder="Username" name="addUsername" required/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="addPassword" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-9">
                <!-- password input -->
                <input type="password" class="form-control" id="addPassword" placeholder="Password" name="addPassword"/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="addBadge" class="col-sm-3 control-label">Badge</label>
              <div class="col-sm-9">
                <!-- selection of badge -->
                <select class="form-control" id="addBadge" name="addBadge" required>
                  <option value="0">None</option>
                  <?php
                  // get all badge from database
                  $sql = "SELECT badge_id, badge FROM badge_tbl ORDER BY badge";
                  $res = $con->query($sql);
                  if ($res->num_rows>0) {
                    while ($badge=$res->fetch_assoc()) {
                      echo "<option value='".$badge['badge_id']."'>".$badge['badge']."</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="addStatus" class="col-sm-3 control-label">Status</label>
              <div class="col-sm-9">
                <!-- selection of member status -->
                <select class="form-control" id="addStatus" name="addStatus" required>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
            </div>
          </div>         
          <div class="modal-footer">
            <!-- clear fields and close prompt -->
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="clearImage()">Close</button>
              <!-- sve info -->
              <button type="button" class="btn btn-primary" onclick="addWord1()">Save</button>
            </div>
       </div>
       </form>
    </div>
  </div>

<!-- popup for editing info -->
    <div class="modal fade in" id="modal-editMember" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
     <iframe name="resultEdit" id="resultEdit" style="display: none;" onload="editModal()"></iframe>
     <!-- form for ediitng -->
       <form enctype="multipart/form-data" action="php/editMember.php" method="POST" class="EDITMemberFrm" target="resultEdit">
        <input type="hidden" id="member_id" name="member_id">
       <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Edit Member</h4>
         </div>
          <div class="modal-body" style=" height: 480px; overflow-y: scroll;">
            <div class="form-group">
              <label for="editFirstname" class="col-sm-3 control-label">Firstname</label>
              <div class="col-sm-9">
                <!-- firsntmae input -->
                <input type="text" class="form-control" id="editFirstname" placeholder="Firstname" name="editFirstname" required/>
              </div>
            </div>
          <br>
            <div class="form-group">
              <label for="editMiddlename" class="col-sm-3 control-label">Middlename</label>
              <div class="col-sm-9">
                <!-- middlename input -->
                <input type="text" class="form-control" id="editMiddlename" placeholder="Middlename" name="editMiddlename"/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="editLastname" class="col-sm-3 control-label">Lastname</label>
              <div class="col-sm-9">
                <!-- lastname input -->
                <input type="text" class="form-control" id="editLastname" placeholder="Lastname" name="editLastname" required/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="editBirthdate" class="col-sm-3 control-label">Birthdate</label>
              <div class="col-sm-9">
                <!-- bdate input, will change this to datepicker later on -->
                <input type="text" class="form-control" id="editBirthdate" placeholder="Birthdate" name="editBirthdate" required/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="editAddress" class="col-sm-3 control-label">Address</label>
              <div class="col-sm-9">
                <!-- address input -->
                <input type="text" class="form-control" id="editAddress" placeholder="Address" name="editAddress"/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="editEmail" class="col-sm-3 control-label">Email Address</label>
              <div class="col-sm-9">
                <!-- email input -->
                <input type="text" class="form-control" id="editEmail" placeholder="Email Address" name="editEmail"/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="editContact" class="col-sm-3 control-label">Contact</label>
              <div class="col-sm-9">
                <!-- contact input -->
                <input type="number" class="form-control" id="editContact" placeholder="Contact Number" name="editContact" required/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="editUsername" class="col-sm-3 control-label">Username</label>
              <div class="col-sm-9">
                <!-- username input -->
                <input type="text" class="form-control" id="editUsername" placeholder="Username" name="editUsername" required/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="editPassword" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-9">
                <!-- password input -->
                <input type="password" class="form-control" id="editPassword" placeholder="Password" name="editPassword"/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="editBadge" class="col-sm-3 control-label">Badge</label>
              <div class="col-sm-9">
                <!-- badge selection -->
                <select class="form-control" id="editBadge" name="editBadge" required>
                  <option value="0">None</option>
                  <?php
                  // get all badge from databse
                  $sql = "SELECT badge_id, badge FROM badge_tbl ORDER BY badge";
                  $res = $con->query($sql);
                  if ($res->num_rows>0) {
                    while ($badge=$res->fetch_assoc()) {
                      echo "<option value='".$badge['badge_id']."'>".$badge['badge']."</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="editStatus" class="col-sm-3 control-label">Status</label>
              <div class="col-sm-9">
                <!-- status selection -->
                <select class="form-control" id="editStatus" name="editStatus" required>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
            </div>
          </div>         
          <div class="modal-footer">
            <!-- close the edit modal -->
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <!-- edit data -->
              <button type="button" class="btn btn-primary" onclick="editMember()">Save</button>
            </div>
       </div>
       </form>
    </div>
  </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

<?php include 'footer.php'; ?>
<script src="assets/js/bootstrap-fileupload.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  // have the table with sorting, searching and pagination
    var table = $('#memberTbl').DataTable({
        order: [[0, 'asc']]
    });

    $('#addBirthdate').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    $('#editBirthdate').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
} );

// clearfileds
function clearImage(){
    $("#addFirstname").val("");
    $("#addMiddlename").val("");
    $("#addLastname").val("");
    $("#addBirthdate").val("");
    $("#addAddress").val("");
    $("#addEmail").val("");
    $("#addContact").val("");
    $("#addUsername").val("");
    $("#addPassword").val("");
    $("#addBadge").val("0");
    $("#addStatus").val("1");
}

// add member information
function addWord1(){
    var addFirstname = $("#addFirstname").val();
    var addLastname = $("#addLastname").val();
    var addBirthdate = $("#addBirthdate").val();
    var addEmail = $("#addEmail").val();
    var addContact = $("#addContact").val();
    var addUsername = $("#addUsername").val();
    var addPassword = $("#addPassword").val();
    var addStatus = $("#addStatus").val();
    if ((addFirstname == "") || (addLastname == "") || (addBirthdate == "") || (addEmail == "") || (addContact == "") || (addUsername == "") || (addPassword == "") || (addStatus == "")){
      // check if fields are empty. if yes, have the alert box
        swal({
        title: 'Adding New Member Failed',
        text: 'Firstname, lastname, birthdate, email, contact number, username, password and status are required.',
        type: 'error'
      });
    }else{
      // if not, save the information
        $('.ADDMemberFrm').submit();
    }
}

function addModal(){
  // catching the add member result
    var myIFrame = document.getElementById("resultAdd");
    var content = document.getElementById("resultAdd").contentWindow.document.getElementById('divResultX').innerHTML;
    if (content == 0){
      // adding failed
    swal({
            title: 'Adding Failed',
            text: 'Something went wrong. Please try again.',
            type: 'error'
          });
    }else if(content == 1){
      // added, refresh page
     swal({
            title: 'Successfully Added',
            text: 'Member was successfully added.',
            type: 'success'
          }, function(){
            window.location = 'members.php';
          });
    }
   }

function loadMember(id){
  // retrieve member info using id and display on corresponding textboxes
    $.ajax({
      url: "php/loadMember.php",
      data: {"member_id": id},
      type: "POST",
      success: function(result){
        $("#member_id").val(id);
        var firstname = result.split("*****")[0];
        var middlename = result.split("*****")[1];
        var lastname = result.split("*****")[2];
        var birthdate = result.split("*****")[3];
        var address = result.split("*****")[4];
        var email = result.split("*****")[5];
        var contact_number = result.split("*****")[6];
        var username = result.split("*****")[7];
        var password = result.split("*****")[8];
        var badge = result.split("*****")[9];
        var status = result.split("*****")[10];

        $("#editFirstname").val(firstname);
        $("#editMiddlename").val(middlename);
        $("#editLastname").val(lastname);
        $("#editBirthdate").val(birthdate);
        $("#editAddress").val(address);
        $("#editEmail").val(email);
        $("#editContact").val(contact_number);
        $("#editUsername").val(username);
        $("#editPassword").val(password);
        $("#editBadge").val(badge);
        $("#editStatus").val(status);
      }
  });
}

function editMember(){
  // editing member info
    var editFirstname = $("#editFirstname").val();
    var editLastname = $("#editLastname").val();
    var editBirthdate = $("#editBirthdate").val();
    var editEmail = $("#editEmail").val();
    var editContact = $("#editContact").val();
    var editUsername = $("#editUsername").val();
    var editPassword = $("#editPassword").val();
    var editStatus = $("#editStatus").val();

    if ((editFirstname == "") || (editLastname == "") || (editBirthdate == "") || (editEmail == "") || (editContact == "") || (editUsername == "") || (editPassword == "") || (editStatus == "")){
      // check if fields are empty. if yes, display error box
        swal({
        title: 'Updating Member Failed',
        text: 'Firstname, lastname, birthdate, email, contact number, username, password and status are required.',
        type: 'error'
      });
    }else{
      // ifno
        $('.EDITMemberFrm').submit();
    }
}

function editModal(){
  // catching result of editing data
    var myIFrame = document.getElementById("resultEdit");
    var content = document.getElementById("resultEdit").contentWindow.document.getElementById('divResultX').innerHTML;
    if (content == 0){
      // if failed
    swal({
            title: 'Editing Failed',
            text: 'Something went wrong. Please try again.',
            type: 'error'
          });
    }else if(content == 1){
      // if ok
     swal({
            title: 'Successfully Edited',
            text: 'Member was successfully edited.',
            type: 'success'
          }, function(){
            window.location = 'members.php';
          });
    }
   }
</script>