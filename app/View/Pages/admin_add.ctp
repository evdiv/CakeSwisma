
<h1>Add Page</h1>


<?php
echo $this->Form->create('Page', array(
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
echo $this->Form->input('title');
echo $this->Form->input('content', array('rows' => '20', 'cols' => '50'));
?>

<div class="form-group">
<?php echo $this->Form->submit('Add Page', array(
                  'div' => 'col col-md-9 col-md-offset-3',
                  'class' => 'btn btn-default'
          ));
    echo $this->Form->end(); ?>
</div>