<?php $this->extend('/Common/home'); ?>
<?php echo '<pre>', print_r($clinic), '</pre>'; ?>
<?php echo $this->Html->script('show_comments', FALSE); ?>

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

<p style="color: #666;">

    <i><?php echo $review['content']; ?></i> 
       <div>
        <a href="#" class="show_comment"> Add comment</a> <a href="#" class="hide_comment">Hide</a>
        <div class="comment_block">
            <?php $comments_number = 0; ?>
            <?php foreach ($clinic['Comment'] as $comment): ?>
                        
                    <?php if($comment['review_id'] == $review['id']): ?>
                        <br /><b>Comment: </b><i><?php echo $comment['content']; ?></i> 
                        <?php ++$comments_number; ?>
                    <?php endif;?>

            <?php endforeach; ?>

            <div style="margin-left: 20px; color: #666;">
                
            <?php if($logged_in): ?>  
                <?php echo $this->element('comments/add_comment_register', array(
                    'review_id' => $review['id'],
                    'clinic_id' => $review['clinic_id']
                )); ?> 
             <?php else: ?>
                <?php echo $this->element('comments/add_comment_unregister', array(
                    'review_id' => $review['id'],
                    'clinic_id' => $review['clinic_id']
                )); ?> 
             <?php endif; ?>   
                
                
            </div>
                        
        </div>  
        <i>Comments: <?php echo $comments_number; ?></i>
    </div>                 
</p>

<?php endforeach; ?>

<h1>Add your Review</h1>

<?php if($logged_in): ?>

     <?php echo $this->element('reviews/add_review_register'); ?>
<?php else: ?>
     <?php echo $this->element('reviews/add_review_unregister'); ?>
<?php endif; ?>
