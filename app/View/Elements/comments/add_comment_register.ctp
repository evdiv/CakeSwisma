<?php
echo $this->Form->create('Comment');
echo $this->Form->hidden('user_id', array('default' => '1'));
echo $this->Form->hidden('review_id', array('default' => $review_id));
echo $this->Form->hidden('clinic_id', array('default' => $clinic_id));

echo $this->Form->input('content', array('rows' => '2'));
echo $this->Form->end('Add comment');
?>