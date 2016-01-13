<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include_once FCPATH . '/mvc/libraries/simple_html_dom.php';

class uploader extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        $data = array();
        
        $this->load->model('uploader_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        $rules = array(array(
                    'field' => 'table', 
                    'label' => 'Table Name', 
                    'rules' => 'trim|required'
                ));
        $this->form_validation->set_rules($rules);


        if ($this->form_validation->run() === TRUE) {
            $table  =  $this->input->post('table');
            
            /*
            $content = $this->input->post('content');

            

            $html = new simple_html_dom();
            $html->load($content);
            $rows = array();

            foreach ($html->find('table') as $tbl) {
                foreach ($tbl->find('tr') as $tr) {
                    $row = array();
                    //Loop over tds
                    foreach ($tr->find('td') as $td) {
                        $row[] = $td->innertext;
                    }
                    $rows[] = $row;
                }
            }
            */

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_import.xlsx');
            // Importing excel sheet for bulk student uploads

            include 'simplexlsx.class.php';
            
            $xlsx = new SimpleXLSX('uploads/student_import.xlsx');
            //list($num_cols, $num_rows) = $xlsx->dimension();
            $f = 0;

            $items = array();
            var_dump($xlsx->rows());

            exit;
            //Build Db insert
            foreach ($xlsx->rows() as $rws) {
                //if ($rws[0] != '') {
                // Ignore the inital name row of excel file
                if ($f == 0)
                {
                    $f++;
                    continue;
                }

                    //Get the item structure
                    $item = $this->getItemStructure($table);
                    $keys = array_keys($item);

                    for ($i = 0; $i < count($rws); $i++) {
                        if($keys[$i] == "password")
                        {
                            $item[$keys[$i]] = $rws[$i] != '' ? md5($rws[$i]) : md5(trim($item[$keys[$i]]));
                        }
                        else
                        {
                            $item[$keys[$i]] = $rws[$i] != '' ? $rws[$i] : trim($item[$keys[$i]]);
                        }
                    }
                    $items[] = $item;
                //}
            }
            
            $this->uploader_model->create_multiple($items,$table);
        }

    
        //$this->data['siteinfos'] = NULL;
         //$this->data['alert'] = NULL;
            $this->data["subview"] = "uploader/create";
       $this->load->view('_layout_main', $this->data);

        //$this->load->view('uploader/create', $data);
    }

    private function getItemStructure($table) {
        $arr = array();
        if($table == "teacher")
        {
            $arr = array(
            'name' => '',
            'designation' => '',
            'dob' => '0000-00-00',
            'sex' => '',
            'religion' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'jod' => '',
            'photo' => '',
            'username' => '',
            'password' => '123456',
            'usertype' => 'Teacher'
           );
    }
     else if($table == "parent")
        {
            $arr = array(
            'name' => '',
            'father_name' => '',
            'mother_name' => '',
            'father_profession' => '',
            'mother_profession' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'photo' => '',
            'username' => '',
            'password' => '123456',
            'usertype' => 'Parent'
           );
    }
    else if($table == "student")
        {
            $arr = array(
            'name' => '',
            'dob' => '0000-00-00',
            'sex' => '',
            'religion' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'classesID' => '',
            'sectionID' => '',
            'section' => '',
            'roll' => '',
            'parentID' => '',
            'year' => '',
            'photo' => '',
            'username' => '',
            'password' => '123456',
            'usertype' => 'Student'
           );
    }
         return $arr;

        }
       
}
