<?php $this->extend('/Common/home'); ?>

<?php $this->assign('page_title', 'All clinics'); ?>

<?php $this->start('sidebar');

    echo $this->element('sidebar/recent_posts', $posts);
    echo $this->element('sidebar/recent_comments');
    
    $this->end(); ?>

<?php echo $this->element('clinics/list_clinics', $clinics); ?>