<?php
    if(!(isset($this->session->userdata['logged_in']) && ($this->session->userdata['logged_in']['user_role'] == "ADMIN"))){
        redirect('Login_Ctrl');
    }
?>
<div id="main" style="display: flex" >
    <div id="login">
        <h2>Register Admin user</h2>
        <hr/>
        <?php
            echo "<div class='error_msg'>";
            echo validation_errors();
            echo "</div>";
            echo form_open('Admin_Reg_Ctrl/new_user_registration');

            echo form_label('Create Username : ');
            echo "<br/>";
            echo form_input('username');
            echo "<div class='error_msg'>";
            if(isset($message_display)){
                echo $message_display;
            }
            echo "</div>";
            echo "<br/>";
            echo form_label('Email : ');
            echo "<br/>";
            $data = array(
                'type' => 'email',
                'name' => 'email_value'
            );
            echo form_input($data);
            echo "<br/>";
            echo "<br/>";
            echo form_label('Password : ');
            echo "<br/>";
            echo form_password('password');
            echo "<br/>";
            echo "<br/>";
            echo form_submit('submit', 'Create');
            echo form_close();
        ?>
    </div>
    <div class="border border-primary" style="margin:100px;">
        <h2>Users</h2>
        <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
            <?php if(!empty($users)) : ?>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?=$user->id?></td>
                <td><?php if($user->user_name == $_SESSION['logged_in']['username']) :?>
                    <b><?= $user->user_name?></b>
                    <?php else : ?>
                    <?= $user->user_name ?>
                    <?php endif; ?>
                </td>
                <td><?=$user->user_email?></td>
                <td><?=$user->user_role?></td>
                <td><?php if($user->id != $_SESSION['logged_in']['id']){ echo anchor('Admin_Reg_Ctrl/delete_user/'.$user->id,'X');} ?></td>
            </tr>
            <?php endforeach; ?>
            <?php endif;?>
        </tbody>
    </table>
    </div>
</div>