<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later

/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\Llm\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
	'routes' => [
		['name' => 'admin#cron', 'url' => '/admin/cron', 'verb' => 'GET'],
		['name' => 'admin#python', 'url' => '/admin/python', 'verb' => 'GET'],
		['name' => 'admin#get_setting', 'url' => '/admin/settings/{setting}', 'verb' => 'GET'],
		['name' => 'admin#set_setting', 'url' => '/admin/settings/{setting}', 'verb' => 'PUT'],
	]
];
