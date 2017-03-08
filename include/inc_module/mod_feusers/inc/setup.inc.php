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

// ----------------------------------------------------------------
// obligate check for phpwcms constants
if (!defined('PHPWCMS_ROOT')) {
   die("You Cannot Access This Script Directly, Have a Nice Day.");
}
// ----------------------------------------------------------------

// Setup additional database field where structure level data are saved to

$result = _dbQuery('SHOW COLUMNS FROM `'.DB_PREPEND.'phpwcms_userdetail` WHERE Field='._dbEscape('feuserpermit_structlevels'));

if(isset($result[0]['Field']) || _dbQuery("ALTER TABLE `".DB_PREPEND."phpwcms_userdetail` ADD `feuserpermit_structlevels` VARCHAR(2000) NOT NULL DEFAULT ''", 'ALTER') === true) {

    define('FEUSERPERMIT_DB_SETUP', true);
    @write_textfile(PHPWCMS_TEMP.'feuserpermit.tmp', date('Y-d-m H:i:s'));

}