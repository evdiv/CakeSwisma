<h1>Answers</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Question</th>
        <th>User Name</th>
        <th>Content</th>       
        <th>Created</th> 
        <th>Views</th>        
    </tr>


    <?php foreach ($answers as $answer): ?>
    <tr>
        <td><?php echo $answer['Question']['id']; ?></td>
        
        <td><?php echo $this->Html->link($question['Question']['title'], 
                array('controller' => 'questions', 'action' => 'view', 
                    $question['Question']['id'])); ?></td>     
        
        <td><?php echo $question['User']['full_name']; ?></td> 
        <td><?php echo $question['Category']['title']; ?></td>            
        <td><?php echo $question['Question']['created']; ?></td>           
        <td><?php echo $question['Question']['views']; ?></td>   
         
    </tr>
    <?php endforeach; ?>
    
    <?php unset($questions); ?>
</table>