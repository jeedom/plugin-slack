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
		$sender->setEqLogic_id($this->getId());
		$sender->save();
	}

	/*     * **********************Getteur Setteur*************************** */
}

class slackCmd extends cmd {
	/*     * *************************Attributs****************************** */

	/*     * ***********************Methode static*************************** */

	/*     * *********************Methode d'instance************************* */

	public function preSave() {
		if ($this->getSubtype() == 'message') {
			$this->setDisplay('title_disable', 1);
		}
	}

	public function execute($_options = array()) {
		$request_http = new com_http(trim($this->getConfiguration('webhook')));
		if (isset($_options['answer'])) {
			$_options['message'] .= ' (' . implode(';', $_options['answer']) . ')';
		}
		$post = array('text' => trim($_options['title'] . ' ' . $_options['message']));
		if ($this->getConfiguration('destination') != '') {
			$post['channel'] = $this->getConfiguration('destination');
		}
		if (!isset($_options['files']) || !is_array($_options['files'])) {
			$request_http->setPost(array('payload' => json_encode($post)));
			$result = $request_http->exec(5, 3);
			log::add('slack','debug',json_encode($result,true));
		}
		if (isset($_options['files']) && is_array($_options['files'])) {
			$eqLogic = $this->getEqLogic();
			$request_http = new com_http('https://slack.com/api/channels.list');
			$request_http->setPost(array('token' => $eqLogic->getConfiguration('oauth_token')));
			$channels = json_decode($request_http->exec(10, 3), true);
			$cid = null;
			if (isset($channels['channels'])) {
				foreach ($channels['channels'] as $channel) {
					if ('#' . $channel['name'] == $this->getConfiguration('destination')) {
						$cid = $channel['id'];
						break;
					}
				}
			}
			if ($cid == null) {
				return;
			}
			foreach ($_options['files'] as $file) {
				$request_http = new com_http('https://slack.com/api/files.upload');
				$post = array('token' => $eqLogic->getConfiguration('oauth_token'), 'channels' => $cid);
				if (version_compare(phpversion(), '5.5.0', '>=')) {
					$post['file'] = new CurlFile($file);
					$post['title'] = trim($_options['title'] . ' ' . $_options['message']);
				} else {
					$post['file'] = '@' . $file;
					$post['title'] = trim($_options['title'] . ' ' . $_options['message']);
				}
				$request_http->setPost($post);
				$result = $request_http->exec(60, 1);
				log::add('slack','debug',json_encode($result,true));
			}
		}

	}

	/*     * **********************Getteur Setteur*************************** */
}

?>
