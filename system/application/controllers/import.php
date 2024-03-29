<?php
/**
 * Copyright 2011 University of Denver--Penrose Library--University Records Management Program
 * Author evan.blount@du.edu
 * 
 * This file is part of Records Authority.
 * 
 * Records Authority is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Records Authority is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Records Authority.  If not, see <http://www.gnu.org/licenses/>.
 **/

class Import extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('SessionManager');
		$this->SessionManager->isAdminLoggedIn();
		
		$this->load->model('ImportModel');
		$this->uploadDir = $this->config->item('uploadDirectory');
	}
	
	/**
    * displays import form
    *
    * @access public
    * @return void
    */
	public function index() {
		$siteUrl = site_url();
		$data['files'] = $this->ImportModel->listFilesInDir("./uploads/");
		//$filePath = "./uploads/products.csv";
		$data['csv'] = "";
		$this->load->view('admin/forms/importForm', $data);
	}
	
	/**
    * imports csv file to the retention schedule
    *
    * @access public
    * @return void
    */
	public function importCSV() {
		if (!empty($_POST['fileName']) && $_POST['importType'] == "retentionSchedule") {
			$data['csv'] = $this->ImportModel->csvImport("./uploads/" . $_POST['fileName']);
		} elseif (!empty($_POST['fileName']) && $_POST['importType'] == "divisionAndDepartment") {
			$data['csv'] = $this->ImportModel->csvDivImport("./uploads/" . $_POST['fileName']);
		} else {
			$data['error'] = "No file selected";
		}
		$siteUrl = site_url();
		$data['files'] = $this->ImportModel->listFilesInDir("./uploads/");
		$this->load->view('admin/forms/importForm', $data);
	}
}

?>