<?php
    echo $this->Form->create('Comment', array(
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
    
echo $this->Form->hidden('user_id', array('default' => '1'));
echo $this->Form->hidden('review_id', array('default' => $review_id));
echo $this->Form->hidden('clinic_id', array('default' => $clinic_id));

echo $this->Form->input('content', array('rows' => '2'));
?>
<div class="form-group">
<?php echo $this->Form->submit('Add Comment', array(
                  'div' => 'col col-md-9 col-md-offset-3',
                  'class' => 'btn btn-default'
          ));
    echo $this->Form->end(); ?>
</div>