<!--
To change this template, choose Tools | Templates
and open the template in the editor.
<?php
    function getProvince()
    {
         return array('car','bike');
    }
    function getDistrict($provinceName)
    {
        if($provinceName == "bike")
            return array('tvs','yamaha','honda');
        else if($provinceName == "car")
            return array('a','aha','aahonda');
        else
            return array('blank');
    }
?>

-->


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript">
            var dataset = new Array();
            <?php $province = getProvince();?>
            <?php foreach ($province as $value):?>
                dataset['<?php echo $value;?>'] = new Array();
                <?php $dist = getDistrict($value); ?>
                <?php for($index = 0; $index < count($dist); $index++ ): ?>
                    dataset['<?php echo $value;?>'][<?php echo $index; ?>] = "<?php echo $dist[$index]; ?>";
                <?php endfor ?>
            <?php endforeach ?>
                
            function changeData(province)
            {
                elem = document.getElementById('data');
                elem.innerHTML = "";
                for(i=0;i<dataset[province].length;i++)
                {
                    optionelem = document.createElement('option');
                    optionelem.setAttribute('value', dataset[province][i]);
                    optionelem.innerHTML = dataset[province][i];
                    elem.appendChild(optionelem);
                }
            }
        </script>
    </head>
    <body>
        <select onchange="changeData(this.value)">
            <option value="car">car</option>
            <option value="bike">bike</option>
        </select>

        <select id="data" onchange="">
            
        </select>

    </body>
</html>
