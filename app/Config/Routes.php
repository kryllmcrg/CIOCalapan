<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'User::index');
$routes->get('/', 'UserController::home', ['filter' => 'noauth']);
$routes->get('/about', 'UserController::about', ['filter' => 'noauth']);
$routes->get('/news_read/(:num)', 'UserController::news_read/$1', ['filter' => 'noauth']);
$routes->get('/contact', 'UserController::contact', ['filter' => 'noauth']);
$routes->get('/announce', 'UserController::announce', ['filter' => 'noauth']);
$routes->get('/news', 'UserController::news', ['filter' => 'noauth']);
$routes->post('/like/(:any)', 'UserController::like/$1', ['filter' => 'noauth']);
$routes->get('/categories', 'UserController::getCategoryData', ['filter' => 'noauth']);
$routes->get('filterNews/(:any)', 'UserController::filterNews/$1', ['filter' => 'noauth']);
$routes->get('news/(:num)', 'UserController::news/$1', ['filter' => 'noauth']);
$routes->post('search_results', 'UserController::searchNews', ['filter' => 'noauth']);
$routes->post('submit-rating', 'UserController::submitRating', ['filter' => 'noauth']);
$routes->get('generate-pdf/(:num)', 'UserController::generatePdf/$1', ['filter' => 'noauth']);
$routes->get('news_design', 'UserController::news_design', ['filter' => 'noauth']);
$routes->get('news_preview', 'UserController::news_preview', ['filter' => 'noauth']);
$routes->post('fetch_news', 'UserController::fetch_news', ['filter' => 'noauth']);

$routes->get('/login', 'LogRegController::login');
$routes->post('check', 'LogRegController::check');
$routes->get('logout', 'LogRegController::logout');
$routes->get('/register', 'LogRegController::register');
$routes->post('/save', 'LogRegController::save');
$routes->get('/filtercheck', 'LogRegController::filtercheck', ['filter' => 'rolecheck']);
$routes->get('/logout', 'LogRegController::logout');

$routes->get('/dashboard', 'AdminController::dashboard', ['filter' => 'staff']);

$routes->get('/manageprofile', 'ProfileController::manageprofile', ['filter' => 'admin']);
$routes->get('/manageusers', 'ProfileController::manageusers', ['filter' => 'admin']);
$routes->post('update', 'ProfileController::update', ['filter' => 'admin']);


$routes->get('/addnews', 'NewsController::addnews', ['filter' => 'admin']);
$routes->post('addNewsSubmit', 'NewsController::addNewsSubmit', ['filter' => 'admin']);
$routes->post('upload_image', 'NewsController::uploadImage', ['filter' => 'admin']);
$routes->get('/managenews', 'NewsController::managenews', ['filter' => 'admin']);
$routes->get('/deleteNews/(:any)', 'NewsController::deleteNews/$1', ['filter' => 'admin']);
$routes->post('/updateNews', 'NewsController::updateNews', ['filter' => 'admin']);
$routes->get('/editNews/(:num)', 'NewsController::editNews/$1', ['filter' => 'admin']);
$routes->post('changeNewStatus', 'NewsController::changeNewStatus', ['filter' => 'admin']);
$routes->post('changePubStatus', 'NewsController::changePubStatus', ['filter' => 'admin']);
$routes->get('/viewnews/(:any)', 'NewsController::viewnews/$1', ['filter' => 'admin']);
$routes->get('/archive', 'NewsController::archive', ['filter' => 'admin']);
$routes->get('/restoreNews/(:any)', 'NewsController::restoreNews/$1', ['filter' => 'admin']);
$routes->get('/newsDelete/(:any)', 'NewsController::newsDelete/$1', ['filter' => 'admin']);
$routes->post('contact/submitContactForm', 'NewsController::submitContactForm', ['filter' => 'admin']);
$routes->get('/contact', 'NewsController:contact', ['filter' => 'admin']);
$routes->get('/newsAudit', 'NewsController::newsAudit', ['filter' => 'admin']);
$routes->get('/dashboard', 'NewsController::dashboard', ['filter' => 'admin']);
$routes->get('/genreport', 'NewsController::genreport', ['filter' => 'admin']);

