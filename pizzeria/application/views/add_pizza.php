<?php
    if(!(isset($this->session->userdata['logged_in']) && ($this->session->userdata['logged_in']['user_role'] == "ADMIN"))){
        redirect('Login_Ctrl');
    }
?>
<div id="profile" style="margin: auto; width: 50%;">
    <?php 
        echo form_open_multipart('Pizza_Ctrl/insert_pizza');
        
        echo form_label('Pizza type:');
        echo "<br/>";
        echo form_input('pizza_type');
        echo "<br/>";
        
        echo form_label('Size:');
        echo "<br/>";
        $sizes = array(
            '32' => "32cm",
            '48' => "48cm",
            '62' => "62cm"
        );
        echo form_dropdown('pizza_size',$sizes, 32);
        echo "<br/>";
        
        echo form_label('Price');
        echo "<br/>";
        echo form_input('pizza_price');
        echo "<br/>";
        
        echo form_label('Picture:');
        echo "<br/>";
        echo form_upload('file');
        echo "<br/>";
        echo "<br/>";
        ?>
        <div style='width: 50%; margin: auto;'>
        <?php
        echo form_submit('submit', 'Add pizza');
        echo form_close();
        ?>
        </div>
</div>