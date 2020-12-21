<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php';
class finance {

    public $fname;
    public $lname;
    public $phone;
    public $email;
    public $country;
    public $city;
    public $password;
    public $dob;
    public $joinDate;
    public $profile;
    public $gender;
    public $code;
    function __construct($fname=null,$lname=null,$phone=null,$email=null,$country=null,$city=null,$dob=null,$gender=null,$code=null)
    {
        $this->fname=escape($fname);
        $this->lname=escape($lname);
        $this->phone=escape($phone);
        $this->email=escape($email);
        $this->country=escape($country);
        $this->city=escape($city);
        $this->password=verificationToken();
        $this->dob=escape($dob);
        $this->joinDate=date("Y-m-d H:i:s");
        $this->gender=escape($gender);
        $this->code=escape($code);
        $this->profile='avatar.jpg';
        $this->password=passwordGenerator("FIN");


        
    }
    function signup()
    {

        $validate = managerSignUpValdation($this->fname,$this->lname, $this->password, $this->email);

        //signup validation: $validate will hold null if there is no error in validation
        if ($validate === NULL)
        {

            $hashedpassword = create_hash($this->password);

            //this will hash password
            $affectedRow = countAffectedRows('finance_manager', "fin_email= '$this->email'");

            //$affectedRow will verify if email is already registerd
            

            if ($affectedRow == 0)
            {

                $token = verificationToken();

                //this token sent to user
                
                $data=[
                    'fin_firstname'=>$this->fname, 'fin_lastname'=>$this->lname, 'fin_telephone'=>$this->phone, 'fin_email'=>$this->email, 'fin_country'=>$this->country,
                    'fin_city'=>$this->city, 'fin_password'=>$hashedpassword, 'fin_dateofbirth'=>$this->dob, 'fin_joinindate'=>$this->joinDate, 'fin_profile'=>$this->profile, 'fin_gender'=>$this->gender, 
                    'fin_status'=>1, 'fin_code'=>$this->code,
                 
                ];
                echo $data;

                //$data array will store data to be inserted
                $dataStructure = 'fin_firstname, fin_lastname, fin_telephone, fin_email, fin_country, fin_city, fin_password, fin_dateofbirth, fin_joinindate, fin_profile, fin_gender, fin_status, fin_code';

                //$dataStructure will hold datastructure of table
                $values =':fin_firstname, :fin_lastname, :fin_telephone, :fin_email, :fin_country, :fin_city, :fin_password, :fin_dateofbirth, :fin_joinindate, :fin_profile, :fin_gender, :fin_status, :fin_code';
                insert('finance_manager', $dataStructure, $values, $data);
                $email =explode("@",$this->email);
                $emailP1=$email[0];
                $emailP2=$email[1];

                //start of section for sending mail to verify signed up user
              //echo '<script type="text/javascript">window.location =("account_verification?data=' .actor($emailP2) . '&&state='.actor($emailP1). ' ")</script>';
                myemail($this->email, $this->password);

                //end of section
                return true;

            }
            else return false;

        }
        else foreach ($validate as $each)  echo $each;
        //validation error
   

    }
    function signin($email,$password)
    {
    
      $email=escape($email);
      $password=escape($password);
      $count=countAffectedRows('finance_manager',"fin_email='$email'");
       
       
        if($count==1){
        
          //from here we are sure that email are registered
         
         $rows=select('*','finance_manager',"fin_email='$email' and fin_status = 1 ");
         $hash=null;
         
          
        foreach($rows as $row)  $hash=$row['fin_password'];
        
    
          //selection of hashed password stored in db
    
        foreach($rows as $row) $id=$row['fin_code'];
         $id;
        
        $log=verify_password($password,$hash);
        if($log){
         $log;
         create_session($id,'finance');
         return true;
          }
           else 
          return false;
   
    
    
        }
    
    }
    function logout()
    {
        destroy_session();
        return true;//
    }
    function confirmationOfPayment($orderId,$orderCode){
      update('corder','ord_status=:ord_status',"ord_id='$orderId'",['ord_status'=>2,]);
      update('payment','pay_status=:pay_status',"ord_code='$orderCode'",['pay_status'=>1,]);
      return true;
    }
    



}