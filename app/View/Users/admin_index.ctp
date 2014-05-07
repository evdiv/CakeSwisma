<h1>Users</h1>

<table class='table table-striped table-hover'>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Full name</th>         
        <th>Password</th>
        <th>E-mail</th>        
        <th>Created</th>            
        <th>Role</th>             
        <th>Status</th>   
        <th>Actions</th>            
    </tr>


    <?php foreach ($users as $user): ?>
    <?php $user_id = $user['User']['id']; ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $this->Html->link($user['User']['username'], array('controller' => 'users', 'action' => 'view', $user_id)); ?></td>  
        <td><?php echo $user['User']['full_name']; ?></td>   
        <td><?php echo $user['User']['password']; ?></td>        
        <td><?php echo $user['User']['email']; ?></td>  
        <td><?php echo $user['User']['created']; ?></td>        
        <td><?php echo $user['User']['role']; ?></td>                    
        <td><?php echo $user['User']['status']; ?></td>      
        
        <td><?php echo $this->Html->link('edit', 
                array('controller' => 'users', 'action' => 'edit', $user_id),
                array('class' => 'btn btn-default btn-xs')); ?>
            
           <?php echo $this->Form->postLink('delete', 
                array('controller' => 'users', 'action' => 'delete', $user_id),
                array('class' => 'btn btn-danger btn-xs')); ?></td>        
        
        
    </tr>
    <?php endforeach; ?>
    
    <?php unset($users); ?>
</table>

