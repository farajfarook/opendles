<div class="tab-pane">
    <div class="tab-page">
		<h2 class="tab">Home</h2>
            <div>
                <div class="profile_label" style="font-weight: bold">
                    discription
                </div>
                <div id="cwld" class="cwlcontent">
                    <script>
                        loadPage('courseweb/discription/<?php echo $class->id; ?>','cwld');
                    </script>
                </div>

                <div class="profile_label" style="font-weight: bold">
                    <hr>
                    News
                </div>
                <div id="cwln">
                    <script>
                        loadPage('courseweb/news/<?php echo $class->id; ?>','cwln');
                    </script>
                </div>

                <div class="profile_label" style="font-weight: bold">
                    <hr>
                    Events
                </div>
                <div id="cwle">
                    <script>
                        loadPage('courseweb/events/<?php echo $class->id; ?>','cwle')
                    </script>
                </div>
            </div>
    </div>
    <div class="tab-page">
		<h2 class="tab">Materials</h2>
            <div>
                <div id="cwlm">
                    <script>
                        loadPage('material/index/<?php echo $class->id; ?>','cwlm')
                    </script>
                </div>
            </div>
    </div>
    <div class="tab-page">
        	<h2 class="tab">Video Archive</h2>
            <div>
                 <div id="cwlv">
                     <script>
                        loadPage('classroom/archivevideo/<?php echo $class->id; ?>','cwlv');
              </script>
                </div>
            </div>
    </div>
</div>

<script type="text/javascript">
//<![CDATA[

setupAllTabs();

//]]>
</script>
