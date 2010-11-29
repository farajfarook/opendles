<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript">
        //selectbox,text,value
        function addOption(selectbox,text,value)
        {
                var optn = document.createElement("OPTION");
                optn.text = text;
                optn.value = value;
                //document.sessionform.session_list.options.add(optn);
                selectbox.options.add(optn);
                alert(optn.text);
        }

        function addOption_list()
        {
            var v = document.sessionform.startT.value;
            window.location.reload();
            var session = new Array("January","February","March","April","May");
            //var session = new Array();
            var size = session.length;
            session[size] = v;
            for (var i=0; i < session.length;++i)
            {
                addOption(document.sessionform.session_list, session[i], i+1);
            }
        }

        function loadClassEditPage()
        {
            document.location = 'http://localhost/dles/EditClass.php';
        }

        function loadSessionEditPage()
        {
            document.location = 'http://localhost/dles/EditSession.php';
        }
    </script>
  </head>
  <body>
      <form name="sessionform" action="SessionCreationPHP.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td><button type="button">Click Me!</button></td>
                </tr>
                <tr>
                    <td>Sessions already created:</td>
                    <td><SELECT  name="session_list">
                        <option value="0" >session list</option>
                        </SELECT></td>
                </tr>
                <tr>
                    <td>Starting Date and Time :</td>
                    <td><input type="text" name="startT" /></td>
                </tr>
                <tr>
                    <td>Finishing Date and Time :</td>
                    <td><input type="text" name="finishT" /></td>
                </tr>
                <tr>
                    <td>Session Video Location :</td>
                    <td><input type="text" name="location" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Create Session" /><br></td>
                </tr>
                <tr>
                    <td><button type="button" onclick="loadClassEditPage()" >Edit Class</button></td>
                    <td><button type="button" onclick="loadSessionEditPage()">Edit Session</button></td>
                </tr>
            </tbody>
        </table>
      </form>
  </body>
</html>