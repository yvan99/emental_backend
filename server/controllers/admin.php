<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php';
class admin {
  
 public $firstName;
 public $lastName;
 public $email;
 public $password;
 function __construct($firstName=null,$lastName=null,$email=null,$password=null)
{
    $this->firstName=escape($firstName);
    $this->lastName=escape($lastName);
    $this->email=escape($email);
    $this->password=escape($password);
}

function signup()
{

    $validate = managerSignUpValdation($this->firstName,$this->lastName, $this->password, $this->email);

    //signup validation: $validate will hold null if there is no error in validation
    if ($validate === NULL)
    {

        $hashedpassword = create_hash($this->password);

        //this will hash password
        $affectedRow = countAffectedRows('admin', "adm_email= '$this->email'");

        //$affectedRow will verify if email is already registerd
        

        if ($affectedRow == 0)
        {
            $token = verificationToken();

            //this token sent to user
            
            $data=['adm_firstname'=>$this->firstName, 'adm_lastname'=>$this->lastName, 'adm_email'=>$this->email, 'adm_password'=>$this->password, 'adm_status'=>0,];

            //$data array will store data to be inserted
            $dataStructure = 'adm_firstname, adm_lastname, adm_email, adm_password, adm_status';
            //$dataStructure will hold datastructure of table
            $values =':adm_firstname, :adm_lastname, :adm_email, :adm_password, :adm_status';

            insert('admin',$dataStructure,$values,$data);
            
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
      $count=countAffectedRows('admin',"adm_email='$email'");
       
       
        if($count==1){
        
          //from here we are sure that email are registered
         
         $rows=select('*','admin',"adm_email='$email' and adm_status = 0 ");
         $hash=null;
         
          
        foreach($rows as $row)  $hash=$row['adm_password'];
        
    
          //selection of hashed password stored in db
    
        foreach($rows as $row) $id=$row['adm_id'];
         $id;
        
        $log=verify_password($password,$hash);
        if($log){
         $log;
         create_session($id,'admin');
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

function addBlog($title,$image,$content)
{
  $title=escape($title);
  $image=escape($image);
  $content=escape($content);
  
  $today=date("Y-m-d");
  $data=['blo_title'=>$title, 'blo_content'=>$content, 'blo_date'=>$today, 'blo_status'=>1, 'blo_image'=>$image, ];

  //$data array will store data to be inserted
  $dataStructure = 'blo_title, blo_content, blo_date, blo_status, blo_image';
  //$dataStructure will hold datastructure of table
  $values =':blo_title, :blo_content, :blo_date, :blo_status, :blo_image';

  insert('blog',$dataStructure,$values,$data);
  

  return true;

}
function addTestmonies($title,$video,$content)
{
  $title=escape($title);
  $video=escape($video);
  $content=escape($content);
  
  $today=date("Y-m-d");
  $data=['tes_title'=>$title, 'tes_content'=>$content, 'tes_joindate'=>$today, 'tes_status'=>1, 'tes_video'=>$video, ];

  //$data array will store data to be inserted
  $dataStructure = ' tes_title, tes_content, tes_joindate, tes_status, tes_video';
  //$dataStructure will hold datastructure of table
  $values =' :tes_title, :tes_content, :tes_joindate, :tes_status, :tes_video';

  insert('testimonies',$dataStructure,$values,$data);
  

  return true;

}



}

 
    
    ?>