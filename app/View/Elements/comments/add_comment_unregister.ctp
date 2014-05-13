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

echo $this->Form->input('User.username');
echo $this->Form->input('User.password');
echo $this->Form->input('User.full_name');
echo $this->Form->input('User.email');

echo $this->Form->hidden('Comment.review_id', array('default' => $review_id));
echo $this->Form->hidden('Comment.clinic_id', array('default' => $clinic_id));

echo $this->Form->input('Comment.content', array('rows' => '9', 'colls' => '36'));
?>
<div class="form-group">
<?php echo $this->Form->submit('Add Comment', array(
                  'div' => 'col col-md-9 col-md-offset-3',
                  'class' => 'btn btn-default'
          ));
    echo $this->Form->end(); ?>
</div>