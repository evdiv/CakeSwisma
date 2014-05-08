<h1>Edit Page</h1>


<?php
echo $this->Form->create('Page');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('title');
echo $this->Form->input('content', array('rows' => '3'));
echo $this->Form->end('Edit Page');
?>