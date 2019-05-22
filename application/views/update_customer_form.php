
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customers
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('home/viewCustomer'); ?>"><i class="fa fa-dashboard"></i> customers</a></li>
        <li class="active">Update Customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Update Customer</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="customerform" method="post" action="<?php echo base_url('home/updateCustomerSubmit'); ?>">
                      <?php if($this->session->flashdata('error')){ ?>
                          <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            <?php echo $this->session->flashdata('error');?>
                          </div>
                        <?php }?>
                      <?php if($this->session->flashdata('success')){ ?>
                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            <?php echo $this->session->flashdata('success');?>
                          </div>
                        <?php }?>
                        <input type="hidden" id="id" name="id" value="<?php echo $data[0]->id; ?>">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo $data[0]->name ?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $data[0]->email ?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Mobile No.</label>
                          <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No." value="<?php echo $data[0]->mobile_no ?>" readOnly>
                        </div>
                        
                        <div class="checkbox">
                          <label>
                            <input type="radio" id="gender" name="gender" value="male" <?php if($data[0]->gender=='male'){ echo 'checked="checked"';} ?>> Male
                          </label>
                          <label>
                            <input type="radio" id="gender" name="gender" value="female" <?php if($data[0]->gender=='female'){ echo 'checked="checked"';} ?>> Female
                          </label>
                        </div>
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->

                  

                  

                 

                </div>
            </div>
          </div>
        </div>
    </div>          

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper-->
  