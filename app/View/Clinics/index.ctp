<?php //echo '<pre>', print_r($clinics), '</pre>'; ?>

<h1>Clinic</h1>

<table class="table table-striped table-hover ">
    <tr>
        <th>Id</th>
        <th>Title</th>  
        <th>Created</th> 
        <th>Reviews</th> 
    </tr>

    
    <?php foreach ($clinics as $clinic): ?>
    <tr>
        <td><?php echo $clinic['Clinic']['id']; ?></td>
        
        <td><?php echo $this->Html->link($clinic['Clinic']['title'], 
                array('controller' => 'clinics', 'action' => 'view', 
                    $clinic['Clinic']['id'])); ?></td>     
                
        <td><?php echo $clinic['Clinic']['created']; ?></td> 
        <td><?php echo count($clinic['Review']); ?></td>    
       
    </tr>
    <?php endforeach; ?>
    
    <?php unset($clinics); ?>
</table>