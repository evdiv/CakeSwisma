<?php echo '<pre>', print_r($answer), '</pre>'; ?>
<h1>Add new Comment</h1>

<?php
echo $this->Form->create('Comment');
echo $this->Form->hidden('user_id', array('default' => '1'));
echo $this->Form->hidden('answer_id', array('default' => $answer_id));

echo $this->Form->input('content', array('rows' => '4'));
echo $this->Form->end('Comment');
?>