<?php 
namespace App\Modules\Dashboard\Controllers;
use CodeIgniter\Controller;
use Config\Services;

use Dashboard\Models\DashboardModel;
use Dashboard\Models\JobCategoryModel;
use Dashboard\Models\JobTypeModel;
use Dashboard\Models\JobExperienceModel;
use Dashboard\Models\JobQualificationModel;
use Dashboard\Models\JobSkillModel;
use Dashboard\Models\JobSalaryModel;
use Dashboard\Models\CurrencyModel;
use Dashboard\Models\CityModel;
use Dashboard\Models\CountryModel;

use Dashboard\Models\BlogCategoryModel;
use Dashboard\Models\BlogTagModel;
use Dashboard\Models\BlogModel;

use Dashboard\Models\FaqModel;
use App\Models\EnquiryModel;
use Dashboard\Models\CmsModel;
use Auth\Models\UserModel;
use Dashboard\Models\GeneralCmsModel;
use Dashboard\Models\JobCompensationModel;
use Dashboard\Models\JobOccupationalCategoryModel;
use Dashboard\Models\JobBenefitModel;
use Candidate\Models\CandidateModel;

use Candidate\Models\ResumeModel;
use Candidate\Models\ResumeExperienceModel;
use Candidate\Models\ResumeEducationModel;
use Candidate\Models\ResumeSkillModel;

use Employer\Models\CompanyModel;
use Employer\Models\JobModel;
use Web\Models\ApplicationModel;

class Dashboard extends Controller
{
    protected $config;
    protected $session;
    protected $admin_roles;
	public function __construct()
	{
		$this->session = Services::session();
		$this->config = config('Dashboard');
	}

	public function access_check() {
	    $data = array();
	    $data['user'] = $this->session->get('userData');
	    if (! $this->session->isLoggedIn) {
	        return false;
	    } else {
	        return true;
	    }
	}
	
    public function index(){

       if(!$this->access_check()) return redirect()->to('admin-access-denied');

       $data = array();
	   $data['breadcrumb'] = '';
	   $data['config'] = $this->config;
	  
	   return view($this->config->views['dashboard_view'], $data);
    }
    
}