 <?php
  $opts = array(
         'url' => base_url().'index.php/classroom/ownlist'
        ,'update'=>'ownclasslist'
        ,'loading'=>'setLoading(\'ownclasslist\',\''.
                     base_url().'image/icons/load.gif\')');
?>
    <script>
    <?php echo $this->ajax->remote_function($opts);?>
    </script>