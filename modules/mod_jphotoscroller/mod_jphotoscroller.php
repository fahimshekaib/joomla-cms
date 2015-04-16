<?php
defined( '_JEXEC' ) or die;
jimport( 'joomla.filesystem.folder' );
$all_params = json_decode($params,true); // Getting all the parameters of this module
$no_of_images = 0; // counter for the loop to display images

/* this loop will extract only the parameters related to images. 
i.e., image1 to image10 which ever are set.
*/


var_dump(json_decode($params,true)); // Test code to be removed

foreach($all_params as $key=>$value) {
	if(strpos($key, 'image') !== false && !empty($value)) {
		$no_of_images++;
		var_dump($value) . "<br/>"; // Test code to be removed
		$image_name[] = str_replace("http://localhost/j341a/images/rslide/","",$value);
	}
}

var_dump($image_name) . "<br/>"; // Test code to be removed

echo "<ul class='rslides'>";
//$no_of_images = $no_of_images+1; // since we are starting the loop variable from 1 as image1 is the first parameter name, here we are setting the loop counter ($no_of_images) plus one.
if($params->get('radio_value')==0) {
	for($i=1;$i<=$no_of_images;$i++) {
		//echo "<img src=" . $params->get('image' . $i ) . " alt=''>";
		echo "<img src=" . JURI::root() . $params->get('image' . $i ) . " alt=''>"; // alt tag has been left for SEO in future
	}
		echo "From the URLs was selected"; // Test code to be removed
} else {
	/*for($i=1;$i<=$no_of_images;$i++) {
		//echo "<img src=" . $params->get('image' . $i ) . " alt=''>";
		echo "<img src=" . JURI::root() . $params->get('image' . $i ) . " alt=''>";
	}
	*/
//	populateFilesAndFolderList(); // Test code to be removed
$selected_folder =  $params->get('selected_folder_path', ''); // This returns the selected folder name
$directory_path = JURI::root() . $selected_folder; // This constructs the absolute URL to the selected folder
 if (! JFolder::exists($selected_folder)) {
	echo "{$directory_path} was selected"; // Test code to be removed 
	$jRootPath1 = JPath::clean(JPATH_ROOT);
		$jRootBase1 = JPath::clean(JPATH_BASE);
	echo $jRootPath1 . "<br />";
		echo $directory_path . "<br />";
 } else {
 	echo "{$directory_path} does not exist"; // Test code to be removed
 }

	
}

echo "</ul>";

