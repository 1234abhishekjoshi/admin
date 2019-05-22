<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script type="text/javascript">
    $(function(){
      $('#customer').DataTable();

      $("#customerform").validate({
          rules: {
            name: {
              required: true
            },
            email: {
              required: true,
              email : true
            },
            mobile_no: {
              required: true
            },
            gender : {
              required : true
            }
          }});

      $("#serviceform").validate({
          rules: {
            name: {
              required: true
            },
            category: {
              required: true,
              
            },
            price: {
              required: true
            }
            
          }});

      $("#todayWork").validate({
          rules: {
            'service[]': {
              required: true
            }
            
            
            
          }});
    });

    function getDetails(){
        var mobile_no = $('#mobile_no').val();
      if(mobile_no == ''){
        $('#error_mobile_no').html('');
        $('#error_mobile_no').html('Please enter mobile no');

      }
      else{

        $.ajax({
          method: "POST",
          url : '<?php echo base_url(); ?>home/search',
          data : {
            mobile_no : mobile_no
          },
          dataType : "JSON",
          success : function(data){
            $('#cs_details').html('');
                $('#service_detail').html('');
                $('#total').html('');

              if(data.data.customer.length>0){
                var customer = '<strong>Name : '+data.data.customer[0].name+'</strong><br>Email : '+data.data.customer[0].email+'<br>Mobile No.'+data.data.customer[0].mobile_no+'<br>';
                  $('#cs_details').html(customer);

              }
              if(data.data.works.length>0){
                var works = '';
                var total = 0;
                $.each(data.data.works,function(i,val){
                  var ss_name = val.service_name.map(e => e.name).join(",");
                  works+='<tr><td>'+(i+1)+'</td><td>'+ss_name+'</td><td>'+val.price+'</td><td>'+val.created_at+'</td></tr>';
                  total = Number(total)+Number(val.price);
                });
                $('#service_detail').html(works);
                $('#total').html(total);
              }

          }
        })
      }
    }
    function addNew(){
      var mobile_no = $('#mobile_no').val();
      if(mobile_no == ''){
        $('#error_mobile_no').html('');
        $('#error_mobile_no').html('Please enter mobile no');

      }
      else{

        window.location.href= "/admin/home/todayWork/"+mobile_no+"";
      }
    }
  </script>     
</body>
</html>