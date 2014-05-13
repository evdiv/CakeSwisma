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
                echo $this->Html->css('styles');
                
                echo $this->Html->script('jquery-1.11.0.min');                
                echo $this->Html->script('bootstrap.min');                

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        <?php echo $this->Js->writeBuffer(); ?>
</head>
<body>
<div id="container">
    
    <div class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link('Swisma', array('controller' => 'clinics', 'action' => 'index'), array('class' => 'navbar-brand')); ?>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse"> 
        <ul class="nav navbar-nav">

           <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Post Categories<b class="caret"></b></a>
               
               <ul class="dropdown-menu">
                    <?php foreach ($menu_categories as $category): ?>
                    <li><?php echo $this->Html->link($category['Category']['title'], array('controller' => 'posts', 'action' => 'index', $category['Category']['id'])); ?></li>
                    <?php endforeach; ?>           
               </ul>
           </li>   

            <li><?php echo $this->Html->link('All clinics', array('controller' => 'clinics', 'action' => 'index')); ?> </li>                                      

       </ul>    
       <ul class="nav navbar-nav navbar-right">      
             <?php if ($logged_in): ?>  
                <li><?php echo $this->Html->link($current_user['full_name'], array('controller' => 'users', 'action' => 'view', $current_user['id'])); ?></li>            
                <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?></li> 
                <li><?php echo $this->Html->link('Admin', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?> </li> 

                    <?php else: ?>
                <li><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?> </li> 
                <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?> </li> 
            <?php endif; ?>
        </ul> 
      </div>
    </div>   
    <section id="banner">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">  
                <h3 class="media-heading">Swisma Reviews</h3>
                <p>This webapp has been created with amazing framework CakePHP. The idea is connected local businesses with customers. 
                Customers can add reviews, and rate businesses thereby helping others</p>
                <p><a class="btn btn-primary btn-lg" href="https://github.com/evdiv/CakeSwisma">github.com/evdiv/CakeSwisma</a></p>
            </div>
            <div class="col-md-8">
                
            </div>
        </div>
    </section>
            
            
    <div id="content" style="width:1250px; margin:0 auto;">

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>

    </div>
    <div id="footer">

    </div>
</div>
	<?php //echo $this->element('sql_dump'); ?>
    <?php echo $this->fetch('script_execute'); ?>
</body>
</html>
