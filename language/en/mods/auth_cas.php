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
    'CAS_SERVER'    => 'CAS server name',
        'CAS_SERVER_EXPLAIN' => 'CAS server name, such as: cas.foo.biz',
    'CAS_PORT'      => 'CAS server port',
        'CAS_PORT_EXPLAIN' => 'Port on which the CAS server is listening to.',
    'CAS_URI'       => 'CAS URI',
        'Base URI of the cas server. Such as: /login, /cas...'
));
            
?>