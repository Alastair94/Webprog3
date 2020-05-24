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
    <?php
        echo "Hello " . $_SESSION['logged_in']['username'];
        echo "<br/>";
        echo "<br/>";
        echo "Your Username is " . $username;
        echo "<br/>";
        echo "Your Email is " . $email;
        echo "<br/>";
        echo "Your Role is " . $user_role;
        echo "<br/>"; 
    ?>
</div>