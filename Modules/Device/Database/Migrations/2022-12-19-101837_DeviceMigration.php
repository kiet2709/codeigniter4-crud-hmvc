<?php

namespace Modules\Device\Database\Migrations;

use CodeIgniter\Database\Migration;

class DeviceMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
			"id" => [
				"type" => "INT",
				"constraint" => 5,
				"auto_increment" => true,
				"unsigned" => true
			],
			"name" => [
				"type" => "VARCHAR",
				"constraint" => 150,
				"null" => false
			],
			"type" => [
				"type" => "VARCHAR",
				"constraint" => 50,
				"null" => true
			]
		]);

		$this->forge->addPrimaryKey("id");

		$this->forge->createTable("devices");
    }

    public function down()
    {
        $this->forge->dropTable("devices");
    }
}
