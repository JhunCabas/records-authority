<?php
/**
 * Copyright 2008 University of Denver--Penrose Library--University Records Management Program
 * Author fernando.reyes@du.edu
 * 
 * This file is part of Liaison.
 * 
 * Liaison is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Liaison is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Liaison.  If not, see <http://www.gnu.org/licenses/>.
 **/


class UpkeepModel extends Model {

	public function __construct() {
 		parent::Model();
 	}
 	
 	/**
    * invokes saveRecordCategory()
    *
    * @access  public
    * @return  void
    */
	public function saveRecordCategory() {
		$this->saveRecordCategoryQuery($_POST);
	}
	
	/**
    * saves record category to database 
    *
    * @access  private
    * @return  void
    */
	private function saveRecordCategoryQuery($_POST) {
		$recordCategory = array();
		$recordCategory['recordCategory'] = $_POST['recordCategory'];
		$this->db->insert('rm_recordCategories', $recordCategory);
	}
	
	/**
    * invokes saveDivisionQuery()
    *
    * @access  public
    * @return  void
    */
	public function saveDivision() {
		$this->saveDivisionQuery($_POST);
	}
	
	/**
    * saves division to database 
    *
    * @access  private
    * @return  void
    */
	private function saveDivisionQuery($_POST) {
		$divisionName = array();
		$divisionName['divisionName'] = $_POST['divisionName'];
		$this->db->insert('rm_divisions', $divisionName);
	}
	
/**
    * invokes saveDepartmentQuery()
    *
    * @access  public
    * @return  void
    */
	public function saveDepartment() {
		$this->saveDepartmentQuery($_POST);
	}
	
	/**
    * saves department to database 
    *
    * @access  private
    * @return  void
    */
	private function saveDepartmentQuery($_POST) {
		$department = array();
		$department['divisionID'] = $_POST['divisionID'];
		$department['departmentName'] = $_POST['departmentName'];
		$this->db->insert('rm_departments', $department);
	}
	
	/**
    * invokes getDivisionQuery()
    *
    * @access  public
    * @return  void
    */
	public function getDivision() {
		$divisionName = $this->getDivisionQuery($_POST);
		return $divisionName;
	}
	
	/**
    * gets division from database 
    *
    * @access  private
    * @return  void
    */
	private function getDivisionQuery($_POST) {
		$this->db->select('divisionName');
		$this->db->from('rm_divisions');
		$this->db->where('divisionID', $_POST['divisionID']);
		$divisionNameQuery = $this->db->get();
			
		if ($divisionNameQuery->num_rows > 0) {
			$divisonNameResult = $divisionNameQuery->row();
			$divisionName = $divisonNameResult->divisionName;
			
			return $divisionName;
		}
	}
	
	/**
    * invokes updateDivisionQuery()
    *
    * @access  public
    * @return  void
    */
	public function updateDivision() {
		$this->updateDivisionQuery($_POST);
	}
	
	/**
    * updates division  
    *
    * @access  private
    * @return  void
    */
	private function updateDivisionQuery($_POST) {
		$division = array();
		$division['divisionName'] = $_POST['divisionName'];
		$this->db->where('divisionID', $_POST['divisionID']);
		$this->db->update('rm_divisions', $division);
	}
	
	/**
    * invokes getDepartmentsQuery()
    *
    * @access  public
    * @return  void
    */
	public function getDepartments($_POST) {
		$departments = $this->getDepartmentsQuery($_POST);
		return $departments;
	}
	
	/**
    * gets departments to edit  
    *
    * @access  private
    * @return  $departments
    */
	private function getDepartmentsQuery($_POST) {
		$this->db->select('departmentID, departmentName');
		$this->db->from('rm_departments');
		$this->db->where('divisionID', $_POST['divisionID']);
		$departmentsQuery = $this->db->get();
		
		if ($departmentsQuery->num_rows > 0) {
		
			foreach ($departmentsQuery->result() as $results) {
				$departments[$results->departmentID] = $results->departmentName;
			}
			return $departments;		
		}
	}
	
	/**
    * invokes getDepartmentQuery()
    *
    * @access  public
    * @return  void
    */
	public function getDepartment($_POST) {
		$departmentName = $this->getDepartmentQuery($_POST);
		return $departmentName;
	}
	
	/**
    * gets department to edit  
    *
    * @access  private
    * @return  $departmentName
    */
	private function getDepartmentQuery($_POST) {
		$this->db->select('departmentID, departmentName');
		$this->db->from('rm_departments');
		$this->db->where('departmentID', $_POST['departmentID']);
		$departmentQuery = $this->db->get();
		
		if ($departmentQuery->num_rows > 0) {
		
			foreach ($departmentQuery->result() as $results) {
				$departmentName = $results->departmentName;
			}
			return $departmentName;		
		}
	}
	
