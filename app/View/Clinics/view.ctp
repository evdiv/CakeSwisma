
<?php $this->extend('/Common/home'); ?>

<?php $this->assign('page_title', $clinic['Clinic']['title']); ?>

<?php $this->start('sidebar');

    echo $this->element('sidebar/recent_posts', $posts);
    echo $this->element('sidebar/recent_comments');
    
    $this->end(); ?>

<b><?php echo $clinic['User']['full_name']; ?></b>          
<p><?php echo $clinic['Clinic']['created']; ?></p>   
<hr />
<p><?php echo $clinic['Clinic']['content']; ?></p> 

<?php foreach ($clinic['Review'] as $review): ?>

<p color: #666;">
    <i><b>Review: </b>
    <?php echo $review['content']; ?></i>      
    <?php foreach ($clinic['Comment'] as $comment): ?>
        <?php if($comment['review_id'] == $review['id']): ?>
            <br /><b>Comment: </b><i><?php echo $comment['content']; ?></i>
        <?php endif;?>
    <?php endforeach; ?>
    
    <div style="margin-left: 20px; color: #666;">
    <?php echo $this->element('comments/add_comment', array(
        'review_id' => $review['id'],
        'clinic_id' => $review['clinic_id']
    )); ?>  
    </div>
</p>

<?php endforeach; ?>

<h1>Add your Review</h1>

<?php if($logged_in): ?>

     <?php echo $this->element('reviews/add_review_register'); ?>
<?php else: ?>
     <?php echo $this->element('reviews/add_review_unregister'); ?>
<?php endif; ?>
