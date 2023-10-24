<?php
namespace Auth\Controllers;

use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use Auth\Models\UserModel;

class AccountController extends Controller
{

	/**
	 * Access to current session.
	 *
	 * @var \CodeIgniter\Session\Session
	 */
	protected $session;

	/**
	 * Authentication settings.
	 */
	protected $config;


    //--------------------------------------------------------------------

	public function __construct()
	{
		// start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');
	}

    //--------------------------------------------------------------------

	/**
	 * Displays account settings.
	 */
	public function account()
	{
		if (! $this->session->isLoggedIn) {
			return redirect()->to('login');
		}
		$role_id = $this->session->get('userData.role_id');
		if($role_id != 1)
        return redirect()->to('my-profile');
    
		
        $data['links'] = $this->session->get('userData');
	    $data['user'] = $this->session->get('userData');
	    $data['breadcrumb'] = '<li class="breadcrumb-item">Dashboard</li>';
	    $data['userData'] =$this->session->userData;
	    $data['config'] = $this->config;
		 return view($this->config->views['account'], $data);
		//return view($this->config->views['userdata'], $data);
	}
	public function userList()
	{
		if (! $this->session->isLoggedIn) {
			return redirect()->to('admin/login');
		}

        $users = new UserModel();
        $data = array();
        $data['breadcrumb'] = 'Users';
        $limit = 25;
        $start = 0;
        $data['users']=$users->where('id >','1')->findAll();
        $data['total']=count($data['users']);
        $data['users']= $users->paginate(10);
        $data['pager'] = $users->pager;
	    $data['loggedin'] = $this->session->get('userData');
	    $data['config'] = $this->config;
	    
	    if(isset($_GET['page'])) {
	        $start = $_GET['page']-1;
	        $start = $limit * $start;
	    }
	    
	    $data['start'] = $start;
	    $data['limit'] = $limit;
	    
		return view($this->config->views['user_list'], $data);
	}
	public function userCreate()
	{
	    helper('text');
	    $data = array();
	    $data['config'] = $this->config;
	    $data['breadcrumb'] = '';
	    $data['eid'] = 0;
	    $data['user'] = $this->session->get('userData');
	    $data['success']="";
	    $user = new UserModel();
	    if(isset($_POST['email']) && $_POST['email']!='')
	    {
	        $eid  = $this->request->getPost('eid');
	        if($eid>0) {
	            $getRule = $user->getRule('update');
	            $data['package']=$user->where('id',$eid)->first();
	        }
	        else
	            $getRule = $user->getRule('create');
	        
            $user->setValidationRules($getRule);
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

            $data['success']="User added Successfully!";
            if($this->request->getPost('eid') > 0) {
                $form_data['id'] = $this->request->getPost('eid');
                if($this->request->getPost('password')!="")
                    $form_data['password'] = $this->request->getPost('password');
                    if($this->request->getPost('email')!= $data['package']['email']){
                        $exists = $user->check_email_exists($this->request->getPost('email'));
                        if($exists==0)
                            $form_data['email'] = $this->request->getPost('email');
                    }
                    $data['success']="User Updated Successfully!";
                    
                    
            }
            if (! $user->save($form_data)) {
                return redirect()->back()->withInput()->with('errors', $user->errors());
            }
	    }
	    return view($this->config->views['user_create'], $data);
	}
	public function userCreate1()
	{

  	    $data = array();
    
 		$data['user'] = $this->session->get('userData');
  		//if (! $this->session->isLoggedIn && ($data['user']['role_id'] != 1)) {
 		//   return redirect()->to('/login');
  		//}
  		$data['config'] = $this->config;
  		$data['success']="";
        $user = new UserModel();
        if($eid>0)
  		{
  			$data['package']=$user->where('id',$eid)->first();
  		}
        if(isset($_POST['Submit']))
            {
        	   	$eid  = $this->request->getPost('eid');
        		if($eid>0)
                    $getRule = $user->getRule('registration_update');
        		else
          		    $getRule = $user->getRule('registration');
         		$user->setValidationRules($getRule);
                $form_data = [
                     			'name'  => $this->request->getPost('fname'),
                     			'last_name'  => $this->request->getPost('lname'),
                     			'role_id'  => $this->request->getPost('role'),
                     			'email'  => $this->request->getPost('email'),
                     			'phone'  => $this->request->getPost('phone'),
                     			$form_data['password_hash'] = md5($this->request->getPost('password'))  			
                 		    ];

 		        $data['success']="<div class='alert alert-success''role='alert'>
	                            User added Successfully!
	                        </div>'";
                if($this->request->getPost('eid') > 0) {
      			$form_data['id'] = $this->request->getPost('eid');
      			if($this->request->getPost('password')!="")
                  	$form_data['password_hash'] = md5($this->request->getPost('password'));	
                if($this->request->getPost('email')!= $data['package']['email']){
                    $exists = $user->check_email_exists($this->request->getPost('email'));
                    if($exists==0)
                  	$form_data['email'] = $this->request->getPost('email');
                }
     			$data['success']="<div class='alert alert-success''role='alert'>
                            	  User Updated Successfully!
                            	 </div>'";
	
      
     		    }
                 if (! $user->save($form_data)) {
         			return redirect()->back()->withInput()->with('errors', $user->errors());
                }
        
        }
        if($eid>0)
  		{
  			$data['package']=$user->where('id',$eid)->first();
  		}
		return view($this->config->views['usersdata_create'], $data);
		
	}
	public function ajax()
	{

	   $id = $this->request->getPost('id');
	   $action = $this->request->getPost('action');
	   $status = $this->request->getPost('status');
	   $method = $this->request->getPost('method');
	   if($method == 'user') {
		$action_method = new UserModel();
	   } else if($method == 'vehicle') {
		$action_method = new VehicleModel();
	   } else if($method == 'sight') {
		$action_method = new SightModel();
	   } else if($method == 'route') {
		$action_method = new BookingModel();
	   } else if($method == 'rate') {
		$action_method = new RateModel();
	   } else if($method == 'agent') {
		$action_method = new AgentModel();
	   } 
	   if($action == 'status') {
		if($status==1) $change = 0; else $change = 1;
		if($status==1) 
		    echo 'cil-x-circle';
         else 
            echo 'cil-check-circle';
        $data_update = ['status' => $change];
    		
                    $action_method->update($id, $data_update);
    	} else if($action == 'del') {
    		
    		$action_method->delete($id);
    	}
    }

