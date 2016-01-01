<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendance extends Admin_Controller {
	/*
	| -----------------------------------------------------
	| PRODUCT NAME: 	INILABS SCHOOL MANAGEMENT SYSTEM
	| -----------------------------------------------------
	| AUTHOR:			INILABS TEAM
	| -----------------------------------------------------
	| EMAIL:			info@inilabs.net
	| -----------------------------------------------------
	| COPYRIGHT:		RESERVED BY INILABS IT
	| -----------------------------------------------------
	| WEBSITE:			http://inilabs.net
	| -----------------------------------------------------
	| MODIFIED: 		Babajide Ibiayo babajideibiayo@yahoo.com
	|------------------------------------------------------
	*/
		function __construct() {
			parent::__construct();
			$this->load->model("student_m");
			$this->load->model("parentes_m");
			$this->load->model("attendance_m");
			$this->load->model("teacher_m");
			$this->load->model("classes_m");
			$this->load->model("user_m");
			$this->load->model("section_m");
			$language = $this->session->userdata('lang');
			$this->lang->load('attendance', $language);	
		}
		protected function rules() {
			$rules = array(
				array(
					'field' => 'classesID', 
					'label' => $this->lang->line("classes_name"), 
					'rules' => 'trim|required|xss_clean|max_length[11]|callback_check_classes'
				), 
				array(
					'field' => 'date', 
					'label' => $this->lang->line("classes_numeric"),
					'rules' => 'trim|required|max_length[10]|xss_clean|callback_date_valid|callback_valid_future_date'
				)
			);
			return $rules;
		}
		
		public function index() {
		$usertype = $this->session->userdata("usertype");
		
		if($usertype == "Admin" || $usertype == "Teacher") {

			$classesID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			$month = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			$year = htmlentities(mysql_real_escape_string($this->uri->segment(5)));
			$this->data['attendances'] = $this->attendance_m->get_attendance();
			$selectedclassobject = $this->classes_m->get_classes_by_id($classesID);
			$attendances = $this->attendance_m->get_attendance();
			$classattendances = $this->attendance_m->get_attendance_by_id($classesID);
			$this->data['classattendances'] = $this->attendance_m->get_attendance_by_id($classesID);
			$this->data['selectedclassobject'] = $this->classes_m->get_classes_by_id($classesID);
			

						// get the data 
								
								$classes = $this->classes_m->get_classes(array($classesID));
								$classattendances = $this->attendance_m->get_attendance_by_id($classesID);
								$months = array(
									"0" => $this->lang->line("attendance_select_month"),
									"1" => $this->lang->line("attendance_jan"),
									"2" => $this->lang->line("attendance_feb"),
									"3" => $this->lang->line("attendance_mar"),
									"4" => $this->lang->line("attendance_apr"),
									"5" => $this->lang->line("attendance_may"),
									"6" => $this->lang->line("attendance_jun"),
									"7" => $this->lang->line("attendance_jul"),
									"8" => $this->lang->line("attendance_aug"),
									"9" => $this->lang->line("attendance_sep"),
									"10" => $this->lang->line("attendance_oct"),
									"11" => $this->lang->line("attendance_nov"),
									"12" => $this->lang->line("attendance_dec"),
								);

								foreach($attendances as $attendance) {
												$result[] = $attendance->date;
												$result = array_unique($result);
											}
											$dates = array_values($result);
											$selectyear = array("0" => $this->lang->line("attendance_select_year"));
											foreach ($dates as $key => $value) {
												$dates[$key] = substr($value, 0, 4);
											}
											$uniqueyears = array_unique($dates);
											$years = array_merge($selectyear, $uniqueyears);
											$this->data['years'] = $years;



					/*  Search form Code */

					if ($classesID) {

						
					// get selected search form criteria 
						if ( (int)$classesID && (int)$month && (int)$year ) {

							foreach ( $years as $key => $value ) { //get selected year
								if ( $year == $key ) {
									$selectedyear = $value;
								}
							}
							foreach ( $months as $key => $value) {

								if ( $month == $key ) {
									$selectedmonth = $value;
								}
							}
							foreach ( $selectedclassobject as $object) {
								$classobjects[] = $object->classes;
							}

							$this->data['selectedyear'] = $selectedyear;
							$this->data['selectedmonth'] = $selectedmonth;
							$this->data['selectedclass'] = $classobjects[0];
							
						}else{

							$this->data['selectedyears'] = "Data Incomplete";
							$this->data['selectedmonth'] = "Data Incomplete";
							$this->data['selectedclass'] = "Data Incomplete";
						}

							// display search results
							$datestring = "1 " . $selectedmonth . " "  . $selectedyear;
							if ( $timestamp = strtotime($datestring ) ) {
								$mt = date('n', $timestamp);
								$yr = date('Y', $timestamp);
								$num = cal_days_in_month(CAL_GREGORIAN, $mt, $yr);
								$this->data['days_in_month'] = $num;
						    }

						    // build attendance register
						   for ($i = 1; $i <= $num; $i++) {
						   	$attendanceregister = array();
						   		$datestring = $i . " " . $selectedmonth . " "  . $selectedyear;
						   		$timestamp = strtotime($datestring);
						   		$searchdate = date('Y-m-d', $timestamp);

						   		$attendanceregister['day'] = $i;
						   		foreach ($classattendances as $attendance) {
						   			if ($attendance->date == $searchdate) {
						   				
						   				$attendanceregister['student_id'] = $attendance->student_id;
						   				$attendanceregister['status'] = $attendance->status;
						   				$attendanceregister['date'] = $attendance->date;
						   			}
						   		}
						   }
						   $this->data['attendanceregister'] = $attendanceregister;
						     
						/* End Search form code */
			}




						$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
						if((int)$id) {
							$this->data['set'] = $id;
							$this->data['classes'] = $this->student_m->get_classes();
							$this->data['students'] = $this->student_m->get_order_by_student(array('classesID' => $id));
							

							if($this->data['students']) {
								$sections = $this->section_m->get_order_by_section(array("classesID" => $id));
								$this->data['sections'] = $sections;
								foreach ($sections as $key => $section) {
									$this->data['allsection'][$section->section] = $this->student_m->get_order_by_student(array('classesID' => $id, "sectionID" => $section->sectionID));
								}

							} else {
								$this->data['students'] = NULL;
							}
							$this->data["subview"] = "attendance/index";
							$this->load->view('_layout_main', $this->data);
						} else {
							$this->data['classes'] = $this->student_m->get_classes();
							$this->data["subview"] = "attendance/search";
							$this->load->view('_layout_main', $this->data);
						}
					} else {
						$this->data["subview"] = "error";
						$this->load->view('_layout_main', $this->data);
					}
}
		public function attendance_list() {
				$classID = $this->input->post('id');
				$year = $this->input->post('year');
				$month = $this->input->post('month');
				if((int)$classID) {
					$string = base_url("attendance/index/$classID/$month/$year");
					echo $string;
				} else {
					redirect(base_url("attendance/index"));
				}
			}


		public function add() {
			$usertype = $this->session->userdata("usertype");
			if($usertype == "Admin" || $usertype == "Teacher") {

				$this->data['set'] = 0;
				$this->data['date'] = date("d-m-Y");
				$this->data['day'] = 0;
				$status = 0;

				
				$username = $this->session->userdata("username");
				$this->data['classes'] = $this->classes_m->get_classes();
				$this->data['students'] = array();

				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) { 
						$this->data["subview"] = "attendance/add";
						$this->load->view('_layout_main', $this->data);			
					} else {
						$classesID = $this->input->post("classesID");
						
						$date = $this->input->post("date");
						$this->data['set'] = $classesID;
						$this->data['date'] = $date;
						
						
							
							$students = $this->student_m->get_order_by_student(array("classesID" => $classesID));
							if(count($students)) {
								foreach ($students as $key => $student) {
									$section = $this->section_m->get_section($student->sectionID);
									if($section) {
										$this->data['students'][$key] = (object) array_merge( (array)$student, array('ssection' => $section->section));
									} else {
										$this->data['students'][$key] = (object) array_merge( (array)$student, array('ssection' => $student->section));
									}

									$status = 0;
									$student_id = $student->studentID;
									$classes_id = $student->classesID;
									$timestamp = strtotime($date);
									$date = date('Y-m-d', $timestamp);
									$attendance_detail = $this->attendance_m->get_order_by_attendance(array("classes_id" => $classes_id, "student_id" => $student_id, "date" => $date));
									
									if(!count($attendance_detail)) {
										$array = array(
											"status" => $status,
											"student_id" => $student_id,
											"classes_id" => $classes_id,
											"date" => $date
										);
										$this->attendance_m->insert_attendance($array);
									}
								}
								// Since there is already an existing record of attendances
								$this->data['attendances'] = $this->attendance_m->get_attendance();
								$this->data['date'] = $date;
								$this->data['status'] = $status;
								
								
							}
							$this->data["subview"] = "attendance/add";
							$this->load->view('_layout_main', $this->data);
						
					}
				} else {
					$this->data["subview"] = "attendance/add";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		}

			function singl_add() {
				$id = $this->input->post('id');
				$attendance_detail = $this->attendance_m->get_attendance_by_id($id);
				foreach ($attendance_detail as $detail) {
					$status = $detail->status;
				}
				

				if((int)$id) {
					$attendance_row = $this->attendance_m->get_attendance($id);
					
					if($attendance_row) {
						if($status == 0) {
							$this->attendance_m->update_attendance(array("status" => "1"), $id);
							echo $this->lang->line('menu_success');
						} elseif($status == 1) {
							$this->attendance_m->update_attendance(array("status" => "2"), $id);
							echo $this->lang->line('menu_success');
						} elseif($status == 2) {
							$this->attendance_m->update_attendance(array("status" => "1"), $id);
							echo $this->lang->line('menu_success');
						}
					}
				}
			}

			function all_add() {
				$status = $this->input->post('status');
				$classes = $this->input->post('classes');
				$date = $this->input->post('date');
				
				if($status == "checked") {
					$status = "1";
				} elseif($status == "unchecked") {
					$status = "2";
				}
				if((int)$classes) {
					$array = array('status' => $status);
					$this->attendance_m->update_attendance_classes($array, array("classes_id" => $classes, "date" => $date));
					echo $this->lang->line('menu_success');
				}
			}


}
/* End of file class.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/class.php */
