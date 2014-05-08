<h1>Edit Post</h1>


<?php
echo $this->Form->create('Post');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('title');
echo $this->Form->input('content', array('rows' => '6', 'calls' => '5'));
echo $this->Form->end('Edit Post');
?>