<?php
function get_content($name){
  $dd="";
  $conn = mysqli_connect("localhost", "root", "", "nrb");
  $result = mysqli_query($conn,"SELECT * FROM `songs`");
  while($data = mysqli_fetch_assoc($result)){
      $dd= $data[$name];
      echo"'$dd',";
  }
  mysqli_close($conn); // 디비 접속 닫기
}

?>
<html>
  <head>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  
  <meta charset="EUC-KR">
    <style>
      @font-face {
          font-family: 'NanumSquareRound';
          src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_two@1.0/NanumSquareRound.woff') format('woff');
          font-weight: normal;
          font-style: normal;
      }

      body{
        margin:0;
        padding:0;
        background-color:black;
        color:white;
      }
      .titleOV{
        position:absolute;
        width:100%;
        text-align:center;
        color:white;
        background-color: rgba(0, 0, 0, 0.514);
      }
      .ov{
        position:absolute;
        background-color:green;
        width:100%;
        height:100%;
        display:none;
        text-align:center;
        margin:0 auto;
        color:white;
      }
      .err{
        font-family: 'NanumSquareRound';
        position:absolute; 
        text-align:center; 
        margin-top:60px;
        width:100%;
        display:none;
      }
      #songlist{
        font-family: 'NanumSquareRound';
        margin: 7;
        padding: 7;
      }
      #myVideo {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%; 
      min-height: 100%;
      z-index: -1;
    }
    .overlay{
    position: absolute;
    background-color: #00000055;
    width: 100%;
    height:100%;
    z-index: -1;
  }
  .title{
    font-family: 'NanumSquareRound';
    font-size:3em;
    position: absolute;
    width:100%;
    text-align:center;
    margin-top:200px;
    z-index: -1;
  }
    </style>
  </head>

  <body>
      <video autoplay muted loop id="myVideo">
        <source src="intro.mp4" type="video/mp4">
        브라우저가 HTML5 비디오를 지원하지 않습니다.
      </video>
      <div class="overlay"></div>

  <div id="tt" class="titleOv">
    <h3 id="songlist"></h3>
    </div>
    <div class="title">
      <h1>☆ 노래방 v1.5 ☆</h1>
      <h1>예약해 주세요</h1>
    </div>
    <div id="error" class="err"> 
    <h1>죄송합니다. 이 곡은 저작권 문제로 지원되지 않습니다. 
      <br>그러므로 자동으로 채창에서 실행됩니다. 곡이 끝나고 다시 돌아와서 취소 해주세요.</h1>
  </div>
 
  <div style="display:none" id="player"></div>
  <script>
    var vids = [];
    var sl = document.getElementById('songlist');
const intervalId = setInterval(refresh, 500);

function refresh() {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", "songs.php?name=vid&str=0", false ); // false for synchronous request
    xmlHttp.send( null );
    vids=xmlHttp.responseText.slice(0, -1).split(",");
   
   var xmlHttp2 = new XMLHttpRequest();
    xmlHttp2.open( "GET", "songs.php?name=title&str=2", false ); // false for synchronous request
    xmlHttp2.send( null );
    sl.innerHTML="현재곡 / 예약곡 : " + xmlHttp2.responseText.slice(0, -3);
   }
refresh();



var tag = document.createElement('script');
var ov = document.getElementById('ov');
var tt = document.getElementById('tt');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var en = localStorage.getItem("KeyEn");
var dn =1;
if(en==undefined){
  localStorage.setItem("KeyEn",1);
}
var player;

var cf;
function onYouTubeIframeAPIReady() {
  cursong=sl.innerHTML.split('/');
  player = new YT.Player('player', {
    height: '100%',
    width: '100%',
    videoId: vids[0].replace("'","").replace("'",""),
    playerVars: { 'autoplay': 1, 'controls': 0 },
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
  
}
// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
  event.target.playVideo();
  if(player.getPlayerState()==-1){
    document.getElementById('error').style.display="block";
    var nurl="https://www.youtube.com/watch?v="+vids[0].replace("'","");
    window.open(nurl, '_blank').focus();
  }
}

 
var cursong;
console.log(vids[0].replace("'","").replace("'",""));
function onPlayerStateChange(event) {
  
  console.log(player.getPlayerState());
  if(player.getPlayerState()==0){
    $(function() {
      $.ajax({
          url: 'manage.php',
          type: 'POST',
          data: {
              action: 'remove',
          },              
      });
  });
  player.loadVideoById(vids[0].replace("'","").replace("'",""));
  }
  else if(player.getPlayerState()==-1 && vids[0]!=0){
    document.getElementById('error').style.display="block";
  }
}


  const chkEnd = setInterval(ddv, 500);
  function ddv(){
    if(sl.innerHTML=="현재곡 / 예약곡 : "){
    const chkEnd = setInterval(ddf, 500);
    cf=1;
    document.getElementById('player').style.display="none";
    document.getElementById('error').style.display="none";
  }else{
    ddf();
    document.getElementById('player').style.display="block";
    
    cf=0;
  }
}

function ddf(){
    en=localStorage.getItem("KeyEn");
    if(cf==1 || sl.innerHTML.includes(cursong[1])==false){
      if(vids[0].length>12){
        location.reload();
        localStorage.setItem("KeyEn", 1);
      }
      if(cursong[1].length==7){
        
        if(en==1){
          player.stopVideo();
          localStorage.setItem("KeyEn", 0);
          location.reload();
          
        }
      }
   }if(vids[0].length==0){
    if(dn==1){
      player.stopVideo();
      dn=0;
    }
    
   }
  }
  </script>
  
  </body>

</html>