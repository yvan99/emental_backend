<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php';
class client{
    public $fname;
    public $lname;
    public $phone;
    public $email;
    public $country;
    public $city;
    public $username;
    public $password;
    public $dob;
    public $joindate;
    public $gender;
    public $status;
    public $paddress;
    public $zipaddress;
    public $code;
    public $profile;


   function __construct($fname=null,$lname=null,$phone=null,$email=null,$country=null,$city=null,$username=null,$password=null,$dob=null,$gender=null,$paddress=null,$zipaddress=null,$profile=null)
    {
        $this->fname=escape($fname);
        $this->lname=escape($lname);
        $this->phone=escape($phone);
        $this->email=escape($email);
        $this->country=escape($country);
        $this->city=escape($city);
        $this->username=escape($username);
        $this->password=escape($password);
        $this->gender=escape($gender);
        $this->paddress=escape($paddress);
        $this->zipaddress=escape($zipaddress);
        $this->code=clientCode($this->gender);
        $this->dob=escape($dob);
        $this->profile=escape($profile);
        $this->joindate=date("Y-m-d H:i:s");

    }

    function signup()
    {

        $validate = managerSignUpValdation($this->fname,$this->lname, $this->password, $this->email);

        //signup validation: $validate will hold null if there is no error in validation
        if ($validate === NULL)
        {

            $hashedpassword = create_hash($this->password);

            //this will hash password
            $affectedRow = countAffectedRows('customer', "cli_email= '$this->email'");

            //$affectedRow will verify if email is already registerd
            

            if ($affectedRow == 0)
            {
                $token = verificationToken();

                //this token sent to user
                
                $data=['cli_firstname'=>$this->fname, 'cli_lastname'=>$this->lname, 'cli_telephone'=>$this->phone, 'cli_email'=>$this->email, 'cli_country'=>$this->country, 'cli_city'=>$this->city, 'cli_username'=>$this->username, 'cli_password'=>$hashedpassword ,'cli_dateofbirth'=>$this->dob, 'cli_joinindate'=>$this->joindate, 'cli_profile'=>$this->profile, 'cli_gender'=>$this->gender, 'cli_status'=>0, 'cli_postal_address'=>$this->paddress, 'cli_zip_address'=>$this->zipaddress, 'cli_code'=>$this->code,];

                //$data array will store data to be inserted
                $dataStructure = 'cli_firstname, cli_lastname, cli_telephone, cli_email, cli_country, cli_city, cli_username, cli_password, cli_dateofbirth, cli_joinindate, cli_profile, cli_gender, cli_status, cli_postal_address, cli_zip_address, cli_code';
                //$dataStructure will hold datastructure of table
                $values =':cli_firstname, :cli_lastname, :cli_telephone, :cli_email, :cli_country, :cli_city, :cli_username, :cli_password, :cli_dateofbirth, :cli_joinindate, :cli_profile, :cli_gender, :cli_status, :cli_postal_address, :cli_zip_address, :cli_code';

                insert('customer',$dataStructure,$values,$data);
                
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
      $count=countAffectedRows('customer',"cli_email='$email'");
       
       
        if($count==1){
        
          //from here we are sure that email are registered
         
         $rows=select('*','customer',"cli_email='$email' and cli_status = 0 ");
         $hash=null;
         
          
        foreach($rows as $row)  $hash=$row['cli_password'];
        
    
          //selection of hashed password stored in db
    
        foreach($rows as $row) $id=$row['cli_code'];
         $id;
        
        $log=verify_password($password,$hash);
        if($log){
         $log;
         create_session($id,'client');
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

    function order($client,$amount,$billDetails,$variantValue1=null,$variantValue2=null,$variantValue3=null,$modePayment,$product,$qty)
    {
      $amount=escape($amount);
      $billDetail=escape($billDetails);
      $client=escape($client);
      $variantValue1=escape($variantValue1);
      $variantValue2=escape($variantValue2);
      $variantValue3=escape($variantValue3);
      $modePayment=escape($modePayment);
      $joindate=date('Y-m-d h:i:s');
      $orderCode=ordercode(date('Y'));
      
      $qty=escape($qty);
      $data=['cli_code'=>$client, 'ord_amount'=>$amount, 'ord_billingDetail'=>$billDetail, 'ord_joindate'=>$joindate, 'ord_code'=>$orderCode, 'ord_status'=>0];
      $dataStructure='cli_code, ord_amount, ord_billingDetail, ord_joindate, ord_code, ord_status';
      $values=':cli_code, :ord_amount, :ord_billingDetail, :ord_joindate, :ord_code, :ord_status';
      insert('corder',$dataStructure,$values,$data);
      $this->orderVariant($variantValue1,$variantValue2,$variantValue3,$orderCode,$product,$qty);
      $this->payment($orderCode,$modePayment,$joindate);
      return $orderCode;
   
    }

    function orderVariant($variantValue1,$variantValue2,$variantValue3,$orderCode,$product,$qty)
    {
      $productDetails=$variantValue1.','.$variantValue2.','.$variantValue3;
      if($variantValue1==null&&$variantValue2==null&&$variantValue3==null){
        $data=['product_id'=>$product,'ova_qty'=>$qty, 'ord_code'=>$orderCode, 'ova_productDetail'=>"no variants", 'ova_status'=>0];
            $dataStructure='product_id,ova_qty, ord_code, ova_productDetail, ova_status';
            $values=':product_id,:ova_qty,:ord_code, :ova_productDetail, :ova_status';
            insert('order_variants',$dataStructure,$values,$data);

      }

      else
      {
      
            $data=['product_id'=>$product,'ova_qty'=>$qty, 'ord_code'=>$orderCode, 'ova_productDetail'=>$productDetails, 'ova_status'=>0];
            $dataStructure='product_id,ova_qty,ord_code, ova_productDetail, ova_status';
            $values=':product_id, :ova_qty,:ord_code, :ova_productDetail, :ova_status';
            insert('order_variants',$dataStructure,$values,$data);
            
            
      }

    }

    function payment($orderCode,$modePayment,$joindate)
    {
      if($modePayment==='cashondelivery'){
        $modePayment="COD";
      }elseif($modePayment==='card')
      {
        $modePayment="CARD";
      }
      elseif($modePayment==='mobilemoney'){
        $modePayment="MOMO";

      }
    
      $data = [ 'ord_code'=>$orderCode, 'pay_mode'=>$modePayment,'pay_date'=>$joindate, 'pay_status'=>0,];
  
                  //$data array will store data to be inserted
                  $dataStructure ='ord_code, pay_mode,pay_date, pay_status';
                  //$dataStructure will hold datastructure of table
                  $values = ':ord_code, :pay_mode,:pay_date, :pay_status';
  
                  insert('payment', $dataStructure, $values, $data);
      
      
      

    }



}
?>