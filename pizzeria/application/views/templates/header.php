<header>
    <nav class="navbar navbar-inverse" id="header">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url(); ?>Home_Ctrl">Home</a>
            <?php if(isset($this->session->userdata['logged_in'])) : ?>
                <a class="navbar-brand" href="<?php echo base_url(); ?>Profile_Ctrl">Profile</a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>Order_Ctrl">Order</a>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Login_Ctrl/logout">Logout</a></li>
                </ul>
                <?php if($_SESSION['logged_in']['user_role'] == "ADMIN") : ?>
                    <a class="navbar-brand" style="color: red" href="<?php echo base_url(); ?>Admin_Reg_Ctrl">Manage Users</a>
                    <a class="navbar-brand" style="color: red" href="<?php echo base_url(); ?>Pizza_Ctrl">Add new Pizza</a>
                    <a class="navbar-brand" style="color: red" href="<?php echo base_url(); ?>Active_Order_Ctrl">Active orders</a>
                <?php endif; ?>
            <?php else : ?>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url(); ?>Register_Ctrl"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="<?php echo base_url(); ?>Login_Ctrl"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>