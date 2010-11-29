<script>
    new Ajax.Request('<?php echo base_url();?>index.php/thread/markread/<?php echo $data->id; ?>');
</script>
<div class="thread_container">
<div class="thread_subject"> <?php echo $data->subject; ?> </div>
<div class="thread_users" id="threadusers">
    <script>
        loadPage('thread/listusers/<?php echo $data->id;?>', 'threadusers');
    </script>
</div>
<hr/>
<div class="thread_reply_container" id="thread_reply_container">
    <script>
        loadPage('thread/showreply/<?php echo $data->id;?>','thread_reply_container');
    </script>
</div>
<hr/>
<div class="thread_reply_form">
     <form onsubmit="new Ajax.Updater('thread_reply_container'
                                    ,'<?php echo base_url()?>index.php/thread/newreply/<?php echo $data->id;?>'
                                    ,{evalScripts:true, parameters:Form.serialize(this)}); document.getElementById('thread_message').innerHTML = ''; return false;"
          method="post">
        <textarea name="thread_message" id="thread_message" cols="50" class="profile_textbox"></textarea>
        <br/>
        <input type="submit" value="reply" class="profile_button"/>
    </form>
</div>
</div>