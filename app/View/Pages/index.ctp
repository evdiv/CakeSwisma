<?php $this->extend('/Common/home'); ?>

<?php $this->assign('page_title', $page['Page']['title']); ?>

<?php $this->assign('page_content', $page['Page']['content']); ?>

<?php $this->start('sidebar');

    echo $this->element('sidebar/recent_posts', $posts);
    echo $this->element('sidebar/recent_comments');
    
    $this->end(); ?>

<?php $this->start('questions');

    echo $this->element('questions/recent_questions', $questions);
    echo $this->element('questions/add_question');
    
    $this->end(); ?>