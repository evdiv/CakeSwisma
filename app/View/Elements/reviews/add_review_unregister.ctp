<?php
echo $this->Form->create('Review');

echo $this->Form->input('User.username');
echo $this->Form->input('User.password');
echo $this->Form->input('User.full_name');
echo $this->Form->input('User.email');

echo $this->Form->hidden('Review.clinic_id', array('default' => $clinic['Clinic']['id']));
echo $this->Form->input('vote', array(
    'options' => array('0','1','2','3','4','5','6','7','8','9','10')  
));
echo $this->Form->input('Review.content', array('rows' => '9', 'colls' => '36'));
echo $this->Form->end('Add Review');
?>