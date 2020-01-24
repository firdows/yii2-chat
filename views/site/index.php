<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>

<button  id="notifyMe">Notify me!</button>
<?php
  $js = <<< JS
  $(function(){
     $('#notifyMe').click(function(){
         notifyMe();
     });
     var notification = new Notification('hello', {
      body: "Hey there!",
    });
  });
 
  // request permission on page load
document.addEventListener('DOMContentLoaded', function() {
 if (!Notification) {
  alert('Desktop notifications not available in your browser. Try Chromium.');
  return;
 }

 if (Notification.permission !== 'granted')
  Notification.requestPermission();
});


function notifyMe() {
    console.log(Notification.permission);
 if (Notification.permission !== 'granted')
  Notification.requestPermission();
 else {
  var notification = new Notification('Notification title', {
   icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
   body: 'Hey there! You\'ve been notified!',
  });
  notification.onclick = function() {
   window.open('http://stackoverflow.com/a/13328397/1269037');
  };
 }
}

JS;

//$this->registerJs($js);