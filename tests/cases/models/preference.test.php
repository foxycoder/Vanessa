<?php

/* Preference Test cases generated on: 2010-11-26 15:11:29 : 1290782009*/
App::import('Model', 'Preference');

class PreferenceTestCase extends CakeTestCase {
	var $fixtures = array(
		'app.preference', 
		'app.student_group', 
		'app.course', 
		'app.user', 
		'app.student', 
		'app.join_student_group', 
		'app.students_course', 
		'app.role', 
		'app.security_log', 
		'app.activity', 
		);
	var $Session;
	var $Controller;

	function startTest() {
		$this->Preference =& ClassRegistry::init('Preference');
		
		App::import('Core', 'Controller');
		App::import('Core', 'SessionComponent');
		$this->Controller = new Controller();		
		$this->Session = new SessionComponent();
		$this->Session->startup($this->Controller);
		
		$this->Session->write('Auth.User.student_id', 1);
	}

	function endTest() {
		unset($this->Preference);
		ClassRegistry::flush();
		
		$this->Session->delete('Auth.User');
	}
	
	function testGetStudentIdFromSession() {	
		$this->assertEqual($this->Preference->getStudentIdFromSession(), 1);
	}
	
	function testGetStudentsGroupIdForThisCourse() {
		$this->assertEqual(
			$this->Preference->getStudentsGroupIdForThisCourse(1), 
			1
		);
	}
	
	function testGetCourseFromActivityId() {
		$this->assertEqual(
			$this->Preference->getCourseFromActivityId(1),
			1
		);
	}
	
	function testCreateNewPreference() {
		$preference = array(
			'student_group_id' => 1,
			'activity_id' => 1,
			'unwantedness' => 1
		);
		$this->assertEqual(
			$this->Preference->createNewPreference(1, 1),
			$preference
		);
	}
	
	function testWriteLikes() {
		$likes = array(
			0 => 1,
			1 => 2,
			2 => 3
		);
		$this->assertEqual(
			$this->Preference->writeLikes($likes),
			true
		);
	}
	
	function testWritePreference() {
		$this->assertEqual(
			$this->Preference->writePreference(1, 0),
			true
		);
	}
	
	function testSavePreference() {
		$likes = array(
			0 => 1,
			1 => 2,
			2 => 3
		);
		$dislikes = array(5, 6, 7, 8, 9, 10, 11, 12);
		
		$this->assertTrue($this->Preference->savePreferences($likes, $dislikes));
	}

}
?>