$routes->post('addComment', 'CommentsController::addComment', ['filter' => 'admin']);
$routes->post('commentStatus', 'CommentsController::commentStatus', ['filter' => 'admin']);
$routes->post('reply', 'CommentsController::reply', ['filter' => 'admin']); 
$routes->get('managecomments/(:num)', 'CommentsController::managecomments/$1', ['filter' => 'admin']);
$routes->get('managecomments', 'CommentsController::showManageCommentsPage', ['filter' => 'admin']);

//STAFF//
$routes->get('managecommentStaff/(:num)', 'CommentsController::managecommentStaff/$1', ['filter' => 'staff']);
$routes->get('managecommentStaff', 'CommentsController::managecommentStaffPage', ['filter' => 'staff']);
$routes->post('commentStatuStaff', 'CommentsController::commentStatuStaff', ['filter' => 'staff']);


$routes->get('/addcategory', 'CategoryController::addcategory', ['filter' => 'admin']);
$routes->post('/addcategory', 'CategoryController::addcategory', ['filter' => 'admin']);
$routes->get('/getcategory', 'CategoryController::getcategory', ['filter' => 'admin']);
$routes->get('/managecategory', 'CategoryController::managecategory', ['filter' => 'admin']);
$routes->post('/saveCategoryChanges', 'CategoryController::saveCategoryChanges', ['filter' => 'admin']);
$routes->post('/deleteCategory', 'CategoryController::deleteCategory', ['filter' => 'admin']);

//STAFF CATEGORY//
$routes->get('/addcategoryStaff', 'CategoryController::addcategoryStaff', ['filter' => 'staff']);
$routes->post('/addcategoryStaff', 'CategoryController::addcategoryStaff', ['filter' => 'staff']);
$routes->get('/getcategoryStaff', 'CategoryController::getcategoryStaff', ['filter' => 'staff']);
$routes->get('/managecategoryStaff', 'CategoryController::managecategoryStaff', ['filter' => 'staff']);
$routes->post('/changecategoryStaff', 'CategoryController::changecategoryStaff', ['filter' => 'staff']);
$routes->post('/deleteCategoryStaff', 'CategoryController::deleteCategoryStaff', ['filter' => 'staff']);

$routes->get('/chats', 'ChatController::chats', ['filter' => 'admin']);

//STAFF CONTACTS/
$routes->get('/chatStaff', 'ChatController::chatStaff', ['filter' => 'staff']);


//staff//
$routes->get('/createnews', 'NewsStaffController::createnews', ['filter' => 'staff']);
$routes->post('/createNewsSubmit', 'NewsStaffController::createNewsSubmit', ['filter' => 'staff']);
$routes->get('/managenewstaff', 'NewsStaffController::managenewstaff', ['filter' => 'staff']);
$routes->get('/deleteNewsStaff/(:any)', 'NewsStaffController::deleteNewsStaff/$1', ['filter' => 'staff']);
$routes->get('/dashboard', 'NewsStaffController::dashboard', ['filter' => 'staff']);
$routes->get('/changeNews/(:num)', 'NewsStaffController::changeNews/$1', ['filter' => 'staff']);
$routes->post('/newsUpdate', 'NewsStaffController::newsUpdate/$1', ['filter' => 'staff']);
$routes->get('/archiveStaff', 'NewsStaffController::archiveStaff', ['filter' => 'staff']);
$routes->get('/newsAuditStaff', 'NewsStaffController::newsAuditStaff', ['filter' => 'staff']);
$routes->get('/restoreNewStaff/(:any)', 'NewsStaffController::restoreNewStaff/$1', ['filter' => 'staff']);
$routes->get('/newsDeleteStaff/(:any)', 'NewsStaffController::newsDeleteStaff/$1', ['filter' => 'staff']);

