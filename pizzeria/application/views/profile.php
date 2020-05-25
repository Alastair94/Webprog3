<?php
    if(isset($this->session->userdata['logged_in'])){
        $username = ($this->session->userdata['logged_in']['username']);
        $email = ($this->session->userdata['logged_in']['email']);
        $user_role = ($this->session->userdata['logged_in']['user_role']);
    }
    else{
        header("location: Login_Ctrl");
    }
?>
<div id="profile">
    <label>Username: </label>
    <?php if(isset($_SESSION['logged_in']['username'])){echo $_SESSION['logged_in']['username'];}else{echo "-";}?>
    <br/>
    <label>First Name: </label>
    <?php if(isset($_SESSION['profile']['first_name'])){echo $_SESSION['profile']['first_name'];}else{echo "-";}?>
    <br/>
    <label>Last Name: </label>
    <?php if(isset($_SESSION['profile']['last_name'])){echo $_SESSION['profile']['last_name'];}else{echo "-";}?>
    <br/>
    <label>Address: </label>
    <?php if(isset($_SESSION['profile']['address'])){echo $_SESSION['profile']['address'];}else{echo "-";}?>
    <br/>
    <label>Phone number: </label>
    <?php if(isset($_SESSION['profile']['phone'])){echo $_SESSION['profile']['phone'];}else{echo "-";}?>
    <br/>
    
    <?php 
        echo form_open('Profile_Ctrl/update_user_data');
        
        echo form_label('First Name:');
        echo "<br/>";
        echo form_input('first_name');
        echo "<br/>";
        
        echo form_label('Last Name:');
        echo "<br/>";
        echo form_input('last_name');
        echo "<br/>";
        
        echo form_label('Address:');
        echo "<br/>";
        echo form_input('address');
        echo "<br/>";
        
        echo form_label('Phone number:');
        echo "<br/>";
        echo form_input('phone');
        echo "<br/>";
        echo "<br/>";
        echo form_submit('submit', 'Update');
        echo form_close();
    ?>
</div>