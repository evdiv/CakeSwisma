<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

                echo $this->Html->css('bootstrap.min');
                echo $this->Html->script('jquery-1.11.0.min');
                echo $this->Html->script('bootstrap.min');
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        <?php echo $this->Js->writeBuffer(); ?>
</head>
<body>
    <?php // echo '<pre>', print_r($current_user), '</pre>'; ?>
	<div id="container">
		<div class="navbar navbar-default">
                    
                    <div class="navbar-header">
       
                        <?php echo $this->Html->link('Swisma', array('controller' => 'clinics', 'action' => 'index', 'admin' => false), array('class' => 'navbar-brand')); ?>
                    </div>
                    
                    <ul class="nav navbar-nav">  
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('All users', array('controller' => 'users', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Add new user', array('controller' => 'users', 'action' => 'add')); ?></li>
                        </ul>
                      </li>
                        
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Content<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Pages</li>
                            <li><?php echo $this->Html->link('All pages', array('controller' => 'pages', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Add new page', array('controller' => 'pages', 'action' => 'add')); ?></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Categories</li>
                            <li><?php echo $this->Html->link('All categories', array('controller' => 'categories', 'action' => 'index')); ?></li> 
                            <li><?php echo $this->Html->link('Add new category', array('controller' => 'categories', 'action' => 'add')); ?></li> 
                            <li class="divider"></li>
                            <li class="dropdown-header">Posts</li>
                            <li><?php echo $this->Html->link('All posts', array('controller' => 'posts', 'action' => 'index')); ?></li> 
                            <li><?php echo $this->Html->link('Add new post', array('controller' => 'posts', 'action' => 'add')); ?> </li>   
                        </ul>
                      </li>     
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dental clinics<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('All clinics', array('controller' => 'clinics', 'action' => 'index')); ?></li>
                            <li><?php echo $this->Html->link('Add new clinic', array('controller' => 'clinics', 'action' => 'add')); ?></li>
                        </ul>
                      </li>                                                     
                      
                      <li><?php echo $this->Html->link('Reviews', array('controller' => 'reviews', 'action' => 'index')); ?> </li>    
                      <li><?php echo $this->Html->link('Comments', array('controller' => 'comments', 'action' => 'index')); ?> </li>    
                    </ul>     
                                            <div class="navbar-header">
                               
                           </div>  
                    <ul class="nav navbar-nav navbar-right"> 
                         <?php if ($logged_in): ?>  
    
                            <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?></li> 
                        <?php else: ?>
                            <li><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?></li> 
                            <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></li> 
                        <?php endif; ?>
                    </ul>                    
         
                </div>
            
		<div id="content" style="width:1250px; margin:0 auto;">
                    
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
                    
		</div>
		<div id="footer">
			
		</div>
	</div>
</body>
</html>