	/**
    * invokes updateDepartmentQuery()
    *
    * @access  public
    * @return  void
    */
	public function updateDepartment() {
		$this->updateDepartmentQuery($_POST);
	}
	
	/**
    * updates division  
    *
    * @access  private
    * @return  void
    */
	private function updateDepartmentQuery($_POST) {
		$department = array();
		$department['departmentName'] = $_POST['departmentName'];
		$this->db->where('departmentID', $_POST['departmentID']);
		$this->db->update('rm_departments', $department);
	}
	
	/**
    * invokes getRecordCategoriesQuery()
    *
    * @access  public
    * @return  $recordCategories
    */
	public function getRecordCategories() {
		$recordCategories = $this->getRecordCategoriesQuery();
		return $recordCategories;
	}
	
	/**
    * gets record categories to edit  
    *
    * @access  private
    * @return  $recordCategories
    */
	private function getRecordCategoriesQuery() {
		$recordCategories = array();
	 	$this->db->select('recordCategoryID, recordCategory');
	 	$this->db->from('rm_recordCategories');
	 	$this->db->order_by('recordCategory', 'asc');
	 	$recordCategoryQuery = $this->db->get();
	 		 		 
	 	if ($recordCategoryQuery->num_rows() > 0) {		
	 		 foreach ($recordCategoryQuery->result() as $results) {
			 	$recordCategories[$results->recordCategoryID] = $results->recordCategory;
			 }
	 	}		
	 		return $recordCategories;
	}
	
	/**
    * invokes getRecordCategoryQuery()
    *
    * @access  public
    * @return  $recordCategory
    */
	public function getRecordCategory($_POST) {
		$recordCategory = $this->getRecordCategoryQuery($_POST);
		return $recordCategory;
	}
	
	/**
    * gets record category to edit  
    *
    * @access  private
    * @return  $recordCategory
    */
	private function getRecordCategoryQuery($_POST) {
		$this->db->select('recordCategoryID, recordCategory');
		$this->db->from('rm_recordCategories');
		$this->db->where('recordCategoryID', $_POST['recordCategoryID']);
		$recordCategoryQuery = $this->db->get();
		
		if ($recordCategoryQuery->num_rows > 0) {
			foreach ($recordCategoryQuery->result() as $results) {
				$recordCategory = $results->recordCategory;
			}
			return $recordCategory;		
		}
	}
	
	/**
    * invokes updateRecordCategoryQuery()
    *
    * @access  public
    * @return  void
    */
	public function updateRecordCategory() {
		$this->updateRecordCategoryQuery($_POST);
	}
	
	/**
    * updates record category  
    *
    * @access  private
    * @return  void
    */
	private function updateRecordCategoryQuery($_POST) {
		$recordCategory = array();
		$recordCategory['recordCategory'] = $_POST['recordCategory'];
		$this->db->where('recordCategoryID', $_POST['recordCategoryID']);
		$this->db->update('rm_recordCategories', $recordCategory);
	}
	
	/**
    * invokes deleteDepartmentQuery()
    *
    * @access  public
    * @return  void
    */
	public function deleteDepartment($departmentID) {
		$this->deleteDepartmentQuery($departmentID);
	}
	
	/**
    * deletes department  
    *
    * @access  private
    * @return  void
    */
	private function deleteDepartmentQuery($departmentID) {
		$this->db->where('departmentID', $departmentID);
		$this->db->delete('rm_departments');
	}
	
	/**
    * invokes deleteDivisionQuery()
    *
    * @access  public
    * @return  void
    */
	public function deleteDivision($divisionID) {
		$this->deleteDivisionQuery($divisionID);
	}
	
	/**
    * delete division  
    *
    * @access  private
    * @return  void
    */
	private function deleteDivisionQuery($divisionID) {
		
		// check to see if there are departments under selected divison 
		$this->db->select('rm_departments');
		$this->db->from('rm_departments');
		$this->db->where('divisionID', $divisionID);
		$results = $this->db->count_all_results();
		
		if ($results > 0) {
			// removes associated departments
			$this->db->where('divisionID',$divisionID);
			$this->db->delete('rm_departments');
		}
		
		// removes division
		$this->db->where('divisionID', $divisionID);
		$this->db->delete('rm_divisions');
		
	}
	
	/**
    * invokes deleteRecordCategoryQuery()
    *
    * @access  public
    * @return  void
    */
	public function deleteRecordCategory($recordCategoryID) {
		$this->deleteRecordCategoryQuery($recordCategoryID);
	}
	
