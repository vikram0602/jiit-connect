<?php
//session_start();
$updrec="";
include("facultyaccount.php");
?>
	<script type="text/javascript" src="editor/ckeditor.js"></script>
	<script src="editor/_samples/sample.js" type="text/javascript"></script>
	<link href="editor/_samples/sample.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
<!--
.style2 {font-family: Georgia, "Times New Roman", Times, serif}
.style3 {font-size: 24px}
.style4 {font-size: 18px}
-->
    </style>
	
	<div align="center">
	<form action="notice_mail.php" method="post">
	  <div align="center"> 
	    <table width="632" border="1">
          <tr>
            <td colspan="2" class="style2"><div align="center" class="style3">Subject
              <input type="text" name="sub" />
            </div></td>
          </tr>
          <tr>
            <td width="289" class="style2"><div align="center"><span class="style4">Year </span>
              <select name="year">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div></td>
            <td width="327" class="style2"><div align="center"><span class="style4">Batch</span>
              <select name="batch">
			  <option>All</option>
                <option>f1</option>
                <option>f2</option>
                <option>f3</option>
                <option>f4</option>
                <option>f5</option>
                <option>f6</option>
                <option>f7</option>
              </select>
            </div></td>
          </tr>
          <tr>
            <td colspan="2" class="style2"><textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"  ></textarea></td>
          </tr>
          <tr>
            <td colspan="2" class="style2"><div align="center">
              <input type="submit" name="Submit" value="Submit" />
            </div></td>
          </tr>
        </table>
      </div>
	</form>
</div>