<?php $this->extend('/Common/view'); ?>

<?php $this->assign('page_title', $page['Page']['title']); ?>

<?php $this->assign('page_content', $page['Page']['content']); ?>

<?php $this->start('sidebar');

    echo $this->element('sidebar/recent_posts', $posts);
    echo $this->element('sidebar/recent_comments');
    
    $this->end(); ?>

