<div class='actions' style='width: 200px; float: left; margin-right: 10px;'>
    <h3>Sidebar</h3>
    <ul>
    <?php echo $this->fetch('sidebar'); ?>
    </ul>
</div>

<h3><?php echo $this->fetch('page_title'); ?></h3>

<p><?php echo $this->fetch('page_content'); ?></p>


    <?php echo $this->fetch('content'); ?>