<?php //echo '<pre>', print_r($clinics), '</pre>'; ?>
<h1>Clinics</h1>

<table class="table table-striped table-hover ">
    <tr>
	<th><?php echo $this->Paginator->sort('id'); ?></th>
	<th><?php echo $this->Paginator->sort('title'); ?></th>
	<th><?php echo $this->Paginator->sort('created'); ?></th>
	<th><?php echo $this->Paginator->sort('views'); ?></th>  
	<th><?php echo $this->Paginator->sort('reviews'); ?></th>       
        <th>Actions</th>         
    </tr>

    
    <?php foreach ($clinics as $clinic): ?>
    <tr>
        <td><?php echo $clinic['Clinic']['id']; ?></td>
        
        <td><?php echo $this->Html->link($clinic['Clinic']['title'], 
                array('controller' => 'clinics', 'action' => 'edit', 
                    $clinic['Clinic']['id'])); ?></td>     
              
        <td><?php echo $clinic['Clinic']['created']; ?></td> 
        
        <td><?php echo $clinic['Clinic']['views']; ?></td> 
        
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
    <?php endforeach; ?>
    
    <?php unset($clinics); ?>
    
</table>