	/**
    * delete record category  
    *
    * @access  private
    * @return  void
    */
	private function deleteRecordCategoryQuery($recordCategoryID) {
		$this->db->where('recordCategoryID', $recordCategoryID);
		$this->db->delete('rm_recordCategories');
	}
	
	/**
    * invokes getDocTypeQuery()
    *
    * @access  public
    * @return  $recordCategories
    */
	public function getDocTypes() {
		$recordCategories = $this->getDocTypesQuery();
		return $recordCategories;
	}
	
	/**
    * gets document types
    *
    * @access  private
    * @return  $docTypes
    */
	private function getDocTypesQuery() {
		$this->db->select('docTypeID, docType');
		$this->db->from('rm_docTypes');
		
		$docTypeQuery = $this->db->get();
		
		if ($docTypeQuery->num_rows > 0) {
			foreach ($docTypeQuery->result() as $results) {
				$docTypes[$results->docTypeID] = $results->docType;
			}
			return $docTypes;		
		}
	}
	
	/**
    * invokes saveDocTypeQuery()
    *
    * @access  public
    * @return  void
    */
	public function saveDocType() {
		$this->saveDocTypeQuery($_POST);
	}
	
	/**
    * saves doc type to database 
    *
    * @access  private
    * @return  void
    */
	private function saveDocTypeQuery($_POST) {
		$docType = array();
		$docType['docType'] = $_POST['docType'];
		$this->db->insert('rm_docTypes', $docType);
	}
 	
	
	/**
    * invokes getDocTypeQuery()
    *
    * @access  public
    * @return  $docType
    */
	public function getDocType($_POST) {
		$docType = $this->getDocTypeQuery($_POST);
		return $docType;
	}
	
	/**
    * gets doc type to edit  
    *
    * @access  private
    * @return  $docType
    */
	private function getDocTypeQuery($_POST) {
		$this->db->select('docType');
		$this->db->from('rm_docTypes');
		$this->db->where('docTypeID', $_POST['docTypeID']);
		$docTypeQuery = $this->db->get();
		
		if ($docTypeQuery->num_rows > 0) {
		
			foreach ($docTypeQuery->result() as $results) {
				$docType = $results->docType;
			}
			return $docType;		
		}
	}
	
	/**
    * invokes updateDocTypeQuery()
    *
    * @access  public
    * @return  void
    */
	public function updateDocType() {
		$this->updateDocTypeQuery($_POST);
	}
	
	/**
    * updates doc type  
    *
    * @access  private
    * @return  void
    */
	private function updateDocTypeQuery($_POST) {
		$docType = array();
		$docType['docType'] = $_POST['docType'];
		$this->db->where('docTypeID', $_POST['docTypeID']);
		$this->db->update('rm_docTypes', $docType);
	}
	
	/**
    * invokes deleteDocTypeQuery()
    *
    * @access  public
    * @return  void
    */
	public function deleteDocType($docTypeID) {
		$this->deleteDocTypeQuery($docTypeID);
	}
	
	/**
    * delete doc type  
    *
    * @access  private
    * @return  void
    */
	private function deleteDocTypeQuery($docTypeID) {
		$this->db->where('docTypeID', $docTypeID);
		$this->db->delete('rm_docTypes');
	}
	
	/**
    * gets doc types for autosuggest display
    *
    * @access  public
    * @return  $docTypes
    */
	public function autoSuggest_getDocTypes() {
		$docTypes = $this->getDocTypesQuery();
		return $docTypes;
	}
	
	public function autoSuggest_primaryAuthorities($primaryAuthority) {
		$primaryAuthorities = $this->getPrimaryAuthoritiesQuery($primaryAuthority);
		return $primaryAuthorities;  
	}
	
	private function getPrimaryAuthoritiesQuery($primaryAuthority) {
		$sql = "SELECT DISTINCT primaryAuthority FROM rm_retentionSchedule WHERE primaryAuthority LIKE ? ";
		$primaryAuthorityQuery = $this->db->query($sql, array('%' . $primaryAuthority . '%'));
		$primaryAuthority = array();
		if ($primaryAuthorityQuery->num_rows > 0) {
			foreach ($primaryAuthorityQuery->result() as $results) {
				$primaryAuthority[] = $results->primaryAuthority;
			}
			return $primaryAuthority;		
		} //else {
			//return $primaryAuthority = "No results found.";
		//}
	}
			
