<?php
/**
 * Created by PhpStorm.
 * User: baker
 * Date: 06/08/2016
 * Time: 05:45 ص
 */
$string='';
$id=$_GET['id'];
include('conf.php');

$sql="select * from code where id=$id";
$res=mysqli_query($db,$sql);
$row=mysqli_fetch_array($res,MYSQLI_BOTH);
$cNum=mysqli_num_rows($res);
if(!$cNum){
    header("Location: index.php");
}else{
    $string=htmlspecialchars(base64_decode($row['code']));
}
//   htmlspecialchars
?>

<html>
<head>
    <script type="text/javascript" src="texthighlight/sh_main.js"></script>
    <script type="text/javascript" src="texthighlight/sh_<?echo $row['lang'];?>.min.js"></script>
    <link type="text/css" rel="stylesheet" href="texthighlight/sh_style.css">


    <title>AABU - CODE PASTE</title>
    <meta charset="utf-8"/>
    <link rel=stylesheet href="doc/docs.css">
    <link rel="stylesheet" href="lib/codemirror.css">

    <style>

    #txtblock{
        width: 60em;
        border: solid 1px black;


        white-space: pre-wrap;       /* css-3 */
        white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
        white-space: -o-pre-wrap;    /* Opera 7 */
        word-wrap: break-word;       /* Internet Explorer 5.5+ */


    }
    
    #foot{
    
          position: absolute;
          right: 0;
          left:0;
          top 100%;
          padding: 1rem;
          text-align: center;
    }
</style>

</head>


<body onload="sh_highlightDocument('sh_<?echo $row['lang'];?>','.min.js')">

<div style="margin-left: 50px;">
    <h1><a href="index.php">AABU - code paste</a></h1>
<pre class="sh_<?echo $row['lang'];?>" id="txtblock">
<? echo $string;?>
</pre>
    </div>

<script>
/*
    function copy(){
        var text=document.getElementById('txtblock').innerText;
        text.selectAll(text.value);
        clipboardData()
    }*/

</script>

<center>
<footer align="center" id='foot'>
    <p>DEVELOPED BY <a href="http://bakeralharoun.ml" title="bkrtoni" target="_blank" class="w3-hover-opacity"  style="text-decoration: none;">baker alharoun</a> &copy; 2016</p>
</footer>
</center>
</body>
</html>
	