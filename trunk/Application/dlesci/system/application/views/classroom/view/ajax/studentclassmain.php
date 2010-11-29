 <table height="100%" border="0" cellspacing="5">
          <tr>
            <td valign="top">
                <div class="class_whiteboard_name">white board</div>
                <div class="class_whiteboard" id="classwhiteboard">
               <?php
                     red5_wboard_client($wb_data);
               ?>
                </div></td>
            <td valign="top">
                <div class="class_lecturer_desktop_name"><?php echo $lecturer->first_name." ".$lecturer->last_name; ?>'s Desktop</div>
                <div class="class_lecturer_desktop" id="classlecturerdesktop">
                <?php
                    red5_screen($scr_data);
                ?>
                </div></td>
          </tr>
 </table>