<?php

namespace Modules\Student\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudentMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
				"type" => "VARCHAR",
				"constraint" => 50,
				"null" => false
			],
            'email' => [
				"type" => "VARCHAR",
				"constraint" => 50,
				"null" => false,
				"unique" => true
			],
            'phone_number' => [
				"type" => "VARCHAR",
				"constraint" => 30,
				"null" => true
			],
            'profile_image' => [
				"type" => "VARCHAR",
				"constraint" => 150,
				"null" => true
			]
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('students');
    }

    public function down()
    {
        $this->forge->dropTable('students');
    }
}
