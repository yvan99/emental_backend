<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php';
class shop{
    public $shopName;
    public $description;
    public $category;
    public $email;
    public $password;
    public $firstName;
    public $lastName;
    public $telphone;
    public $city;
    public $commune;
    public $tinNumber;
    public $today;
    public $profile;
    public $shopCode;
    public $country;
    public $userName;
    function __construct($shopName=null,$description=null,$category=null,$email=null,$password=null,$firstName=null, $lastName=null, $telphone=null,$country=null,$city=null,$commune=null,$tinNumber=null,$userName=null)
     {
        $this->shopName = escape($shopName);
        $this->description= escape($description);
        $this->category=escape($category);
        $this->email = escape($email);
        $this->password= escape($password);
        $this->firstName= escape($firstName);
        $this->lastName= escape($lastName);
        $this->telphone= escape($telphone);
        $this->country= escape($country);
        $this->city= escape($city);
        $this->commune=escape($commune);
        $this->tinNumber= escape($tinNumber);
        $this->today=date("Y-m-d H:i:s");
        $this->shopCode=shopCodeGenerator(date('Y'));
        $this->userName=escape($userName);
        
     }

     function signup()
    {

        $validate = memberSignUpValdation($this->shopName,$this->firstName, $this->lastName, $this->password, $this->email);
        //signup validation: $validate will hold null if there is no error in validation
        if ($validate === NULL)
        {
            $hashedpassword = create_hash($this->password);
            //this will hash password
            $affectedRow = countAffectedRows('shop', "sho_email= '$this->email'");
            //$affectedRow will verify if email is already registerd
            if ($affectedRow == 0)
            {
                $token = verificationToken();

                //this token sent to user
                
                $data=[
                 'sho_name' => $this->shopName, 'sho_description' => $this->description ,'sho_category' => $this->category, 'seller_FirstName' => $this->firstName, 'seller_LastName' => $this->lastName, 
                'sho_telephone' => $this->telphone, 'sho_email' => $this->email, 'sho_country' => $this->country, 'sho_city' => $this->city, 'sho_commune' => $this->commune, 'sho_username' => $this->userName,
                 'sho_password' => $hashedpassword, 'sho_joinindate' => $this->today, 'sho_profile' => 'nooo', 'sho_status' =>0, 'sho_tin_number' => $this->tinNumber, 'sho_code'=>$this->shopCode,
                ];

                //$data array will store data to be inserted
                $dataStructure = 'sho_name, sho_description, sho_category, seller_FirstName, seller_LastName, sho_telephone, sho_email, sho_country, sho_city, sho_commune, sho_username, sho_password, sho_joinindate, sho_profile, sho_status, sho_tin_number, sho_code';

                //$dataStructure will hold datastructure of table
                $values =':sho_name, :sho_description, :sho_category, :seller_FirstName, :seller_LastName, :sho_telephone, :sho_email, :sho_country, :sho_city, :sho_commune, :sho_username, :sho_password, :sho_joinindate, :sho_profile, :sho_status, :sho_tin_number, :sho_code';
                insert('shop', $dataStructure, $values, $data);
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
    
       $count=countAffectedRows('shop',"sho_email='$email'");
       
        if($count==1){
        
          //from here we are sure that email are registered
         
         $rows=select('*','shop',"sho_email='$email' and sho_status = 1 ");
         $hash=null;
         
          
        foreach($rows as $row)  $hash=$row['sho_password'];
    
          //selection of hashed password stored in db
    
        foreach($rows as $row) $id=$row['sho_code'];
        
        
        $log=verify_password($password,$hash);
        if($log){
          create_session($id,'store');
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

    function soldOutProduct($ovaId){
      update('order_variants','ova_status=:ova_status',"ova_id='$ovaId'",['ova_status'=>1,]);
      return true;
    }
}