<?php 
namespace App\Modules\Master\Controllers;
use CodeIgniter\Controller;
use Config\Services;

use Master\Models\BranchModel;

class Master extends Controller
{
    protected $config;
    protected $session;

	public function __construct()
	{
		$this->session = Services::session();
		$this->config = config('Master');
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
	
	public function branches(){

       if(!$this->access_check()) return redirect()->to('admin-access-denied');
       
       $model = new BranchModel();
       $data = array();
	   $data['breadcrumb'] = 'Company Branches';
	   $data['config'] = $this->config;
	   
	   $limit = 25;
	   $start = 0;
	   
	   if(isset($_GET['page'])) {
	       $start = $_GET['page']-1;
	       $start = $limit * $start;
	   }
	   
	   $data['start'] = $start;
	   $data['limit'] = $limit;
	   
	   $data['records']=$model->findAll();
	   $data['total']=count($data['records']);
	  
	   return view($this->config->views['branches_view'], $data);
    }
    
    public function branch()
    {

        $data = array();
        $data['config'] = $this->config;
        $data['breadcrumb'] = '';
        $data['eid'] = 0;
        $data['user'] = $this->session->get('userData');
        $data['success']="";
        $model = new BranchModel();
        if(isset($_POST['branch_code']) && $_POST['branch_code']!='')
        {
            
            $eid  = $this->request->getPost('eid');
            if($eid>0) {
                $getRule = $model->getRule('update');
                $data['record']=$model->where('id',$eid)->first();
            }
            else
                $getRule = $model->getRule('create');
            
            if($this->request->getPost('branch_code')!= $data['record']['branch_code']){
                $exists = $model->check_exists($this->request->getPost('branch_code'));
            }
            if($exists==0) {
                
            $data['success']="User Updated Successfully!";
                $model->setValidationRules($getRule);
                $form_data = [
                    'first_name'  => $this->request->getPost('first_name'),
                    'last_name'  => $this->request->getPost('last_name'),
                    'email'  => $this->request->getPost('email'),
                    'phone'  => $this->request->getPost('phone'),
                    'branch_id'  => $this->request->getPost('branch_id'),
                    'user_group_id'  => $this->request->getPost('user_group_id'),
                    'designation'  => $this->request->getPost('designation'),
                    'is_lead_owner'  => $this->request->getPost('is_lead_owner'),
                    'username'  => $this->request->getPost('username'),
                    'phone'  => $this->request->getPost('phone'),
                    'password' => $this->request->getPost('password'),
                    'activate_hash' 	=> random_string('alnum', 32),
                ];
                
                $data['success']="Branch added Successfully!";
                if($this->request->getPost('eid') > 0) {
                    $form_data['id'] = $this->request->getPost('eid');
                    
                        
                        
                }
                if (! $user->save($form_data)) {
                    return redirect()->back()->withInput()->with('errors', $user->errors());
                }
            } else {
                $data['success']="Branch code already exists!";
            }
        }
        return view($this->config->views['branch_create'], $data);
    }
}