<h1>Edit Clinic</h1>


<?php
echo $this->Form->create('Clinic');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('title');
echo $this->Form->input('content', array('rows' => '3'));
echo $this->Form->end('Edit Clinic');
?>