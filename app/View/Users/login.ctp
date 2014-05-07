<h2>Login</h2>

 <?php echo $this->Form->create('User');
        
        echo $this->Form->input('username');
        echo $this->Form->input('password'); ?>

        <?php echo $this->Form->end('Login')?>    
