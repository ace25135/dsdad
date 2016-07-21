<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http:
//www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
	xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Albums</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min
.js"></script>
</head>
<body>
	<div id="fb-root"></div>
	<script src="//connect.facebook.net/en_US/all.js"></script>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId : '198193930582303',
				channelURL : 'goodgoodeateateat.herokuapp.com/channel.html',
				status : true,
				cookie : true, 
				oauth : true,
				xfbml : true
			});
		};		
		
		 function getFbl() {
//query1是取得相簿資訊
//query2是取得相片資訊
			 FB.api({
			      method: 'fql.multiquery',
			      queries: {
			         query1: 'select object_id,aid,name,
link,photo_count,cover_object_id from album where owner = me()',
			         query2: 'SELECT album_object_id,pid,
src, src_big FROM photo WHERE album_object_id  IN (SELECT object_id 
FROM #query1)'
			      }
			     },
			     function(response) {
			         var parsed = new Array();
				 //相簿資訊
			         $(response[0].fql_result_set).each(
function(index,value){
			                var name = value.name;//相簿名
稱
			                var photoCount = value.photo_
count;//相簿內的相片總數
			var objectId = value.object_id;//相簿內的id
			         });
			         //相片資訊
			         $(response[1].fql_result_set).each(
function(index,value){
			//對應上述objectId，可以得知該相片是那個相簿
var albumObjectId = value.album_object_id;
			                var src = value.src;//相片的
url(小圖)
			                var srcBig = value.src_big;
//相片的url(大圖)
			         });
			 });
		 }
	</script>
	這是fb的按鈕，user_photos是要取得個人相簿的參數，可以不用多呼叫
FB.login，但按鈕會是fb的樣式<br/>
<fb:login-button scope="user_photos" onlogin="getFbl">Albums</fb:
login-button><br/>
</body>
</html> 