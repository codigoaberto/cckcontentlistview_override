<?php
/**
 * Main Plugin File
 * Does all the magic!
 *
 * @package         SEBLOD CCK CONTENT LIST OVERRIDE
 * @version         1.0.0
 *
 * @author          Marcio Marques <marcio.marques@codigoaberto.pt>
 * @link            http://www.codigoaberto.pt
 * @copyright       Copyright © 2014 Codigo Aberto All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;
jimport('joomla.filesystem.file');
	if (JFactory::getApplication()->input->get('option') == 'com_content' && JFactory::getApplication()->isAdmin())	{
		$classes = get_declared_classes();
		if (!in_array('ContentModelArticles', $classes) && !in_array('ContentModelArticles', $classes))
		{
			require_once JPATH_PLUGINS . '/system/cckcontentlist/models/articles.php';
		}
    }
class plgSystemCckContentList extends JPlugin {

       public function __construct(&$subject, $config = array()) {
          parent::__construct($subject, $config);
      }
 
      public function onAfterRoute() {
		$app = JFactory::getApplication();
		if ((JFactory::getApplication()->input->get('option') == 'com_content' && JFactory::getApplication()->isAdmin() && JFactory::getApplication()->input->get('view') == '') || (JFactory::getApplication()->input->get('option') == 'com_content' && JFactory::getApplication()->isAdmin() && JFactory::getApplication()->input->get('view') == 'articles'))	
		{
			require_once JPATH_PLUGINS . '/system/cckcontentlist/views/view.html.php';
		}
	  }
 
 }