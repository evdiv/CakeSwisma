
<h1>Add User</h1>


<?php
echo $this->Form->create('User', array(
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
echo $this->Form->input('password');
echo $this->Form->input('full_name');
echo $this->Form->input('email');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('website');
echo $this->Form->input('role', array(
    'options' => array('user' => 'User', 'admin' => 'Administrator')  
)); ?>

<div class="form-group">
<?php echo $this->Form->submit('Add user', array(
                  'div' => 'col col-md-9 col-md-offset-3',
                  'class' => 'btn btn-default'
          ));
    echo $this->Form->end(); ?>
</div>