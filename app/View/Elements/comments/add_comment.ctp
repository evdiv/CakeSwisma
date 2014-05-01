<?php
echo $this->Form->create('Comment');
echo $this->Form->hidden('user_id', array('default' => '1'));
echo $this->Form->hidden('answer_id', array('default' => $answer_id));
echo $this->Form->hidden('question_id', array('default' => $question_id));

echo $this->Form->input('content', array('rows' => '2'));
echo $this->Form->end('Add comment');
?>