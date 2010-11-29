<table>
    <tr>
        <?php foreach ($data->result() as $datum): ?>
        <td class="profile_heading"><?php echo $datum->title; ?></td>
        <?php endforeach ?>
    </tr>
    <tr>
        <?php foreach ($data->result() as $datum): ?>
        <td valign="top">
            <div id="classmajorfeature<?php echo $datum->id; ?>" class="classroom_list_content">
                <script type="text/javascript">
                loadPage("classroom/featuringlist/<?php echo $datum->id; ?>","classmajorfeature<?php echo $datum->id; ?>");
                </script>
            </div>
        </td>
        <?php endforeach ?>
    </tr>
</table>