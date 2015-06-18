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

/* * ***************************Includes********************************* */
require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';

class slack extends eqLogic {
	/*     * *************************Attributs****************************** */

	/*     * ***********************Methode static*************************** */

	/*
	 * Fonction exécutée automatiquement toutes les minutes par Jeedom
	public static function cron() {

	}
	 */

	/*
	 * Fonction exécutée automatiquement toutes les heures par Jeedom
	public static function cronHourly() {

	}
	 */

	/*
	 * Fonction exécutée automatiquement tous les jours par Jeedom
	public static function cronDayly() {

	}
	 */

	/*     * *********************Méthodes d'instance************************* */

	public function postSave() {
		$sms = $this->getCmd(null, 'text');
		if (!is_object($sms)) {
			$sms = new slackCmd();
			$sms->setLogicalId('text');
			$sms->setIsVisible(0);
			$sms->setName(__('Message', __FILE__));
		}
		$sms->setType('info');
		$sms->setSubType('string');
		$sms->setEventOnly(1);
		$sms->setEqLogic_id($this->getId());
		$sms->save();

		$sender = $this->getCmd(null, 'sender');
		if (!is_object($sender)) {
			$sender = new slackCmd();
			$sender->setLogicalId('sender');
			$sender->setIsVisible(0);
			$sender->setName(__('Expediteur', __FILE__));
		}
		$sender->setType('info');
		$sender->setSubType('string');
		$sender->setEventOnly(1);
		$sender->setEqLogic_id($this->getId());
		$sender->save();
	}

	/*     * **********************Getteur Setteur*************************** */
}

class slackCmd extends cmd {
	/*     * *************************Attributs****************************** */

	/*     * ***********************Methode static*************************** */

	/*     * *********************Methode d'instance************************* */

	public function execute($_options = array()) {
		$request_http = new com_http($this->getConfiguration('webhook'));
		$post = array('text' => trim($_options['title'] . ' ' . $_options['message']));
		if ($this->getConfiguration('destination') != '') {
			$post['channel'] = $this->getConfiguration('destination');
		}
		$request_http->setPost(array('payload' => json_encode($post)));
		$request_http->exec(1, 1);
	}

	/*     * **********************Getteur Setteur*************************** */
}

?>
