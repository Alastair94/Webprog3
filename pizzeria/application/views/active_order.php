<div style="width: 60%; margin: auto">
    <h2>Active Orders: </h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Total Price</th>
                <th>Ordered At</th>
                <th>List of Pizzas</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($orders)) : ?>
                <?php foreach($orders as &$order) : ?>
                <tr>
                    <td><?= $order->first_name.' '.$order->last_name ?></td>
                    <td><?= $order->address ?></td>
                    <td><?= $order->phone ?></td>
                    <td><?= $order->message ?></td>
                    <td><?= $order->total_price ?></td>
                    <td><?= $order->date ?></td>
                    <td><?= anchor('Active_Order_Ctrl/get_order_helper/'.$order->order_id,'View');?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?= anchor('Active_Order_Ctrl/asd','Download all orders in CSV');?>
</div>