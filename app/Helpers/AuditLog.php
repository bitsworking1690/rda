<?php
use App\Models\Site\UserRoles;
use App\Models\Site\RolePermissions;
use App\Models\Site\User;
function saveLog($module,$action,$record_id,$before_data='',$after_data='',$user_id=''){
    return true;
	/*AuditLog::create([
		'module'=>$module,
		'action'=>$action,
		'record_id'=>$record_id,
		'before_data'=>$before_data,
		'after_data'=>$after_data,
		'user_id'=>$user_id
	]);*/
}


function getFileType($file='',$directory=''){
	if($file==""){
		$request=Request::all();
		dd($request);
	}
	$return_string='';
	$ext = pathinfo('public/assets/fms/'.$directory.'/'.$file, PATHINFO_EXTENSION);
	if($ext=="jpg" || $ext=="jpeg" || $ext=="png"){
		$image_url='public/assets/fms/'.$directory.'/'.$file;
		$return_string="<a href='$image_url' class='group1'>
			<img src='$image_url' width='50' />
		</a>";
	}
	if($ext=="pdf"){
        $file_url='public/assets/fms/'.$directory.'/'.$file;
		$return_string="<a target='_blank' href='$file_url'><i class='fa fa-file-pdf-o fa-3x'></i></a>";
	}
	if($ext=="doc" || $ext=="docx"){
		$return_string="<i class='fa fa-file-word-o fa-3x'></i>";	
	}
	if($ext=="xls" || $ext=="xlsx"){
		$return_string="<i class='fa fa-file-excel-o fa-3x'></i>";
	}
	return $return_string;
}

function hasPrivilege($action='', $permission=''){
	$user_id=Session::get('user_info.id');
	$current_user=User::where(['id'=>$user_id])->with('getUserRole')->first(); //by irfan javed
    //$current_user=User::where(['id'=>$user_id])->with('getUserRoleWithPermissions')->first();

    //dd($current_user->getUserRoleWithPermissions->permissions);
    //$assigned_permissions=getPermissions($current_user->getUserRoleWithPermissions->permissions);  //by Zeeshan Zahid


	$user_role_id=$current_user->getUserRole->role_id;  //by irfan javed
	// if($user_role_id==1){
	// 	return true;
	// }else{
		$all_permissions=RolePermissions::where('role_id',$user_role_id)->with('category')->get();  //by irfan javed

		$assigned_permissions=getPermissions($all_permissions);  //by irfan javed

 //dd($assigned_permissions);
		if(isset($assigned_permissions[$action]) && $assigned_permissions[$action][$permission]==1){
			return true;
		}else{
			return false;
		}
	// }
}

function getPermissions($permissions){
	$permissionsArr=array();
	foreach($permissions as $key=>$val){
		if(isset($val->category->short_code)){
			$permissionsArr[$val->category->short_code]=$val;	
		}
		
	}
	return ($permissionsArr);
}

function getRelationalAttributes($module){
	$attributes=$module();
	return $attributes;
}

function VEHICLES(){
	$relation_attributes=array(
		'OfficerDesignations|name'=>'officer_id',
		'Vendors|name'=>'vendor_id',
		'Make|name'=>'make_id',
		'Models|name'=>'model_id',
		'VehicleTypes|type'=>'vehicle_type_id'
	);
	return $relation_attributes;
}

function VEHICLE_TYPES(){
	return array();
}

function MAINTENANCE(){
    $relational_attributes=array(
        'Vendors|name'=>'vendor_id',
        'Vehicles|reg_no'=>'vehicle_id',
        'MaintenanceTypes|type'=>'maintenance_type_id'
    );
    return $relational_attributes;
}

function DRIVERS(){
	$relation_attributes=array(
		'Projects|name'=>'project_id',
	);
	return $relation_attributes;
}


function convert_number_to_words_ENG($number) {
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words_ENG(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words_ENG($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words_ENG($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words_ENG($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return ucwords($string);
}
?>