<?php
namespace Auth\Config;

use CodeIgniter\Config\BaseConfig;

class Auth extends BaseConfig
{
	//--------------------------------------------------------------------
    // Views used by Auth Controllers
    //--------------------------------------------------------------------

    public $views = [
        'login' => 'Auth\Views\login',
        'register' => 'Auth\Views\register',
        'forgot-password' => 'Auth\Views\forgot',
        'reset-password' => 'Auth\Views\reset',
        'account' => 'Auth\Views\account',
        'user_list' => 'Auth\Views\user_list',
         'usersdata_create' => 'Auth\Views\usersdata_create',
        'user_create' => 'Auth\Views\user_create'
    ];

    // Layout for the views to extend
    //public $viewLayout = 'Auth\Views\layout';
    public $viewLayout = 'App\Modules\Common\Views\layout';
    public $viewSingle = 'App\Modules\Common\Views\single';
}
