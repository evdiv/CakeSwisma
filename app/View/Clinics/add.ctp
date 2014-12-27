<h2>Add Place</h2>

    <?php if($logged_in): ?>

        <?php echo $this->element('clinics/add_clinic_register'); ?>
    <?php else: ?>
    <?php echo $this->element('clinics/add_clinic_unregister'); ?>
<?php endif; ?>