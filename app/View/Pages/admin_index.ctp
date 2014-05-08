<h1>Pages</h1>

<table class="table table-striped table-hover ">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>User Name</th>    
        <th>Created</th> 
        <th>Views</th> 
        <th>Actions</th>         
    </tr>

    
    <?php foreach ($pages as $page): ?>
    <tr>
        <td><?php echo $page['Page']['id']; ?></td>
        
        <td><?php echo $this->Html->link($page['Page']['title'], 
                array('controller' => 'pages', 'action' => 'edit', 
                    $page['Page']['id'])); ?></td>     
        
        <td><?php echo $page['User']['username']; ?></td>           
        <td><?php echo $page['Page']['created']; ?></td> 
        <td> - </td>  
        <td><?php echo $this->Form->postLink('delete', 
                array('controller' => 'pages', 'action' => 'delete', $page['Page']['id']),
                array('class' => 'btn btn-danger btn-xs')); ?></td>  
       
    </tr>
    <?php endforeach; ?>
    
    <?php unset($pages); ?>
    
</table>