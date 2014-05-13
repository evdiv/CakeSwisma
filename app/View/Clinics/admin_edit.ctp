<?php echo ($image) ? $this->Html->image('/files/' . $image, array('width' => 150, 'height' => 150, 'class' => 'img-circle')) : "<h4>No image</h4>"; ?>
<h1>Edit Clinic</h1>


<?php
echo $this->Form->create('Clinic', array(
           'inputDefaults' => array(
               'div' => 'form-group',
               'label' => array(
                   'class' => 'col col-md-3 control-label'
               ),
               'wrapInput' => 'col col-md-3',
               'class' => 'form-control'
           ),
            'class' => 'well form-horizontal',
            'enctype' => 'multipart/form-data'  
));
echo $this->Form->input('image', array(
    'type' => 'file',
    'label' => 'Photo of the Clinic'
));

echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('title');
echo $this->Form->input('address');
echo $this->Form->input('phone');
echo $this->Form->input('content', array('rows' => '18', 'cols' => '48'));
?>
<div class="form-group">
<?php echo $this->Form->submit('Edit Clinic', array(
                  'div' => 'col col-md-9 col-md-offset-3',
                  'class' => 'btn btn-default'
          ));
    echo $this->Form->end(); ?>
</div>