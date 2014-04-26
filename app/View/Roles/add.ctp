<h1>Add new Role</h1>

<?php 
echo $this->Form->create('Role');
echo $this->Form->input('title');
echo $this->Form->input('description', array('rows' => '3'));

echo $this->Form->end('Add Role');
?>