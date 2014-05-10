<?php
echo $this->Form->create('Comment');

echo $this->Form->input('User.username');
echo $this->Form->input('User.password');
echo $this->Form->input('User.full_name');
echo $this->Form->input('User.email');

echo $this->Form->hidden('Comment.review_id', array('default' => $review_id));
echo $this->Form->hidden('Comment.clinic_id', array('default' => $clinic_id));

echo $this->Form->input('Comment.content', array('rows' => '9', 'colls' => '36'));
echo $this->Form->end('Add comment');
?>