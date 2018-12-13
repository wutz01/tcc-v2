 <!-- Footer -->
  <footer class="site-footer">
    <span class="site-footer-legal">© 2017 TCC</span>
    <div class="site-footer-right">
    </div>
  </footer>

  <!-- Core  -->
  <script src="../assets/vendor/jquery/jquery.js"></script>
  <script src="../assets/vendor/bootstrap/bootstrap.js"></script>
  <script src="../assets/vendor/animsition/jquery.animsition.js"></script>
  <script src="../assets/vendor/asscroll/jquery-asScroll.js"></script>
  <script src="../assets/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="../assets/vendor/asscrollable/jquery.asScrollable.all.js"></script>
  <script src="../assets/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

  <!-- Plugins -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

  <script src="../assets/vendor/switchery/switchery.min.js"></script>
  <script src="../assets/vendor/intro-js/intro.js"></script>
  <script src="../assets/vendor/screenfull/screenfull.js"></script>
  <script src="../assets/vendor/slidepanel/jquery-slidePanel.js"></script>

  <script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

  <!-- Scripts -->
  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/site.js"></script>

  <script src="../assets/js/sections/menu.js"></script>
  <script src="../assets/js/sections/menubar.js"></script>
  <script src="../assets/js/sections/sidebar.js"></script>

  <script src="../assets/js/configs/config-colors.js"></script>
  <script src="../assets/js/configs/config-tour.js"></script>

  <script src="../assets/js/components/asscrollable.js"></script>
  <script src="../assets/js/components/animsition.js"></script>
  <script src="../assets/js/components/slidepanel.js"></script>
  <script src="../assets/js/components/switchery.js"></script>
  <script src="../assets/js/components/jquery-placeholder.js"></script>

  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables-fixedheader/dataTables.fixedHeader.js"></script>
  <script src="../assets/vendor/datatables-bootstrap/dataTables.bootstrap.js"></script>
  <script src="../assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
  <script src="../assets/vendor/datatables-tabletools/dataTables.tableTools.js"></script>
  <script src="../assets/js/components/datatables.js"></script>

  <script src="../assets/vendor/select2/select2.min.js"></script>
  <script src="../assets/vendor/bootstrap-select/bootstrap-select.js"></script>
  <script src="../assets/vendor/multi-select/jquery.multi-select.js"></script>

  <script src="../assets/js/components/select2.js"></script>
  <script src="../assets/js/components/bootstrap-select.js"></script>
  <script src="../assets/js/components/multi-select.js"></script>

    <script src="../assets/vendor/bootbox/bootbox.js"></script>
  <script src="../assets/vendor/bootstrap-sweetalert/sweet-alert.js"></script>
  <script src="../assets/vendor/toastr/toastr.js"></script>
  <script src="../assets/vendor/icheck/icheck.min.js"></script>
  <script src="../assets/js/components/icheck.js"></script>  

  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>

  <script type="text/javascript">
  $('.btnChangeOfGrade').on("click",function(){
        var getUsername     = "<?php echo $_SESSION['username']; ?>";
        var getfunctionName = "validatePassword";

        swal({
          title: "Change Grades",
          text: "Input Password:",
          type: "input",
          inputType: "password",
          showCancelButton: true,
          closeOnConfirm: false,
          animation: "slide-from-top",
          inputPlaceholder: "Enter password"
        },
        function(inputValue){
          if (inputValue === false) return false;
          
          if (inputValue === "") {
            swal.showInputError("You need to write something!");
            return false
          }
          $.ajax({
            url:"../Registrar/ajaxRequest.php",
            method:"POST",
            data:{getUsername:getUsername, inputValue:inputValue, getfunctionName:getfunctionName
            },

            success:function(data){
              var getData = data;
              if(getData.trim() == "success"){
                window.location.assign("../Registrar/changeGrades.php");
              }else{
                swal({
                    title: "Error",
                    text: "Incorrect Password",
                    type: "error",
                   closeOnConfirm: false,
                }, function(){
                      location.reload();
                });   
              }
            },
          });
        });
    });
    </script>
</body>

</html>