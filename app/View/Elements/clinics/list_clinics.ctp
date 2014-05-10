<table class="table table-striped table-hover ">
    <tr>
        <th>Id</th>
        <th>Title</th>  
        <th>Created</th> 
        <th>Reviews</th>
        <th>Rating</th>         
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
            <?php 
            /////////////////TODO: move this logic from the view
            $vote = 0;
            foreach ($clinic['Review'] as $review) {
            $vote += $review['vote'];
            }
            ?>
            <?php 
            ///////////////TODO: use stars for represents rating
            echo $vote / count($clinic['Review']); 
            ?>
        
        
        </td>          
        <td> </td>    
        
    </tr>
    <?php endforeach; ?>
    
    <?php unset($clinics); ?>
</table>