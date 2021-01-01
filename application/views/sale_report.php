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
            if(isset($customer_info) || $customer_info != FALSE){
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
               $sl++; }}
        ?>
    
    </tbody>
</table>