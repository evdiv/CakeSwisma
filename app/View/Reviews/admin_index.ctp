<?php //echo '<pre>', print_r($reviews), '</pre>'; ?>
<h1>Reviews</h1>

<table class="table table-striped table-hover ">
    <tr>
	<th><?php echo $this->Paginator->sort('id'); ?></th>    
        <th>Clinic</th>
        <th>Review</th>  
        <th>Comments</th>         
	<th><?php echo $this->Paginator->sort('created'); ?></th>          
        <th>Actions</th>          
    </tr>


    <?php foreach ($reviews as $review): ?>
    <tr>
       <td><?php echo $review['Review']['id']; ?></td>
        
       <td><?php echo $this->Html->link($review['Clinic']['title'], array('controller' => 'clinics', 'action' => 'view', $review['Clinic']['id'])); ?></td>
        
        <td><?php echo $review['Review']['content']; ?></td>
               
        
        <td><?php echo $this->Html->link(count($review['Comment']),
                    array('controller' => 'comments', 'action' => 'index', 
                    $review['Review']['id'])); ?>
        </td>
        
        <td><?php echo $review['Review']['created']; ?></td>         
        
        <td class="col-md-2">
            <?php if($review['Review']['published'] == 1): ?>
            
            <?php echo $this->Form->postLink('disable', 
                array('controller' => 'reviews', 'action' => 'admin_disable', $review['Review']['id']),
                array('class' => 'btn btn-warning btn-xs')); ?>
            
            <?php else: ?>
            
            <?php echo $this->Form->postLink('enable', 
                array('controller' => 'reviews', 'action' => 'admin_enable', $review['Review']['id']),
                array('class' => 'btn btn-success btn-xs')); ?>
            
            <?php endif; ?>
            
            <?php echo $this->Form->postLink('delete', 
                array('controller' => 'reviews', 'action' => 'admin_delete', $review['Review']['id']),
                array('class' => 'btn btn-danger btn-xs'),
                $confirmMessage = 'Review and all its comments will be deleted'); ?>
        </td> 
        
    </tr>
    <?php endforeach; ?>
    
    <?php unset($reviews); ?>
</table>