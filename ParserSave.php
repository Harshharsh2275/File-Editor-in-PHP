<meta name="HandheldFreindly" content="true" >
<meta name="viewport" content="width=device-width,initial-scale=1.0,viewport-fit=cover"  >
<script src="chatbot/jquery/jquery.js"></script>
<style>
*{
margin:0;
padding:0;
}
body{
       background: #111;
}
.write{
height:100%;
overflow: ;
width:100%;
font-size:20px;
position:absolute;
background:#111;
color:#fff;
outline: none;
border: none;
padding: 2px 0px;
}
.write p{
       width: 100%;
       height: auto;
       word-wrap: break-word;
}
.write p:hover{
       background-color: #797979;
}
.cont-save{
    width: 100%;
    height: 60px;
    background: #414141;
    box-sizing: border-box;
    color: #fff;
    box-shadow: 0px 0px 10px #282828;
    position: fixed;
    bottom: 0;
}
.save{
       position: absolute;
       height: auto;
       width: auto;
       font-size: 20px;
       padding: 5px 10px;
       outline: none;
       border: none;
       background: #111;
       color: #fff;
       left: 5%;
       top: 50%;
       transform: translate(-5%,-50%);
       color: #fff;
       font-weight: 500;
}
.dev-name{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
}
.dev-name strong{
  color: #fff;
  font-weight: 400;
  font-size: 28px;
  letter-spacing: 3px;
  font-family: sans-serif;
}
.select-font-size{
  position: absolute;
  top: 50%;
  right: 10%;
  transform: translate(-20%,-50%);
}
.select-font-size input{
         height: auto;
       width: 40px;
       font-size: 20px;
       padding: 5px 10px;
       outline: none;
       border: none;
       background: #111;
       color: #fff;
       font-weight: 500;
       outline: none;;
}
.select-font-size select option:hover{
  background: #818181;
}
</style>
<script>
    function ajaxSave() {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
               document.getElementById("write").innerHTML = ajax.responseText;                
            }
        }
            ajax.open("POST","file_reader.php",true);
            ajax.send();
    }
   // setInterval(function () { ajaxSave() },11000);
</script>
<body onload="ajaxSave()">
<form action='' method='post'>
<pre><code contenteditable='true' class='write' id='write' name='write'>
  </code></pre>
<div class="cont-save">
<input type="submit" value="Save" name="submit" class="save" />
<div class="dev-name">
  <h1>
    <strong><big>@</big><span>HarshPathak<sup>&copy;</sup></span></strong>
  </h1>
</div>
<div class="select-font-size">
  <input type="text" id="font-size" placeholder="20" onkeyup="SetSize(this)">
</div>
</div>
</form>
<script type="text/javascript">

var status = false;

  function SetSize() {
    var test = document.getElementById("font-size").value;
    for (let i = 0; i < 9; i++) {
      if (i == test && test != '') {
        document.getElementById("write").style.fontSize = test+"0"+"px";
        cument.getElementById("font-size").innerHTML = "";
      }
      else{
        status = true;
      }
    }
    if (status) {
      alert("Please provide a valid Input 1,2,3,4,5,6,7,8");
    }
  }

  

</script>
</body>
<?php

if(isset($_POST['submit'])){

$data = sprintf($_POST['write']);
$file = fopen("test_sockets.php","w+");
$write = fwrite($file,$data);
if ($write) {
   ?>
   <script>
   alert("successfully saved");
   </script>
   <?php
    fclose($file);
}
}

?>


