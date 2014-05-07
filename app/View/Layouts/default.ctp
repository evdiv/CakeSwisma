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

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        <?php echo $this->Js->writeBuffer(); ?>
</head>
<body>
	<div id="container">
		<div class="navbar navbar-inverse">
                    <ul class="nav navbar-nav">
                        <li><?php echo $this->Html->link('Home Page', array('controller' => 'pages', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('All Pages', array('controller' => 'pages', 'action' => 'all')); ?></li>
                        <li><?php echo $this->Html->link('Add user', array('controller' => 'users', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link('All users', array('controller' => 'users', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('Add role', array('controller' => 'roles', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link('All roles', array('controller' => 'roles', 'action' => 'index')); ?></li>                         
                        <li><?php echo $this->Html->link('Add category', array('controller' => 'categories', 'action' => 'add')); ?></li> 
                        <li><?php echo $this->Html->link('All categories', array('controller' => 'categories', 'action' => 'index')); ?></li>                   
                        <li><?php echo $this->Html->link('Add page', array('controller' => 'pages', 'action' => 'add')); ?></li> 
                        <li><?php echo $this->Html->link('All pages', array('controller' => 'pages', 'action' => 'all')); ?> </li>  
                        <li><?php echo $this->Html->link('Add post', array('controller' => 'posts', 'action' => 'add')); ?></li> 
                        <li><?php echo $this->Html->link('All posts', array('controller' => 'posts', 'action' => 'index')); ?> </li>  
                        <li><?php echo $this->Html->link('Add question', array('controller' => 'questions', 'action' => 'add')); ?></li> 
                        <li><?php echo $this->Html->link('All questions', array('controller' => 'questions', 'action' => 'index')); ?> </li>                        
                        <li><?php echo $this->Html->link('Add answer', array('controller' => 'answers', 'action' => 'add')); ?> </li>               
                        <li><?php echo $this->Html->link('All answers', array('controller' => 'answers', 'action' => 'index')); ?> </li>
                        
                         <?php if ($logged_in): ?>  
                            <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?> </li> 
                            <li><?php echo $this->Html->link('Admin', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?> </li> 
                                <?php else: ?>
                            <li><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?> </li> 
                            <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?> </li> 
                        <?php endif; ?>
                    </ul>       
                </div>
		<div id="content" style="width:1250px; margin:0 auto;">
                    
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
                    
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
