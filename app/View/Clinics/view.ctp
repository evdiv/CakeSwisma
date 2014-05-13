<?php $this->extend('/Common/home'); ?>
<?php echo $this->Html->script('show_comments', FALSE); ?>

<?php //echo '<pre>',  print_r($data), '</pre>'; ?>
<?php //echo '<pre>', print_r($clinic), '</pre>'; ?>

<?php $this->assign('page_title', $clinic['Clinic']['title']); ?>

<?php $this->start('sidebar');

    echo $this->element('sidebar/recent_posts', $posts);
    //echo $this->element('sidebar/recent_comments');
    
$this->end(); ?>

 
<hr />
<div class="row">
    <div class="col-md-2"> 
      <?php echo ($clinic['Clinic']['image']) ? $this->Html->image('/files/' . 
                $clinic['Clinic']['image'], array('width' => 100, 'height' => 100, 'class' => 'img-rounded')) 
                : $this->Html->image('/files/' . 
                'empty.png', array('width' => 100, 'height' => 100, 'class' => 'img-rounded')) ; ?>  
    </div>    
    <div class="col-md-8"> 
        <?php echo $clinic['Clinic']['content']; ?>
    </div>
    <div class="col-md-2"> 
        Clinic Rank
     <?php if($clinic['Clinic']['rank'] > 6): ?>
        <h1 class="text-success">
     <?php elseif ($clinic['Clinic']['rank'] < 4): ?>
        <h1 class="text-danger">
     <?php else: ?>
        <h1 class="text-warning">
     <?php endif; ?>
            
     <?php echo $clinic['Clinic']['rank']; ?>
        </h1> 
    </div>   
    
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <div class="well">
            Address: <?php echo $clinic['Clinic']['address']; ?> 
        </div>   
    </div> 
    <div class="col-md-4">
        <div class="well">
            Phone: <?php echo $clinic['Clinic']['phone']; ?>
        </div>    
    </div>
</div>
<hr />
<div class="row">
      <div class="col-md-8  col-md-offset-2"> 
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
      </div>
</div>                
                



<h2>Add your Review</h2>

<a href="#" class="show_comment"> Show form</a> <a href="#" class="hide_comment">Hide form</a>
        <div class="comment_block">
<?php if($logged_in): ?>

     <?php echo $this->element('reviews/add_review_register'); ?>
<?php else: ?>
     <?php echo $this->element('reviews/add_review_unregister'); ?>
<?php endif; ?>
</div>