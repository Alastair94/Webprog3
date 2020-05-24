<?php
    if(isset($this->session->userdata['logged_in'])){
        header("location: Profile_Ctrl/");
    }
?>
<?php
    if(isset($logout_message)){
        echo "<div class='message'>";
        echo $logout_message;
        echo "</div>";
    }
?>

<div id="main">
    <div id="login">
        <h2>Login Form</h2>
        <hr/>
        <?php echo form_open('Login_Ctrl/user_login_process'); ?>
        <?php
            echo "<div class='error_msg'>";
            if(isset($error_message)){
                echo $error_message;
            }
            echo validation_errors();
            echo "</div>";
        ?>
        <label>UserName :</label>
        <input type="text" name="username" id="name" placeholder="username"/><br/><br/>
        <label>Password :</label>
        <input type="password" name="password" id="password" placeholder="**********"/><br/><br/>
        <input type="submit" value="Login" name="submit"/><br/>
        <?php echo form_close(); ?>
    </div>
</div>