<?php

/*
 * This file is part of FeatherPanel.
 * Please view the LICENSE file that was distributed with this source code.
 *
 * # MythicalSystems License v2.0
 *
 * ## Copyright (c) 2021–2025 MythicalSystems and Cassian Gherman
 *
 * Breaking any of the following rules will result in a permanent ban from the MythicalSystems community and all of its services.
 */

use App\App;
use App\Addons\pterodactylpanelapi\controllers\ApiKeysController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;

return function (RouteCollection $routes): void {
	App::getInstance(true)->registerAuthRoute(
		$routes,
		'pterodactylpanelapi-client-api-keys-index',
		'/api/pterodactylpanelapi/client/api-keys',
		function (Request $request) {
			$request->attributes->set('pterodactyl_api_key_type', 'client');
			$request->attributes->set('pterodactyl_api_key_scope', 'self');

			return (new ApiKeysController())->index($request);
		},
		['GET']
	);

	App::getInstance(true)->registerAuthRoute(
		$routes,
		'pterodactylpanelapi-client-api-keys-show',
		'/api/pterodactylpanelapi/client/api-keys/{id}',
		function (Request $request, array $args) {
			$id = $args['id'] ?? null;
			if ($id === null || !is_numeric($id)) {
				return \App\Helpers\ApiResponse::error('Missing or invalid ID', 'INVALID_ID', 400);
			}

			$request->attributes->set('pterodactyl_api_key_type', 'client');
			$request->attributes->set('pterodactyl_api_key_scope', 'self');

			return (new ApiKeysController())->show($request, (int) $id);
		},
		['GET']
	);

	App::getInstance(true)->registerAuthRoute(
		$routes,
		'pterodactylpanelapi-client-api-keys-create',
		'/api/pterodactylpanelapi/client/api-keys',
		function (Request $request) {
			$request->attributes->set('pterodactyl_api_key_type', 'client');
			$request->attributes->set('pterodactyl_api_key_scope', 'self');

			return (new ApiKeysController())->create($request);
		},
		['POST']
	);

	App::getInstance(true)->registerAuthRoute(
		$routes,
		'pterodactylpanelapi-client-api-keys-update',
		'/api/pterodactylpanelapi/client/api-keys/{id}',
		function (Request $request, array $args) {
			$id = $args['id'] ?? null;
			if ($id === null || !is_numeric($id)) {
				return \App\Helpers\ApiResponse::error('Missing or invalid ID', 'INVALID_ID', 400);
			}

			$request->attributes->set('pterodactyl_api_key_type', 'client');
			$request->attributes->set('pterodactyl_api_key_scope', 'self');

			return (new ApiKeysController())->update($request, (int) $id);
		},
		['PUT', 'PATCH']
	);

	App::getInstance(true)->registerAuthRoute(
		$routes,
		'pterodactylpanelapi-client-api-keys-delete',
		'/api/pterodactylpanelapi/client/api-keys/{id}',
		function (Request $request, array $args) {
			$id = $args['id'] ?? null;
			if ($id === null || !is_numeric($id)) {
				return \App\Helpers\ApiResponse::error('Missing or invalid ID', 'INVALID_ID', 400);
			}

			$request->attributes->set('pterodactyl_api_key_type', 'client');
			$request->attributes->set('pterodactyl_api_key_scope', 'self');

			return (new ApiKeysController())->delete($request, (int) $id);
		},
		['DELETE']
	);

	App::getInstance(true)->registerAuthRoute(
		$routes,
		'pterodactylpanelapi-client-api-keys-options',
		'/api/pterodactylpanelapi/client/api-keys',
		function (Request $request) {
			return \App\Helpers\ApiResponse::success(null, 'CORS preflight', 200);
		},
		['OPTIONS']
	);

	App::getInstance(true)->registerAuthRoute(
		$routes,
		'pterodactylpanelapi-client-api-keys-options-id',
		'/api/pterodactylpanelapi/client/api-keys/{id}',
		function (Request $request, array $args) {
			return \App\Helpers\ApiResponse::success(null, 'CORS preflight', 200);
		},
		['OPTIONS']
	);
};
