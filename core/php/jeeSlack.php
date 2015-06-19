<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */
header('Content-type: application/json');
require_once dirname(__FILE__) . "/../../../../core/php/core.inc.php";

if (init('apikey') != config::byKey('api') || config::byKey('api') == '') {
	connection::failed();
	echo 'Clef API non valide, vous n\'etes pas autorisé à effectuer cette action (jeeApi)';
	die();
}

if (init('user_name') == 'slackbot' || init('user_id') == 'USLACKBOT') {
	echo json_encode(array('text' => ''));
	die();
}

$eqLogic = slack::byLogicalId(init('team_domain'), 'slack');
if (!is_object($eqLogic)) {
	echo json_encode(array('text' => __('Domaine inconnue : ', __FILE__) . init('team_domain')));
	die();
}
$parameters = array();
$user = user::byLogin(init('user_name'));
if (is_object($user)) {
	$parameters['profile'] = init('user_name');
}

$cmd_text = $eqLogic->getCmd('info', 'text');
$cmd_text->event(trim(init('text')));
$cmd_sender = $eqLogic->getCmd('info', 'sender');
$cmd_sender->event(init('user_name'));

$reply = interactQuery::tryToReply(trim(init('text')), $parameters);
echo json_encode(array('text' => $reply));
?>