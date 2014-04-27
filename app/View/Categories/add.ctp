<h1>Add new Category</h1>

<?php
echo $this->Form->create('Category');
echo $this->Form->input('title');
echo $this->Form->input('description', array('rows' => '4'));
echo $this->Form->end('Add new Category');
?>