<?php
    echo $this->Form->create('Review', array(
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
    
echo $this->Form->hidden('Review.user_id', array('default' => '1'));
echo $this->Form->hidden('Review.clinic_id', array('default' => $clinic['Clinic']['id']));

echo $this->Form->input('vote', array(
    'options' => array('0','1','2','3','4','5','6','7','8','9','10')  
));

echo $this->Form->input('Review.content', array('rows' => '4'));
?>
<div class="form-group">
<?php echo $this->Form->submit('Add Review', array(
                  'div' => 'col col-md-9 col-md-offset-3',
                  'class' => 'btn btn-default'
          ));
    echo $this->Form->end(); ?>
</div>