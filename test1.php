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
//query1�O���o��ï��T
//query2�O���o�ۤ���T
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
				 //��ï��T
			         $(response[0].fql_result_set).each(
function(index,value){
			                var name = value.name;//��ï�W
��
			                var photoCount = value.photo_
count;//��ï�����ۤ��`��
			var objectId = value.object_id;//��ï����id
			         });
			         //�ۤ���T
			         $(response[1].fql_result_set).each(
function(index,value){
			//�����W�zobjectId�A�i�H�o���Ӭۤ��O���Ӭ�ï
var albumObjectId = value.album_object_id;
			                var src = value.src;//�ۤ���
url(�p��)
			                var srcBig = value.src_big;
//�ۤ���url(�j��)
			         });
			 });
		 }
	</script>
	�o�Ofb�����s�Auser_photos�O�n���o�ӤH��ï���ѼơA�i�H���Φh�I�s
FB.login�A�����s�|�Ofb���˦�<br/>
<fb:login-button scope="user_photos" onlogin="getFbl">Albums</fb:
login-button><br/>
</body>
</html> 