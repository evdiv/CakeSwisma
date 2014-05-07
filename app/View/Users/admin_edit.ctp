<h1>Edit User</h1>


<?php
echo $this->Form->create('User');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('full_name');
echo $this->Form->input('email');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('website');
echo $this->Form->input('role', array(
    'options' => array('user' => 'User', 'admin' => 'Administrator')  
));
echo $this->Form->end('Edit user');
?>