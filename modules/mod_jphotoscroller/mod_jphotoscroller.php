<?php
defined( '_JEXEC' ) or die;
$doc = JFactory::getDocument();
$db = JFactory::getDBO();
$query = $db->getQuery(true);

$query
    ->select($db->quoteName(array('m.id', 'm.alias', 'm.link')))
    ->from($db->quoteName('#__menu', 'm'))
    ->where($db->quoteName('m.link') . ' LIKE \'index.php?option=com_content&view=article&id=%\'');

$db->setQuery($query);
$menu_rows = $db->loadObjectList();

echo "<ul class='rslides'>";

for($i=1;$i<11;$i++) {
	echo "<img src=" . $params->get('image' . $i ) . " alt=''>";
}
echo "</ul>";

  
