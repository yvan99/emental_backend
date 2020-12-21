<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php';
class medic{
 public $firstName;
 public $lastName;
 public $email;
 public $password;
 public $joindate;
 public $phone;
 function __construct($firstName=null,$lastName=null,$email=null,$password=null, $phone=null)
{
    $this->firstName=escape($firstName);
    $this->lastName=escape($lastName);
    $this->email=escape($email);
    $this->password=escape($password);
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
        $affectedRow = countAffectedRows('medics', "med_email= '$this->email'");

        //$affectedRow will verify if email is already registerd
        

        if ($affectedRow == 0)
        {
            $token = verificationToken();

            //this token sent to user
            
            $data=['med_firstname'=>$this->firstName, 'med_lastname'=>$this->lastName, 'med_email'=>$this->email,'med_phone'=>$this->phone,'med_password'=>$this->password, 'med_joindate'=>$this->joindate ,'med_status'=>0,];

            //$data array will store data to be inserted
            $dataStructure = 'med_firstname, med_lastname, med_email,med_phone,med_password,med_joindate, med_status';
            //$dataStructure will hold datastructure of table
            $values =':med_firstname, :med_lastname, :med_email,:med_phone,:med_password,:med_joindate, :med_status';

            insert('medics',$dataStructure,$values,$data);
            
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
      $count=countAffectedRows('medics',"med_email='$email'");
       
       
        if($count==1){
        
          //from here we are sure that email are registered
         
         $rows=select('*','medics',"med_email='$email' and med_status = 0 ");
         $hash=null;
         
          
        foreach($rows as $row)  $hash=$row['med_password'];
        
    
          //selection of hashed password stored in db
    
        foreach($rows as $row) $id=$row['med_id'];
         $id;
        
        $log=verify_password($password,$hash);
        if($log){
         $log;
         create_session($id,'medics');
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