<body>
    <div id="mainWrap">
        <?php $this->load->view('templates/header'); ?>
        <?php 
            if(isset($v)){
                $this->load->view($v);
            }
            else{
                $this->load->view('login_form');
            }

        ?>
        <?php $this->load->view('templates/footer'); ?>
    </div>
</body>