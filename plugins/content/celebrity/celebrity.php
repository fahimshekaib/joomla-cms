<?php
defined( '_JEXEC' ) or die;

class plgContentCelebrity extends JPlugin
{
	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{
		$cities = array('/(celebrity)/i');
		//$url = JRoute::_('index.php?option=com_content&view=article');
		$url = JRoute::_('http://www.celebrityphilosopher.com');
		$replacement = '<a href="' . $url . '" target="_blank">$1</a>';
		$article->text = preg_replace($cities, $replacement, $article->text);
	}
}
