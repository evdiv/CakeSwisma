<h1>Categories</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
    </tr>
    <?php foreach ($categories as $category): ?>
    <tr>
        <td><?php echo $category['Category']['id']; ?></td>
        <td><?php echo $category['Category']['title']; ?></td>    
        
    </tr>
    
    <?php endforeach;?>
</table>