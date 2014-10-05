<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
//$route['default_controller'] = "front/go_to_module/page/index/none=none";

$route['default_controller'] = "front/go_to_module/articles/list_articles/type=all&all=yes&type_txt=новости и статьи";

$route['admin/(:any)/(:any)/(:any)'] = "admin/index/$1/$2/$3";
$route['admin/(:any)'] = "admin/index/$1/index/index";
$route['admin'] = "admin/index/page/index/index";

//$route['articles/(:num)'] = "articles/show_article/articles";
//$route['news/(:num)'] = "articles/show_article/news";
$route['news/(:num)'] = "front/go_to_module/articles/show_article/type=news";
$route['articles/(:num)'] = "front/go_to_module/articles/show_article/type=articles";

$route['news/archive/(:any)'] = "front/go_to_module/articles/list_articles/type=news&type_txt=Новости&arc=1";
$route['articles/archive/(:any)'] = "front/go_to_module/articles/list_articles/type=articles&type_txt=Статьи&arc=1";

$route['news/cat/(:num)'] = "front/go_to_module/articles/list_articles/type=news&type_txt=новости&cat=yes";
$route['articles/cat/(:num)'] = "front/go_to_module/articles/list_articles/type=articles&type_txt=статьи&cat=yes";

$route['news'] = "front/go_to_module/articles/list_articles/type=news&type_txt=новости";
$route['articles'] = "front/go_to_module/articles/list_articles/type=articles&type_txt=статьи";

$route['pdfarchive'] = "front/go_to_module/pdfarchive/list_pdfs/none=none";

$route['site_search'] = "front/go_to_module/search/site_search/none=none";

$route['ajax/(:any)/(:any)'] = "front/go_to_module/$1/$2/none=none/true";

//$route['(.*)'] = "page";
$route['(.*)'] = "front/go_to_module/page/index/none=none";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */