<?php


namespace Todo\Controllers;


class Controller
{
	/**
	 * @var Request
	 */
	protected $request;

	/**
	 * @var Response
	 */
	protected $response;

	/**
	 * @return static
	 */
	public static function factory(): self
	{
		$controller = new static();
		$controller->response = Response::factory();
		$controller->request = Request::factory();
		return $controller;
	}
}