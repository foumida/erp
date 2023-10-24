<?php
namespace App\Modules\Master\Config;

use CodeIgniter\Config\BaseConfig;

class Master extends BaseConfig
{
    public $views = [
        'branches_view' => 'App\Modules\Master\Views\branches_view',
        'branch_create' => 'App\Modules\Master\Views\branch_create',
    ];
    public $viewLayout = 'App\Modules\Common\Views\layout';
}
