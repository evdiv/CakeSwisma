<?php //echo '<pre>', print_r($clinics), '</pre>'; ?>
<h1>Clinic <?php echo $clinic['Clinic']['title']; ?></h1>

<table class="table table-striped table-hover ">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>        
        <th>Created</th> 
        <th>Views</th> 
        <th>Reviews</th>         
        <th>Actions</th>         
    </tr>

   
    <tr>
        <td><?php echo $clinic['Clinic']['id']; ?></td>
        
        <td><?php echo $clinic['Clinic']['title']; ?></td> 
        
        <td><?php echo $clinic['Clinic']['content']; ?></td>   
              
        <td><?php echo $clinic['Clinic']['created']; ?></td> 
        
        <td> - </td>
        
        <td><?php echo $this->Html->link(count($clinic['Review']),
                    array('controller' => 'reviews', 'action' => 'index', 
                    $clinic['Clinic']['id'])); ?>
        </td> 
        
        <td>
            <?php if($clinic['Clinic']['published'] == 1): ?>
            
            <?php echo $this->Form->postLink('disable', 
                array('controller' => 'clinics', 'action' => 'admin_disable', $clinic['Clinic']['id']),
                array('class' => 'btn btn-warning btn-xs')); ?>
            
            <?php else: ?>
            
            <?php echo $this->Form->postLink('enable', 
                array('controller' => 'clinics', 'action' => 'admin_enable', $clinic['Clinic']['id']),
                array('class' => 'btn btn-success btn-xs')); ?>
            
            <?php endif; ?>
            
            <?php echo $this->Form->postLink('delete', 
                array('controller' => 'clinics', 'action' => 'admin_delete', $clinic['Clinic']['id']),
                array('class' => 'btn btn-danger btn-xs')); ?>
        </td>  
       
    </tr>
    
</table>