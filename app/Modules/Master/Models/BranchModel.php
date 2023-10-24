<?php namespace Master\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{
	protected $table      = 'branch';
	protected $primaryKey = 'id';

	protected $returnType = 'object';
	protected $useSoftDeletes = false;

	protected $allowedFields = [
	    'name',
	    'location',
	    'branch_code',
	    'contact_number_1',
	    'contact_number_2',
	    'mobile_number',
	    'fax',
	    'email',
	    'currency_id',
	    'skype_id',
	    'facbook_link',
	    'twitter_link',
	    'linkedin',
	    'instagram',
	    'bill_address1',
	    'bill_address2',
	    'bill_city',
	    'bill_state',
	    'bill_country',
	    'bill_postal_code',
	    'shipp_address1',
	    'shipp_address2',
	    'shipp_city',
	    'shipp_state',
	    'shipp_country',
	    'shipp_postal_code',
	    'branch_head_id',
	    'branch_head_designation',
	    'branch_head_email',
	    'branch_head_phno',
	    'active'
	];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $dateFormat  	 = 'int';

	protected $validationRules = [];

	protected $dynamicRules = [
		'create' => [
			'branch_code' 		=> 'required|min_length[3]',
			'name' 				=> 'required',
		],
		'update' => [
		    'branch_code' 		=> 'required|min_length[3]',
		    'name' 				=> 'required',
		],
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
	
	public function check_exists(string $branch_code)
	{
        $sql = "SELECT branch_code FROM branch WHERE branch_code = '.$branch_code.'";
        $query = $this->db->query($sql);
        $result = $query->getResult();
        if(empty($result)) return 0; else return 1;

	}

}
