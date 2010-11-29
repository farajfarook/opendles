<?php echo '<?xml version="1.0"?>'; ?>
<data>
    <friends>
        <?php foreach ($friends->result() as $datum): ?>
        <user uid="<?php echo $datum->id; ?>" online="<?php if($this->chathandler->IsOnline($datum->id)) echo "yes"; else echo "no"; ?>"><?php echo $datum->first_name." ".$datum->last_name; ?></user>
        <?php endforeach ?>
    </friends>
    <notifications>
        <?php foreach ($notifications->result() as $datum): ?>
        <notice>
            <message><?php echo $datum->notification; ?></message>
            <link><?php echo $datum->link; ?></link>
            <date><?php echo mysqldatetime_to_date($datum->date); ?></date>
            <type><?php echo $datum->type; ?></type>
        </notice>
        <?php endforeach ?>
    </notifications>
    <inbox><?php if($inbox) echo "yes"; else echo "no"; ?></inbox>
    <container>
        <friend><?php if($container['friend']) echo "yes"; else echo "no"; ?></friend>
        <thread><?php if($container['thread']) echo "yes"; else echo "no"; ?></thread>
        <classinfo><?php if($container['classinfo']) echo "yes"; else echo "no"; ?></classinfo>
    </container>
</data>