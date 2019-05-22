
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Services
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('home/services'); ?>"><i class="fa fa-dashboard"></i> customers</a></li>
        <li class="active">Update Services</li>
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
                      <h3 class="box-title">Update Service</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="serviceform" method="post" action="<?php echo base_url('home/updateServiceSubmit'); ?>">
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
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo $data[0]->name; ?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category</label>
                            <select class="form-control" name="category" id="category">
                              <option value="">select</option>
                              
                              <option value="male" <?php if($data[0]->category == 'male'){ echo 'selected="selected"'; }?>>Male</option>
                           
                              <option value="female" <?php if($data[0]->category == 'female'){ echo 'selected="selected"'; }?>>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Price</label>
                          <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" value="<?php echo $data[0]->price; ?>">
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
  