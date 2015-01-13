<?php 
/**
 * Plugin Name: Link Back Badge Widget
 * Plugin URI: http://wordpress.org/plugins/link-back-badge-widget/
 * Description: Displays a badge and an HTML code box as a widget to ease your site visitor linking back to your website.
 * Author: Yudhistira Mauris
 * Author URI: http://www.yudhistiramauris.com
 * Version: 1.0.2
 * License: GPLv2
 */

/**
 * 	Copyright 2014 Yudhistira Mauris (email: contact@yudhistiramauris.com)
 *
 *	This program is free software; you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License, version 2, as 
 *	published by the Free Software Foundation.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License
 *	along with this program; if not, write to the Free Software
 *	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
 */

/************************
 * GLOBAL VARIABLES
 ***********************/

$lbbw_prefix      = 'lbbw_';
$lbbw_plugin_name = 'Link Back Badge Widget';

/************************
 * INCLUDE FILES
 ***********************/

include ('includes/scripts.php');
include ('includes/register-widget.php');
include ('includes/widget-class.php');