<?php $this->extend('/Common/home'); ?>

<?php $this->assign('page_title', $post['Post']['title']); ?>

<?php $this->start('sidebar');

    echo $this->element('sidebar/recent_posts', $posts);
    
$this->end(); ?>

          
<p>
    Written: <?php echo $post['Post']['created']; ?> 
    by <?php echo $this->Html->link($post['User']['full_name'], array(
        'controller' => 'users', 'action' => 'view', $post['User']['id']
    )); ?>
</p>  
<p>Category: <?php echo $post['Category']['title']; ?></p>  
<hr />
<p><?php echo $post['Post']['content']; ?></p>   