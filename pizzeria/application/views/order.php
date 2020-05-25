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
                <th>Pizza type</th>
                <th>Size</th>
                <th>Price</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pizzas as &$pizza) : ?>
            <tr>
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
        <ul>
            <?php if(!empty($items)) : ?>
                <?php foreach($items as &$item) : ?>
            <li>
                
            </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>
