<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

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

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
                    <?php echo $this->Html->link('Home Page', array('controller' => 'pages', 'action' => 'index')); ?>
                    <?php echo $this->Html->link('All Pages', array('controller' => 'pages', 'action' => 'all')); ?>		
                        |                   
                    <?php echo $this->Html->link('Add user', array('controller' => 'users', 'action' => 'add')); ?>
                    <?php echo $this->Html->link('All users', array('controller' => 'users', 'action' => 'index')); ?> 
                        |
                    <?php echo $this->Html->link('Add role', array('controller' => 'roles', 'action' => 'add')); ?>
                    <?php echo $this->Html->link('All roles', array('controller' => 'roles', 'action' => 'index')); ?>                         
                        |
                    <?php echo $this->Html->link('Add category', array('controller' => 'categories', 'action' => 'add')); ?>
                    <?php echo $this->Html->link('All categories', array('controller' => 'categories', 'action' => 'index')); ?>                  
                        |
                    <?php echo $this->Html->link('Add page', array('controller' => 'pages', 'action' => 'add')); ?>
                    <?php echo $this->Html->link('All pages', array('controller' => 'pages', 'action' => 'all')); ?>  
                        |
                    <?php echo $this->Html->link('Add post', array('controller' => 'posts', 'action' => 'add')); ?>
                    <?php echo $this->Html->link('All posts', array('controller' => 'posts', 'action' => 'index')); ?>  
                         |
                    <?php echo $this->Html->link('Add question', array('controller' => 'questions', 'action' => 'add')); ?>
                    <?php echo $this->Html->link('All questions', array('controller' => 'questions', 'action' => 'index')); ?>                        
                </div>
		<div id="content">

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
