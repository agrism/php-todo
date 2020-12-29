<?php


namespace Todo\Controllers;


use PDO;
use Todo\Db\Db;

class TodosController extends Controller
{

	public function status()
	{
		return $this->response->render([
			'status' => 'up',
		]);
	}


	public function index()
	{
		$sql = "SELECT * FROM todo_list";
		$statement = Db::factory()->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		$this->response->render($result ?? []);
	}

	public function show($id)
	{

		$sql = "SELECT * FROM todo_list WHERE id = :id";
		$statement = Db::factory()->prepare($sql);
		$statement->execute(['id' => $id]);
		$result = $statement->fetch(PDO::FETCH_ASSOC);

		if ($result === false) {
			return $this->response->render(['error' => 'Todo not found']);
		}

		$this->response->render($result ?? []);
	}

	public function store()
	{

		if (!$title = $this->request->getPost('title')) {
			return $this->response->render([
				'error' => 'Title is required',
			]);
		}

		$sql = "INSERT INTO todo_list (title) VALUES (:title) returning id, title";
		$statement = Db::factory()->prepare($sql);
		$statement->execute(['title' => $title]);

		$result = $statement->fetch(PDO::FETCH_ASSOC);

		$id = $result["id"] ?? null;
		$title = $result["title"] ?? null;

		$this->response->render([
			'title' => $title,
			'id' => $id,
		]);
	}

}