<?php
namespace Auth\Controllers;

use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use Auth\Models\UserModel;
use Auth\Models\ModuleModel;
use Auth\Models\ModuleLinksModel;
use Auth\Models\CompanyModel;
use Hrms\Models\EmployeeModel;
use Hrms\Models\PermissionModel;

class LoginController extends Controller
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
	 * Displays login form or redirects if user is already logged in.
	 */
	public function login()
	{
    
	    if ($this->session->isLoggedIn) {
			return redirect()->to('dashboard');
		}
		return view($this->config->views['login'], ['config' => $this->config]);
	}

    //--------------------------------------------------------------------

	/**
	 * Attempts to verify user's credentials through POST request.
	 */
	public function attemptLogin()
	{
		// validate request
		$rules = [
			'email'		=> 'required|valid_email',
			'password' 	=> 'required|min_length[8]',
		];

		if (! $this->validate($rules)) {
			return redirect()->to('login')
				->withInput()
				->with('errors', $this->validator->getErrors());
		}

		// check credentials
		$users = new UserModel();
		$user = $users->where('email', $this->request->getPost('email'))->first();
		if (
			is_null($user) ||
			! password_verify($this->request->getPost('password'), $user['password_hash'])
		) {
			return redirect()->to('admin/login')->withInput()->with('error', lang('Auth.wrongCredentials'));
		}

		// check activation
		if (!$user['active']) {
			return redirect()->to('admin/login')->withInput()->with('error', lang('Auth.notActivated'));
		}

		// login OK, save user data to session
		$multiClause = array('user_id' => $user['id'], 'status' => 1 );
		

		$this->session->set('isLoggedIn', true);
		$this->session->set('userData', [
		    'id' 			=> $user['id'],
		    'name' 			=> $user['first_name'].'&nbsp;'.$user['last_name'],
		    'email' 		=> $user['email'],
		]);

        return redirect()->to('dashboard');
	}

    //--------------------------------------------------------------------

	/**
	 * Log the user out.
	 */
	public function logout()
	{
		$this->session->remove(['isLoggedIn', 'userData']);
        $this->session->set('userData', array());
		return redirect()->to('login');
	}

}
