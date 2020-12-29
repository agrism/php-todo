<?php

namespace Todo\Controllers;

use Todo\Db\Db;

class InitDatabaseController extends Controller
{
	public function up(){

		$db = Db::factory();

		$sql = <<<SQL
create table todo_list (
    id serial primary key,
    title varchar(150)
);
SQL;

		$db->exec($sql);


			$sql = <<<SQL
create table todo_item (
    id serial primary key,
    title varchar(150) not null,
    checked boolean not null default false,
    list_id integer not null,
    foreign key (list_id) references todo_list(id)
);
SQL;
		$db->exec($sql);
	}


	public function down(){

		$db = Db::factory();

		$sql = 'drop table if exists todo_list;';

		$db->exec($sql);


		$sql = 'drop table if exists todo_item;';
		$db->exec($sql);
	}
}