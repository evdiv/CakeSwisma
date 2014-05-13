<h1>Posts</h1>

<table class="table table-striped table-hover ">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Category</th>       
        <th>Created</th> 
        <th>Views</th>       
    </tr>


    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td><?php echo $this->Html->link($post['Post']['title'], 
                array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>  
        
        <td><?php echo $post['Category']['title']; ?></td>            
        <td><?php echo $post['Post']['created']; ?></td>           
        <td><?php echo $post['Post']['views']; ?></td>  
        
         
    </tr>
    <?php endforeach; ?>
    
    <?php unset($posts); ?>
</table>