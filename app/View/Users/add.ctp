
<h1>Add User</h1>


<?php
echo $this->Form->create('User');
echo $this->Form->input('login');
echo $this->Form->input('password');
echo $this->Form->input('full_name');
echo $this->Form->input('email');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('website');

echo $this->Form->input('role_id');

echo $this->Form->end('Add user');
?>