<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
  <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
  <script src="assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

  <!--  Forms Validations Plugin -->
  <script src="assets/js/jquery.validate.min.js"></script>

  <!-- Promise Library for SweetAlert2 working on IE -->
  <script src="assets/js/es6-promise-auto.min.js"></script>

  <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
  <script src="assets/js/moment.min.js"></script>

  <!--  Date Time Picker Plugin is included in this js file -->
  <script src="assets/js/bootstrap-datetimepicker.js"></script>

  <!--  Select Picker Plugin -->
  <script src="assets/js/bootstrap-selectpicker.js"></script>

  <!--  Switch and Tags Input Plugins -->
  <script src="assets/js/bootstrap-switch-tags.js"></script>

  <!-- Circle Percentage-chart -->
  <script src="assets/js/jquery.easypiechart.min.js"></script>

  <!--  Charts Plugin -->
  <script src="assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>

  <!-- Sweet Alert 2 plugin -->
  <script src="assets/js/sweetalert2.js"></script>

  <!-- Vector Map plugin -->
  <script src="assets/js/jquery-jvectormap.js"></script>

  <!-- Wizard Plugin    -->
  <script src="assets/js/jquery.bootstrap.wizard.min.js"></script>

  <!--  Bootstrap Table Plugin    -->
  <script src="assets/js/bootstrap-table.js"></script>

  <!--  Plugin for DataTables.net  -->
  <script src="assets/js/jquery.datatables.js"></script>

  <!--  Full Calendar Plugin    -->
  <script src="assets/js/fullcalendar.min.js"></script>

  <!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
  <script src="assets/js/paper-dashboard23cd.js?v=1.2.1"></script>
  
    <!--   Sharrre Library    -->
    <script src="assets/js/jquery.sharrre.js"></script>
    
  <!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
  <script src="assets/js/demo.js"></script>

  <script type="text/javascript">

    var $table = $('#bootstrap-table');

          function operateFormatter(value, row, index) {
              return [
          '<div class="table-icons">',
                    '<a rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon table-action edit" href="javascript:void(0)">',
                        '<i class="ti-pencil-alt"></i>',
                    '</a>',
          '</div>',
              ].join('');
          }

          $().ready(function(){
              window.operateEvents = {
                  'click .view': function (e, value, row, index) {
                      info = JSON.stringify(row);

                      swal('You click view icon, row: ', info);
                      console.log(info);
                  },
                  'click .edit': function (e, value, row, index) {
                      info = JSON.stringify(row);

                      swal('You click edit icon, row: ', info);
                      console.log(info);
                  },
                  'click .remove': function (e, value, row, index) {
                      console.log(row);
                      $table.bootstrapTable('remove', {
                          field: 'id',
                          values: [row.id]
                      });
                  }
              };

              $table.bootstrapTable({
                  toolbar: ".toolbar",
                  clickToSelect: true,
                  showRefresh: true,
                  search: true,
                  showToggle: true,
                  showColumns: true,
                  pagination: true,
                  searchAlign: 'left',
                  pageSize: 8,
                  clickToSelect: false,
                  pageList: [8,10,25,50,100],

                  formatShowingRows: function(pageFrom, pageTo, totalRows){
                      //do nothing here, we don't want to show the text "showing x of y from..."
                  },
                  formatRecordsPerPage: function(pageNumber){
                      return pageNumber + " rows visible";
                  },
                  icons: {
                      refresh: 'fa fa-refresh',
                      toggle: 'fa fa-th-list',
                      columns: 'fa fa-columns',
                      detailOpen: 'fa fa-plus-circle',
                      detailClose: 'ti-close'
                  }
              });

              //activate the tooltips after the data table is initialized
              $('[rel="tooltip"]').tooltip();

              $(window).resize(function () {
                  $table.bootstrapTable('resetView');
              });
      });

  </script>

</html>
