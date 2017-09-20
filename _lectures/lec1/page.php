<?php
header("Content-type: text/html;");
header("Charset: UTF-8;");

$title = "MYPAGE";
$url = "http://php7-herrhorror775553.codeanyapp.com/index_ajax.php";
$content = "
<html>
  <head>
    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js\"></script>
   
    <title>{$title}</title>
  </head>
  <body style = \"background: black;\">
      <input type=\"text\" id=\"id_q\" name=\"q\" value=\"input search text\" />
      <div id=\"id_ajax\" style=\"background: white; border: 1px solid red; height: 50px;\">
        ТУТ ПОЯВИТСЯ АЯКСОВЫЙ КОНТЕНТ
      </div>
      <button id=\"id_button\" onclick=\"
      
         
      

      \">Click me</button>
       <script type=\"text/javascript\">
    $( \"#id_q\" ).keyup(function() {
             $.ajax({
                    url: '{$url}?q='+ document.getElementById('id_q').value
                 }).done(function(data) {
                 
                    document.getElementById('id_ajax').innerHTML= data;
                  });
        });
    </script>
  </body>  
</html>
";
echo $content;

?>
