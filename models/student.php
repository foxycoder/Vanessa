<?php
class Student extends AppModel {

	var $name = 'Student';
	var $validate = array(
		'coll_kaart' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ldap_uid' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'JoinStudentGroup' => array(
			'className' => 'JoinStudentGroup',
			'foreignKey' => 'student_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		));

   var $hasOne = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'student_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	var $hasAndBelongsToMany = array(
		'Course' => array(
			'className' => 'Course',
			'joinTable' => 'students_courses',
			'foreignKey' => 'student_id',
			'associationForeignKey' => 'course_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

   public function getStudentListFromCourse($course_id) {
      return $this->findList(array(
         'conditions' => array('StudentsCourse.course_id' => $course_id),
         'joins' => array(array(
                           'table' => 'students_courses',
                           'alias' => 'StudentsCourse',
                           'type' => 'INNER',
                           'conditions' => array('StudentsCourse.student_id = Student.id')
                     )),
         'fields' => array('Student.id', 'Student.coll_kaart'),
         'recursive' => -1
      ));
   }

}
?>