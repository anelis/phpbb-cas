<?php
/**
* phpBB CAS Authentication plugin.
*
* @package login
* @version $Id$
* @copyright (c) 2012 Anelis
* @author Gregoire Astruc <gregoire.astruc@anelis.isima.fr>
* @license http://opensource.org/licenses/LGPL-2.1 LGPL v2.1
*/

/** @ignore */
if ( !defined('IN_PHPBB') )
{
    exit();
}

include_once('CAS/CAS.php');

phpCAS::client(CAS_VERSION_2_0, $config['cas_server'], (int) $config['cas_port'], $config['cas_uri']);
phpCAS::setDebug();
phpCAS::setNoCasServerValidation();

/** 
* Plugin initialization.
*/
function init_cas()
{
    global $config, $user;
    
    return false;
}

function autologin_cas()
{
    global $config, $db;
    phpCAS::forceAuthentication();
    
    return get_user_row(phpCAS::getUser());
}

function login_cas($username, $password)
{
    global $db, $config, $user;
    $user_anonymous = array('user_id' => ANONYMOUS);
    $user_row = $user_anonymous;
    $status = LOGIN_SUCESS;
    $error_msg = 'NOT IMPLEMENTED';

    if (phpCAS::isAuthenticated()) {
        $user_row = get_user_row(phpCAS::getUser(), $user_anonymous, false);
        if ( $user_row['user_id'] != ANONYMOUS ) {
            $error_msg = false;
            $status = LOGIN_SUCCESS;
        }
    }
    
    return array('status' => $status, 'error_msg' => $error_msg, 'user_row' => $user_row);
}

function logout_cas($user_row, $new_session)
{
    global $config;
    phpCAS::logout();
}

function validate_session_cas($user_row)
{
    global $config;
    return phpCAS::isSessionAuthenticated();
}

/**
* This function is used to output any required fields in the authentication
* admin panel. It also defines any required configuration table fields.
*/
function acp_cas(&$new)
{
	global $user;
	$user->add_lang('mods/auth_cas');

	$tpl = '

	<dl>
		<dt><label for="cas_server">' . $user->lang['CAS_SERVER'] . ':</label><br /><span>' . $user->lang['CAS_SERVER_EXPLAIN'] . '</span></dt>
		<dd><code>https://</code><input type="text" id="cas_server" size="40" name="config[cas_server]" value="' . $new['cas_server'] . '" /></dd>
	</dl>
	<dl>
		<dt><label for="cas_port">' . $user->lang['CAS_PORT'] . ':</label><br /><span>' . $user->lang['CAS_PORT_EXPLAIN'] . '</span></dt>
		<dd><input type="text" id="cas_port" size="40" name="config[cas_port]" value="' . $new['cas_port'] . '" /></dd>
	</dl>
	<dl>
		<dt><label for="cas_uri">' . $user->lang['CAS_URI'] . ':</label><br /><span>' . $user->lang['CAS_URI_EXPLAIN'] . '</span></dt>
		<dd><input type="text" id="cas_uri" size="40" name="config[cas_uri]" value="' . $new['cas_uri'] . '" autocomplete="off" /></dd>
	</dl>
	';

	// These are fields required in the config table
	return array(
		'tpl'		=> $tpl,
		'config'	=> array('cas_server', 'cas_port', 'cas_uri')
	);
}

function get_user_row($username, $default_row = array(), $select_all = true)
{
    global $db;
    $user_row = $default_row;
    $sql = 'SELECT';
    if ($select_all)
        $sql .= ' *'
    else
        $sql .= ' user_id, username, user_password, user_passchg, user_email, user_type, user_style'
        
    $sql .= 'FROM ' . USERS_TABLE . "
        WHERE username_clean = '" . $db->sql_escape(utf8_clean_string($username)) . "'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);

    if ($row)
    {
        if ( !($row['user_type'] == USER_INACTIVE || $row['user_type'] == USER_IGNORE) )
            $user_row = $row;
    }
    
    return $user_row;
}
?>
