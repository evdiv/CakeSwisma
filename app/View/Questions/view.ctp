<h1><?php echo $question['Question']['title']; ?></h1>

<b><?php echo $question['User']['full_name']; ?></b>          
<p><?php echo $question['Question']['created']; ?></p>   
<hr />
<p><?php echo $question['Question']['content']; ?></p> 

<?php foreach ($question['Answer'] as $answer): ?>
<p style="margin-left: 100px; color: #666;">
    <i><b>Answer: </b>
    <?php echo $answer['content']; ?></i>
    <?php echo $this->Html->link('add comment', array('controller' => 'comments', 'action' => 'add', $answer['id'])); ?>

</p>

<?php endforeach; ?>

<h1>Add your Answer</h1>

<?php
echo $this->Form->create('Answer');
echo $this->Form->hidden('user_id', array('default' => '1'));
echo $this->Form->hidden('question_id', array('default' => $question['Question']['id']));

echo $this->Form->input('content', array('rows' => '4'));
echo $this->Form->end('Answer');
?>