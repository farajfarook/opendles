<?php if($data->num_rows() <= 0): ?>
<span class="profile_label">
            there are no doubts to be reviewed.
        </span>
<?php endif ?>

<?php foreach ($data->result() as $datum): ?>
    <?php $user = $this->userhandler->get($datum->user_id); ?>
    <div id="doubtreview<?php echo $datum->id; ?>">

         <?php
         $opts = array(
                     'url' => base_url().'index.php/doubt/remove/'.$datum->id
                    ,'update'=>'doubtreview'.$datum->id
                    );
         ?>
        <input type="button" class="profile_button" value="remove" onClick="<?php echo $this->ajax->remote_function($opts);?>" >
        <span class="profile_label" style="font-weight: bold">
            <?php echo $user->first_name." ".$user->last_name; ?> :
        </span>
        <span class="profile_label">
            <?php echo $datum->msg; ?>
        </span>
    </div>
<?php endforeach ?>