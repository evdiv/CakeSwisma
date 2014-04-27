<h1>Pages</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>User Name</th>
        <th>Created</th> 
        <th>Views</th>        
    </tr>


    <?php foreach ($pages as $page): ?>
    <tr>
        <td><?php echo $page['Page']['id']; ?></td>
        <td><?php echo $page['Page']['title']; ?></td>        
        <td><?php echo $page['User']['full_name']; ?></td>                 
        <td><?php echo $page['Page']['created']; ?></td>           
        <td><?php echo $page['Page']['views']; ?></td>   
         
    </tr>
    <?php endforeach; ?>
    
    <?php unset($pages); ?>
</table>