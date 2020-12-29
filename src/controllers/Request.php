<?php


namespace Todo\Controllers;


class Request
{
	private static $post;

	/**
	 * @return static
	 */
	public static function factory(): self
	{
		return new static;
	}

	private function init(): self
	{
		if(!self::$post){
			self::$post = json_decode(file_get_contents('php://input'), true);;
		}
		return $this;
	}

	public function getPost($key){
		$this->init();

		return self::$post[$key] ?? null;

	}
}