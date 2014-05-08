<?php //echo '<pre>', print_r($reviews), '</pre>'; ?>
<h1>Review <?php echo $review['Review']['id']; ?></h1>

<table class="table table-striped table-hover ">
    <tr>
        <th>Id</th>
        <th>Clinic</th>
        <th>Content</th>        
        <th>Created</th> 
        <th>Author</th>        
        <th>Views</th> 
        <th>Comments</th>         
        <th>Actions</th>         
    </tr>

   
    <tr>
        <td><?php echo $review['Review']['id']; ?></td>
        
        <td><?php echo $this->Html->link($review['Clinic']['title'], array('controller' => 'clinics', 'action' => 'view', $review['Clinic']['id'])); ?></td>
          
        <td><?php echo $review['Review']['content']; ?></td>   
              
        <td><?php echo $review['Review']['created']; ?></td> 
        
        <td><?php echo $review['User']['username']; ?></td>         
        
        <td> - </td>
        
        <td>
            <?php echo $this->Html->link(count($review['Comment']),
                    array('controller' => 'comments', 'action' => 'index', 
                    $review['Review']['id'])); ?>
        </td>
        
           
        
        <td>
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
                array('class' => 'btn btn-danger btn-xs')); ?>
        </td>  
       
    </tr>
    
</table>