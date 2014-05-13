    <div id="header">
        <h1><?php echo $this->fetch('page_title'); ?></h1>
    </div>

    <div id="main" style="float:left; width:880px; padding:10px;">
        <p><?php echo $this->fetch('page_content'); ?></p>
               
        <p><?php echo $this->fetch('content'); ?></p>     
    </div>
    
    <div id="sidebar" style="float:right; width:330px; padding:10px;">
        <p><?php echo $this->fetch('sidebar'); ?><p>       
    </div>
    <div id="footer" style="clear:both; padding:5px 10px;"></div>
