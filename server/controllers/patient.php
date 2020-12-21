<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php';
class patient{
 public $firstName;
 public $lastName;
 public $email;
 public $password;
 public $joindate;
 public $sex;
 public $phone;
 function __construct($firstName=null,$lastName=null,$email=null,$password=null,$sex=null,$phone=null)
{
    $this->firstName=escape($firstName);
    $this->lastName=escape($lastName);
    $this->email=escape($email);
    $this->password=escape($password);
    $this->sex=escape($sex);
    $this->joindate=date("Y-m-d");
    $this->phone=escape($phone);
}
function signup()
{

    $validate = managerSignUpValdation($this->firstName,$this->lastName, $this->password, $this->email);

    //signup validation: $validate will hold null if there is no error in validation
    if ($validate === NULL)
    {

        $hashedpassword = create_hash($this->password);

        //this will hash password
        $affectedRow = countAffectedRows('patient', "pat_email= '$this->email'");

        //$affectedRow will verify if email is already registerd
        

        if ($affectedRow == 0)
        {
            $token = verificationToken();

            //this token sent to user
            
            $data=['pat_firstname'=>$this->firstName, 'pat_lastname'=>$this->lastName, 'pat_sex'=>$this->sex, 'pat_email'=>$this->email, 'pat_phone'=>$this->phone, 'pat_password'=>$hashedpassword, 'pat_jondate'=>$this->joindate, 'pat_status'=>0];
            
            //$data array will store data to be inserted
            $dataStructure = 'pat_firstname, pat_lastname, pat_sex, pat_email, pat_phone, pat_password, pat_jondate, pat_status';
            //$dataStructure will hold datastructure of table
            $values =':pat_firstname, :pat_lastname, :pat_sex, :pat_email, :pat_phone, :pat_password, :pat_jondate, :pat_status';

            insert('patient',$dataStructure,$values,$data);
            
           // $email =explode("@",$this->email);
            //$emailP1=$email[0];
            //$emailP2=$email[1];

            //start of section for sending mail to verify signed up user
          //echo '<script type="text/javascript">window.location =("account_verification?data=' .actor($emailP2) . '&&state='.actor($emailP1). ' ")</script>';
            //myemail($this->email, $token);

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
      $count=countAffectedRows('patient',"pat_email='$email'");
      
       
       
        if($count==1){
        
          //from here we are sure that email are registered
         
         $rows=select('*','patient',"pat_email='$email' and pat_status = 0 ");
         $hash=null;
         
          
        foreach($rows as $row)  $hash=$row['pat_password'];
        
    
          //selection of hashed password stored in db
    
        foreach($rows as $row) $id=$row['pat_id'];
         $id;
        
        $log=verify_password($password,$hash);
        if($log){
         $log;
         create_session($id,'patient');
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
    
    ?>