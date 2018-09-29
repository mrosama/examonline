<?php

$title=@$page['title'];
$content=@$page['content'];


  $out= "<HTML DIR=RTL LANG=AR-SA>
     <head>
     <title> Print: ".$title."</title>
     <script language=JavaScript>
     function fermer()
     {
         self.close();
     }
     </script>
     </head>
     <body onload='window.print()'>
     <table width='600' border='0' align=center>
      <tr>
        <td width='100%'>
            <center>
            <table border='0' width='89%' cellspacing='0' cellpadding='0'>
              <tr>
                <td width='100%'>
                <h3 align=\"center\">".$title."</h3>
                 <font size='2'><b>".$_SERVER['HTTP_REFERER']."</b></font>
                 <hr noshade color=\"#000000\" size=\"0\" width=\"100%\">
                <font size='2'><b>".strip_tags($content)."
               </b></font>
               <hr noshade color=\"#000000\" size=\"0\" width=\"100%\">
               </td>
              </tr>
			  
			  <tr><td> <font size='2'><tt>".$_SERVER['HTTP_HOST']." &copy;  ".date("Y/m/d H:i:s A")."</tt></font></td></tr>
            </table>

        </td>
      </tr>
  </table>
</body>
</html>";

echo $out;
