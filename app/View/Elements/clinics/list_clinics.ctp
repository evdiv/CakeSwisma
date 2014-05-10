<table class="table table-striped table-hover ">
    <tr>
        <th>Id</th>
        <th>Title</th>  
        <th>Created</th> 
        <th>Reviews</th>
        <th>Rank</th>         
    </tr>

    
    <?php foreach ($clinics as $clinic): ?>
    <tr>
        <td><?php echo $clinic['Clinic']['id']; ?></td>
        
        <td><?php echo $this->Html->link($clinic['Clinic']['title'], 
                array('controller' => 'clinics', 'action' => 'view', 
                    $clinic['Clinic']['id'])); ?></td>     
                
        <td><?php echo $clinic['Clinic']['created']; ?></td> 
        <td><?php echo count($clinic['Review']); ?></td> 
        <td>
            <?php if($clinic['Clinic']['rank'] > 6): ?>
             <h4 class="text-success">
            <?php elseif ($clinic['Clinic']['rank'] < 4): ?>
             <h4 class="text-danger">
            <?php else: ?>
             <h4 class="text-warning">
            <?php endif; ?>
            
            <?php echo $clinic['Clinic']['rank']; ?>
             </h4>
        </td> 
        
        <td> </td>    
        
    </tr>
    <?php endforeach; ?>
    
    <?php unset($clinics); ?>
</table>