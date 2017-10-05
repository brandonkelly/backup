<?php
namespace enupal\backup\models;

use enupal\backup\validators\BackupFilesValidator;
use enupal\backup\validators\AssetSourceValidator;

class Settings extends \craft\base\Model
{
	// General
	public $pluginNameOverride = '';
	public $backupsAmount = 50;
	public $deleteLocalBackupAfterUpload = 0;
	// Database by default
	public $enableDatabase = 0;
	// Templates
	public $enableTemplates  = 0;
	public $excludeTemplates = 'cpresources,';
	// Local Volumes
	public $enableLocalVolumes = 0;
	public $volumes            = '';
	// Dropbox 	Api
	public $enableDropbox = 0;
	public $dropboxToken = '';
	public $dropboxPath  = '/enupalbackup/';
	// Amazon S3 Api
	public $enableAmazon = 0;
	public $amazonKey    = '';
	public $amazonSecret = '';
	public $amazonBucket = '';
	public $amazonRegion = '';
	public $amazonPath   = '/enupalbackup/';
	public $amazonUseMultiPartUpload   = 0;
	// FTP or SFTP
	public $enableFtp   = 0;
	public $ftpType     = 'ftp';
	public $ftpHost     = '';
	public $ftpUser     = '';
	public $ftpPassword = '';
	public $ftpPath     = 'enupalbackup/';
	// Softlayer Object Storage
	public $enableSos    = 0;
	public $sosUser      = '';
	public $sosSecret    = '';
	public $sosHost      = '';
	public $sosContainer = '';
	public $sosPath      = '/enupalbackup/';
	// Advanced
	public $enablePathToTar = 0;
	public $pathToTar       = '';
	public $enablePathToPhp = '';
	public $pathToPhp = '';
	public $enablePathToMysqldump = '';
	public $pathToMysqldump = '';
	public $enablePathToOpenssl = '';
	public $pathToOpenssl = '';
	public $enablePathToPgdump = '';
	public $pathToPgdump = '';
	// Webhook
	public $webhookUrl = '';
	public $webhookSecretKey = '';
	// security
	public $enableOpenssl   = 0;
	public $opensslPassword = '';
	// notification
	public $enableNotification = '';
	public $notificationRecipients = '';
	public $notificationSenderName = '';
	public $notificationSenderEmail = '';
	public $notificationReplyToEmail = '';

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['backupsAmount', 'integer', 'min' => 1, 'on' => 'general'],
			[
				['enableDatabase','enableTemplates', 'enableLocalVolumes'],
				BackupFilesValidator::class, 'on' => 'backupFiles'
			],
			[
				['enableLocalVolumes'],
				AssetSourceValidator::class, 'on' => 'backupFiles'
			],
		];
	}
}