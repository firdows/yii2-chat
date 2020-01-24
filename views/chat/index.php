<?php
$host = $_SERVER['HTTP_HOST'];
$userId = Yii::$app->user->identity->id;
$username = $userId = Yii::$app->user->identity->username;
?>

<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                Away</a></li>
                            <li class="divider"></li>
                            <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="chat">
                        <!--<li class="left clearfix"><span class="chat-img pull-left">-->
                        <!--    <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />-->
                        <!--</span>-->
                        <!--    <div class="chat-body clearfix">-->
                        <!--        <div class="header">-->
                        <!--            <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">-->
                        <!--                <span class="glyphicon glyphicon-time"></span>12 mins ago</small>-->
                        <!--        </div>-->
                        <!--        <p>-->
                        <!--            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare-->
                        <!--            dolor, quis ullamcorper ligula sodales.-->
                        <!--        </p>-->
                        <!--    </div>-->
                        <!--</li>-->
                        <!--<li class="right clearfix"><span class="chat-img pull-right">-->
                        <!--    <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />-->
                        <!--</span>-->
                        <!--    <div class="chat-body clearfix">-->
                        <!--        <div class="header">-->
                        <!--            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>-->
                        <!--            <strong class="pull-right primary-font">Bhaumik Patel</strong>-->
                        <!--        </div>-->
                        <!--        <p>-->
                        <!--            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare-->
                        <!--            dolor, quis ullamcorper ligula sodales.-->
                        <!--        </p>-->
                        <!--    </div>-->
                        <!--</li>-->
                    </ul>
                </div>
                <div class="panel-footer">
                  <form action="">
                    <div class="input-group">
                      
      <!--<input id="m" autocomplete="off" /><button>Send</button>-->
   
                      
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." autocomplete="off"/>
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span> 
                       
                    </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
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
          var data = {
            "user":"{$userId}",
            "username":"{$username}",
            "message":$('#btn-input').val()
          }
          socket.emit('chat', data);
         
          var temp = '<li class="right clearfix"><span class="chat-img pull-right"><img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" /></span><div class="chat-body clearfix"><div class="header"><small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small><strong class="pull-right primary-font">ME</strong></div><p class="msg"></p></div></li>';
                                  
                        
          //$('ul.chat').append($('<li class="left clearfix"></li>').text($('#btn-input').val()));
          $('#btn-input').val('');
          
          
          return false;
        });
        
        socket.on('chat', function(data){
           console.log("Receipt");
          console.log(data);
          //data = data.toString();
          var message = data;
          //message = data;
         
          var msg = message.message;
          
          
          if(message.user == "{$userId}"){
              var tempME = '<li class="right clearfix"><span class="chat-img pull-right"><img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" /></span><div class="chat-body clearfix"><div class="header"><small class=" text-muted"><span class="glyphicon glyphicon-time"></span>1 mins ago</small><strong class="pull-right primary-font">'+message.user+'</strong></div><p class="msg">'+msg+'</p></div></li>';
            $('ul.chat').append(tempME);
          }else{
              var tempU = ' <li class="left clearfix"><span class="chat-img pull-left"><img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font">'+message.user+'</strong> <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>1 mins ago</small></div><p>'+msg+'</p></div></li>';
            $('ul.chat').append(tempU);
          }
          window.scrollTo(0, document.body.scrollHeight);
          
          
          Notification.requestPermission(function(status) {
            console.log('Notification permission status:', status);
        });
        });
        
      
      });
JS;

$this->registerJs($js);