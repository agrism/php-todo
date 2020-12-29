<?php


namespace Todo\Controllers;


class Response
{
	public static function factory(){
		return new self();
	}
	/**
	 * @param  array  $data
	 */
	public function render(array $data = [])
	{
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}