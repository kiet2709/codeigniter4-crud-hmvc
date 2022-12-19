<?php

namespace Modules\Student\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Modules\Student\Models\StudentModel;

class ApiController extends ResourceController
{
    /**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		$student_obj = new StudentModel();

		$students = $student_obj->findAll();

		return $this->respond([
			"status" => true,
			"message" => "Danh sách sinh viên",
			"data" => $students
		]);
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		$student_obj = new StudentModel();

		$student = $student_obj->find($id);

		return $this->respond([
			"status" => true,
			"message" => "Thông tin sinh viên",
			"data" => $student
		]);
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return mixed
	 */
	public function new()
	{
		//
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create()
	{
		$name = $this->request->getVar("name");
		$email = $this->request->getVar("email");
		$phone_number = $this->request->getVar("phone_number");

		$file = $this->request->getFile("profile_image");

		$profile_image = '';

		if(isset($file) && !empty($file->getPath())){

			$image_name = $file->getName();
			if($file->move("images", $image_name)){

				$profile_image = "/images/".$image_name;
			}
		}

		$data = [
			"name" => $name,
			"email" => $email,
			"phone_number" => $phone_number,
			"profile_image" => $profile_image
		];

		$student_obj = new StudentModel();

		if($student_obj->insert($data)){

			return $this->respond(array(
				"status" => 1,
				"message" => "Thêm sinh viên thành công"
			));
		}else{

			return $this->respond(array(
				"status" => 0,
				"message" => "Thêm sinh viên thất bại"
			));
		}
	}

	/**
	 * Return the editable properties of a resource object
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		//
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		$name = $this->request->getVar("name");
		$email = $this->request->getVar("email");
		$phone_number = $this->request->getVar("phone_number");

		$file = $this->request->getFile("profile_image");

		$profile_image = '';

		if(isset($file) && !empty($file->getPath())){

			$image_name = $file->getName();
			if($file->move("images", $image_name)){

				$profile_image = "/images/".$image_name;
			}
		}

		$data = [
			"name" => $name,
			"email" => $email,
			"phone_number" => $phone_number,
			"profile_image" => $profile_image
		];

		$student_obj = new StudentModel();

		if($student_obj->update($id, $data)){

			return $this->respond(array(
				"status" => 1,
				"message" => "Cập nhật thông tin sinh viên thành công"
			));
		}else{

			return $this->respond(array(
				"status" => 0,
				"message" => "Cập nhật thông tin sinh viên thất bại"
			));
		}
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		$student_obj = new StudentModel();

		$student_obj->delete($id);

		return $this->respond(array(
			"status" => 1,
			"message" => "Xóa sinh viên thành công"
		));
	}
}
