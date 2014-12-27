<?php
    echo $this->Form->create('Clinic', array(
            'inputDefaults' => array(
                'div' => 'form-group',
                'label' => array(
                    'class' => 'col col-md-3 control-label'
                ),
                'wrapInput' => 'col col-md-9',
		'class' => 'form-control'
            ),
            	'class' => 'well form-horizontal'
        ));

echo $this->Form->input('User.username');
echo $this->Form->input('User.password');
echo $this->Form->input('User.full_name');
echo $this->Form->input('User.email');

echo $this->Form->input('Clinic.image', array(
    'type' => 'file',
    'label' => 'Photo of the Clinic'
));

echo $this->Form->input('Clinic.title');
echo $this->Form->input('Clinic.address');
echo $this->Form->input('Clinic.phone');

echo $this->Form->input('Clinic.content', array('rows' => '9', 'colls' => '36'));
?>
<div class="form-group">
<?php echo $this->Form->submit('Add Clinic', array(
                  'div' => 'col col-md-9 col-md-offset-3',
                  'class' => 'btn btn-default'
          ));
    echo $this->Form->end(); ?>
</div>