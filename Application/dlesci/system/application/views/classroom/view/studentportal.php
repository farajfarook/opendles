
    <table width="100%" border="0" cellspacing="2">
      <tr>
        <td colspan="4"><div class="class_heading" id="classheading">DLES Classroom (Student portal) : <?php echo $data->class_name; ?><br />
        <hr /></div></td>
      </tr>
      <tr>
        <td width="15%" rowspan="2" valign="top">
        
            <div class="class_lecturer_name"><?php echo $lecturer->first_name." ".$lecturer->last_name; ?></div>
          <div class="class_lecturer_cam" id="classlecturercam">
                <?php
                    red5_lecturer($lecturer_cam);
                ?>
            </div>
            <div style="margin-top: 10px;">
                <input type="button" class="profile_button" style="width: 156px" value="display class"
                       onclick="loadPage('classroom/studentclassmain/<?php echo $data->id; ?>','studentclassroomcontent');"/>
                <input type="button" class="profile_button" style="width: 156px" value="course web"
                       onclick="loadPage('courseweb/index/<?php echo $data->id; ?>','studentclassroomcontent');"/>
                <input type="button" class="profile_button" style="width: 156px" value="ask doubt"
                       onclick="loadPage('doubt/index/<?php echo $data->id; ?>','studentclassroomcontent');"/>
                <input type="button" class="profile_button" style="width: 156px" value="exams"
                       onclick="loadPage('exam/index/<?php echo $data->id; ?>','studentclassroomcontent');"/>
            </div>
        </td>
        <td height="331" colspan="3" valign="top">
            <div id="studentclassroomcontent">
                <script>
                    loadPage("classroom/studentclassmain/<?php echo $data->id; ?>",'studentclassroomcontent');
                </script>
            </div>
        </td>
      </tr>
     </table>
