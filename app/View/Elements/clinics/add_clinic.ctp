<h1>Add new Clinic</h1>

<?php
echo $this->Form->create('Clinic');
echo $this->Form->hidden('user_id', array('default' => '1'));
echo $this->Form->input('title');
echo $this->Form->input('content', array('rows' => '4'));
echo $this->Form->end('Add clinic'); 
?>