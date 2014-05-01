<?php $this->extend('/Common/home'); ?>

<?php $this->assign('page_title', $question['Question']['title']); ?>

<?php $this->start('sidebar');

    echo $this->element('sidebar/recent_posts', $posts);
    echo $this->element('sidebar/recent_comments');
    
    $this->end(); ?>

<b><?php echo $question['User']['full_name']; ?></b>          
<p><?php echo $question['Question']['created']; ?></p>   
<hr />
<p><?php echo $question['Question']['content']; ?></p> 

<?php foreach ($question['Answer'] as $answer): ?>
<p style="margin-left: 100px; color: #666;">
    <i><b>Answer: </b>
    <?php echo $answer['content']; ?></i>      
    <?php foreach ($question['Comment'] as $comment): ?>
        <?php if($comment['answer_id'] == $answer['id']): ?>
            <br /><b>Comment: </b><i><?php echo $comment['content']; ?></i>
        <?php endif;?>
    <?php endforeach; ?>
    
    <div style="margin-left: 300px; color: #666;">
    <?php echo $this->element('comments/add_comment', array(
        'answer_id' => $answer['id'],
        'question_id' => $answer['question_id']
    )); ?>  
    </div>
</p>

<?php endforeach; ?>

<h1>Add your Answer</h1>

<?php echo $this->element('answers/add_answer'); ?>