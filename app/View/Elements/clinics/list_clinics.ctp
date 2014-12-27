<table class="table table-striped table-hover ">
    <tr>
        <th>Id</th>
        <th>Title</th>  
        <th>Contact</th> 
        <th>Rank</th>         
    </tr>

    
    <?php foreach ($clinics as $clinic): ?>
    <tr>
        <td><?php echo ($clinic['Clinic']['image']) ? $this->Html->image('/files/' . 
                $clinic['Clinic']['image'], array('width' => 100, 'height' => 100, 'class' => 'img-rounded')) 
                : $this->Html->image('/files/' . 
                'empty.png', array('width' => 100, 'height' => 100, 'class' => 'img-rounded')) ; ?>
        </td>
        
        <td>
            
            <?php echo $this->Html->tag('h4', $this->Html->link($clinic['Clinic']['title'], 
                array('controller' => 'clinics', 'action' => 'view', 
                    $clinic['Clinic']['id']))); ?>
            <br />
            <?php echo substr($clinic['Clinic']['content'], 0, 200) . " ..."; ?>
            <br />
            
            <?php echo "Reviews: " . $this->Html->tag('b', $this->Html->link(count($clinic['Review']), 
                array('controller' => 'clinics', 'action' => 'view', 
                    $clinic['Clinic']['id']))); ?>
            
        </td>     
                
        <td>
            <?php echo $clinic['Clinic']['address']; ?>
            <?php echo $clinic['Clinic']['phone']; ?>       
        </td> 
        <td>
            <?php if($clinic['Clinic']['rank'] > 6): ?>
             <h2 class="text-success">
            <?php elseif ($clinic['Clinic']['rank'] < 4): ?>
             <h2 class="text-danger">
            <?php else: ?>
             <h2 class="text-warning">
            <?php endif; ?>
            
            <?php echo $clinic['Clinic']['rank']; ?>
             </h2>
        </td> 
        
        <td> </td>    
        
    </tr>
    <?php endforeach; ?>
    
    <?php unset($clinics); ?>
</table>