    //--------------------------------------------------------------------

	/**
	 * Updates regular account settings.
	 */
	public function updateAccount()
	{
		// update user, validation happens in model
		$users = new UserModel();
		$getRule = $users->getRule('updateAccount');
		$users->setValidationRules($getRule);
		$user = [
			'id'  	=> $this->session->get('userData.id'),
			'name' 	=> $this->request->getPost('name')
		];

		if (! $users->save($user)) {
			return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // update session data
        $this->session->push('userData', $user);

        return redirect()->to('account')->with('success', lang('Auth.updateSuccess'));
	}

    //--------------------------------------------------------------------

	/**
	 * Handles email address change.
	 */
	public function changeEmail()
	{
		helper('text');

		// check password
		$users = new UserModel();
		$user = $users->find($this->session->get('userData.id'));
		if (
			empty($this->request->getPost('password')) ||
			! password_verify($this->request->getPost('password'), $user['password_hash'])
		) {
			return redirect()->to('account')->withInput()->with('error', lang('Auth.wrongCredentials'));
		}

		// update user with temporary new email, validation happens in model
		$getRule = $users->getRule('changeEmail');
		$users->setValidationRules($getRule);
		$updatedUser = [
			'id'			=> $this->session->get('userData.id'),
			'new_email'		=> $this->request->getPost('new_email'),
			'activate_hash'	=> random_string('alnum', 32)
		];
		if (! $users->save($updatedUser)) {
			return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // update session data
        $this->session->push('userData', ['new_email' => $updatedUser['new_email']]);

		// send confirmation email to new address
		helper('auth');
        send_confirmation_email($updatedUser['new_email'], $updatedUser['activate_hash']);

		// send notification email to old address
        send_notification_email($user['email']);

        return redirect()->to('account')->with('success', lang('Auth.emailUpdateStarted'));
	}

    //--------------------------------------------------------------------

	/**
	 * Verifies and sets new e-mail address.
	 */
	public function confirmNewEmail()
	{
		$users = new UserModel();

		// check token and if new email is set
		$user = $users->where('activate_hash', $this->request->getGet('token'))
			->where('new_email !=', null)
			->first();

		if (! $user) {
			return redirect()->to('account')->with('error', lang('Auth.activationNoUser'));
		}

		// set new email as current
		$updatedUser['id'] = $user['id'];
		$updatedUser['email'] = $user['new_email'];
		$updatedUser['new_email'] = null;
		$updatedUser['activate_hash'] = null;
		$users->save($updatedUser);

		// update session data, if user is logged in
		if ($this->session->isLoggedIn) {
			$this->session->push('userData', [
				'email'		=> $updatedUser['email'],
            	'new_email'	=> null
        	]);

        	return redirect()->to('account')->with('success', lang('Auth.confirmEmailSuccess'));
		}

		return redirect()->to('login')->with('success', lang('Auth.confirmEmailSuccess'));
	}

    //--------------------------------------------------------------------

	/**
	 * Handles password change.
	 */
	public function changePassword()
	{
		// validate request
		$rules = [
			'password' 	=> 'required|min_length[8]',
			'new_password' => 'required|min_length[8]',
			'new_password_confirm' => 'required|matches[new_password]'
		];

		if (! $this->validate($rules)) {
			return redirect()->to('account')->withInput()
				->with('errors', $this->validator->getErrors());
		}

		// check current password
		$users = new UserModel();
		$user = $users->find($this->session->get('userData.id'));

		if (
			! $user ||
			! password_verify($this->request->getPost('password'), $user['password_hash'])
		) {
			return redirect()->to('account')->withInput()->with('error', lang('Auth.wrongCredentials'));
		}

		// update user's password
		$updatedUser['id'] = $this->session->get('userData.id');
		$updatedUser['password'] = $this->request->getPost('new_password');
		$users->save($updatedUser);

		// redirect to account with success message
		return redirect()->to('account')->with('success', lang('Auth.passwordUpdateSuccess'));
	}

    //--------------------------------------------------------------------

	/**
	 * Deletes user account.
	 */
	public function deleteAccount()
	{
		// check current password
		$users = new UserModel();
		$user = $users->find($this->session->get('userData.id'));

		if (
			! $user ||
			! password_verify($this->request->getPost('password'), $user['password_hash'])
		) {
			return redirect()->back()->withInput()->with('error', lang('Auth.wrongCredentials'));
		}

		// delete account from DB
		$users->delete($this->session->get('userData.id'));

		// log out user
		$this->session->remove(['isLoggedIn', 'userData']);

		// redirect to register with success message
		return redirect()->to('register')->with('success', lang('Auth.accountDeleted'));
	}

}
