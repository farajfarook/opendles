<span class="profile_label">subject : <strong style="font-size: 14px;"><?php echo $data->subject;?></strong></span>
<hr/>
<div id="threadusers">
    <script>
        loadPage('thread/showusers/<?php echo $data->id;?>', 'threadusers')
    </script>
</div>
<hr/>
<div>
    <span class="profile_label">search and add users to the thread </span>
    <input type="text" id="searchusers" class="profile_textbox" name="search"/>
    <script>
    <?php
       echo $this->ajax->observe_field('searchusers'
                                            , array('url'=>base_url().'index.php/thread/usersearch/'.$data->id
                                            , 'update'=>'usersearchdata'
                                            , 'frequency'=>'1'
                                            , 'with'=>'search'));?>
    </script>
</div>
<div id="usersearchdata"></div>