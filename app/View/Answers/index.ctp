<?php echo '<pre>', print_r($answers), '</pre>'; ?>
<h1>Answers</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Question</th>
        <th>Answer</th>       
        <th>Comments</th>        
    </tr>


    <?php foreach ($answers as $answer): ?>
    <tr>
       <td><?php echo $answer['Answer']['id']; ?></td>
        
       <td><?php echo $answer['Question']['content']; ?></td>
        
        <td><?php echo $answer['Answer']['content']; ?></td>
        
        <td>
            <?php foreach ($answer['Comment'] as $comment): ?>
            <i><?php echo $comment['content']; ?></i><br />
            
            <?php endforeach; ?>
            
        </td>
         
    </tr>
    <?php endforeach; ?>
    
    <?php unset($questions); ?>
</table>