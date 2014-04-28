<h1>Add new Answer</h1>

<?php
echo $this->Form->create('Answer');
echo $this->Form->hidden('user_id', array('default' => '1'));
echo $this->Form->hidden('question_id', array('default' => '2'));

echo $this->Form->input('content', array('rows' => '4'));
echo $this->Form->end('Answer');
?>