<h1>Add new Post</h1>

<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->hidden('user_id', array('default' => '1'));
echo $this->Form->input('category_id');
echo $this->Form->input('content', array('rows' => '4'));

echo $this->Form->end('Add new Post');
?>