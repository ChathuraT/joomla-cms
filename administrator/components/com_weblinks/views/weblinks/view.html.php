<?php
/**
 * @version		$Id$
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
 * HTML View class for the WebLinks component
 *
 * @package		Joomla.Administrator
 * @subpackage	Weblinks
 * @since		1.5
 */
class WeblinksViewWeblinks extends JView
{
	public $state;
	public $items;
	public $pagination;
	public $filter_state;

	/**
	 * Display the view
	 *
	 * @return	void
	 */
	public function display($tpl = null)
	{
		$state		= &$this->get('State');
		$items		= &$this->get('Items');
		$pagination = &$this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		// Build the active state filter options.
		$options	= array();
		$options[]	= JHtml::_('select.option', '*', 'JSelect_Any');
		$options[]	= JHtml::_('select.option', '0', 'JSelect_UnPublished');
		$options[]	= JHtml::_('select.option', '1', 'JSelect_Published');
		$options[]	= JHtml::_('select.option', '-1', 'Weblinks_Reported');

		$this->assignRef('state',			$state);
		$this->assignRef('items',			$items);
		$this->assignRef('pagination',		$pagination);
		$this->assignRef('filter_state',	$options);

		parent::display($tpl);
		$this->_setToolbar();
	}

	/**
	 * Setup the Toolbar
	 */
	protected function _setToolbar()
	{
		JToolBarHelper::title(JText::_('Weblinks Manager'), 'generic.png');
		JToolBarHelper::publishList('weblinks.publish');
		JToolBarHelper::unpublishList('weblinks.unpublish');
		JToolBarHelper::deleteList('', 'weblinks.delete');
		JToolBarHelper::editListX('weblink.edit');
		JToolBarHelper::addNewX('weblink.add');
		JToolBarHelper::preferences('com_weblinks', '480');
		JToolBarHelper::help('screen.weblink');
	}
}