<h2>Login</h2>

 <?php echo $this->Form->create('User', array(
            'inputDefaults' => array(
                'div' => 'form-group',
                'label' => array(
                    'class' => 'col col-md-3 control-label'
                ),
                'wrapInput' => 'col col-md-3',
		'class' => 'form-control'
            ),
            	'class' => 'well form-horizontal'
        ));
        
        echo $this->Form->input('username');
        echo $this->Form->input('password'); ?>

        <div class="form-group">
        <?php echo $this->Form->submit('Login', array(
                          'div' => 'col col-md-9 col-md-offset-3',
                          'class' => 'btn btn-default'
                  ));
            echo $this->Form->end(); ?>
        </div>
