<?php
/**
This file is part of cscantager.

cscantager is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

cscantager is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with cscantager. If not, see <http://www.gnu.org/licenses/>.
*/ 

/**
* Name:  metadata.php
*
* Author:  Johannes Baumann
* 		   johannes.baumann@constructdoors.de
*
* Copyright: GPL v3
*
*
* Created:  3.11.2013
*
* Description:  Metadaten for cscantager
*
* Requirements: PHP5 or above / OXID PE 4.10.5
*
*/

$sMetadataVersion = '1.2';

define("CSCANTAGER_PLUGIN_VERSION", "0.0.3");

/**
 * Module information
 */
$aModule = array(
		'id'			=> 'cscantager',
		'title'			=> '[CS] Canonical Tag Switcher',
		'description'           => 'Constructdoors Canonical Tag Switcher, switches canonical tags, for similar products to reduce duplicate content',
		'thumbnail'		=> 'picture.png',
		'version'		=> CSCANTAGER_PLUGIN_VERSION,
		'author'		=> 'Constructdoors',
		'email'			=> 'jb@constructdoors.de',
		'url'			=> 'http://constructdoors.de',
            
    
                'extend'		=> array(
                    'details'      => 'cscantager/views/cscantager_details',
                ),
    
                'files' => array(
                    'csCanTagerEvents' => 'cscantager/core/cscantagerevents.php',
                ),
              
                 'events'       => array(
                    'onActivate'   => 'csCanTagerEvents::onActivate',
                    ),
    
               'settings' => array(
   
               ) 
      
);