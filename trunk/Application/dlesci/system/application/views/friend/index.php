<script>
    updateFriendContainer();
</script>
<div class="tab-pane" id="friendpanel">
    <div class="tab-page" id="friendTabPage1">
		<h2 class="tab">My Friend List</h2>
		   <div id="list" style="min-height: 350px;">
            </div>
	</div>
    
	<div class="tab-page" id="friendTabPage2">
		<h2 class="tab">Friend Request Received</h2>
            <div id="recieved" style="min-height: 350px;">
            </div>
	</div>

        <div class="tab-page" id="friendTabPage3">
		<h2 class="tab">Friend Request Sent</h2>
                        <div id="sent" style="min-height: 350px;">
        </div>
	</div>

    <div class="tab-page" id="friendTabPage4">
		<h2 class="tab">Search Users</h2>
               <div>
                 <input type="text" name="searchtext" id="searchtext" class="friend_search_textbox">
                    <div id="searchout" style="min-height:350px;padding-top: 10px;">
                    </div>
            </div>
            <script>
            <?php
                       echo $this->ajax->observe_field('searchtext'
                                                            , array('url'=>base_url().'index.php/friend/search'
                                                            , 'update'=>'searchout'
                                                            , 'frequency'=>'1'
                                                            , 'with'=>'search'));?>
            </script>

	</div>
</div>
<script type="text/javascript">
//<![CDATA[

setupAllTabs();

//]]>
</script>
