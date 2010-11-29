<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
      <script type="text/javascript">
          function validate_required(field,alerttxt)
          {
              with(field)
              {
                  if(value==null || value=="")
                  {
                      alert(alerttxt);
                      return false;
                  }
                  else
                      return true;
              }
          }
          function validate_txtBox(thisform)
          {
              with(thisform)
              {
                  if(validate_required(cname, "Enter the blank text boxes") == false)
                  {
                      cname.focus();
                      return false;
                  }
              }
          }
          //onsubmit="return validate_txtBox(this)"
      </script>
    <title>Class Creation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body>
      <div>
          <form action="ClassCreationPHP.php" method="get">
              <table>
                  <tbody>
                      <tr>
                          <td>Class Name:</td>
                          <td><input type="text" name="cname" /></td>
                      </tr>
                      <tr>
                          <td>Select the Major of the Class:</td>
                          <td><select name="cmajor">
                                <option>Science
                                <option>Mathematics
                                <option>Electronics
                                <option>Histry
                                <option>Astronomy</select></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td><input type="submit" value="Create"/></td>
                      </tr>
                  </tbody>
              </table>
        </form>
      </div>
  </body>
</html>