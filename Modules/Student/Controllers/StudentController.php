<?php

namespace Modules\Student\Controllers;

use App\Controllers\BaseController;
use Modules\Student\Models\StudentModel;

class StudentController extends BaseController
{
    public function index()
    {
        // list student data
        $student_repo = new StudentModel();

		$students = $student_repo->findAll();

        // echo "<pre>";
		// print_r($students);

        return view('\Modules\Student\Views\index',[
			"students" => $students
		]);
    }

    public function addStudent()
    {
        // open a view file for add student page + add submission form
        if ($this->request->getMethod() == 'post') {

			// $rules
			$rules = [
				'name' => 'required',
				'email' => 'required',
				'phone_number' => 'required'
			];

			// messsages
			$message = [
				'name' => [
					'required' => 'Name field is needed'
				],
				'phone_number' => [
					'required' => 'Phone number needed'
				]
			];

			if(!$this->validate($rules, $message)){

				return view('\Modules\Student\Views\student_add', [
					'validation' => $this->validator
				]);
			}

			// save data
			$name = $this->request->getVar('name');
			$email = $this->request->getVar('email');
			$phone_number = $this->request->getVar('phone_number');

			$image = $this->request->getFile('profile_image');

			$profile_image = '';

			if (isset($image) && !empty($image->getPath())) {

				$file_name = $image->getName();

				if ($image->move('images', $file_name)) {

					$profile_image = '/images/' . $file_name;
				}
			}

			$data = [
				'name' => $name,
				'email' => $email,
				'phone_number' => $phone_number,
				'profile_image' => $profile_image
			];

			// object of StudentModel
			$student_obj = new StudentModel();

			$session = session();

			if ($student_obj->insert($data)) {
				// data has been saved
				$session->setFlashdata('success', 'Thêm thành công');
			} else {
				// some error
				$session->setFlashdata('error', 'Thêm thất bại');
			}

			return redirect('student');
		}
        return view('\Modules\Student\Views\add');
    }

    public function editStudent($id)
    {
        // open a view file for add student page + add submission form

        return view('\Modules\Student\Views\edit');
    }

    public function deleteStudent($id)
	{
		// delete operation of student
		
	}
}
