<?php //echo '<pre>', print_r($clinic), '</pre>'; ?>
<h1>Add Clinic</h1>


<?php
echo $this->Form->create('Clinic', array('enctype' => 'multipart/form-data'));
echo $this->Form->input('image', array(
    'type' => 'file',
    'label' => 'Photo of the Clinic'
));

echo $this->Form->input('title');
echo $this->Form->input('address');
echo $this->Form->input('phone');
echo $this->Form->input('content', array('rows' => '18', 'cols' => '48'));

echo $this->Form->end('Add Clinic');
?>

