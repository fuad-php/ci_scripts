
<div class="row">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet">
<br>
<div id="color_change" class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="<?php echo base_url('Welcome/customer_result');?>">
        <div class="box-body">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Customer Name</label>
                    <select name="customer_id" class="form-control js-example-basic-single">
                        <?php foreach ($customer->result() as $row) { ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <br>
                <button id="submit_button" type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4"></div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            
        </div>
    </form>
</div>


<table class="table table-hover">
    <tbody>
        <tr>
            <th>Serial</th>
            <th>Customer Name</th>
            <th>Product Name</th>
            <th>Transection Type</th>
            <th>Product Price</th>
            <th>Date</th>
        </tr>
        <?php 
            if(isset($customer_info) && $customer_info != FALSE){
                $sl=1;
                foreach ($customer_info->result() as $value) { 

        ?>
        <tr>
            <td><?php echo $sl;?></td>
            <td><?php echo $value->cust_name;?></td>
            <td><?php if($value->ttype==1){echo $value->name;}else{echo $value->name;}?></td>
            <td><?php if($value->ttype==1){echo 'Sales';}else{echo 'Purchase';}?></td>
            <td><?php if($value->ttype==1){echo $value->price;}else{echo $value->price;}?></td>
            <td><?php  if($value->ttype==1){echo $value->created_at;}else{echo $value->created_at;}?></td>
        </tr>
        <?php
                   $sl++; 
               }
           }
        ?>
    
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>        
</div>