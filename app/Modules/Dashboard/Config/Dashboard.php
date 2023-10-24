<?php
namespace App\Modules\Dashboard\Config;

use CodeIgniter\Config\BaseConfig;

class Dashboard extends BaseConfig
{
    public $views = [
        'dashboard_view' => 'App\Modules\Dashboard\Views\dashboard_view',
        
    ];
    public $viewLayout = 'App\Modules\Common\Views\layout';
}
