<h1>Categories</h1>

<table class="table table-striped table-hover ">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>       
    </tr>
    <?php foreach ($categories as $category): ?>
    <?php $category_id = $category['Category']['id']; ?>
    <tr>
        <td><?php echo $category_id; ?></td>
        <td><?php echo $this->Html->link($category['Category']['title'], array('action' => 'edit', $category_id)); ?></td>    
        <td><?php echo $this->Form->postLink('delete', 
            array('controller' => 'categories', 'action' => 'delete', $category_id),
            array('class' => 'btn btn-danger btn-xs')); ?></td>  
    </tr>
    
    <?php endforeach;?>
</table>