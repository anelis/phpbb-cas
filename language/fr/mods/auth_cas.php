<?php
/** 
* phpBB CAS Authentication plugin.
*
* @package language
* @version $Id$
* @copyright (c) 2012 Anelis
* @author Gregoire Astruc <gregoire.astruc@anelis.isima.fr>
* @license http://opensource.org/licenses/LGPL-2.1 LGPL v2.1
*
*/
                    
/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
    $lang = array();
}
                        
// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
                        
$lang = array_merge($lang, array(
    'CAS_SERVER'    => 'nom du serveur CAS',
        'CAS_SERVER_EXPLAIN' => 'nom du serveur CAS, comme : cas.foo.biz',
    'CAS_PORT'      => 'port du serveur CAS',
        'CAS_PORT_EXPLAIN' => 'Port sur lequel le serveur CAS écoute.',
    'CAS_URI'       => 'URI CAS',
        'CAS_URI_EXPLAIN' => 'URI de base sur laquelle le serveur répond. Par exemple : /login, /cas...',
));
            
?>
