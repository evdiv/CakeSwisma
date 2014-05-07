<h1>Register</h1>


<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('full_name');
echo $this->Form->input('email');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('website');
echo $this->Form->end('Add user');
?> 