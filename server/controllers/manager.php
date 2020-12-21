<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php';
class manager{
    public $fname;
    public $lname;
    public $phone;
    public $email;
    public $country;
    public $city;
    public $password;
    public $dob;
    public $joinDate;
    public $gender;
    public $code;
    public $profile;
    function __construct($fname=null,$lname=null,$phone=null,$email=null,$country=null,$city=null,$password=null,$dob=null,$joinDate=null,$gender=null,$code=null,$profile=null)
    {
        $this->fname=escape($fname);
        $this->lname=escape($lname);
        $this->phone=escape($phone);
        $this->email=escape($email);
        $this->country=escape($country);
        $this->city=escape($city);
        $this->password=escape($password);
        $this->dob=escape($dob);
        $this->joinDate=date("Y-m-d H:i:s");
        $this->gender=escape($gender);
        $this->code=managerCode($this->gender);
        $this->profile=escape($profile);
        
    }
    function signup()
    {

        $validate = managerSignUpValdation($this->fname,$this->lname, $this->password, $this->email);

        //signup validation: $validate will hold null if there is no error in validation
        if ($validate === NULL)
        {

            $hashedpassword = create_hash($this->password);

            //this will hash password
            $affectedRow = countAffectedRows('managers', "man_email= '$this->email'");

            //$affectedRow will verify if email is already registerd
            

            if ($affectedRow == 0)
            {

                $token = verificationToken();

                //this token sent to user
                
                $data=[
                    'man_firstname'=>$this->fname, 'man_lastname'=>$this->lname, 
                    'man_telephone'=>$this->phone, 'man_email'=>$this->email, 'man_country'=>$this->country,
                    'man_city'=>$this->city, 'man_password'=>$hashedpassword, 'man_dateofbirth'=>$this->dob,
                    'man_joinindate'=>$this->joinDate, 'man_profile'=>$this->profile,'man_gender'=>$this->gender, 
                    'man_status'=>1, 'man_code'=>$this->code,
                 
                ];

                //$data array will store data to be inserted
                $dataStructure = 'man_firstname, man_lastname, man_telephone, man_email, man_country, man_city, man_password, man_dateofbirth, man_joinindate, man_profile, man_gender, man_status, man_code';

                //$dataStructure will hold datastructure of table
                $values =':man_firstname, :man_lastname, :man_telephone, :man_email, :man_country, :man_city, :man_password, :man_dateofbirth, :man_joinindate, :man_profile, :man_gender, :man_status, :man_code';
                insert('managers', $dataStructure, $values, $data);
                $email =explode("@",$this->email);
                $emailP1=$email[0];
                $emailP2=$email[1];

                //start of section for sending mail to verify signed up user
              echo '<script type="text/javascript">window.location =("account_verification?data=' .actor($emailP2) . '&&state='.actor($emailP1). ' ")</script>';
                myemail($this->email, $token);

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
        $count=countAffectedRows('managers',"man_email='$email'");
        if($count==1){
         //from here we are sure that email are registered
        $rows=select('*','managers',"man_email='$email' and man_status = 0 ");
        $hash=null;
        foreach($rows as $row)  $hash=$row['man_password'];
         //selection of hashed password stored in db
        foreach($rows as $row) $id=$row['man_code'];
        $log=verify_password($password,$hash);
        if($log){
        create_session($id,'manager');
         return true;
          } else 
          return false;
                }
    
    }
    function logout()
    {
        destroy_session();
        return true;//
    }
    function assignOrdertoLogistic($order,$agent)
    {
        $data=['ovl_order'=>$order, 'ovl_logi'=>$agent, 'ovl_status'=>1];

        //$data array will store data to be inserted
        $dataStructure ='ovl_order,ovl_logi,ovl_status';

        //$dataStructure will hold datastructure of table
        $values =':ovl_order, :ovl_logi, :ovl_status';
        insert('ordvslogi', $dataStructure, $values, $data);

        update('corder','ord_status=:ord_status',"ord_id='$order'",['ord_status'=>1,]);

    }
}
  