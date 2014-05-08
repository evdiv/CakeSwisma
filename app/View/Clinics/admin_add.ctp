
<h1>Add Clinic</h1>


<?php
echo $this->Form->create('Clinic');
echo $this->Form->input('title');
echo $this->Form->input('content', array('rows' => '18', 'cols' => '48'));
echo $this->Form->end('Add Clinic');
?>