<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search Customer
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>search customer</a></li>
        <!-- <li class="active">Here</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
           <?php if($this->session->flashdata('success')){ ?>
                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            <?php echo $this->session->flashdata('success');?>
                          </div>
                        <?php }?>
            <form class="form-inline" action="#">
              <div class="form-group">
                <label for="email">Mobile No:</label>
                <input type="text" class="form-control" id="mobile_no">
                <small id="error_mobile_no" style="color:red;"></small>
              </div>
              
              <button type="button" onclick="getDetails()" class="btn btn-primary">Search</button>
              <button type="button" onclick="addNew()" class="btn btn-primary" style="float:right;">Add today's service</a>
            </form>

          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Customer Details
          <address id="cs_details">
            
          </address>
        </div>
        
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>S.no.</th>
              <th>Services</th>
              <th>Price</th>
              <th>Date</th>
              
            </tr>
            </thead>
            <tbody id="service_detail">
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td id="total"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
        <!-- <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </tbody></table>
          </div>
        </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <!-- <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div> -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper-->
  