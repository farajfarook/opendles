<script>
    <?php
    $opts = array(
                 'url' => base_url().'index.php/feed/rss/'     
                ,'frequency'=>3
                ,'complete'=>'updaterss(request);hide(\'rssload\')');
    echo $this->ajax->periodically_call_remote($opts)
    ?>
</script>
<div id="rssload" class="rss_title"><img src="<?php echo base_url();?>image/icons/refresh.gif"/> RSS feed online. | <a class="friend_label" href="<?php echo base_url().'index.php/feed/rss/'; ?>">link</a></div>

<br><br>
<?php for($i = 0;$i<20;$i++): ?>
            <div id="rssset<?php echo $i;?>" class="rss_set">
            <div id="rsstitle<?php echo $i;?>" class="rss_title"></div>
            <div id="rsscontent<?php echo $i;?>" class="rss_content"></div>
            </div>
<?php endfor ?>

