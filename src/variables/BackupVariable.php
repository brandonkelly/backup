<?php

namespace enupal\backup\variables;

use Craft;
use craft\helpers\Template as TemplateHelper;
use craft\helpers\FileHelper;
use enupal\backup\Backup;
use enupal\backup\models\Settings;

/**
 * EnupalBackup provides an API for accessing information about sliders. It is accessible from templates via `craft.enupalbackup`.
 *
 */
class BackupVariable
{

	/**
	 * @return string
	 */
	public function getName()
	{
		$plugin = Craft::$app->plugins->getPlugin('enupal-backup');

		return $plugin->getName();
	}

	/**
	 * @return string
	 */
	public function getVersion()
	{
		$plugin = Craft::$app->plugins->getPlugin('enupal-backup');

		return $plugin->getVersion();
	}

	/**
	 * @return mixed
	 */
	public function getFtpTypes()
	{
		$options = [
			'ftp'  => 'FTP',
			'sftp' => 'SFTP'
		];

		return $options;
	}

	/**
	 * @return string
	 */
	public function getSettings()
	{
		return Backup::$app->settings->getSettings();
	}

}
