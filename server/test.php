<html>

<head>
<title>nxaknk</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js">

</script>
</head>

<?php
if(isset($_POST['save'])){
    $a=$_POST['select3'];
    echo$a;
}
?>
<body>
    <form method="POST">

<select name="select1" id="select1">
<option disabled value="0" selected="selected">select category</option>
    <option value="1">kigali</option>
    <option value="2">south</option>
    <option value="3">north</option>
   
</select>

<select name="select2" id="select2">
<option disabled value="0" data-id="0" selected="selected">select category</option>
    <option value="10"data-id='1'>kicukiro</option>
    <option value="20"data-id='1'>gasabo</option>
    <option value="30"data-id='2'>Nyamagabe</option>
    <option value="40"data-id='2'>Nyanza</option>

</select>
<select name="select3" id="select3">
    <option disabled data-id="0" selected="selected">select category</option>
    <option data-id="10"value="10">nonko</option>
    <option data-id="2"value="20">iwacu</option>
    <option data-id="2"value="30">save</option>

</select>
<input type="submit"value="save"name="save">
</form>
<script>
    
var $select1 = $( '#select1' ),
		$select2 = $( '#select2' ),
        $select3=$('#select3'),
    $options = $select2.find( 'option' );
    $options2=$select3.find('option');
    
$select1.on( 'change', function() {
    //alert(t);
	$select2.html( $options.filter( '[data-id="' + this.value + '"]' ) );
} ).trigger( 'change' );

$select2.on( 'change', function() {
    
	$select3.html( $options2.filter( '[data-id="' + this.value + '"]' ) );
} ).trigger( 'change' );

</script>
</html>