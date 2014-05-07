    <b>Recent posts</b>
  
  <table class="table">
    <tr>
        <th>Title</th>
        <th>User Name</th>       
    </tr>
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['title']; ?></td>        
        <td><?php echo $post['User']['full_name']; ?></td> 
    </tr>
    <?php endforeach; ?>
    
    <?php unset($posts); ?>
</table>