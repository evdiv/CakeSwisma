<?php
echo $this->Form->create('Review');

echo $this->Form->input('User.username');
echo $this->Form->input('User.password');
echo $this->Form->input('User.full_name');
echo $this->Form->input('User.email');

echo $this->Form->hidden('Review.clinic_id', array('default' => $clinic['Clinic']['id']));
echo $this->Form->input('Review.content', array('rows' => '4'));
echo $this->Form->end('Add Review');
?>