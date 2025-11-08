<?php

namespace App\Addons\pterodactylpanelapi;

use App\App;
use App\Plugins\Events\Events\AppEvent;
use App\Plugins\AppPlugin;
use App\Addons\pterodactylpanelapi\Events\App\AppReadyEvent;

class PterodactylPanelApi implements AppPlugin
{
	/**
	 * @inheritDoc
	 */
	public static function processEvents(\App\Plugins\PluginEvents $event): void
	{
		$event->on(AppEvent::onRouterReady(), function ($eventInstance) {
			new AppReadyEvent($eventInstance);
		});
	}

	/**
	 * @inheritDoc
	 */
	public static function pluginInstall(): void
	{
	
	}

	/**
	 * @inheritDoc
	 */
	public static function pluginUninstall(): void
	{
		
	}
}