<h1>Roles</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>         
    </tr>


    <?php foreach ($roles as $role): ?>
    <tr>
        <td><?php echo $role['Role']['id']; ?></td>
        <td><?php echo $role['Role']['title']; ?></td>        
        <td><?php echo $role['Role']['description']; ?></td>                  
    </tr>
    <?php endforeach; ?>
    
    <?php unset($roles); ?>
</table>
