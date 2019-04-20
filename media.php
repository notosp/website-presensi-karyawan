<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="assets/img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/sweetalert2/sweetalert2.min.css">

        <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
        <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/js/jquery-clockpicker.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>

        <?php
    	session_start();
        include("akses-file.php");
        ?>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/codebase.js"></script>
        <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="assets/js/pages/op_auth_signin.js"></script>


        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="assets/js/plugins/sweetalert2/es6-promise.auto.min.js"></script>
        <script src="assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>

        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/pages/be_tables_datatables.js"></script>

        <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script>
        <!-- Page JS Code -->
        <script src="assets/js/pages/be_ui_activity.js"></script>
        <script>
            jQuery(function () {
                // Init page helpers (BS Notify Plugin)
                Codebase.helpers('notify');
            });
        </script>
        <script type="text/javascript">
          jQuery(document).ready(function() {
          jQuery("#target-content").load("media.php?pages=kelola-pegawai&page=1");
            jQuery("#pagination li").live('click', function(e){
              e.preventDefault();
              jQuery('#target-content').html('loading...');
              jQuery("#pagination li").removeClass('active');
              jQuery(this).addClass('active');
              var pageNum = this.id;
              jQuery("#target-content").load("media.php?pages=kelola-pegawai&page=" + pageNum);
            });
          });
        </script>
        <script type="text/javascript">
        $('#toggle1').click(function () {
            //check if checkbox is checked
            if ($(this).is(':checked')) {

                $('#foto').removeAttr('disabled'); //enable input

            } else {
                $('#foto').attr('disabled', true); //disable input
            }
          });
        </script>
        <!-- Page JS Code -->
        <script src="assets/js/pages/be_pages_dashboard.js"></script>
        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_blocks_widgets_stats.js"></script>
        <script>
            jQuery(function(){
                // Init page helpers (Easy Pie Chart plugin)
                Codebase.helpers('easy-pie-chart');
            });
        </script>
        <script src="assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/js/plugins/bootstrap-datepicker/js/jquery-clockpicker.min.js"></script>
        <script src="assets/js/jquery.date-dropdowns.min.js"></script>

        <script type="text/javascript">
        $('#single-input').clockpicker({
        	placement: 'bottom',
        	align: 'right',
        	autoclose: true,
        	'default': '20:48'
        });
        $('#single-input2').clockpicker({
        	placement: 'bottom',
        	align: 'right',
        	autoclose: true,
        	'default': '20:48'
        });
        $('#single-input3').clockpicker({
        	placement: 'top',
        	align: 'right',
        	autoclose: true,
        	'default': '20:48'
        });
        $('#single-input4').clockpicker({
        	placement: 'top',
        	align: 'right',
        	autoclose: true,
        	'default': '20:48'
        });
        $('#single-input5').clockpicker({
        	placement: 'top',
        	align: 'right',
        	autoclose: true,
        	'default': '20:48'
        });
        </script>
        <script src="assets/js/pages/be_forms_plugins.js"></script>
        <script>
            jQuery(function(){
                // Init page helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
                Codebase.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
            });
        </script>
        <script type="text/javascript" language="javascript" >
        $(document).ready(function(){

         $('.input-daterange').datepicker({
          todayBtn:'linked',
          format: "yyyy-mm-dd",
          autoclose: true
         });

         fetch_data('no');

         function fetch_data1(is_date_search1, bulan='')
         {
          var dataTable = $('#order_data1').DataTable({
           "processing" : true,
           "serverSide" : true,
           "order" : [],
           "ajax" : {
            url:"fetch-lembur.php",
            type:"POST",
            data:{
             is_date_search1:is_date_search1, bulan:bulan
            }
           }
          });
         }

         function fetch_data(is_date_search, start_date='', end_date='')
         {
          var dataTable = $('#order_data').DataTable({
           "processing" : true,
           "serverSide" : true,
           "order" : [],
           "ajax" : {
            url:"fetch.php",
            type:"POST",
            data:{
             is_date_search:is_date_search, start_date:start_date, end_date:end_date
            }
           }
          });
         }

         $('#search').click(function(){
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          if(start_date != '' && end_date !='')
          {
           $('#order_data').DataTable().destroy();
           fetch_data('yes', start_date, end_date);
          }
          else
          {
           alert("Both Date is Required");
          }
         });

        });
        </script>
    </body>
</html>
