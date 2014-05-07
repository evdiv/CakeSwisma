<h1>Users</h1>

<table class='table table-striped table-hover'>
    <tr>
        <th>Username</th>
        <th>Full name</th>             
    </tr>


    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['username']; ?></td>              
        <td><?php echo $user['User']['full_name']; ?></td>                   
    </tr>
    <?php endforeach; ?>
    
    <?php unset($users); ?>
</table>

