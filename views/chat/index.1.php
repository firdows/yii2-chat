<?php
/* @var $this yii\web\View */

// echo "<pre>";
// print_r($_SERVER);
$host = $_SERVER['HTTP_HOST'];
?>
<h1>chat/index</h1>

<div class="clients">test</div>

  <ul id="messages123"></ul>
    <form action="">
      <input id="m" autocomplete="off" /><button>Send</button>
    </form>
    <!--<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>-->
    <!--<script src="https://code.jquery.com/jquery-1.11.1.js"></script>-->
    
    
    
    
    
    <?php
    
    //$this->registerJsFile("https://cdn.socket.io/socket.io-1.2.0.js");
    $this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js");
    
    $js = <<< JS
      $(function () {
        var socket = io('http://{$host}/', {
          path: '/app/socket.io/'
        });
        // var socket = io();
        $('form').submit(function(){
          socket.emit('chat', $('#m').val());
          
          $('#m').val('');
          return false;
        });
        
        socket.on('chat', function(msg){
          console.log("Receipt");
          console.log(msg);
          $('#messages123').append($('<li>').text(msg));
          window.scrollTo(0, document.body.scrollHeight);
        });
        
        // socket.on('test', function(msg){
        //   console.log("Receipt");
        //   console.log(msg);
        //   $('.clients').html(msg.message);
        // });
      });
JS;

$this->registerJs($js);