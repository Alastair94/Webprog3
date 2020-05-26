<?php
    if(!isset($this->session->userdata['logged_in'])){
        header("location: Login_Ctrl");
    }
?>
<div id="profile">
    <label>Username: </label>
    <b><i><?php if(isset($_SESSION['logged_in']['username'])){echo $_SESSION['logged_in']['username'];}else{echo "-";}?></i></b>
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
    
    <a class="navbar-brand" href="<?php echo base_url(); ?>Profile_Ctrl/show_profile_update">Modify</a>
</div>