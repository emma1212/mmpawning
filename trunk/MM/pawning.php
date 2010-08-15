<?php
include_once('loginchecker.php');
include_once('localDB.php');
include_once('functions.php');
$day = date('d');
$month = date('F');
$numericMonth = date('m');
$year = date('Y');

?>

<script type="text/javascript">
function validateEmpty(field,errormsg)
{
	with(field)
	{
		if( value == "" || value == null ) {
			return false;
			alert(errormsg);
		
		}
		else {
			return true;
		}
	}
}

function validateform(form) 
{
	with(form) 
	{
		if ( validateEmpty(name,"Please enter a name") == false ) {
			name.focus();
			return false;
		}
		else {
			return true;
		}
	}
}
</script>

<fieldset><legend><strong>Pawning</strong></legend>
<table>


	<form method="POST" action="home.php?page=pawning&submitted=yes"
		name="myform" onsubmit="return validateform(this)">
	<tr>
		<td>Customer name:</td>
		<td><input type="text" size="30" maxlength="50" name="name"></td>
	</tr>
	<tr>
		<td>Customer ID:</td>
		<td><input type="text" size="30" maxlength="50" name="id"></td>
	</tr>
	<tr>
		<tr>
			<td>Customer Address:</td>
			<td><textarea name="address" rows="5" cols="" style="width: 215px;"></textarea></td>
		</tr>
		<tr>
			<td>Bill number:</td>
			<td><input type="text" size="30" maxlength="50" name="ref_no"></td>
		</tr>
	
	
	<tr>
		<td>Jewellary:</td>
		<td><select name="type">
			<option value="">Select</option>
			<option value="Chain">Chain</option>
			<option value="Ring">Ring</option>
			<option value="Bangle">Bangle</option>
			<option value="Bracelet">bracelet</option>
		</select></td>
	</tr>
	<tr>
		<td>Weight:</td>
		<td><input type="text" size="30" maxlength="50" name="weight"></td>
	</tr>
	<tr>
		<td>Amount:</td>
		<td><input type="text" size="30" maxlength="50" name="amount"></td>

	</tr>
	<tr>
		<td>Date:</td>

		<td><select name="year">
			<option value="<?php echo $year;?>" selected="selected"><?php echo $year;?></option>
			<option value="2008">2008</option>
			<option value="2009">2009</option>
			<option value="2010" selected="selected">2010</option>
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
		</select> <select name="month">
			<option value="<?php echo $numericMonth; ?>" selected="selected"><?php echo $month; ?></option>
			<option value="01">January</option>
			<option value="02">February</option>
			<option value="03">March</option>
			<option value="04">April</option>
			<option value="05">May</option>
			<option value="06">June</option>
			<option value="07">July</option>
			<option value="08">August</option>
			<option value="09">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select> <select name="date">
			<option value="<?php echo $day; ?>"><?php echo $day; ?></option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
		</select>
	
	</tr>

	<tr>
		<td></td>
		<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<INPUT
			type="submit" name="button" value="Update" /></td>
	</tr>

	</form>
</table>
</legend></fieldset>
<?php
showStats('pawning');
$dataSubmitted = $_GET['submitted'];

if($dataSubmitted == "yes") {
        displayToday('pawning');
        //include_once('localDB.php');
        $date = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['date'];

        $genericInsert = "INSERT INTO pawning(ref_no,amount,date,type,weight,branch) "
        ."VALUES('{$_POST['ref_no']}','{$_POST['amount']}','{$date}','{$_POST['type']}','{$_POST['weight']}','{$_SESSION['branch']}');";
        $pawningResult = mysql_query($genericInsert);

        $cus_detailInsert = "INSERT INTO customer_details(cus_id,name,address) "
        ."VALUES('{$_POST['id']}','{$_POST['name']}','{$_POST['address']}');";
        $cusResult = mysql_query($cus_detailInsert);

        $cus_refInsert = "INSERT INTO customer_ref(cus_id,ref_no) "
        ."VALUES('{$_POST['id']}','{$_POST['ref_no']}');";
        $referenceResult = mysql_query($cus_refInsert);
        
        $goldInsert = "INSERT INTO gold(ref_no,type,weight,status) "
        ."VALUES('{$_POST['id']}','{$_POST['type']}','{$_POST['weight']}','pawned');";
        $goldResult = mysql_query($goldInsert);
        if ( ($pawningResult && $cusResult && $referenceResult) != null ) {
                echo '<p>Data entered successfully</p>';
        }
        else {
                echo '<p>Failed to enter data</p>';
        }

}
//session_start();
if ( $_GET['func'] == 'delete' ) {
	$id = $_GET['ref'];
	$deleted = deleteRecord($id);
	if ( $deleted ) {
		echo '<p>Item deleted successfully.</p>';
	}
        displayToday('pawning');
}
?>
