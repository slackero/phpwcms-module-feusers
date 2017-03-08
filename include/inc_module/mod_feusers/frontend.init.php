<?php
/**
 * phpwcms content management system
 *
 * @author Oliver Georgi <og@phpwcms.org>
 * @copyright Copyright (c) 2002-2017, Oliver Georgi
 * @license http://opensource.org/licenses/GPL-2.0 GNU GPL-2
 * @link http://www.phpwcms.org
 *
 **/

// Frontend User Permit INIT
// =========================

$FEUSER_PERMIT = array(
    'regkey'        => 'feuserpermit',
    'permitted'     => false,
    'locked'        => array(),
    'config'        => array('logout_id_or_alias'=>''),
    'is_permitted'  => '',
    'not_permitted' => '',
    'login'         => '',
    'password'      => '',
    'error'         => array()
);

$content['cat_id'] = (int) $content['cat_id'];

if(!empty($_SESSION['feuserpermit_locked'])) {

    $FEUSER_PERMIT['locked'] = $_SESSION['feuserpermit_locked'];

    if(count($FEUSER_PERMIT['locked'])) {

        foreach($FEUSER_PERMIT['locked'] as $value) {
            $content['struct'][$value]['acat_hidden'] = 1;
        }

    }

} else {

    // Check which levels are locked first
    $data = _dbGet('phpwcms_userdetail', 'feuserpermit_structlevels,detail_int1', 'detail_regkey='._dbEscape($FEUSER_PERMIT['regkey'])." AND detail_aktiv!=9 AND (feuserpermit_structlevels != '' OR detail_int1 > 0)", 'feuserpermit_structlevels');

    if(isset($data[0]['detail_int1'])) {
        foreach($data as $value) {
            $value['feuserpermit_structlevels'] = $value['feuserpermit_structlevels'] === '' ? array( (int) $value['detail_int1'] ) : convertStringToArray($value['feuserpermit_structlevels'], ',', 'UNIQUE', false);
            if(count($value['feuserpermit_structlevels'])) {
                foreach($value['feuserpermit_structlevels'] as $value) {
                    $value = (int) $value;
                    $FEUSER_PERMIT['locked'][$value] = $value;
                    $content['struct'][$value]['acat_hidden'] = 1;
                }
            }
        }
        // Save locked result to session
        $_SESSION['feuserpermit_locked'] = $FEUSER_PERMIT['locked'];
    }

}

// Handle Login or check session
if(isset($_POST['feuserpermit_login'])) {

    unset($_SESSION['feuserpermit']);

    $FEUSER_PERMIT['login']     = slweg($_POST['feuserpermit_login'], 100);
    $FEUSER_PERMIT['password']  = isset($_POST['feuserpermit_pwd']) ? slweg($_POST['feuserpermit_pwd'], 100) : '';

    if($FEUSER_PERMIT['login'] && $FEUSER_PERMIT['password']) {
        // Check Login
        $where  = 'detail_regkey='._dbEscape($FEUSER_PERMIT['regkey']).' AND detail_aktiv!=9 AND ';
        $where .= 'detail_login='._dbEscape($FEUSER_PERMIT['login']).' AND detail_password='._dbEscape(md5($FEUSER_PERMIT['password']));
        $data = _dbGet('phpwcms_userdetail', '*', $where);

        if(!isset($data[0]['detail_login'])) {
            $FEUSER_PERMIT['error']['general'] = '@@Frontend user permission: The entered login or password is incorrect.@@';
        } elseif($data[0]['detail_aktiv'] != 1) {
            $FEUSER_PERMIT['error']['general'] = '@@Frontend user permission: Account is inactive.@@';
        } else {
            $_SESSION['feuserpermit'] = array(
                'uid'   => (int) $data[0]['detail_id'],
                'login' => $data[0]['detail_login'],
                'rid'   => (int) $data[0]['detail_int1'],
                'cid'   => empty($data[0]['feuserpermit_structlevels']) ? array((int) $data[0]['detail_int1']) : convertStringToArray($data[0]['feuserpermit_structlevels'], ',', 'UNIQUE', false)
            );
            $FEUSER_PERMIT['session_id'] = session_id();
            if(!isset($_SESSION[$FEUSER_PERMIT['session_id']])) {
                $_SESSION[$FEUSER_PERMIT['session_id']] = $data[0]['detail_login'];
            }

            if($content['cat_id'] !== $_SESSION['feuserpermit']['rid']) {
                if($content['struct'][ $_SESSION['feuserpermit']['rid'] ]['acat_alias']) {
                    $FEUSER_PERMIT['target'] = $content['struct'][ $_SESSION['feuserpermit']['rid'] ]['acat_alias'];
                } else {
                    $FEUSER_PERMIT['target'] = 'id='.$_SESSION['feuserpermit']['rid'];
                }
                headerRedirect(abs_url(array(), array(), $FEUSER_PERMIT['target']), 302);
            }

            headerAvoidPageCaching();
            $content['struct'][ $content['cat_id'] ]['acat_hidden'] = 0;

            // we can give access here
            $FEUSER_PERMIT['permitted'] = true;

            if(count($_SESSION['feuserpermit']['cid'])) {
                foreach($_SESSION['feuserpermit']['cid'] as $permit_cid) {
                    $permit_cid = intval($permit_cid);
                    if(isset($content['struct'][ $permit_cid ])) {
                        $content['struct'][ $permit_cid ]['acat_hidden'] = 0;
                    }
                }
            }
        }
    }

    if($FEUSER_PERMIT['login'] === '') {
        $FEUSER_PERMIT['error']['login'] = '@@Frontend user permission: Login is mandatory@@';
    }
    if($FEUSER_PERMIT['password'] === '') {
        $FEUSER_PERMIT['error']['password'] = '@@Frontend user permission: Password is mandatory@@';
    }

} elseif(isset($_POST['feuserpermit_logout']) || isset($_GET['feuser-logout'])) {

    unset($_SESSION['feuserpermit'], $_GET['feuser-logout'], $_getVar['feuser-logout']);

}

// Check Session based permission
if(!$FEUSER_PERMIT['permitted'] && !empty($_SESSION['feuserpermit']['uid'])) {

    // Is the user active
    $where  = 'detail_regkey='._dbEscape($FEUSER_PERMIT['regkey']).' AND detail_aktiv=1 AND detail_int1='.$_SESSION['feuserpermit']['rid'].' AND ';
    $where .= 'detail_id='._dbEscape($_SESSION['feuserpermit']['uid']).' AND detail_login='._dbEscape($_SESSION['feuserpermit']['login']);
    $data = _dbGet('phpwcms_userdetail', 'detail_id', $where);
    if(isset($data[0]['detail_id']) && count($_SESSION['feuserpermit']['cid'])) {
        foreach($_SESSION['feuserpermit']['cid'] as $permit_cid) {
            $permit_cid = intval($permit_cid);
            if(isset($content['struct'][ $permit_cid ])) {
                $content['struct'][ $permit_cid ]['acat_hidden'] = 0;
                if($permit_cid === $content['cat_id']) {
                    $FEUSER_PERMIT['permitted'] = true;
                }
            }
        }
    }

}
