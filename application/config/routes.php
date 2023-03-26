<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//LOG OUT
$route['logout'] = 'Logout_controller/logout';


//MY ROUTE ON LOGIN
$route['default_controller'] = 'Login_controller/login';
$route['authenticate'] = 'Login_controller/authenticate';

$route['dashboard'] = 'Admin_controller/dashboard';
$route['resetsystem'] = 'Admin_controller/resetSystem';


$route['teacher'] = 'Admin_controller/teacher';
$route['saveteacher'] = 'Admin_controller/saveTeacher';
$route['updateteacher/(:any)'] = 'Admin_controller/updateTeacher/$1';
$route['deleteteacher/(:any)'] = 'Admin_controller/deleteTeacher/$1';


$route['questions'] = 'Admin_controller/questions';
$route['savequestion'] = 'Admin_controller/saveQuestion';
$route['updatequestion/(:any)'] = 'Admin_controller/updateQuestion/$1';
$route['deletequestion/(:any)'] = 'Admin_controller/deleteQuestion/$1';

$route['sectionassignment'] = 'Admin_controller/sectionAssignment';
$route['addtempsection/(:any)'] = 'Admin_controller/addTempSection/$1';
$route['removetempsection/(:any)'] = 'Admin_controller/removeTempSection/$1';
$route['assignsections'] = 'Admin_controller/assignSections';
$route['editsectionassignment/(:any)'] = 'Admin_controller/editSectionAssignment/$1';

$route['removeteachersection/(:any)/(:any)'] = 'Admin_controller/removeTeacherSection/$1/$2';



$route['setquestions'] = 'Admin_controller/setQuestions';
$route['addtempquestion/(:any)'] = 'Admin_controller/addTempQuestion/$1';
$route['removetempquestion/(:any)'] = 'Admin_controller/removeTempQuestion/$1';
$route['registersetquestion'] = 'Admin_controller/registerSetQuestion';

$route['sets'] = 'Admin_controller/sets';
$route['sendquestions'] = 'Admin_controller/sendQuestions';
$route['results'] = 'Admin_controller/Results';
$route['teachercredentials'] = 'Admin_controller/teacherCredentials';
$route['viewcredentials/(:any)'] = 'Admin_controller/viewTeacherCredentials/$1';
$route['savecredentialscore/(:any)/(:any)'] = 'Admin_controller/saveCredentialScore/$1/$2';

$route['users'] = 'Admin_controller/users';
$route['registeradmin'] = 'Admin_controller/registerAdmin';
$route['updateadmin/(:any)'] = 'Admin_controller/updateAdmin/$1';

// student accesss
$route['studentdash'] = 'Student_controller/studentDashboard';
$route['viewquestions/(:any)/(:any)'] = 'Student_controller/viewQuestions/$1/$2';
$route['loganswer/(:any)/(:any)'] = 'Student_controller/logAnswer/$1/$2';




// teacher accesss
$route['teacherdash'] = 'Teacher_controller/teacherDashboard';
$route['teacherquestions/(:any)/(:any)'] = 'Teacher_controller/teacherQuestions/$1/$2';
$route['logsupanswer/(:any)/(:any)'] = 'Teacher_controller/logSupAnswer/$1/$2';
$route['selfteacherquestion/(:any)'] = 'Teacher_controller/selfTeacherQuestion/$1';
$route['logmyanswer/(:any)'] = 'Teacher_controller/logMyAnswer/$1';
$route['mycredentials'] = 'Teacher_controller/myCredentials';
$route['uploadcredential'] = 'Teacher_controller/uploadCredential';
$route['deletecredential/(:any)'] = 'Teacher_controller/deleteCredential/$1';


//DASHBOARD
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
