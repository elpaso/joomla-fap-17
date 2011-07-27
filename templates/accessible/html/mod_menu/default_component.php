<?php
/**
 * @version     $Id: default_component.php 21322 2011-05-11 01:10:29Z dextercowley $
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Access keys load

require_once dirname(__FILE__) . DS. "accesskey_helper.php";
$accesskeys = AccesskeyHelper::getAccessKeys();
$titles     = AccesskeyHelper::getTitles();

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="'.$item->anchor_css.'" ' : '';
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
if ($item->menu_image) {
        $item->params->get('menu_text', 1 ) ?
        $linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
        $linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
}
else { $linktype = $item->title;
}

switch ($item->browserNav) :
    default:
    case 0:
?><a<?php if($titles[$item->id]){ echo " title='{$titles[$item->id]}'"; } ?><?php if($accesskeys[$item->id]){ echo " accesskey='{$accesskeys[$item->id]}'"; } ?> <?php echo $class; ?>href="<?php echo $item->flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
        break;
    case 2:// window.open
    case 1:
        // _blank
?><a<?php if($titles[$item->id]){ echo " title='{$titles[$item->id]}'"; } ?><?php if($accesskeys[$item->id]){ echo " accesskey='{$accesskeys[$item->id]}'"; } ?> <?php echo $class; ?>href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
        break;
endswitch;
