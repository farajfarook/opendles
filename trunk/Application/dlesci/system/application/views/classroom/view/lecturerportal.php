<script>
    <?php
    $opts = array('url' => base_url().'index.php/classroom/students/'.$data->id
                ,'frequency'=>3
                ,'complete'=>'updatestudentlist(request)');

    echo $this->ajax->periodically_call_remote($opts);
    echo ";";
    ?>
</script>
    <table width="100%" border="0" cellspacing="2">
      <tr>
        <td colspan="4"><div class="class_heading" id="classheading">DLES Classroom (Lecturer portal) : <?php echo $data->class_name; ?><br />
          <hr />
        </div></td>
      </tr>
      <tr>
        <td width="15%" valign="top"><p>
          <input type="button" class="class_button" value="White Board"
                 onclick="loadPage('classroom/whiteboard/<?php echo $data->id; ?>','classroomcontent')"/>
          <br />
          <input type="button" class="class_button" value="Students"
                 onclick="loadPage('classroom/students/<?php echo $data->id; ?>','classroomcontent')"/>
          <br />
          <input type="button" class="class_button" value="Doubts"
                 onclick="loadPage('doubt/review/<?php echo $data->id; ?>','classroomcontent')"/>
          <br />
          <input type="button" class="class_button" value="Course Web"
                 onclick="loadPage('courseweb/index/<?php echo $data->id; ?>','classroomcontent')"/>
          <br />
          <input type="button" class="class_button" value="Exams"
                 onclick="loadPage('exam/admin/<?php echo $data->id; ?>','classroomcontent')"/>
          <br />
        </p></td>
        <td height="331" colspan="3">
        <table width="100%" height="100%" border="0" cellspacing="2">
          <tr>
              <td valign="top" width="270">
                <div id="classroomsetting">
                <script>
                    loadPage('classroom/setting/<?php echo $data->id; ?>','classroomsetting')
                </script>
                </div>
            </td>
            <td valign="top">
                <div id="classroomcontent">
                    <script>
                        loadPage('classroom/whiteboard/<?php echo $data->id; ?>','classroomcontent')
                    </script>
                </div>
            </td>

          </tr>
        </table>
        
        </td>
      </tr>
      <tr>
        <td width="15%" valign="top">&nbsp;</td>
        <td height="21" colspan="3" valign="top">&nbsp;</td>
      </tr>
    </table>
