<body>
    <nav class="navbar navbar-inverse" id="header">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>home">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url(); ?>user_authentication/user_registration_show"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                    <li><a href="<?php echo base_url(); ?>user_authentication/user_login_show"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>