<?php
if($_POST['has_sub']){

    include('conf.php');
    //mysql_real_escape_string(htmlspecialchars
    $code= base64_encode($_POST['codetxt']);
    $lang=($_POST['lang']);
    $sql="insert into code values (NULL,'".$code."','".$lang."')";
    if(mysqli_query($db,$sql))
    header("Location: cd.php?id=".mysqli_insert_id($db));
else echo "Error : ".mysqli_error($db);
}
?>


<!doctype html>

<html>

<head>


    <title>AABU - CODE PASTE</title>
    <meta charset="utf-8"/>
    <link rel=stylesheet href="doc/docs.css">
    <link rel="stylesheet" href="lib/codemirror.css">
    <script src="lib/codemirror.js"></script>
    <script src="addon/edit/matchbrackets.js"></script>
    <link rel="stylesheet" href="addon/hint/show-hint.css">
    <script src="addon/hint/show-hint.js"></script>
    <script src="mode/clike/clike.js"></script>
    <style>.CodeMirror {border: 2px inset #dee; height: 40em;width: 40em;}</style>
    <style>
#foot{
    
          position: absolute;
          right: 0;
          top: 100%;
          left: 0;
          padding: 1rem;
          text-align: center;
    }

</style>
</head>
<body>

    <form name="FORM" action="index.php" method="post">
        <div style="margin-left: 50px;">
            <h1><a href="index.php">AABU - code paste</a></h1>
            <input type="hidden" value="1" name="has_sub">
            <div id="area"><textarea id="cpp-code" name="codetxt">//code here</textarea></div>
            <input type="submit" name="submit" value='Save Code'>
            <input type="hidden" name="lang" value="cpp" id="language">
        <select onchange="done()" id="option">
            <option value="c-code" >c</option>
            <option value="cpp-code" selected>cpp</option>
            <option value="java-code" >java</option>
            <option value="scala-code" >scala</option>
            <option value="csharp-code" >csharp</option>
        </select></div>
    </form>


    <script>
        function done(){

            var x=document.getElementById('option');
            var lang=document.getElementById('language');
            var ed=document.getElementById('area');
            ed.innerHTML= "<textarea id=\'"+ x.value+"\' name=\'codetxt\'>//code here</textarea>";
            var md;
            if(x.value=="c-code"){
                md="text/x-csrc";
                lang.value='c';
            }else if(x.value=="cpp-code"){
                md="text/x-c++src";
                lang.value='cpp';
            }else if(x.value=="java-code"){
            md="text/x-java";
                lang.value='java';
            }else if(x.value=="scala-code"){
            md="text/x-scala";
                lang.value='scala';
            }else  if(x.value=="csharp-code"){
            md="text/x-csharp";
                lang.value='csharp';
            }

            var cppEditor = CodeMirror.fromTextArea(document.getElementById(x.value), {
                lineNumbers: true,
                matchBrackets: true,
                mode: md
            });

        }


window.onload=act();

    function act(){
        var cppEditor = CodeMirror.fromTextArea(document.getElementById("cpp-code"), {
            lineNumbers: true,
            matchBrackets: true,
            mode: "text/x-c++src"
        });




    var mac = CodeMirror.keyMap.default == CodeMirror.keyMap.macDefault;
    CodeMirror.keyMap.default[(mac ? "Cmd" : "Ctrl") + "-Space"] = "autocomplete";
}
    </script>
    <footer id='foot'>
        <p>DEVELOPED BY <a href="http://bakeralharoun.ml" title="bkrtoni" target="_blank" class="w3-hover-opacity"  style="text-algin:center; text-decoration: none;">baker alharoun</a> &copy; 2016</p>
    </footer>
</body>
</html>	