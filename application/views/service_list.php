<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Services
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> services</a></li>
        <!-- <li class="active">Here</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <a href="<?php echo base_url('home/addService'); ?>" class="btn btn-primary">Add New Service</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
              <table id="customer" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td>Name</td>
                    <td>Category</td>
                    <td>Price</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data as $key => $value) { ?>
                    <tr>
                      <td><?php echo $value->name; ?></td>
                      <td><?php echo $value->category; ?></td>
                      <td><?php echo $value->price; ?></td>
                     <td><a href="<?php echo base_url('home/updateService/'.$value->id);?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<!-- <a href="<?php echo base_url('home/deleteService/'.$value->id);?>"><i class="fa fa-trash"></i></a> --></td>
                    </tr>

                       <?php               } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>          

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper-->
  