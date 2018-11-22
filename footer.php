    <div id="footer-sec">
        &copy; 2018 HiTek | Chatbot</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
    <script src="assets/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/datatable/dataTables.bootstrap.min.js"></script>
    <script src="assets/datatable/dataTables.checkboxes.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
</body>
</html>

<script type="text/javascript">
    function logout(){
      // for logging out user, prompt if he or she is sure to logout
      swal({
        title: "Logout?",
        text: "Your account will be logged out.",
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
            url: "php/logout.php",
            type: "POST",
            success: function(result){
              if (result == 1){
                // redirect to login if successfully logged out
                  window.location = 'login.php';
              }else{
                // error box if failed in logging out
                swal({
                  title: 'Failed in Logging Out',
                  text: 'Account not logged out. Please try again.',
                  type: 'error'
                });
              }
            }
           });
         }else{
          // if no
          swal.close();
        }
      });
    }

    refresher();
    window.setInterval(function(){
      refresher();
    }, 3000);

    function refresher() {
      $.ajax({
        type: 'POST',
        url: 'php/refresher.php',
        success: function(response){
          if (response > 0) {
            $(".unrecognizeNotif").text(response);
          }else{
            $(".unrecognizeNotif").text("");
          }
        }
      })
    }
</script>