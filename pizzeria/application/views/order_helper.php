<div style="width: 60%; margin: auto">
    <h2>Pizza List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Pizza type</th>
                <th>Size</th>
                <th>Amount</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($helper)) : ?>
                <?php foreach($helper as &$h) : ?>
                <tr>
                    <td><?= $h->pizza_type ?></td>
                    <td><?= $h->pizza_size ?></td>
                    <td><?= $h->pizza_amount ?></td>
                    <td><?= $h->total_price ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <div style="margin: auto; width:5%; background-color: graytext; text-align: center">
        <?= anchor('Active_Order_Ctrl/','Back');?>
    </div>
</div>