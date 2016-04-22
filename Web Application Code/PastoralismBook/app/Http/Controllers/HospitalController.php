<?php namespace App\Http\Controllers;
use Auth;
use Input;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserProfileModel;
use App\TestModel;
use App\DoctorModel;
use App\PatientModel;
use App\DailyIncomeStatementModel;
use App\DueModel;
use App\User;
use App\machine;
use Hash;
use Session;

use Illuminate\Http\Request;

class HospitalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
/*
	public function __construct()
	{
		if(Auth::check())
		{

		}
	}
*/

	public function __construct()
	{
		if(Auth::check())
		{
			//Auth::user()->name and Auth::user()->email
			$userName=Auth::user()->name;
			$userMail=Auth::user()->email;
			Session::put('name',$userName);
			Session::put('email',$userMail);
			$data=DB::select("SELECT * FROM `users` WHERE email='".Auth::user()->email."' and name='".Auth::user()->name."'");
			foreach($data as $d)
			{
				Session::put('id',$d->id);
				Session::put('admin',$d->admin);
				Session::put('designation',$d->Designation);
				Session::put('pic',$d->pic);
			}
		}
		else
		{
			return redirect('/auth/login');
		}
	}
    
    public function getMachineData()
    {
        date_default_timezone_set('asia/dhaka');
        $date=date('Y-m-d');
        $time=date('h:i:s a');
        $temparature=Input::get('t');
        $humidity=Input::get('h');
        $rain=Input::get('r');
        $windSpeed=Input::get('ws');
        $barometricPresser=Input::get('bp');
        $windDirection=Input::get('wd');
        /*
        echo $date.'<br />';
        echo $time.'<br />';
        echo $temparature.'<br />';
        echo $humidity.'<br />';
        echo $rain.'<br />';
        echo $windSpeed.'<br />';
        echo $barometricPresser.'<br />';
        echo $windDirection; */
        $data=[
        'date'=>$date,
        'time'=>$time,
        'temperature'=>$temparature,
        'humidity'=>$humidity,
        'rain'=>$rain,
        'wind_speed'=>$windSpeed,
        'barometric_presser'=>$barometricPresser,
        'wind_direction'=>$windDirection
        ];
        $read=machine::create($data);
        if($read)
        {
            echo 'Success !';
        }
        else
        {
            echo 'Failed !';
        }
    }
    
    public function showMachineTestData()
    {
        $data=machine::all();
        return view('hospital.showMachineTest',compact('data'));
    }
    
    public function showMachineJsonData()
    {
        $data=machine::all()->max();
        //$mxId=DB::select('select max(id) from machines');
       // $data=machine::find($mxId);
        //return view('hospital.showMachineTest',compact('data'));
        //$data=select('');
        $newData['result']=$data;
        return json_encode($newData);
    }
    
    public function showMachineDataAngular()
    {
        return view('hospital.showMachineDataAngular');
    }

	function convert_number_to_words($number) {

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
        return $negative . convert_number_to_words(abs($number));
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
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
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

    return $string;
}

	public function index()
	{
		if(Auth::check())
		{
			return view('hospital.index');
		}
		else
		{
			return redirect('/auth/login');
		}
	}
    
    public function blog()
    {
        if(Auth::check())
        {
            return view('hospital.pb_blog');
        }
        else
        {
            return redirect('/auth/login');
        }
    }
    
    public function article()
    {
        if(Auth::check())
        {
            return view('hospital.pb_article');
        }
        else
        {
            return redirect('/auth/login');
        }
    }
    
    

	public function GetAllPatient()
	{
		if(Auth::check())
		{
			$data=PatientModel::all();
			return view('hospital.allPatient',compact('data'));
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function postClearingReport()
	{
		if(Auth::check())
		{
			$patient_id=Input::get('patient_id');
			$sql="select * from patient_models where patient_id=?";
			$data=DB::select($sql,array($patient_id));
			foreach($data as $d)
			{
				if(($d->due)>0)
				{
					return view('hospital.payDueFirst',compact('data','patient_id'));
				}
				else
				{
					echo 'Print Test Report via PATIENT ID !';
				}
			}
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function clearingReportDue()
	{
		if(Auth::check())
		{
			$patient_id=Input::get('patient_id');
			$total_balance_amount=Input::get('total_balance_amount');
			$oldDue=Input::get('oldDue');
			$paid=Input::get('paid');
			$due=Input::get('due');
			if($due<1)
			{
				$delSql="DELETE FROM due_models WHERE patient_id = ?";
				$delSql2=DB::select($delSql,array($patient_id));

				
				$findD=DB::select("select date,total_balance_amount,total_price,total_discount_money,paid from patient_models where patient_id=?",array($patient_id));
				foreach($findD as $fd)
				{
					$date_new=$fd->date;
					$total_balance_amount_new=$fd->total_balance_amount;
					$total_price_new=$fd->total_price;
					$total_discount_money_new=$fd->total_discount_money;
					$paid_old=$fd->paid;
				}
				$paid_new=$paid_old+$paid;

				$dailyIncome=
				[
					'patient_id'=>$patient_id,
					'date'=>$date_new,
					'total_amount'=>$total_price_new,
					'discount_amount'=>$total_discount_money_new,
					'balance_amount'=>$total_balance_amount_new,
					'advance_paid'=>$paid_old,
					'due'=>'0',
					'due_collection'=>$paid,
					'total_paid'=>$paid
				];
				
				$dailyIncomeStm=DailyIncomeStatementModel::create($dailyIncome);

				$updPtnTbl="update patient_models set due=?, paid=?,due_collection=? where patient_id=?";
				$updPtnTbl2=DB::select($updPtnTbl,array(0,$total_balance_amount_new,$paid,$patient_id));

				if($updPtnTbl2)
				{
					echo 'Update patient_models Table<br />';
				}
				else
				{
					echo 'Unable to Update patient_models Table<br />';
				}

				if($dailyIncomeStm)
				{
					echo 'Insert DailyIncomeStatement Success <br />';
				}
				else
				{
					echo 'Failed DailyIncomeStatement !  <br /> ';
				}

				if($delSql2)
				{
					echo 'Deleted Due Statement <br />';
				}
				else
				{
					echo 'Failed to Delete Due Statement <br />';
				}


				// Delete patient id from due_models table
				//Update patient_models and daily_income_statement
			}
			else
			{
				//Update patient_models,due_models,daily_income_statements table
			}
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function getClearingReport()
	{
		if(Auth::check())
		{
			return view('hospital.clearingReport');
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function getProfile()
	{
		if(Auth::check())
		{
			$id=Input::get('id');
			$d=User::find($id);
			return view('hospital.profileSingle',compact('d'));
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function patientDetail()
	{
		if(Auth::check())
		{
			$patient_id=Input::get('patient_id');
			$data=DB::select("select * from patient_models where patient_id='".$patient_id."'");
			return view('hospital.patientDetail',compact('data'));
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function referenceList()
	{
		if(Auth::check())
		{
			$name_of_doctor=Input::get('name_of_doctor');
			$data=DB::select("select * from patient_models where reference_doctor='".$name_of_doctor."'");
			return view('hospital.referenceList',compact('data','name_of_doctor'));
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function getContactList()
	{
		if(Auth::check())
		{
			$data=User::all();
			return view('hospital.contactList',compact('data'));
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function getProfileAdd()
	{
		if(Auth::check())
		{
			/*$user=DB::table('')->where('name',Auth::user()->name)->first();
			foreach($user as $u)
			{
				echo $u->name;
			}*/
			return view('hospital.profileAdd');
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function postProfileAdd()
	{
		if(Auth::check())
		{
			
			$pic1=$_FILES['file']['name'];
            $tmp_name=$_FILES['file']['tmp_name'];
            $pic=date('YmdHis')."_".mt_rand(0,10000)."_".rand(99,999).".jpg";
            $password=Hash::make(Input::get('password'));
            $personal_id='SC'.(DB::table('user_profile_models')->max('id'))+1;
            
			$data=[
				'name'=>Input::get('name'),
			 	'email'=>Input::get('email'),
			 	'password'=>$password,
			 	'about'=>Input::get('about'),
			 	'company'=>Input::get('job_company_name'),
			 	'Designation'=>Input::get('job_designation'),
			 	'gender'=>Input::get('gender'),
			 	'contact_no'=>Input::get('contact_no'),
			 	'address'=>Input::get('address'),
			 	'date_of_birth'=>Input::get('date_of_birth'),
			 	'pic'=>$pic,
			 	'admin'=>Input::get('admin')
			];


			$x=User::create($data);
			if($x)
			{
				move_uploaded_file($tmp_name,'profile/'.$pic);
				$success=1;
                return view('hospital.msg',compact('success'));
			}
			else
			{
				$failed=1;
                return view('hospital.msg',compact('failed'));
			}
			
		}
		else
		{
			return redirect('/auth/login');
		}
	}


	public function getProfileDetail()
	{
		if(Auth::check())
		{
			return view('hospital.profileDetail',compact('data'));
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function getAddTest()
	{
		if(Auth::check())
		{
			return view('hospital.AddTest');
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function postAddTest()
	{
		if(Auth::check())
		{
			$data=[
				'test_id'=>Input::get('test_id'),
				'test_cat'=>Input::get('test_catagory'),
				'description'=>Input::get('test_description'),
				'test_code'=>Input::get('test_code'),
				'test_rate'=>Input::get('test_rate')
			];
			$input=TestModel::create($data);
			if($input)
			{
				$success=1;
                return view('hospital.msg',compact('success'));
			}
			else
			{
				$failed=1;
                return view('hospital.msg',compact('failed'));
			}
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function getAllTest()
	{
		if(Auth::check())
		{
			$data=TestModel::all();
			return view('hospital.allTest',compact('data'));
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function postEditTest()
	{
		if(Auth::check())
		{
			$sql="UPDATE `test_models` SET `test_cat` = ?, `description` = ?, `test_code` = ?, `test_rate` = ? WHERE `test_id` = ?";
			$data=DB::select($sql,array(Input::get('test_catagory'),Input::get('test_description'),Input::get('test_code'),Input::get('test_rate'),Input::get('test_id')));
			if($data)
			{
				$data=TestModel::all();
				$success=1;
				return view('hospital.allTest',compact('data','success'));
			}
			else
			{
				$data=TestModel::all();
				$success=1;
				return view('hospital.allTest',compact('data','success'));
			}
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function DelTest()
	{
		if(Auth::check())
		{
			$sql="DELETE FROM `test_models` WHERE `test_id` = ?";
			$data=DB::select($sql,array(Input::get('test_id')));
			if($data)
			{
				$data=TestModel::all();
				$success=1;
				return view('hospital.allTest',compact('data','success'));
			}
			else
			{
				$data=TestModel::all();
				$success=1;
				return view('hospital.allTest',compact('data','success'));
			}
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function getAddDoctor()
	{
		if(Auth::check())
		{
			return view('hospital.addDoctor');
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function postAddDoctor()
	{
		if(Auth::check())
		{
			$receive=[
			'name_of_doctor'=>Input::get('name_of_doctor'),
			'designation_of_doctor'=>Input::get('designation_of_doctor'),
			'specialist'=>Input::get('specialist'),
			'contact_no'=>Input::get('contact_no')
			];
			$data=DoctorModel::create($receive);
			if($data)
			{
				$success=1;
	                return view('hospital.msg',compact('success'));
			}
			else
			{
				$failed=1;
	            return view('hospital.msg',compact('failed'));
			}
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function getAllDoctor()
	{
		if(Auth::check())
		{
			$data=DoctorModel::all();
			return view('hospital.allDoctor',compact('data'));
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function postAllDoctor()
	{
		if(Auth::check())
		{
			$DoctorModel=DoctorModel::find(Input::get('id'));
			$DoctorModel->name_of_doctor=Input::get('name_of_doctor');
			$DoctorModel->designation_of_doctor=Input::get('designation_of_doctor');
			$DoctorModel->specialist=Input::get('specialist');
			$DoctorModel->contact_no=Input::get('contact_no');
			$x=$DoctorModel->save();
			if($x)
			{
				$data=DoctorModel::all();
				$success=1;
				return view('hospital.allDoctor',compact('data','success'));
			}
			else
			{
				$data=DoctorModel::all();
				$success=1;
				return view('hospital.allDoctor',compact('data','success'));
			}
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function DelDoctor()
	{
		if(Auth::check())
		{
			$sql="DELETE FROM `doctor_models` WHERE `id` = ?";
			$data=DB::select($sql,array(Input::get('id')));
			if($data)
			{
				$data=DoctorModel::all();
				$success=1;
				return view('hospital.allDoctor',compact('data','success'));
			}
			else
			{
				$data=DoctorModel::all();
				$success=1;
				return view('hospital.allDoctor',compact('data','success'));
			}
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function getAddPatient()
	{
		if(Auth::check())
		{
			$doctor=DoctorModel::all();
			$tests=TestModel::all();
			$tid = (DB::table('patient_models')->max('tid'))+1;
			return view('hospital.addPatient',compact('doctor','tests','tid'));
		}
		else
		{
			return redirect('/auth/login');
		}
	}

	public function dailyIncomeStatement()
	{
		if(Auth::check())
		{
			$data=DailyIncomeStatementModel::all();
			return view('hospital.dailyIncomeStatement',compact('data'));
		}
	}

	public function dailyDueStatement()
	{
		$data=DueModel::all();
		return view('hospital.dailyDueStatement',compact('data'));
	}

	public function PostAddPatient()
	{
		$patient_id=Input::get('patient_id');
		$patient_name=Input::get('patient_name');
		$patient_contact=Input::get('patient_contact');
		$age=Input::get('age');
		$date=Input::get('date');
		$time=Input::get('time');
		$gender=Input::get('gender');
		$address=Input::get('address');
		$tid=Input::get('tid');
		$reference_doctor=Input::get('reference_doctor');


		$test1=Input::get('test_1');
		if($test1!='')
		{
			$discount1=Input::get('discount_1');
			$test1_prince=Controller::TestPriceFind($test1);
			$discount1_amont=ceil(Controller::TestPriceDiscountAmount($test1_prince,$discount1));
			$bal_amount_1=ceil(Controller::TestBalanceAfterDiscount($test1_prince,$discount1));
		}
		else
		{
			$discount1=0;
			$test1_prince=0;
			$discount1_amont=0;
			$bal_amount_1=0;
		}

		$test2=Input::get('test_2');
		if($test2!='')
		{
			$discount2=Input::get('discount_2');
			$test2_prince=Controller::TestPriceFind($test2);
			$discount2_amont=ceil(Controller::TestPriceDiscountAmount($test2_prince,$discount2));
			$bal_amount_2=ceil(Controller::TestBalanceAfterDiscount($test2_prince,$discount2));
		}
		else
		{
			$discount2=0;
			$test2_prince=0;
			$discount2_amont=0;
			$bal_amount_2=0;
		}

		$test3=Input::get('test_3');
		if($test3!='')
		{
			$discount3=Input::get('discount_3');
			$test3_prince=Controller::TestPriceFind($test3);
			$discount3_amont=ceil(Controller::TestPriceDiscountAmount($test3_prince,$discount3));
			$bal_amount_3=ceil(Controller::TestBalanceAfterDiscount($test3_prince,$discount3));
		}
		else
		{
			$discount3=0;
			$test3_prince=0;
			$discount3_amont=0;
			$bal_amount_3=0;
		}
		
		$test4=Input::get('test_4');
		if($test4!='')
		{
			$discount4=Input::get('discount_4');
			$test4_prince=Controller::TestPriceFind($test4);
			$discount4_amont=ceil(Controller::TestPriceDiscountAmount($test4_prince,$discount4));
			$bal_amount_4=ceil(Controller::TestBalanceAfterDiscount($test4_prince,$discount4));
		}
		else
		{
			$discount4=0;
			$test4_prince=0;
			$discount4_amont=0;
			$bal_amount_4=0;
		}

		$test5=Input::get('test_5');
		if($test5!='')
		{
			$discount5=Input::get('discount_5');
			$test5_prince=Controller::TestPriceFind($test5);
			$discount5_amont=ceil(Controller::TestPriceDiscountAmount($test5_prince,$discount5));
			$bal_amount_5=ceil(Controller::TestBalanceAfterDiscount($test5_prince,$discount5));

		}	
		else
		{
			$discount5=0;
			$test5_prince=0;
			$discount5_amont=0;
			$bal_amount_5=0;
		}	

		$test6=Input::get('test_6');
		if($test6!='')
		{
			$discount6=Input::get('discount_6');
			$test6_prince=Controller::TestPriceFind($test6);
			$discount6_amont=ceil(Controller::TestPriceDiscountAmount($test6_prince,$discount6));
			$bal_amount_6=ceil(Controller::TestBalanceAfterDiscount($test6_prince,$discount6));
		}
		else
		{
			$discount6=0;
			$test6_prince=0;
			$discount6_amont=0;
			$bal_amount_6=0;
		}

		$test7=Input::get('test_7');
		if($test7!='')
		{
			$discount7=Input::get('discount_7');
			$test7_prince=Controller::TestPriceFind($test7);
			$discount7_amont=ceil(Controller::TestPriceDiscountAmount($test7_prince,$discount7));
			$bal_amount_7=ceil(Controller::TestBalanceAfterDiscount($test7_prince,$discount7));
		}
		else
		{
			$discount7=0;
			$test7_prince=0;
			$discount7_amont=0;
			$bal_amount_7=0;
		}

		$test8=Input::get('test_8');
		if($test8!='')
		{
			$discount8=Input::get('discount_8');
			$test8_prince=Controller::TestPriceFind($test8);
			$discount8_amont=ceil(Controller::TestPriceDiscountAmount($test8_prince,$discount8));
			$bal_amount_8=ceil(Controller::TestBalanceAfterDiscount($test8_prince,$discount8));
		}
		else
		{
			$discount8=0;
			$test8_prince=0;
			$discount8_amont=0;
			$bal_amount_8=0;
		}

		$test9=Input::get('test_9');
		if($test9!='')
		{
			$discount9=Input::get('discount_9');
			$test9_prince=Controller::TestPriceFind($test9);
			$discount9_amont=ceil(Controller::TestPriceDiscountAmount($test9_prince,$discount9));
			$bal_amount_9=ceil(Controller::TestBalanceAfterDiscount($test9_prince,$discount9));
		}
		else
		{
			$discount9=0;
			$test9_prince=0;
			$discount9_amont=0;
			$bal_amount_9=0;
		}

		$test10=Input::get('test_10');
		if($test10!='')
		{
			$discount10=Input::get('discount_10');
			$test10_prince=Controller::TestPriceFind($test10);
			$discount10_amont=ceil(Controller::TestPriceDiscountAmount($test10_prince,$discount10));
			$bal_amount_10=ceil(Controller::TestBalanceAfterDiscount($test10_prince,$discount10));
		}
		else
		{
			$discount10=0;
			$test10_prince=0;
			$discount10_amont=0;
			$bal_amount_10=0;
		}

		$test11=Input::get('test_11');
		if($test11!='')
		{
			$discount11=Input::get('discount_11');
			$test11_prince=Controller::TestPriceFind($test11);
			$discount11_amont=ceil(Controller::TestPriceDiscountAmount($test11_prince,$discount11));
			$bal_amount_11=ceil(Controller::TestBalanceAfterDiscount($test11_prince,$discount11));
		}
		else
		{
			$discount11=0;
			$test11_prince=0;
			$discount11_amont=0;
			$bal_amount_11=0;
		}

		$test12=Input::get('test_12');
		if($test12!='')
		{
			$discount12=Input::get('discount_12');
			$test12_prince=Controller::TestPriceFind($test12);
			$discount12_amont=ceil(Controller::TestPriceDiscountAmount($test12_prince,$discount12));
			$bal_amount_12=ceil(Controller::TestBalanceAfterDiscount($test12_prince,$discount12));	
		}
		else
		{
			$discount12=0;
			$test12_prince=0;
			$discount12_amont=0;
			$bal_amount_12=0;
		}
		
		$test13=Input::get('test_13');
		if($test13!='')
		{
			$discount13=Input::get('discount_13');
			$test13_prince=Controller::TestPriceFind($test13);
			$discount13_amont=ceil(Controller::TestPriceDiscountAmount($test13_prince,$discount13));
			$bal_amount_13=ceil(Controller::TestBalanceAfterDiscount($test13_prince,$discount13));
		}
		else
		{
			$discount13=0;
			$test13_prince=0;
			$discount13_amont=0;
			$bal_amount_13=0;
		}

		$test14=Input::get('test_14');
		if($test14!='')
		{
			$discount14=Input::get('discount_14');
			$test14_prince=Controller::TestPriceFind($test14);
			$discount14_amont=ceil(Controller::TestPriceDiscountAmount($test14_prince,$discount14));
			$bal_amount_14=ceil(Controller::TestBalanceAfterDiscount($test14_prince,$discount14));
		}
		else
		{
			$discount14=0;
			$test14_prince=0;
			$discount14_amont=0;
			$bal_amount_14=0;
		}

		$test15=Input::get('test_15');
		if($test15!='')
		{
			$discount15=Input::get('discount_15');
			$test15_prince=Controller::TestPriceFind($test15);
			$discount15_amont=ceil(Controller::TestPriceDiscountAmount($test15_prince,$discount15));
			$bal_amount_15=ceil(Controller::TestBalanceAfterDiscount($test15_prince,$discount15));
		}
		else
		{
			$discount15=0;
			$test15_prince=0;
			$discount15_amont=0;
			$bal_amount_15=0;
		}

		$test16=Input::get('test_16');
		if($test16!='')
		{
			$discount16=Input::get('discount_16');
			$test16_prince=Controller::TestPriceFind($test16);
			$discount16_amont=ceil(Controller::TestPriceDiscountAmount($test16_prince,$discount16));
			$bal_amount_16=ceil(Controller::TestBalanceAfterDiscount($test16_prince,$discount16));
		}
		else
		{
			$discount16=0;
			$test16_prince=0;
			$discount16_amont=0;
			$bal_amount_16=0;
		}

		$test17=Input::get('test_17');
		if($test17!='')
		{
			$discount17=Input::get('discount_17');
			$test17_prince=Controller::TestPriceFind($test17);
			$discount17_amont=ceil(Controller::TestPriceDiscountAmount($test17_prince,$discount17));
			$bal_amount_17=ceil(Controller::TestBalanceAfterDiscount($test17_prince,$discount17));
		}
		else
		{
			$discount17=0;
			$test17_prince=0;
			$discount17_amont=0;
			$bal_amount_17=0;
		}

		$test18=Input::get('test_18');
		if($test18!='')
		{
			$discount18=Input::get('discount_18');
			$test18_prince=Controller::TestPriceFind($test18);
			$discount18_amont=ceil(Controller::TestPriceDiscountAmount($test18_prince,$discount18));
			$bal_amount_18=ceil(Controller::TestBalanceAfterDiscount($test18_prince,$discount18));
		}
		else
		{
			$discount18=0;
			$test18_prince=0;
			$discount18_amont=0;
			$bal_amount_18=0;
		}

		$test19=Input::get('test_19');
		if($test19!='')
		{
			$discount19=Input::get('discount_19');
			$test19_prince=Controller::TestPriceFind($test19);
			$discount19_amont=ceil(Controller::TestPriceDiscountAmount($test19_prince,$discount19));
			$bal_amount_19=ceil(Controller::TestBalanceAfterDiscount($test19_prince,$discount19));
		}
		else
		{
			$discount19=0;
			$test19_prince=0;
			$discount19_amont=0;
			$bal_amount_19=0;
		}

		$test20=Input::get('test_20');
		if($test20!='')
		{
			$discount20=Input::get('discount_20');
			$test20_prince=Controller::TestPriceFind($test20);
			$discount20_amont=ceil(Controller::TestPriceDiscountAmount($test20_prince,$discount20));
			$bal_amount_20=ceil(Controller::TestBalanceAfterDiscount($test20_prince,$discount20));
		}
		else
		{
			$discount20=0;
			$test20_prince=0;
			$discount20_amont=0;
			$bal_amount_20=0;
		}
	
	//Total Balance Amount Created with subtracting Discount
	$total_balance_amount=$bal_amount_1+$bal_amount_2+$bal_amount_3+$bal_amount_4+$bal_amount_5+$bal_amount_6+$bal_amount_7+$bal_amount_8+$bal_amount_9+$bal_amount_10+$bal_amount_11+$bal_amount_12+$bal_amount_13+$bal_amount_14+$bal_amount_15+$bal_amount_16+$bal_amount_17+$bal_amount_18+$bal_amount_19+$bal_amount_20;
	
	//Total Price Created Without Subtracting Discount
	$total_price=$test1_prince+$test2_prince+$test3_prince+$test4_prince+$test5_prince+$test6_prince+$test7_prince+$test8_prince+$test9_prince+$test10_prince+$test11_prince+$test12_prince+$test13_prince+$test14_prince+$test15_prince+$test16_prince+$test17_prince+$test18_prince+$test19_prince+$test20_prince;


	$total_discount_amount=$discount1_amont+$discount2_amont+$discount3_amont+$discount4_amont+$discount5_amont+$discount6_amont+$discount7_amont+$discount8_amont+$discount9_amont+$discount10_amont+$discount11_amont+$discount12_amont+$discount13_amont+$discount14_amont+$discount15_amont+$discount16_amont+$discount17_amont+$discount18_amont+$discount19_amont+$discount20_amont;


	$data=[
		'patient_id'=>$patient_id,
		'patient_name'=>$patient_name,
		'patient_contact'=>$patient_contact,
		'age'=>$age,
		'date'=>$date,
		'time'=>$time,
		'gender'=>$gender,
		'address'=>$address,
		'tid'=>$tid, //Receipt No
		'disease'=>'',
		'reference_doctor'=>$reference_doctor,
		'test1'=>$test1,
		'discount1'=>$discount1,
		'discount1_amont'=>$discount1_amont,
		'bal_amount_1'=>$bal_amount_1,
		'test1_prince'=>$test1_prince,
		'test2'=>$test2,
		'discount2'=>$discount2,
		'discount2_amont'=>$discount2_amont,
		'bal_amount_2'=>$bal_amount_2,
		'test2_prince'=>$test2_prince,
		'test3'=>$test3,
		'discount3'=>$discount3,
		'discount3_amont'=>$discount3_amont,
		'bal_amount_3'=>$bal_amount_3,
		'test3_prince'=>$test3_prince,
		'test4'=>$test4,
		'discount4'=>$discount4,
		'discount4_amont'=>$discount4_amont,
		'bal_amount_4'=>$bal_amount_4,
		'test4_prince'=>$test4_prince,
		'test5'=>$test5,
		'discount5'=>$discount5,
		'discount5_amont'=>$discount5_amont,
		'bal_amount_5'=>$bal_amount_5,
		'test5_prince'=>$test5_prince,
		'test6'=>$test6,
		'discount6'=>$discount6,
		'discount6_amont'=>$discount6_amont,
		'bal_amount_6'=>$bal_amount_6,
		'test6_prince'=>$test6_prince,
		'test7'=>$test7,
		'discount7'=>$discount7,
		'discount7_amont'=>$discount7_amont,
		'bal_amount_7'=>$bal_amount_7,
		'test7_prince'=>$test7_prince,
		'test8'=>$test8,
		'discount8'=>$discount8,
		'discount8_amont'=>$discount8_amont,
		'bal_amount_8'=>$bal_amount_8,
		'test8_prince'=>$test8_prince,
		'test9'=>$test9,
		'discount9'=>$discount9,
		'discount9_amont'=>$discount9_amont,
		'bal_amount_9'=>$bal_amount_9,
		'test9_prince'=>$test9_prince,
		'test10'=>$test10,
		'discount10'=>$discount10,
		'discount10_amont'=>$discount10_amont,
		'bal_amount_10'=>$bal_amount_10,
		'test10_prince'=>$test10_prince,
		'test11'=>$test11,
		'discount11'=>$discount11,
		'discount11_amont'=>$discount11_amont,
		'bal_amount_11'=>$bal_amount_11,
		'test11_prince'=>$test11_prince,
		'test12'=>$test12,
		'discount12'=>$discount12,
		'discount12_amont'=>$discount12_amont,
		'bal_amount_12'=>$bal_amount_12,
		'test12_prince'=>$test12_prince,
		'test13'=>$test13,
		'discount13'=>$discount13,
		'discount13_amont'=>$discount13_amont,
		'bal_amount_13'=>$bal_amount_13,
		'test13_prince'=>$test13_prince,
		'test14'=>$test14,
		'discount14'=>$discount14,
		'discount14_amont'=>$discount14_amont,
		'bal_amount_14'=>$bal_amount_14,
		'test14_prince'=>$test14_prince,
		'test15'=>$test15,
		'discount15'=>$discount15,
		'discount15_amont'=>$discount15_amont,
		'bal_amount_15'=>$bal_amount_15,
		'test15_prince'=>$test15_prince,
		'test16'=>$test16,
		'discount16'=>$discount16,
		'discount16_amont'=>$discount16_amont,
		'bal_amount_16'=>$bal_amount_16,
		'test16_prince'=>$test16_prince,
		'test17'=>$test17,
		'discount17'=>$discount17,
		'discount17_amont'=>$discount17_amont,
		'bal_amount_17'=>$bal_amount_17,
		'test17_prince'=>$test17_prince,
		'test18'=>$test18,
		'discount18'=>$discount18,
		'discount18_amont'=>$discount18_amont,
		'bal_amount_18'=>$bal_amount_18,
		'test18_prince'=>$test18_prince,
		'test19'=>$test19,
		'discount19'=>$discount19,
		'discount19_amont'=>$discount19_amont,
		'bal_amount_19'=>$bal_amount_19,
		'test19_prince'=>$test19_prince,
		'test20'=>$test20,
		'discount20'=>$discount20,
		'discount20_amont'=>$discount20_amont,
		'bal_amount_20'=>$bal_amount_20,
		'test20_prince'=>$test20_prince,
		'total_balance_amount'=>$total_balance_amount,
		'total_price'=>$total_price,
		'total_discount_money'=>$total_discount_amount,
		'due_collection'=>'',
		'total_amount'=>'',
		'paid'=>'',
		'due'=>''
	];

	return view('hospital.addPatient2',compact(
	'patient_id','patient_name','patient_contact','age','date','time','gender',
	'address','tid','disease','reference_doctor',
	'test1','discount1','discount1_amont','bal_amount_1','test1_prince',
	'test2','discount2','discount2_amont','bal_amount_2','test2_prince',
	'test3','discount3','discount3_amont','bal_amount_3','test3_prince',
	'test4','discount4','discount4_amont','bal_amount_4','test4_prince',
	'test5','discount5','discount5_amont','bal_amount_5','test5_prince',
	'test6','discount6','discount6_amont','bal_amount_6','test6_prince',
	'test7','discount7','discount7_amont','bal_amount_7','test7_prince',
	'test8','discount8','discount8_amont','bal_amount_8','test8_prince',
	'test9','discount9','discount9_amont','bal_amount_9','test9_prince',
	'test10','discount10','discount10_amont','bal_amount_10','test10_prince',
	'test11','discount11','discount11_amont','bal_amount_11','test11_prince',
	'test12','discount12','discount12_amont','bal_amount_12','test12_prince',
	'test13','discount13','discount13_amont','bal_amount_13','test13_prince',
	'test14','discount14','discount14_amont','bal_amount_14','test14_prince',
	'test15','discount15','discount15_amont','bal_amount_15','test15_prince',
	'test16','discount16','discount16_amont','bal_amount_16','test16_prince',
	'test17','discount17','discount17_amont','bal_amount_17','test17_prince',
	'test18','discount18','discount18_amont','bal_amount_18','test18_prince',
	'test19','discount19','discount19_amont','bal_amount_19','test19_prince',
	'test20','discount20','discount20_amont','bal_amount_20','test20_prince',
	'total_balance_amount','total_price','total_discount_amount'));

	/*
    $key='!@#$%^&*)(';
	echo 'Encripted Message = '.$cypher=Controller::safeEncrypt('120.52',$key);
    echo 'Decriped Message = '.$text=Controller::safeDecrypt($cypher,$key);
	*/

	/*
		echo 'Test 2 Name : '.$test2;
		echo '<br />Discount 2 : '.$discount2.'%';
		echo '<br />Test 2 Price : '.$test2_prince;
		echo '<br />Discount2_Amount : '.$discount2_amont;
		echo '<br />Balance Amount 2 : '.$bal_amount_2;
	*/	
		//echo Controller::printTest();
		/*
		if($test2!='')
		{
			echo 'Data in Test 2';
		}
		else
		{
			echo 'No Data in Test 2';
		}
		*/
	}

	public function savePatient()
	{
		/*
		return view('hospital.patientReceipt',compact(
			'patient_name','patient_contact','age','date','time','gender',
			'address','tid','reference_doctor'
			)); */
		$patient_id=Input::get('patient_id');
		$patient_name=Input::get('patient_name');
		$patient_contact=Input::get('patient_contact');
		$age=Input::get('age');
		$date=Input::get('date');
		$time=Input::get('time');
		$gender=Input::get('gender');
		$address=Input::get('address');
		$tid=Input::get('tid');
		$reference_doctor=Input::get('reference_doctor');

		$test1=Input::get('test1');
		$discount1=Input::get('discount1');
		$discount1_amont=Input::get('discount1_amont');
		$bal_amount_1=Input::get('bal_amount_1');
		$test1_prince=Input::get('test1_prince');

		$test2=Input::get('test2');
		$discount2=Input::get('discount2');
		$discount2_amont=Input::get('discount2_amont');
		$bal_amount_2=Input::get('bal_amount_2');
		$test2_prince=Input::get('test2_prince');

		$test3=Input::get('test3');
		$discount3=Input::get('discount3');
		$discount3_amont=Input::get('discount3_amont');
		$bal_amount_3=Input::get('bal_amount_3');
		$test3_prince=Input::get('test3_prince');

		$test4=Input::get('test4');
		$discount4=Input::get('discount4');
		$discount4_amont=Input::get('discount4_amont');
		$bal_amount_4=Input::get('bal_amount_4');
		$test4_prince=Input::get('test4_prince');

		$test5=Input::get('test5');
		$discount5=Input::get('discount5');
		$discount5_amont=Input::get('discount5_amont');
		$bal_amount_5=Input::get('bal_amount_5');
		$test5_prince=Input::get('test5_prince');

		$test6=Input::get('test6');
		$discount6=Input::get('discount6');
		$discount6_amont=Input::get('discount6_amont');
		$bal_amount_6=Input::get('bal_amount_6');
		$test6_prince=Input::get('test6_prince');

		$test7=Input::get('test7');
		$discount7=Input::get('discount7');
		$discount7_amont=Input::get('discount7_amont');
		$bal_amount_7=Input::get('bal_amount_7');
		$test7_prince=Input::get('test7_prince');

		$test8=Input::get('test8');
		$discount8=Input::get('discount8');
		$discount8_amont=Input::get('discount8_amont');
		$bal_amount_8=Input::get('bal_amount_8');
		$test8_prince=Input::get('test8_prince');

		$test9=Input::get('test9');
		$discount9=Input::get('discount9');
		$discount9_amont=Input::get('discount9_amont');
		$bal_amount_9=Input::get('bal_amount_9');
		$test9_prince=Input::get('test9_prince');

		$test10=Input::get('test10');
		$discount10=Input::get('discount10');
		$discount10_amont=Input::get('discount10_amont');
		$bal_amount_10=Input::get('bal_amount_10');
		$test10_prince=Input::get('test10_prince');

		$test11=Input::get('test11');
		$discount11=Input::get('discount11');
		$discount11_amont=Input::get('discount11_amont');
		$bal_amount_11=Input::get('bal_amount_11');
		$test11_prince=Input::get('test11_prince');

		$test12=Input::get('test12');
		$discount12=Input::get('discount12');
		$discount12_amont=Input::get('discount12_amont');
		$bal_amount_12=Input::get('bal_amount_12');
		$test12_prince=Input::get('test12_prince');

		$test13=Input::get('test13');
		$discount13=Input::get('discount13');
		$discount13_amont=Input::get('discount13_amont');
		$bal_amount_13=Input::get('bal_amount_13');
		$test13_prince=Input::get('test13_prince');

		$test14=Input::get('test14');
		$discount14=Input::get('discount14');
		$discount14_amont=Input::get('discount14_amont');
		$bal_amount_14=Input::get('bal_amount_14');
		$test14_prince=Input::get('test14_prince');

		$test15=Input::get('test15');
		$discount15=Input::get('discount15');
		$discount15_amont=Input::get('discount15_amont');
		$bal_amount_15=Input::get('bal_amount_15');
		$test15_prince=Input::get('test15_prince');

		$test16=Input::get('test16');
		$discount16=Input::get('discount16');
		$discount16_amont=Input::get('discount16_amont');
		$bal_amount_16=Input::get('bal_amount_16');
		$test16_prince=Input::get('test16_prince');

		$test17=Input::get('test17');
		$discount17=Input::get('discount17');
		$discount17_amont=Input::get('discount17_amont');
		$bal_amount_17=Input::get('bal_amount_17');
		$test17_prince=Input::get('test17_prince');

		$test18=Input::get('test18');
		$discount18=Input::get('discount18');
		$discount18_amont=Input::get('discount18_amont');
		$bal_amount_18=Input::get('bal_amount_18');
		$test18_prince=Input::get('test18_prince');

		$test19=Input::get('test19');
		$discount19=Input::get('discount19');
		$discount19_amont=Input::get('discount19_amont');
		$bal_amount_19=Input::get('bal_amount_19');
		$test19_prince=Input::get('test19_prince');

		$test20=Input::get('test20');
		if($test20=='')
		{
			$test20='-';
		}
		if($test19=='')
		{
		$test19='-';
		} 
		if($test18=='')
		{
		$test18='-';
		} 
		if($test17=='')
		{
		$test17='-';
		} 
		if($test16=='')
		{
		$test16='-';
		} 
		if($test15=='')
		{
		$test15='-';
		} 
		if($test14=='')
		{
		$test14='-';
		} 
		if($test13=='')
		{
		$test13='-';
		} 
		if($test12=='')
		{
		$test12='-';
		} 
		if($test11=='')
		{
		$test11='-';
		} 
		if($test10=='')
		{
		$test10='-';
		} 
		if($test9=='')
		{
		$test9='-';
		} 
		if($test8=='')
		{
		$test8='-';
		} 
		if($test7=='')
		{
		$test7='-';
		} 
		if($test6=='')
		{
		$test6='-';
		} 
		if($test5=='')
		{
		$test5='-';
		} 
		if($test4=='')
		{
		$test4='-';
		} 
		if($test3=='')
		{
		$test3='-';
		} 
		if($test2=='')
		{
		$test2='-';
		} 
		if($test1=='')
		{
		$test1='-';
		} 
		$discount20=Input::get('discount20');
		$discount20_amont=Input::get('discount20_amont');
		$bal_amount_20=Input::get('bal_amount_20');
		$test20_prince=Input::get('test20_prince');

		$total_balance_amount=Input::get('total_balance_amount');
		$total_price=Input::get('total_price');
		$total_discount_amount=Input::get('total_discount_amount');
		$paid=Input::get('paid');
		$due=Input::get('due');


		$data=[
		'patient_id'=>$patient_id,
		'patient_name'=>$patient_name,
		'patient_contact'=>$patient_contact,
		'age'=>$age,
		'date'=>$date,
		'time'=>$time,
		'gender'=>$gender,
		'address'=>$address,
		'tid'=>$tid, //Receipt No
		'disease'=>'-',
		'reference_doctor'=>$reference_doctor,
		'test1'=>$test1,
		'discount1'=>$discount1,
		'discount1_amont'=>$discount1_amont,
		'bal_amount_1'=>$bal_amount_1,
		'test1_prince'=>$test1_prince,
		'test2'=>$test2,
		'discount2'=>$discount2,
		'discount2_amont'=>$discount2_amont,
		'bal_amount_2'=>$bal_amount_2,
		'test2_prince'=>$test2_prince,
		'test3'=>$test3,
		'discount3'=>$discount3,
		'discount3_amont'=>$discount3_amont,
		'bal_amount_3'=>$bal_amount_3,
		'test3_prince'=>$test3_prince,
		'test4'=>$test4,
		'discount4'=>$discount4,
		'discount4_amont'=>$discount4_amont,
		'bal_amount_4'=>$bal_amount_4,
		'test4_prince'=>$test4_prince,
		'test5'=>$test5,
		'discount5'=>$discount5,
		'discount5_amont'=>$discount5_amont,
		'bal_amount_5'=>$bal_amount_5,
		'test5_prince'=>$test5_prince,
		'test6'=>$test6,
		'discount6'=>$discount6,
		'discount6_amont'=>$discount6_amont,
		'bal_amount_6'=>$bal_amount_6,
		'test6_prince'=>$test6_prince,
		'test7'=>$test7,
		'discount7'=>$discount7,
		'discount7_amont'=>$discount7_amont,
		'bal_amount_7'=>$bal_amount_7,
		'test7_prince'=>$test7_prince,
		'test8'=>$test8,
		'discount8'=>$discount8,
		'discount8_amont'=>$discount8_amont,
		'bal_amount_8'=>$bal_amount_8,
		'test8_prince'=>$test8_prince,
		'test9'=>$test9,
		'discount9'=>$discount9,
		'discount9_amont'=>$discount9_amont,
		'bal_amount_9'=>$bal_amount_9,
		'test9_prince'=>$test9_prince,
		'test10'=>$test10,
		'discount10'=>$discount10,
		'discount10_amont'=>$discount10_amont,
		'bal_amount_10'=>$bal_amount_10,
		'test10_prince'=>$test10_prince,
		'test11'=>$test11,
		'discount11'=>$discount11,
		'discount11_amont'=>$discount11_amont,
		'bal_amount_11'=>$bal_amount_11,
		'test11_prince'=>$test11_prince,
		'test12'=>$test12,
		'discount12'=>$discount12,
		'discount12_amont'=>$discount12_amont,
		'bal_amount_12'=>$bal_amount_12,
		'test12_prince'=>$test12_prince,
		'test13'=>$test13,
		'discount13'=>$discount13,
		'discount13_amont'=>$discount13_amont,
		'bal_amount_13'=>$bal_amount_13,
		'test13_prince'=>$test13_prince,
		'test14'=>$test14,
		'discount14'=>$discount14,
		'discount14_amont'=>$discount14_amont,
		'bal_amount_14'=>$bal_amount_14,
		'test14_prince'=>$test14_prince,
		'test15'=>$test15,
		'discount15'=>$discount15,
		'discount15_amont'=>$discount15_amont,
		'bal_amount_15'=>$bal_amount_15,
		'test15_prince'=>$test15_prince,
		'test16'=>$test16,
		'discount16'=>$discount16,
		'discount16_amont'=>$discount16_amont,
		'bal_amount_16'=>$bal_amount_16,
		'test16_prince'=>$test16_prince,
		'test17'=>$test17,
		'discount17'=>$discount17,
		'discount17_amont'=>$discount17_amont,
		'bal_amount_17'=>$bal_amount_17,
		'test17_prince'=>$test17_prince,
		'test18'=>$test18,
		'discount18'=>$discount18,
		'discount18_amont'=>$discount18_amont,
		'bal_amount_18'=>$bal_amount_18,
		'test18_prince'=>$test18_prince,
		'test19'=>$test19,
		'discount19'=>$discount19,
		'discount19_amont'=>$discount19_amont,
		'bal_amount_19'=>$bal_amount_19,
		'test19_prince'=>$test19_prince,
		'test20'=>$test20,
		'discount20'=>$discount20,
		'discount20_amont'=>$discount20_amont,
		'bal_amount_20'=>$bal_amount_20,
		'test20_prince'=>$test20_prince,
		'total_balance_amount'=>$total_balance_amount,
		'total_price'=>$total_price,
		'total_discount_money'=>$total_discount_amount,
		'due_collection'=>'0',
		'paid'=>$paid,
		'due'=>$due
	];

	$dailyIncome=[
		'patient_id'=>$patient_id,
		'date'=>$date,
		'total_amount'=>$total_price,
		'discount_amount'=>$total_discount_amount,
		'balance_amount'=>$total_balance_amount,
		'advance_paid'=>$paid,
		'due'=>$due,
		'due_collection'=>'',
		'total_paid'=>$paid
	];

	$dailyDue=[
		'patient_id'=>$patient_id,
		'date_'=>$date,
		'patient_name'=>$patient_name,
		'patient_phone'=>$patient_contact,
		'total_amount'=>$total_price,
		'discount_amount'=>$total_discount_amount,
		'total_balance_amount'=>$total_balance_amount,
		'paid'=>$paid,
		'due'=>$due
	];

		$pateint=PatientModel::create($data);
		$incomeStatement=DailyIncomeStatementModel::create($dailyIncome);
		$DueStatement=DueModel::create($dailyDue);
		
		/*
		if($pateint)
		{
			echo 'Patient Success <br />';
		}
		else
		{
			echo 'Failed Patient <br />';
		}
		if($incomeStatement)
		{
			echo 'Income Success!,<br />';
		}
		else
		{
			echo 'Income statment Failed ! <br />';
		}
		if($DueStatement)
		{
			echo 'Due Statement Success <br />';
		}
		else
		{
			echo 'Due Statement FAiled <br />';
		}
		*/
		return view('hospital.patientReceipt',compact(
	'patient_id','patient_name','patient_contact','age','date','time','gender',
	'address','tid','disease','reference_doctor',
	'test1','discount1','discount1_amont','bal_amount_1','test1_prince',
	'test2','discount2','discount2_amont','bal_amount_2','test2_prince',
	'test3','discount3','discount3_amont','bal_amount_3','test3_prince',
	'test4','discount4','discount4_amont','bal_amount_4','test4_prince',
	'test5','discount5','discount5_amont','bal_amount_5','test5_prince',
	'test6','discount6','discount6_amont','bal_amount_6','test6_prince',
	'test7','discount7','discount7_amont','bal_amount_7','test7_prince',
	'test8','discount8','discount8_amont','bal_amount_8','test8_prince',
	'test9','discount9','discount9_amont','bal_amount_9','test9_prince',
	'test10','discount10','discount10_amont','bal_amount_10','test10_prince',
	'test11','discount11','discount11_amont','bal_amount_11','test11_prince',
	'test12','discount12','discount12_amont','bal_amount_12','test12_prince',
	'test13','discount13','discount13_amont','bal_amount_13','test13_prince',
	'test14','discount14','discount14_amont','bal_amount_14','test14_prince',
	'test15','discount15','discount15_amont','bal_amount_15','test15_prince',
	'test16','discount16','discount16_amont','bal_amount_16','test16_prince',
	'test17','discount17','discount17_amont','bal_amount_17','test17_prince',
	'test18','discount18','discount18_amont','bal_amount_18','test18_prince',
	'test19','discount19','discount19_amont','bal_amount_19','test19_prince',
	'test20','discount20','discount20_amont','bal_amount_20','test20_prince',
	'total_balance_amount','total_price','total_discount_amount','paid','due',
	'total_balance_amount','total_price','total_discount_amount'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
	public function logOut()
	{
		Session::flush();
		Auth::logout();
		return redirect('/auth/login');
	}

	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
