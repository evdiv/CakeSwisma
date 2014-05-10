<?php
echo $this->Form->create('Review');
echo $this->Form->hidden('Review.user_id', array('default' => '1'));
echo $this->Form->hidden('Review.clinic_id', array('default' => $clinic['Clinic']['id']));

echo $this->Form->input('vote', array(
    'options' => array('0','1','2','3','4','5','6','7','8','9','10')  
));

echo $this->Form->input('Review.content', array('rows' => '4'));
echo $this->Form->end('Review');
?>