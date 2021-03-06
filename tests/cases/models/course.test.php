<?php

/* Course Test cases generated on: 2010-11-26 12:11:24 : 1290769224*/
App::import('Model', 'Course');

class CourseTestCase extends CakeTestCase {
	var $fixtures = array(
		'app.course', 
		'app.user', 
		'app.activity', 
		'app.student_group', 
		'app.join_student_group', 
		'app.preference', 
		'app.role', 
		'app.security_log', 
		'app.student', 
		'app.students_course'
		);

	function startTest() {
		$this->Course =& ClassRegistry::init('Course');
	}

	function endTest() {
		unset($this->Course);
		ClassRegistry::flush();
	}

}
?>