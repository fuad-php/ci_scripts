<?php
    $total_sale = 0;
    $total_purchase = 0;

    foreach ($total_products_purchase->result() as $purchase_row) {
        $total_purchase += $purchase_row->price;
    }

    foreach($total_products_sale->result() as $sale_row){
        $total_sale += $sale_row->price;
    }
?>

<div class="col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Total Product Purchased</h3>
        </div>
        <div class="panel-body"><?php echo $total_purchase; ?></div>
        <div class="panel-footer">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Serial</th>
                        <th>Time</th>
                        <th>Amount</th>
                    </tr>
                    <?php
                    $sl=1;
                     foreach ($total_products_purchase->result() as $purchase_row) { ?>
                    <tr>
                        <td><?php echo $sl; ?></td>
                        <td><?php echo $purchase_row->time; ?></td>
                        <td><?php echo $purchase_row->price; ?></td>
                    </tr>
                <?php $sl++;} ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Total Product Sales</h3>
        </div>
        <div class="panel-body"><?php echo $total_sale; ?></div>
        <div class="panel-footer">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Serial</th>
                        <th>Time</th>
                        <th>Amount</th>
                    </tr>
                    <?php
                    $sl=1;
                     foreach ($total_products_sale->result() as $sale_row) { ?>
                    <tr>
                        <td><?php echo $sl; ?></td>
                        <td><?php echo $sale_row->time; ?></td>
                        <td><?php echo $sale_row->price; ?></td>
                    </tr>
                    <?php $sl++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
 