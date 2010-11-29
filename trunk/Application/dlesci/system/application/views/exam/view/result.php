<br/>
<span class="profile_heading">total weight : </span>
<span class="profile_label"><?php echo $total;?> </span>
<br/>
<br/>
<span class="profile_heading">correct : </span>
<span class="profile_label"><?php echo $correct;?></span>
<br/>
<hr/>
<br/>
<span class="profile_label" style="font-size: 20px">
    <?php
            $answer = $correct/$total;
            $answer *= 100;
            echo $answer;
    ?>
    %
</span>