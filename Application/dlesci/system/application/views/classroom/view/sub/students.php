<div class="tab-pane" id="friendpanel">
    <div class="tab-page" id="friendTabPage1">
		<h2 class="tab">Subscribed</h2>
		   <div id="classroomlist" style="min-height: 350px;">
           
            </div>
	</div>

	<div class="tab-page" id="friendTabPage2">
		<h2 class="tab">Requests Pending</h2>
     <div id="classroomrecieved" style="min-height: 350px;">
            
            </div>
	</div>

        <div class="tab-page" id="friendTabPage3">
		<h2 class="tab">Request Sent</h2>
                        <div id="classroomsent" style="min-height: 350px;">
          
        </div>
	</div>

    <div class="tab-page" id="friendTabPage4">
		<h2 class="tab">Search</h2>
               <div>
                 <input type="text" name="searchstudenttext" id="searchstudenttext" class="friend_search_textbox">
                    <div id="classstudentsearchout" style="min-height:350px;padding-top: 10px;">
                    </div>
            </div>
            <script>
            <?php
                       echo $this->ajax->observe_field('searchstudenttext'
                                                            , array('url'=>base_url().'index.php/classroom/studentsearch/'.$cid
                                                            , 'update'=>'classstudentsearchout'
                                                            , 'frequency'=>'1'
                                                            , 'with'=>'search'));?>
            </script>

	</div>
</div>
<script type="text/javascript">
//<![CDATA[
loadPage('classroom/classroomlist/<?php echo $cid; ?>/0','classroomlist');
loadPage('classroom/classroomrecieved/<?php echo $cid; ?>/0','classroomrecieved');
loadPage('classroom/classroomsent/<?php echo $cid; ?>/0','classroomsent');
setupAllTabs();

//]]>
</script>
