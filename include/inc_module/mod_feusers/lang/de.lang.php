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

// first define main language vars
$BLM['backend_menu'] = 'Frontend Benutzer Berechtigung';

$BLM['listing_title'] = 'Verwalten der Benutzer f&uuml;r den authentifizierten Zugriff im Frontend';
$BLM['setup_error_title'] = 'Ersteinrichtung Frontend Benutzer Berechtigung';
$BLM['setup_error'] = 'Die Ersteinrichtung ist fehlgeschlagen. Das Datenbankfeld <strong>feuserpermit_structlevels</strong> konnte nicht in der Datenbanktabelle <strong>'.DB_PREPEND.'phpwcms_userdetail</strong> angelegt werden.';
$BLM['incompatible_error'] = 'Die Version von phpwcms ist nicht kompatibel mit diesem Modul. Es wird ein phpwcms benötigt, welches am bzw. nach dem 07.03.2017 veröffentlicht wurde. Bitte aktualisieren!';
$BLM['create_new'] = 'Neuer Benutzer';
$BLM['florist_entry'] = 'Benutzereintrag';
$BLM['florist_title'] = 'Titel';
$BLM['delete_entry'] = 'L&ouml;schen des Eintrags:';
$BLM['listview'] = 'Listenansicht';
$BLM['max_words'] = 'max. Anzahl Worte aus der Beschreibung';
$BLM['no_entry'] = 'Kein Eintrag gefunden Text';

$BLM['detail_title'] = 'Anrede';
$BLM['detail_firstname'] = 'Vorname';
$BLM['detail_lastname'] = 'Name';
$BLM['detail_company'] = 'Firma';
$BLM['detail_street'] = 'Stra&szlig;e';
$BLM['detail_city'] = 'Ort';
$BLM['detail_zip'] = 'PLZ';
$BLM['detail_region'] = 'Region';
$BLM['detail_country'] = 'Land';
$BLM['detail_fon'] = 'Telefon';
$BLM['detail_fax'] = 'Fax';
$BLM['detail_mobile'] = 'Mobil';
$BLM['detail_signature'] = 'Signatur';
$BLM['detail_aktiv'] = 'Aktiv';
$BLM['detail_newsletter'] = 'Newsletter';
$BLM['detail_website'] = 'Website';
$BLM['detail_varchar1'] = 'Kunden-Nr.';
$BLM['detail_email'] = 'E-Mail';
$BLM['detail_login'] = 'Benutzername';
$BLM['detail_password'] = 'Passwort';
$BLM['detail_int1'] = 'Nach Login hierhin';
$BLM['feuserpermit_structlevels'] = 'Berechtigte Seitenebene(n)';


$BLM['forminfo']    = 'Passwort muss mindestens 5 Zeichen lang sein. Bitte kein Passwort ausf&uuml;llen, wenn Sie den Benutzer nachtr&auml;glich editieren, es sei denn Sie m&ouml;chten das Passwort manuell setzen.';

$BLM['error_password']  = 'Beim Erstellen eines Benutzers muss ein Kennwort angegeben werden.';
$BLM['error_password_short'] = 'Passwort muss mindestens 5 Zeichen lang sein.';
$BLM['error_login'] = 'Login ist leer bereits vergeben. Bitte anderen Login nutzen.';
$BLM['error_email'] = 'Bitte eine g&uuml;ltige E-Mailadresse eingeben.';
$BLM['error_int1']  = 'Es muss eine valide Seitenebene vergeben werden, anderenfalls greift die Zugriffsberechtigung nicht.';
