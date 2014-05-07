<?php //echo '<pre>', print_r($user), '</pre>'; ?>

     <?php echo $user['User']['id']; ?><br />
     <?php echo $user['User']['username']; ?><br />  
     <?php echo $user['User']['email']; ?><br />
     <?php echo $user['User']['description']; ?><br />     
     <?php echo $user['User']['full_name']; ?><br />       
     <?php echo $user['User']['created']; ?><br />       
     <?php echo $user['User']['website']; ?><br /> 
     <hr/>
       Reviews: <?php echo count($user['Review']); ?><br /> 
     <hr />
      Comments: <?php echo count($user['Comment']); ?><br /> 
 
        