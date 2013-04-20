<?php
//Jackson Lo
//FlyerFlo Reddit URL Image Grabber

//Include simple HTML DOM Parser Library
include ('simple_html_dom.php');

//URL here
$url = $_GET['my_url'];

//Check if URL is valid
if (filter_var($url, FILTER_VALIDATE_URL) === FALSE || stristr($url, "reddit.com/r/") === FALSE)
{
    die('Not a valid URL. Please go back and re-enter.');
}

//Create DOM
$html = file_get_html($url);

//Find
foreach($html->find('#header-img') as $result)
{
	echo $result;
}

//Extract to File
$location = $_GET['location'];
$start = strstr($result, "http");
$length = strripos($start, ".png") + 4;

$imageurl = strrev(substr(strrev($start), strlen($start) - $length));

if(copy($imageurl, $location . '/' . $_GET['filename'] . '.png'))
{
	echo '<br>' . "The Image above has been saved as the name " . $_GET['filename'] . " to " . $location . '<br>';
}
else
{
	echo '<br>' . "Error, the image was unable to be saved." . '<br>';
}


?>
<form action = "index.php" method = "get">
<input type = "submit" value = "Back">
</form>
