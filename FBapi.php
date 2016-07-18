<?php
require_once "common.php";

if( !isset( $_SESSION['facebook_access_token'] ) ){
    header("Location: index.php");
    exit;
}

$token= $_SESSION['753579bfc36f9410f0e8cfac70f73e23'];

try {
    // Returns a `Facebook\FacebookResponse` object
    $response= $fb->get('/me?fields=id,name,first_name,last_name,gender,link,birthday,location,picture', $token);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

$user= $response->getGraphUser();

$albums = $fb->get('/me/albums', $token);

$action = ( isset($_REQUEST['action']) ) ? $_REQUEST['action'] : null;

$album_id = '';
if($action=='viewalbum'){
    $album_id = $_REQUEST['album_id'];
    $photos = $fb->get("/{$album_id}/photos?fields=picture", $token)->getGraphEdge()->asArray();
    ?>
    <div class="slideshow">
        <?php
        foreach($photos as $photo)
        {
            echo " <img src='{$photo['picture']}' /> ";
        }
        ?>
    </div>
<?php
}

$pageURL = 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
echo '<div class="alb">';
if(strstr($pageURL,'.php?')){
    $and = '&';
}else{
    $and = '?';
}

echo '<p class="hd">My Albums</p>';
foreach($albums['data'] as $album)
{
    if($album_id == $album['id']){
        $name = '<b><u>'.$album['name'].'</u></b>';
    }else{
        $name = $album['name'];
    }
    echo '<p>'."<a href=".$pageURL.$and."action=viewalbum&album_id=".$album['id'].">".$name.'</a></p>';
}
echo '</div>';