<h1>Posts</h1>

<table class="table table-striped table-hover ">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>User Name</th>
        <th>Category</th>       
        <th>Created</th> 
        <th>Views</th> 
        <th>Actions</th>        
    </tr>


    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td><?php echo $this->Html->link($post['Post']['title'], 
                array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'])); ?></td>        
        <td><?php echo $post['User']['full_name']; ?></td> 
        <td><?php echo $post['Category']['title']; ?></td>            
        <td><?php echo $post['Post']['created']; ?></td>           
        <td><?php echo $post['Post']['views']; ?></td>  
        
        <td>
             <?php if($post['Post']['published'] == 1): ?>
            
            <?php echo $this->Form->postLink('disable', 
                array('controller' => 'posts', 'action' => 'admin_disable', $post['Post']['id']),
                array('class' => 'btn btn-warning btn-xs')); ?>
            
            <?php else: ?>
            
            <?php echo $this->Form->postLink('enable', 
                array('controller' => 'posts', 'action' => 'admin_enable', $post['Post']['id']),
                array('class' => 'btn btn-success btn-xs')); ?>
            
            <?php endif; ?>
            
            <?php echo $this->Form->postLink('delete', 
            array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']),
            array('class' => 'btn btn-danger btn-xs')); ?>
        
        </td> 
         
    </tr>
    <?php endforeach; ?>
    
    <?php unset($posts); ?>
</table>