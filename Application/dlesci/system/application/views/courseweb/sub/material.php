<?php if($isOwner) :?>
<?php
    $opts = array(
            'startUpload' => 'startUpload(\'picboxprogress\',\''.
                                base_url().'image/icons/load.gif\',\'propic\');'
          , 'index' => '1'
          , 'target' => base_url().'index.php/material/upload/'.$cid);
    $this->aupload->open_form($opts);

    ?>

    <input type="submit" value="upload" class="profile_button"/>
    <label class="profile_cabinet">
            <?php
                $datax = array(
                  'name'        => 'propic',
                  'class'       => 'textbox',
                  'type'        => 'file'
                );
                 echo form_upload($datax);
                 ?>
                 </label>
                    <span id="picboxprogress" class="profile_alertlabel"></span>
                 <?php
                 $this->aupload->close_form();
     ?>
 <?php endif ?>
                    <hr>
                    <div style="overflow:auto; max-height: 300px">
<?php foreach ($data as $value): ?>
                        <div class="profile_label" id="<?php echo "ID".$value ?>">

    <?php if($isOwner) :?>
    <input type="button" class="profile_button" value="delete" onclick="loadPage('material/remove/<?php echo $cid."/".$value; ?>','<?php echo "ID".$value ?>')"/>
    <?php endif ?>
    <input type="button" class="profile_button" value="download" onclick="document.getElementById('downloadsection').src = '<?php echo base_url()."index.php/"?>material/download/<?php echo $cid."/".$value; ?>';"/> <?php  echo $value; ?>

</div>
<?php endforeach ?>
                        
                    </div>

                    <iframe style="visibility:hidden" id="downloadsection"></iframe>