	public function autoSuggest_primaryAuthorityRetentions($primaryAuthorityRetention) {
		$primaryAuthorityRetentions = $this->getPrimaryAuthorityRetentionsQuery($primaryAuthorityRetention);
		return $primaryAuthorityRetentions;  
	}
	
	private function getPrimaryAuthorityRetentionsQuery($primaryAuthorityRetention) {
		$sql = "SELECT DISTINCT primaryAuthorityRetention FROM rm_retentionSchedule WHERE primaryAuthorityRetention LIKE ? ";
		$primaryAuthorityRetentionQuery = $this->db->query($sql, array('%' . $primaryAuthorityRetention . '%'));
		$primaryAuthorityRetention = array();
		if ($primaryAuthorityRetentionQuery->num_rows > 0) {
			foreach ($primaryAuthorityRetentionQuery->result() as $results) {
				$primaryAuthorityRetention[] = $results->primaryAuthorityRetention;
			}
			return $primaryAuthorityRetention;		
		} //else {
			//return $primaryAuthorityRetention = "No results found.";
		//}
	}
	
	public function autoSuggest_relatedAuthorities($relatedAuthority) {
		$relatedAuthorities = $this->getRelatedAuthoritiesQuery($relatedAuthority);
		return $relatedAuthorities;  
	}
	
	
	private function getRelatedAuthoritiesQuery($relatedAuthority) {
		$sql = "SELECT DISTINCT rsRelatedAuthority FROM rm_rsRelatedAuthorities WHERE rsRelatedAuthority LIKE ? ";
		$relatedAuthorityQuery = $this->db->query($sql, array('%' . $relatedAuthority . '%'));
		$relatedAuthority = array();
		if ($relatedAuthorityQuery->num_rows > 0) {
			foreach ($relatedAuthorityQuery->result() as $results) {
				$relatedAuthority[] = $results->rsRelatedAuthority;
			}
			return $relatedAuthority;		
		} //else {
			//return $relatedAuthority = "No results found.";
		//}
	}
	
	public function autoSuggest_retentionPeriods($retentionPeriod) {
		$retentionPeriods = $this->getRetentionPeriodQuery($retentionPeriod);
		return $retentionPeriods;  
	}
	
	private function getRetentionPeriodQuery($retentionPeriod) {
		$sql = "SELECT DISTINCT retentionPeriod FROM rm_retentionSchedule WHERE retentionPeriod LIKE ? ";
		$retentionPeriodQuery = $this->db->query($sql, array('%' . $retentionPeriod . '%'));
		$retentionPeriod = array();
		if ($retentionPeriodQuery->num_rows > 0) {
			foreach ($retentionPeriodQuery->result() as $results) {
				$retentionPeriod[] = $results->retentionPeriod;
			}
			return $retentionPeriod;		
		} //else {
			//return $retentionPeriod = "No results found.";
		//}
	}
	
	
	public function autoSuggest_relatedAuthorityRetention($relatedAuthorityRetention) {
		$relatedAuthorityRetentions = $this->getRelatedAuthorityRetentionQuery($relatedAuthorityRetention);
		return $relatedAuthorityRetentions;  
	}
	
	private function getRelatedAuthorityRetentionQuery($relatedAuthorityRetention) {
		$sql = "SELECT DISTINCT rsRelatedAuthorityRetention FROM rm_rsRelatedAuthorities WHERE rsRelatedAuthorityRetention LIKE ? ";
		$relatedAuthorityRetentionQuery = $this->db->query($sql, array('%' . $relatedAuthorityRetention . '%'));
		
		$relatedAuthorityRetention = array();
		if ($relatedAuthorityRetentionQuery->num_rows > 0) {
			foreach ($relatedAuthorityRetentionQuery->result() as $results) {
				$relatedAuthorityRetention[] = $results->rsRelatedAuthorityRetention;
			}
			return $relatedAuthorityRetention;		
		} //else {
			//return $relatedAuthorityRetention = "No results found.";
		//}
	}
	
	public function autoSuggest_recordName($recordName) {
		$recordNames = $this->getRecordNamesQuery($recordName);
		return $recordNames;  
	}
	
	private function getRecordNamesQuery($recordName) {
		$sql = "SELECT DISTINCT recordName FROM rm_retentionSchedule WHERE recordName LIKE ? ";
		$recordNamesQuery = $this->db->query($sql, array('%' . $recordName . '%'));
		
		$recordNames = array();
		if ($recordNamesQuery->num_rows > 0) {
			foreach ($recordNamesQuery->result() as $results) {
				$recordNames[] = $results->recordName;
			}
			return $recordNames;		
		} //else {
			//return $recordNames = "No results found.";
		//}
	}
}