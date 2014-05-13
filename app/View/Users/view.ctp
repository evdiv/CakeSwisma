<?php //echo '<pre>', print_r($user), '</pre>'; ?>
<h1><?php echo $user['User']['full_name']; ?></h1>

     <?php echo 'User id: ' . $user['User']['id']; ?><br />
     <?php echo 'User name: ' . $user['User']['username']; ?><br />  
     <?php echo 'Email: ' . $user['User']['email']; ?><br />
     <?php echo 'Description: ' . $user['User']['description']; ?><br />     
     <?php echo 'Full Name' . $user['User']['full_name']; ?><br />       
     <?php echo 'Registered Date: ' . $user['User']['created']; ?><br />       
     <?php echo 'Web site: ' . $user['User']['website']; ?><br /> 
     <hr/>
       Reviews: <?php echo count($user['Review']); ?><br /> 
     <hr />
      Comments: <?php echo count($user['Comment']); ?><br /> 
 
        