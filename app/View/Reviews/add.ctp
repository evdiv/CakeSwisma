<h1>Add new Review</h1>

<?php
echo $this->Form->create('Review');
echo $this->Form->hidden('user_id', array('default' => '1'));
echo $this->Form->hidden('clinic_id', array('default' => '2'));

echo $this->Form->input('content', array('rows' => '4'));
echo $this->Form->end('Review');
?>