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
* Name:  cscantager_details.php
*
* Author:  Johannes Baumann
* 		   johannes.baumann@constructdoors.de
*
* Copyright: GPL v3
*
* Created:  2014
*
* Description:  switches canonical tags
*
* Requirements: PHP5 or above
*
*/

class cscantager_details extends cscantager_details_parent {

        public function __construct() {
        	parent::__construct();
    	}
    	
      /**
        * Returns a different Canonical Url if field is set in the db
        *
        * @return string
        */
        public function getCanonicalUrl() {
            
            $oProduct = $this->getProduct();
                       
            //wenn der artikel einen vater artikel hat, muss in keinem fall was gemacht werden
            if ( $oProduct->oxarticles__oxparentid->value ) {

                return parent::getCanonicalUrl();
            } else {
                
                    $csCannon = oxnew('oxbase');
                    $csCannon->init('cscannonical');

                    $csCannon->assignRecord(
                                $csCannon->buildSelectString( array( 'OBJECTID' => $oProduct->oxarticles__oxid->value  ) )
                            );
                    
                    //wenn eintrag in cscannonical vorhanden lade den Cannonical Tag des referenzierten Artikel und gibt den zurück 
                    if ( $csCannon->cscannonical__targetoxid->value ) { 
                         $oParentProduct = oxnew( 'oxarticle' );
                         $oParentProduct->load( $csCannon->cscannonical__targetoxid->value );
                         
                         //do nothing if articel is not active
                         if ( ( $oParentProduct->oxarticles__oxactive->value == 0 ) || ( $oParentProduct->oxarticles__oxstock->value <= 0 ) ) {
                            return parent::getCanonicalUrl();
                         }
                         
                         //this is done by the parent class as well
                         $oUtils = oxRegistry::get("oxUtilsUrl");
                            if ( oxRegistry::getUtils()->seoIsActive() ) {
                                $sUrl = $oUtils->prepareCanonicalUrl( $oParentProduct->getBaseSeoLink( $oParentProduct->getLanguage(), true ) );
                            } else {
                                $sUrl = $oUtils->prepareCanonicalUrl( $oParentProduct->getBaseStdLink( $oParentProduct->getLanguage() ) );
                            }
                         return $sUrl;
                            
                    } else { // kein eintrag do nothing
                        return parent::getCanonicalUrl();                        
                    }    
                
            }
            
        }             
}