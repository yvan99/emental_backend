<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php';
class product {
    public $name;
    public $sku;
    public $code;
    public $joinDate;
    public $madeDate;
    public $expireDate;
    public $coverPhoto;
    public $description;
    public $category;
    public $brand;
    public $sellType;
    public $quantity;
    public $unit;
    public $minOrder;
    public $price;
    public $currency;
    public $variant;
    public $variantValue;
    
    function __construct($name=null,$madeDate=null,$expireDate=null,$coverPhoto=null,$description=null,$category=null,$brand=null,$sellType=null,$quantity=null,$unit=null,$minOrder=null,$price=null,$currency=null,$shopID,$variant=null,$variantValue=null){
       $this->name=escape($name);
       $this->code=productCode();
       $this->joinDate=date("Y-m-d H:i:s");
       $this->madeDate=date("Y-m-d");//escape($madeDate);
       $this->expireDate=date("Y-m-d");//escape($expireDate);
       $this->coverPhoto=escape($coverPhoto);
       $this->description=escape($description);
       $this->category=escape($category);
       $this->brand=escape($brand);
       $this->sellType=escape($sellType);
       $this->quantity=escape($quantity);
       $this->unit=escape($unit);
       $this->minOrder=escape($minOrder);
       $this->price=escape($price);
       $this->currency=escape($currency);
       $this->shop=$shopID;
       $this->sku=skuGenerator($category,$quantity);
       $this->variant=$variant;
       $this->variantValue=$variantValue;


    }

    function add()
    {
        $data=['prod_name'=>$this->name, 'prod_sku'=>$this->sku, 'prod_code'=>$this->code, 'sho_id'=>$this->shop, 'prod_join_date'=>$this->joinDate, 'prod_made_date'=>$this->madeDate, 'prod_expiry_date'=>$this->expireDate, 'prod_cover_photo'=>$this->coverPhoto, 'prod_description'=>$this->description, 'prod_category'=>$this->category, 'prod_sellType'=>$this->sellType, 'prod_quantity'=>$this->quantity, 'prod_unit'=>$this->unit, 'prod_minorder'=>$this->minOrder, 'prod_price'=>$this->price, 'prod_currency'=>$this->currency,'prod_brand'=>$this->brand, 'prod_status'=>0,];

           //$data array will store data to be inserted
           $dataStructure = 'prod_name, prod_sku, prod_code, sho_id, prod_join_date, prod_made_date, prod_expiry_date, prod_cover_photo, prod_description, prod_category, prod_sellType, prod_quantity, prod_unit, prod_minorder, prod_price, prod_currency,prod_brand, prod_status';

           //$dataStructure will hold datastructure of table
           $values =':prod_name, :prod_sku, :prod_code, :sho_id, :prod_join_date, :prod_made_date, :prod_expiry_date, :prod_cover_photo, :prod_description, :prod_category, :prod_sellType, :prod_quantity, :prod_unit, :prod_minorder, :prod_price, :prod_currency,:prod_brand,:prod_status';
           
           insert('product',$dataStructure, $values, $data);
           //add of variants through addvarinat func
           $this->addVariants($this->variant,$this->variantValue,$this->sku);
           return true;

    }
    function addImages($image,$product)
    {
        $image=escape($image);
        //sanitizing image
        $data=['im_name'=>$image, 'prod_id'=>$product, 'im_status'=>1];

           //$data array will store data to be inserted
           $dataStructure = 'im_name, prod_id, im_status';

           //$dataStructure will hold datastructure of table
           $values =':im_name, :prod_id, :im_status';
           insert('image',$dataStructure, $values, $data);

    }

    function addVariants($variants,$VariantsValue,$product)
    {
       if($variants){
         for($a=0;$a<=count($variants);$a++ )
         {
         
            $data=[ 'var_name'=>$variants[$a], 'var_value'=>$VariantsValue[$a], 'prod_sku'=>$product,];

           //$data array will store data to be inserted
           $dataStructure ='var_name, var_value, prod_sku';

           //$dataStructure will hold datastructure of table
           $values =':var_name,:var_value, :prod_sku';
           insert('variants',$dataStructure, $values, $data);
        }
      }
    }

    function remove()
    {
    }
    function update()
    {
    }
     
}



?>