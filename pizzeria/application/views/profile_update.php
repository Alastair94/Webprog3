<?php
    if(isset($this->session->userdata['logged_in'])){
        if(isset($this->session->userdata['profile'])){
            $first_name = ($this->session->userdata['profile']['first_name']);
            $last_name = ($this->session->userdata['profile']['last_name']);
            $address = ($this->session->userdata['profile']['address']);
            $phone = ($this->session->userdata['profile']['phone']);
        }
    }
    else{
        header("location: Login_Ctrl");
    }
?>
<div id="profile" style="margin: auto; width: 50%;">
    <?php 
        echo form_open('Profile_Ctrl/update_user_data');
        
        echo form_label('First Name:');
        echo "<br/>";
        echo form_input('first_name',$first_name);
        echo "<br/>";
        
        echo form_label('Last Name:');
        echo "<br/>";
        echo form_input('last_name',$last_name);
        echo "<br/>";
        
        echo form_label('Address:');
        echo "<br/>";
        echo form_input('address',$address);
        echo "<br/>";
        
        echo form_label('Phone number:');
        echo "<br/>";
        echo form_input('phone',$phone);
        echo "<br/>";
        echo "<br/>";
        ?>
        <div style='width: 50%; margin: auto;'>
        <?php
        echo form_submit('submit', 'Update');
        echo form_close();
        ?>
        </div>
    
</div>