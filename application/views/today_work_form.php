
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Today's work
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('home/customerDetail'); ?>"><i class="fa fa-dashboard"></i> services</a></li>
        <li class="active">Add work</li>
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
                      <h3 class="box-title">Add Work</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php if($customer){ ?>
                    <form role="form" id="todayWork" method="post" action="<?php echo base_url('home/workSubmit'); ?>">
                      
                          
                        
                     
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Name :-</label>
                           <label for="exampleInputEmail1"><?php echo $customer[0]->name ?></label>
                           <input type="hidden" id="customerid" name="customerid" value="<?php echo $customer[0]->id; ?>">
                           <input type="hidden" id="mobile" name="mobile" value="<?php echo $customer[0]->mobile_no; ?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Services</label>
                            <select class="form-control" name="service[]" id="service[]" multiple="">
                              <option value="">select</option>
                              <?php foreach($services as $key=>$value){ ?>
                                <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option> 
                              <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Total Price</label>
                          <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                        </div>
                        
                       
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                    <?php } else{?>
                      <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                              No customer found for this number please add customer.
                          </div>
                    <?php }?>
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
  