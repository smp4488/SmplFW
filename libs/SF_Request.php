<?php
class SF_Request {
	function SF_Request() {
		$requestURI = explode('/', $_SERVER['REQUEST_URI']);
		$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
		unset($requestURI[0]);//remove blank spot
		$requestURI = array_values($requestURI);//reset indexes

		$this->checkRoute($requestURI);
	}

	function getModule() {
		return $this->module;
	}

	function checkRoute($requestURI) {
		$routingFile = Spyc::YAMLLoad('./config/SF_Routing.yml');
		$routingFile = array_merge($routingFile, Spyc::YAMLLoad('./config/Custom_Routing.yml'));
		$i = 0;

		foreach ($routingFile as $routeName => $route) {
			$routeURI = !is_null(explode('/', $route['url'])) ? explode('/', $route['url']) : '/';
			unset($routeURI[0]);//remove blank spot
			$routeURI = array_values($routeURI);//reset indexes
			$params = array();//reset partial match

			if (count($routeURI) != count($requestURI)) {
				//$i++;
				continue;
			}

			while ($i < count($requestURI)) {
				if($requestURI[$i] == $routeURI[$i]) {
					//array_push($params, $requestURI[$i]);
				} elseif (strpos($routeURI[$i], ':') !== false) {
					$paramValue = str_replace(':', '', $routeURI[$i]);
					$params[$paramValue] = $requestURI[$i];//add param from url
					$routeURI[$i] = $requestURI[$i];
				}
				$i++;
			}

			if ($routeURI == $requestURI || $routeURI == $requestURI . "/") {
				//var_dump($params);
				//exit();
				$moduleName = !empty($route['param']['module']) ? $route['param']['module'] : null;
				$action = !empty($route['param']['action']) ? $route['param']['action'] : null;

				$this->module = new SF_Module($moduleName, $action, $params);
			}
		}
	}
}
?>