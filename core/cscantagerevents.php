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
* Name:  cscantagerevents.php
*
* Author:  Johannes Baumann
* 		   johannes.baumann@constructdoors.de
*
* Copyright: GPL v3
*
*
* Created:  2014
*
* Description:  onActive Events for the Module
*
* Requirements: PHP5 or above
*
*/

class csCanTagerEvents {

    public static function onActivate() {
      
         $sConfigSQL = "CREATE TABLE IF NOT EXISTS `cscannonical` (
            `OXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
            `OBJECTID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
            `TARGETOXID` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
            UNIQUE KEY `OXID` (`OBJECTID`,`TARGETOXID`)
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1";
         
         oxDb::getDb()->execute($sConfigSQL); 
    }
    
}
