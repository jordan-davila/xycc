<?php

// Home Front Pages
$route->add('GET', '/', 'Pages@index');
$route->add('GET', '/pages/about', 'Pages@getAbout');
$route->add('GET', '/pages/admissions', 'Pages@getAdmissions');
$route->add('GET', '/pages/academics', 'Pages@getAcademics');
$route->add('GET', '/pages/campus', 'Pages@getCampus');
$route->add('GET', '/pages/store', 'Pages@getStore');

// Docs
$route->add('GET', '/docs/proposal', 'Docs@getProposal');
$route->add('GET', '/docs/casestudy', 'Docs@getCaseStudy');

// Dash
$route->add('GET', '/dash', 'Dash@index', true, ['admin', 'teacher', 'student']);

// Users
$route->add('GET', '/users', 'Users@getUsers', true, ['admin']);
$route->add('GET', '/users/edit', 'Users@getUser', true, ['admin']);
$route->add('POST', '/users/update', 'Users@putUser', true, ['admin']);
$route->add('POST', '/users/create', 'Users@postUser', true, ['admin']);
$route->add('GET', '/users/delete', 'Users@deleteUser', true, ['admin']);

// User Public
$route->add('GET', '/users/login', 'Users@login');
$route->add('POST', '/users/auth', 'Users@auth');
$route->add('GET', '/users/logout', 'Users@logout', true, ['admin', 'teacher', 'student']);

// Classes
$route->add('GET', '/classes/view', 'Classes@getClass', true, ['admin', 'teacher', 'student']);
$route->add('POST', '/classes/edit', 'Classes@putClass', true, ['admin', 'teacher', 'student']);
$route->add('POST', '/classes/create', 'Classes@postClass', true, ['admin', 'teacher', 'student']);
$route->add('GET', '/classes/registration', 'Classes@getRegistration', true, ['admin', 'teacher', 'student']);
$route->add('GET', '/classes/register', 'Classes@postRegister', true, ['admin', 'teacher', 'student']);

// My Classes
$route->add('GET', '/myclasses/view', 'Classes@getMyClasses', true, ['teacher', 'student']);
$route->add('GET', '/myclasses/register', 'Classes@getRegister', true, ['admin','teacher', 'student']);

// Class Assignments
$route->add('GET', '/assignments/view', 'Assignments@getByClassId', true, ['admin', 'teacher', 'student']);
$route->add('GET', '/assignments/edit', 'Assignments@getAssignment', true, ['admin', 'teacher']);
$route->add('POST', '/assignments/update', 'Assignments@putAssignment', true, ['admin', 'teacher']);
$route->add('GET', '/assignments/new', 'Assignments@newAssignment', true, ['admin', 'teacher']);
$route->add('POST', '/assignments/create', 'Assignments@postAssignment', true, ['admin', 'teacher']);
$route->add('GET', '/assignments/delete', 'Assignments@deleteAssignment', true, ['admin', 'teacher']);

// Class Assignment Submissions
$route->add('GET', '/submissions/view', 'Submissions@getSubmission', true, ['admin', 'teacher', 'student']);
$route->add('GET', '/submissions/new', 'Submissions@newSubmission', true, ['admin', 'teacher', 'student']);
$route->add('GET', '/submissions/review', 'Submissions@reviewSubmission', true, ['admin', 'teacher', 'student']);
$route->add('POST', '/submissions/create', 'Submissions@postSubmission', true, ['admin', 'teacher', 'student']);
$route->add('GET', '/submissions/delete', 'Submissions@deleteSubmission', true, ['admin', 'teacher', 'student']);
$route->add('GET', '/submissions/download', 'Submissions@download', true, ['admin', 'teacher', 'student']);

// Submission Grades
$route->add('POST', '/grades/create', 'SubmissionGrades@postGrade', true, ['admin', 'teacher']);
$route->add('POST', '/grades/update', 'SubmissionGrades@putGrade', true, ['admin', 'teacher']);

// Class Test Submissions
// $route->add('GET', '/testsubmissions/view', 'Assignments@getTestSubmission', true, ['admin', 'teacher', 'student']);
// $route->add('POST', '/testsubmissions/create', 'Assignments@postTestSubmission', true, ['admin', 'teacher', 'student']);
// $route->add('GET', '/testsubmissions/delete', 'Assignments@deleteTestSubmission', true, ['admin', 'teacher', 'student']);

// Courses
$route->add('GET', '/courses/all', 'Courses@index', true, ['admin']);
$route->add('GET', '/courses/edit', 'Courses@getCourse', true, ['admin']);
$route->add('POST', '/courses/update', 'Courses@putCourse', true, ['admin']);
$route->add('POST', '/courses/create', 'Courses@postCourse', true, ['admin']);


// Set 404 Page.
// Make sure to have set404() as your last call
$route->set404('Pages@get404');
