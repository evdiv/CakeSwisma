    <h3>News and Articles</h3>
  
  <table class="table">
    <tr>
        <th>Title</th>
        <th>Date</th>       
    </tr>
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></td>        
        <td><?php echo $post['Post']['created']; ?></td> 
    </tr>
    <?php endforeach; ?>
    
    <?php unset($posts); ?>
</table>