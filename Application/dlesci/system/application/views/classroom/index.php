<div class="tab-pane" id="classpanel">
    <div class="tab-page" id="classTabPage1">
		<h2 class="tab">Featuring Classes</h2>
                <div id="featuringclasscontent" class="scrollx">
                
                </div>
	</div>

	<div class="tab-page" id="classTabPage2">
		<h2 class="tab">Class Subscribe</h2>
                <div id="subscribeclasscontent" style="overflow: hidden">
                
                </div>
        </div>


        <div class="tab-page" id="classTabPage3">
            <h2 class="tab">My Own Classes</h2>
            <div id="newclasscontent">
                
            </div>

            <div id="ownclasslist" class="scrollx">
            </div>
            
        </div>
    <div class="tab-page" id="classTabPage1">
                <h2 class="tab">Search</h2>
                <div id="searchclassroomcontent" style="overflow: hidden">

                    <input type="text" name="searchtextX" id="searchtextX" class="friend_search_textbox">
                    <div id="searchoutX" style="min-height:350px;padding-top: 10px;">
                    </div>
                </div>
                    <script>
                    <?php
                               echo $this->ajax->observe_field('searchtextX'
                                                                    , array('url'=>base_url().'index.php/classroom/searchclassroom'
                                                                    , 'update'=>'searchoutX'
                                                                    , 'frequency'=>'1'
                                                                    , 'with'=>'search'));?>
                    </script>
        </div>
</div>
<script type="text/javascript">
//<![CDATA[
updateClassContent();
setupAllTabs();
//]]>
</script>


