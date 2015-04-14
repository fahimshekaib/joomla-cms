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


// Querying Articles

$query = $db->getQuery(true);
$query
    ->select($db->quoteName(array('a.id', 'a.title', 'a.created')))
    ->from($db->quoteName('#__content', 'a'));

$db->setQuery($query);

$article_rows = $db->loadObjectList('id');

/*
echo "menu query results are:<br>";
echo "<pre>";
print_r($menu_rows);
echo "</pre>";

echo "article query results are:<br>";
echo "<pre>";
print_r($article_rows);
echo "</pre>";
*/
foreach($menu_rows as $menu_row){
	$findid = str_replace("index.php?option=com_content&view=article&id=","",$menu_row->link);
	$menu_row->articletitle = $article_rows[$findid]->title;
	$menu_row->created = $article_rows[$findid]->created;
	$menu_row->articleid = $findid;
	}

//echo "<pre>";
//print_r($menu_rows);
//echo "</pre>";

?>


<table id="tableSortable">
    <thead>
<tr>
  <th data-sort="int">MenuID</th>
  <th data-sort="string">ArticleTitle</th>
  <th data-sort="string">ArticleCreated</th>
  <th data-sort="string">menu alias</th>
  <th data-sort="string">article id</th>
</tr>
 </thead>
  <tbody>
  <?php foreach($menu_rows as $menu_row){
	  echo "<tr>";
	  echo "<td>";
	  echo $menu_row->id;
  	  echo "</td><td>";
	  echo $menu_row->articletitle;
  	  echo "</td><td>";
	  echo $menu_row->created;
  	  echo "</td><td>";
	  echo $menu_row->alias;
  	  echo "</td><td>";
	  echo $menu_row->articleid;
  	  echo "</td>";
	  echo "</tr>";

	  }
?>
   </tbody>
</table>
