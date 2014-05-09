<?php
echo $this->Form->create('Review');
echo $this->Form->hidden('Review.user_id', array('default' => '1'));
echo $this->Form->hidden('Review.clinic_id', array('default' => $clinic['Clinic']['id']));

echo $this->Form->input('Review.content', array('rows' => '4'));
echo $this->Form->end('Review');
?>