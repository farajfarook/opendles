<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style>
            .alertmsg
            {
                font-family:Verdana, Geneva, sans-serif;
                font-size:15px;
                color:#2999ca;
                padding:10px;
            }
        </style>
    </head>
    <body>
        <span class="alertmsg">
        <?php
            if(isset ($msg)) echo $msg;
        ?>
        </span>
    </body>
</html>
