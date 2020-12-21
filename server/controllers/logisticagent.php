<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php';
class logistic {

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
        $this->password=passwordGenerator("Log");


        
    }
    function signup()
    {

        $validate = managerSignUpValdation($this->fname,$this->lname, $this->password, $this->email);

        //signup validation: $validate will hold null if there is no error in validation
        if ($validate === NULL)
        {

            $hashedpassword = create_hash($this->password);

            //this will hash password
            $affectedRow = countAffectedRows('logisticage', "logi_email= '$this->email'");

            //$affectedRow will verify if email is already registerd
            

            if ($affectedRow == 0)
            {

                $token = verificationToken();

                //this token sent to user
                
                $data=[
                    'logi_firstname'=>$this->fname, 'logi_lastname'=>$this->lname, 'logi_telephone'=>$this->phone, 'logi_email'=>$this->email, 'logi_country'=>$this->country,
                    'logi_city'=>$this->city, 'logi_password'=>$hashedpassword, 'logi_dateofbirth'=>$this->dob, 'logi_joinindate'=>$this->joinDate, 'logi_profile'=>$this->profile, 'logi_gender'=>$this->gender, 
                    'logi_status'=>1, 'logi_code'=>$this->code,
                 
                ];
                echo $data;

                //$data array will store data to be inserted
                $dataStructure = 'logi_firstname, logi_lastname, logi_telephone, logi_email, logi_country, logi_city, logi_password, logi_dateofbirth, logi_joinindate, logi_profile, logi_gender, logi_status, logi_code';

                //$dataStructure will hold datastructure of table
                $values =':logi_firstname, :logi_lastname, :logi_telephone, :logi_email, :logi_country, :logi_city, :logi_password, :logi_dateofbirth, :logi_joinindate, :logi_profile, :logi_gender, :logi_status, :logi_code';
                insert('logisticage', $dataStructure, $values, $data);
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
      $count=countAffectedRows('logisticage',"logi_email='$email'");
       
       
        if($count==1){
        
          //from here we are sure that email are registered
         
         $rows=select('*','logisticage',"logi_email='$email' and logi_status = 1 ");
         $hash=null;
         
          
        foreach($rows as $row)  $hash=$row['logi_password'];
        
    
          //selection of hashed password stored in db
    
        foreach($rows as $row) $id=$row['logi_code'];
         $id;
        
        $log=verify_password($password,$hash);
        if($log){
         $log;
         create_session($id,'logistic');
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
    



}