<?php
    include('config.php');
    if(isset($_POST['q'])){ 
        $q = $_POST['q'];
        if(strlen($q) > 50) die('{"status": "error"}');
        if(preg_match('/^(?:[\d\-\+\*\/\^\(\)]|abs|log|sqrt|floor|ceil|a?(?:sin|cos|tan)h?)+$/', $q)){
            file_put_contents($sandbox .'/math.txt', '$result = '.$q.';');
            die('{"status": "success", "result_url": "'. 'http://'. $host .':3141/bot.php?url=http://sandbox.local/sandbox/'. $uuid .'/math.txt' .'"}');
        }else{
            die('{"status": "error"}');
        }
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dev. Bot</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://unpkg.com/papercss@1.8.3/dist/paper.min.css">
    <link rel="stylesheet" href="./css/styles.css" /> 
  </head>

  <body>
    <div id="paper container ">
      <div class="row flex-center">
        <h1 class="title">Dev. Bot, Calculators</h1>
      </div>
      <div class="row flex-center">
        <img src="image/robot.png" alt="Random Unsplash" class="no-responsive no-border" style="width: 300px; height: 300px">
        <p id="result" style="background-image: url(image/d.png);width: 400px; height: 300px;background-repeat:no-repeat;padding: 80px;">Hola !</p>
      </div>
      <div class="paper container margin-bottom-large">
        <div class="row">
                <textarea style="width:70%; height:60px; font-size: 30px" class="math" id="math"></textarea>
                <button onclick="backspace();" style="width:10%;">←</button>
                <button onclick="document.getElementById('math').value='';document.getElementById('result').innerHTML = 'Hola !';" style="width:10%;">Clear</button>
                <button onclick="submit();" value="Submit" style="width:10%;">Submit</button>
        </div>
        <div class="row">
          <div class="col-4 col" style="padding-left: 0;padding-right: 0;">
            <button value="1" onclick="append(this)" id="math-button">1</button>
            <button value="2" onclick="append(this)" id="math-button">2</button>
            <button value="3" onclick="append(this)" id="math-button">3</button>
            <button value="4" onclick="append(this)" id="math-button">4</button>
            <button value="5" onclick="append(this)" id="math-button">5</button>
            <button value="6" onclick="append(this)" id="math-button">6</button>
            <button value="7" onclick="append(this)" id="math-button">7</button>
            <button value="8" onclick="append(this)" id="math-button">8</button>
            <button value="9" onclick="append(this)" id="math-button">9</button>
            <button value="0" onclick="append(this)" id="math-button">0</button>
            <button value="." onclick="append(this)" id="math-button">.</button>
            <button value=" " onclick="append(this)" id="math-button">　</button>
          </div>
          <div class="col-4 col" style="padding-left: 0;padding-right: 0;">
            <button value="+" onclick="append(this)" id="math-button">+</button>
            <button value="-" onclick="append(this)" id="math-button">-</button>
            <button value="*" onclick="append(this)" id="math-button">*</button>
            <button value="/" onclick="append(this)" id="math-button">/</button>
            <button value="(" onclick="append(this)" id="math-button">(</button> 
            <button value=")" onclick="append(this)" id="math-button">)</button>
            <button value="^" onclick="append(this)" id="math-button">^</button>
            <button value="abs(" onclick="append(this)" id="math-button">abs</button>
            <button value="log(" onclick="append(this)" id="math-button">log</button>
            <button value="sqrt(" onclick="append(this)" id="math-button">sqrt</button>
            <button value="floor(" onclick="append(this)" id="math-button">floor</button>
            <button value="ceil(" onclick="append(this)" id="math-button">ceil</button> 
          </div>
          <div class="col-4 col" style="padding-left: 0;padding-right: 0;">
            <button value="sin(" onclick="append(this)" id="math-button">sin</button>
            <button value="cos(" onclick="append(this)" id="math-button">cos</button>
            <button value="tan(" onclick="append(this)" id="math-button">tan</button> 
            <button value="asin(" onclick="append(this)" id="math-button">asin</button>
            <button value="acos(" onclick="append(this)" id="math-button">acos</button>
            <button value="atan(" onclick="append(this)" id="math-button">atan</button> 
            <button value="sinh(" onclick="append(this)" id="math-button">sinh</button>
            <button value="cosh(" onclick="append(this)" id="math-button">cosh</button>
            <button value="tanh(" onclick="append(this)" id="math-button">tanh</button>
            <button value="asinh(" onclick="append(this)" id="math-button">asinh</button> 
            <button value="acosh(" onclick="append(this)" id="math-button">acosh</button>
            <button value="atanh(" onclick="append(this)" id="math-button">atanh</button>
          </div>
        </div>
      </div>
    </div>
     
    <script language='javascript'>
      function append(obj){       
        var previousVal = document.getElementById("math").value;
        previousVal = previousVal + obj.value;
        document.getElementById("math").value = previousVal;
      }
      function backspace(){       
        var value = document.getElementById("math").value;
        document.getElementById("math").value = value.substr(0, value.length-1);
      }  
      function submit(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = () => {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
              console.log(xhr.response);
              const obj = JSON.parse(xhr.response);
              if(obj.status == "success"){
                get_result(obj.result_url);
              }else{
                document.getElementById("result").innerHTML = "Error";
              }
          }
        }
        let data = "q=" + encodeURIComponent(document.getElementById("math").value);
        xhr.send(data);
      }
      function get_result(url){
        let xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.onreadystatechange = () => {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            document.getElementById("result").innerHTML = xhr.response;
          }
        }
        xhr.send();
      }
    </script>
  </body>
</html>

<!--

 (\_/) 
( •_•)
/>🎁 > 「/backup.zip」

-->
