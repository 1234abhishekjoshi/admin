
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Packages
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('home/packageDetail'); ?>"><i class="fa fa-dashboard"></i> packages</a></li>
        <li class="active">Add Package</li>
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
                      <h3 class="box-title">Add New Package</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="packageForm" method="post" action="<?php echo base_url('home/packageUpdateSubmit'); ?>">
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
                        <input type="hidden" name="id" value="<?php echo $data[0]->id; ?>">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" id="name" value="<?php echo $data[0]->name; ?>" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Services</label><br>
                           <?php 
                              $ss = explode(',', $data[0]->services_id);
                           foreach ($services as $key => $value) { 
                              if(in_array($value->id, $ss)){
                            ?>
                            <input type="checkbox" name="services[]" onchange="getPrice(event)" value="<?php echo $value->id; ?>" checked="checked"><?php echo $value->name; ?>

                          <?php }else{ ?>
                              <input type="checkbox" name="services[]" onchange="getPrice(event)" value="<?php echo $value->id; ?>" ><?php echo $value->name; ?>
                          <?php }} ?>
                          <input type="hidden" name="services_price" value='<?php echo json_encode($services); ?>'> 

                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Price</label>
                          <input type="text" class="form-control" id="price" value="<?php echo $data[0]->price; ?>" name="price" placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Discount</label>
                          <input type="text" class="form-control" id="discount" value="<?php echo $data[0]->discount; ?>" name="discount" placeholder="Enter discount">
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
  <script type="text/javascript">
     var total_price = document.getElementById('price').value;
    
    function getPrice(event){
      var id = event.target.value;
      var services_price = JSON.parse($('input[name="services_price"]').val());
      var price = '';
      services_price.filter(function(e){
          if(e.id == id){
            price = e.price;
          }
        });
     
     
      if(event.target.checked){
        total_price=Number(total_price)+Number(price);
      }
      else{
        total_price=Number(total_price)-Number(price);
      }
      $('#price').val(total_price);
    }
  </script>