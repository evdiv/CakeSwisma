<?php echo '<pre>', print_r($reviews), '</pre>'; ?>
<h1>Reviews</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Clinic</th>
        <th>Review</th>       
        <th>Comments</th>        
    </tr>


    <?php foreach ($reviews as $review): ?>
    <tr>
       <td><?php echo $review['Review']['id']; ?></td>
        
       <td><?php echo $review['Clinic']['content']; ?></td>
        
        <td><?php echo $review['Review']['content']; ?></td>
        
        <td>
            <?php foreach ($review['Comment'] as $comment): ?>
            <i><?php echo $comment['content']; ?></i><br />
            
            <?php endforeach; ?>
            
        </td>
         
    </tr>
    <?php endforeach; ?>
    
    <?php unset($clinics); ?>
</table>