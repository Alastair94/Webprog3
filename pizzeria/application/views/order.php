<?php
    if(!isset($this->session->userdata['logged_in'])){
        redirect('Login_Ctrl');
    }
?>
<?php if($pizzas == NULL || empty($pizzas)): ?>
    <h2>Jelenleg nincs elkészíthető pizzánk!</h2>
<?php else: ?>
    <div style="width: 60%; margin: auto">
    <table class="table">
        <thead>
            <tr>
                <th>To Cart</th>
                <th>Pizza type</th>
                <th>Size</th>
                <th>Price</th>
                <th>Image</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pizzas as &$pizza) : ?>
            <tr>
                <td><?=anchor('Order_Ctrl/add_to_cart/'.$pizza->id,'Add');?></td>
                <td><?= $pizza->pizza_type ?></td>
                <td><?= $pizza->pizza_size ?></td>
                <td><?= $pizza->pizza_price ?></td>
                <td>
                    <img id="img" src="<?php echo base_url()?>Uploads/img/pizzas/<?=$pizza->pizza_type?><?=$pizza->pizza_size?>">
                </td>
                <?php if($this->session->userdata['logged_in']['user_role'] == "ADMIN") : ?>
                <td><?=anchor('Pizza_Ctrl/delete_pizza/'.$pizza->id,'X');?></td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(!empty($items)) : ?>
    <h2>In Cart: </h2>
    <table class="table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Size</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($items as &$item) : ?>
            <tr>
                <td><?= $item->pizza_type ?></td>
                <td><?= $item->pizza_size ?></td>
                <td><?= $item->pizza_amount ?></td>
                <td><?= $item->total_price ?></td>
                <td><?=anchor('Order_Ctrl/delete_from_incart/'.$item->incart_id,'X');?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div style="width: 40%; margin: auto">
        <?php
            echo form_open('Order_Ctrl/order');
            echo form_input('message','','placeholder="Message"');

            echo form_submit('submit', 'Order!');
            echo form_close();
        ?>
    </div>
    <?php endif; ?>
    </div>
<?php endif; ?>
