<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body><?php
    session_start();
    if( empty( $_SESSION['quiz'] ) )$_SESSION['quiz']=date('Y-m-d H:i:s');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <script language ="javascript" >
    <?php
              $start=$_SESSION['quiz'];
              $end=date('Y-m-d H:i:s', strtotime( $_SESSION['quiz'] . ' +20 minutes' ) );
                echo "
                    var date_quiz_start='$start';
                    var date_quiz_end='$end';
                    var time_quiz_end=new Date('$end').getTime();";
      ?>
        var tim;
        var hour= 00;
        var min = 0;
        var sec = 60;
        var f = new Date();
        function f1() {
            f2();
            document.getElementById("starttime").innerHTML = "Your started your Exam at 1 PM ";
			document.getElementById("endtime").innerHTML = "Exam ending time at 3 PM";
        }
        function f2() {
            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = "Your Left Time  is :"+hour+" hours:"+min+" Minutes :" + sec+" Seconds";
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                    min = parseInt(min) - 1;
                    if (parseInt(min) == 0) {
                        clearTimeout(tim);
                        location.href ="index.php";
                    }
                    else {
                        sec = 60;
                        document.getElementById("showtime").innerHTML = "Your Left Time  is :" + min + " Minutes ," + sec + " Seconds";
                        tim = setTimeout("f2()", 1000);
                    }
                }
            }
        }
    </script>
</head>

<?php $target = mktime(0, 0, 0, 2, 10, 2017) ; 
$today = time () ; 
$difference =($target-$today) ; 
$days =(int) ($difference/86400) ;
 print "Our event will occur in $days days";
 
 ?>
 
<body onload="f1()" >
    <form id="form1" runat="server">
    <div>
      <table width="100%" align="center">
        <tr>
          <td colspan="2">
          </td>
        </tr>
        <tr>
          <td>
            <div id="starttime"></div><br />
            <div id="endtime"></div><br />
            <div id="showtime"></div>
          </td>
        </tr>
        <tr>
          <td>
              <br />
          </td>
        </tr>
      </table>
      <br />
    </div>
    </form>
</body>
</html>
