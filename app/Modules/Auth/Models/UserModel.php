<?php namespace Auth\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table      = 'users';
	protected $primaryKey = 'id';

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
	    'branch_id',
	    'employee_id',
	    'username',
	    'password',
	    'reset_expires',
	    'reset_hash',
	    'activate_hash',
	    'password_hash',
	    'email',
	    'phone',
	    'first_name',
	    'last_name',
	    'company_id',
	    'token',
	    'designation',
	    'user_group_id',
	    'level',
	    'auth_code',
	    'signature',
	    'is_lead_owner',
	    'subledger_added',
	    'password_reset',
	    'salary_view_by_grade',
	    'created_by',
	    'created_at',
	    'updated_by',
	    'updated_at',
	    'active' 	
	];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $dateFormat  	 = 'int';

	protected $validationRules = [];

	// we need different rules for registration, account update, etc
	protected $dynamicRules = [
		'create' => [
			'first_name' 				=> 'required|min_length[3]',
			'last_name' 				=> 'required',
			'username' 				=> 'required',
			'phone' 				=> 'required',
			'email' 			=> 'required|valid_email|is_unique[users.email]',
			 'password'			=> 'required|min_length[8]',
		],
		'update' => [
		    'id'	=> 'required|is_natural_no_zero',
		    'first_name' 				=> 'required|min_length[3]',
		    'last_name' 				=> 'required',
		    'username' 				=> 'required',
		    'phone' 				=> 'required',
		],
		'changeEmail' => [
			'id'			=> 'required|is_natural_no_zero',
			'new_email'		=> 'required|valid_email|is_unique[users.email]',
			'activate_hash'	=> 'required'
		]
	];

	protected $validationMessages = [];

	protected $skipValidation = false;

	// this runs after field validation
	protected $beforeInsert = ['hashPassword'];
	protected $beforeUpdate = ['hashPassword'];


    //--------------------------------------------------------------------

    /**
     * Retrieves validation rule
     */
	public function getRule(string $rule)
	{
		return $this->dynamicRules[$rule];
	}
	
	public function check_email_exists(string $email)
	{
        $sql = "SELECT email FROM users WHERE email = '.$email.'";
        $query = $this->db->query($sql);
        $result = $query->getResult();
        if(empty($result)) return 0; else return 1;

	}

    //--------------------------------------------------------------------

    /**
     * Hashes the password after field validation and before insert/update
     */
	protected function hashPassword(array $data)
	{

	    if (! isset($data['data']['password'])) return $data;

		$data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		unset($data['data']['password']);
		unset($data['data']['password_confirm']);

		return $data;
	}

}
