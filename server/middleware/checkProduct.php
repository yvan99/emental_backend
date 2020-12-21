<?php
function checkproduct($params,$coverPhoto)
{

      $productCode =unhash($params['others']);
      $selectionOfcode= select('*','shop',"sho_code='$productCode'");
      foreach($selectionOfcode as $code){
            $shopID=$code['sho_id'];
      }
      // Get a single POST parameter
      //allocting variant into its array
      $variantsArray=array();
      $countVariants=count($params['variant']);
      for($a=0;$a<$countVariants;$a++){
            @array_push( $variantsArray,$params['variant'][$a]);
      }
      $variantsValueArray=array();
      $countVariantsValue=count($params['variant']);
      for($a=0;$a<$countVariantsValue;$a++){
            @array_push($variantsValueArray,$params['variantValue'][$a]);
      }
      
      $productName=$params['productName'];
      $category=$params['Lev3'];
      $brand=$params['brand'];
      $sellType=$params['sellType'];
      $qty=$params['quantity'];
      $unit=$params['unit'];
      $price=$params['price'];
      $currency=$params['currency'];
      $description=$params['description'];
      $minOrder=$params['minOrder'];
      $product= new product($productName,'nullkdsn','jsnjs',$coverPhoto,$description,$category,$brand,$sellType,$qty,$unit,$minOrder,$price,$currency,$shopID,$variantsArray,$variantsValueArray);
      $result=$product->add();
      return $result;
}



?>