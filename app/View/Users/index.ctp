<h1>Users</h1>

<table>
    <tr>
        <th>Id</th>
        <th>login</th>
        <th>Password</th>
        <th>E-mail</th>        
        <th>Description</th>
        <th>Full name</th>            
        <th>Created</th>            
        <th>Role</th>            
        <th>Website</th> 
        <th>Modified</th>
        <th>Status</th>         
    </tr>


    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['login']; ?></td>        
        <td><?php echo $user['User']['password']; ?></td>        
        <td><?php echo $user['User']['email']; ?></td> 
        <td><?php echo $user['User']['description']; ?></td>        
        <td><?php echo $user['User']['full_name']; ?></td>        
        <td><?php echo $user['User']['created']; ?></td>        
        <td><?php echo $user['Role']['title']; ?></td>   
        <td><?php echo $user['User']['website']; ?></td>           
        <td><?php echo $user['User']['modified']; ?></td>           
        <td><?php echo $user['User']['status']; ?></td>            
    </tr>
    <?php endforeach; ?>
    
    <?php unset($users); ?>
</table>

