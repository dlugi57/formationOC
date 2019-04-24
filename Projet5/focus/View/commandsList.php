<?php

ob_start();
while ($data = $commands->fetch())
{

?>
<p><?= $data['nom_type_command'] ?></p>
<p><?= $data['name'] ?></p>
<?php
}
$commands->closeCursor();

$urlFB = "https://graph.facebook.com/";
$fb_page = 'SunnyMomentsPhoto';
$infosFB = '?fields=engagement,name,rating_count,overall_star_rating,cover,picture.height(300)&access_token=';
$access_token = 'EAAGkpQmbZCR8BAL4au06FW7vxBmNMOl1ybndBuITDs2szMaapszs0YT7SZCWs1zLHdy7KyCRRur2MAxDTZADrO1bhGyVu47hDXRue2ew8RRw1fwdZBvgm94PtZAunlwFmHOg4mu6kWan0TLKMrBCteRe361D6sE9VNkeWZCvXZA1244UyY0syiW';
$url = $urlFB.$fb_page.$infosFB.$access_token;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($curl);
print_r($result);
curl_close($curl);
$detailsFB = json_decode($result,true);
print_r($detailsFB);
//rating note
$noteFB = $detailsFB['rating_count'];
//rating
$ratingFB = $detailsFB['overall_star_rating'];
//name
$nameFB = $detailsFB['name'];
//Likes
$likesFb = $detailsFB['engagement']['count'];

//cover photo
$coverFb = $detailsFB['cover']['source'];
//photo
$profilePhotoFB = $detailsFB['picture']['data']['url'];



$content = ob_get_clean();
require('template.php');
 ?>
