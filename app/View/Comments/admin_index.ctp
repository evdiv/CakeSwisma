<?php //echo '<pre>', print_r($comments), '</pre>'; ?>
<h1>Comments</h1>

<table class="table table-striped table-hover ">
    <tr>
	<th><?php echo $this->Paginator->sort('id'); ?></th>
        <th>Review</th>
        <th>Comment</th>
	<th><?php echo $this->Paginator->sort('created'); ?></th>        
        <th>Actions</th>          
    </tr>


    <?php foreach ($comments as $comment): ?>
    <tr>
       <td><?php echo $comment['Comment']['id']; ?></td>
        
       <td><?php echo $this->Html->link(substr($comment['Review']['content'], 0, 60).'...', array('controller' => 'reviews', 'action' => 'view', $comment['Review']['id'])); ?></td>
        
        <td><?php echo $comment['Comment']['content']; ?></td>
        
        <td><?php echo $comment['Comment']['created']; ?></td>        
        
        <td class="col-md-2">
            <?php if($comment['Comment']['published'] == 1): ?>
            
            <?php echo $this->Form->postLink('disable', 
                array('controller' => 'comments', 'action' => 'admin_disable', $comment['Comment']['id']),
                array('class' => 'btn btn-warning btn-xs')); ?>
            
            <?php else: ?>
            
            <?php echo $this->Form->postLink('enable', 
                array('controller' => 'comments', 'action' => 'admin_enable', $comment['Comment']['id']),
                array('class' => 'btn btn-success btn-xs')); ?>
            
            <?php endif; ?>
            
            <?php echo $this->Form->postLink('delete', 
                array('controller' => 'comments', 'action' => 'admin_delete', $comment['Comment']['id']),
                array('class' => 'btn btn-danger btn-xs')); ?>
        </td> 
        
    </tr>
    <?php endforeach; ?>
    
    <?php unset($comments); ?>
</table>