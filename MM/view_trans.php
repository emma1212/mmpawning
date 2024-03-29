<?php
//session_start();
include_once('localDB.php');
include_once('loginchecker.php');
include_once('functions.php');

$date = date('Y-m-d');
$data = showStats('view');
?>
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<h3>Transaction details for today</h3>

<table border="0" width="80%">
	<thead>
		<tr>
			<th>Branch</th>
			<th>Tot.Transactions</th>
			<th>Tot.Pawns</th>
			<th>Tot.Gold</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>All</td>
			<td style="text-align:center"><?php echo $data['total']['trans']; ?></td>
			<td style="text-align:center"><?php echo $data['total']['pawning']; ?></td>
			<td style="text-align:center"><?php echo $data['total']['gold']; ?>g</td>
		</tr>
		<tr>
			<td>Anuradhapura Market</td>
			<td style="text-align:center"><?php echo $data['anu_market']['trans']; ?></td>
			<td style="text-align:center"><?php echo $data['anu_market']['pawning']; ?></td>
			<td style="text-align:center"><?php echo $data['anu_market']['gold']; ?>g</td>
		</tr>
		<tr>
			<td>Anuradhapura Bus Stand</td>
			<td style="text-align:center"><?php echo $data['anu_bus']['trans']; ?></td>
			<td style="text-align:center"><?php echo $data['anu_bus']['pawning']; ?></td>
			<td style="text-align:center"><?php echo $data['anu_bus']['gold']; ?>g</td>
		</tr>
		<tr>
			<td>Kekirawa</td>
			<td style="text-align:center"><?php echo $data['kekirawa']['trans']; ?></td>
			<td style="text-align:center"><?php echo $data['kekirawa']['pawning']; ?></td>
			<td style="text-align:center"><?php echo $data['kekirawa']['gold']; ?>g</td>
		</tr>
		<tr>
			<td>MM Branch</td>
			<td style="text-align:center"><?php echo $data['mm']['trans']; ?></td>
			<td style="text-align:center"><?php echo $data['mm']['pawning']; ?></td>
			<td style="text-align:center"><?php echo $data['mm']['gold']; ?>g</td>
		</tr>
		<tr>
			<td>Wariyapola</td>
			<td style="text-align:center"><?php echo $data['wariyapola']['trans']; ?></td>
			<td style="text-align:center"><?php echo $data['wariyapola']['pawning']; ?></td>
			<td style="text-align:center"><?php echo $data['wariyapola']['gold']; ?>g</td>
		</tr>
		<tr>
			<td>Kurunegala</td>
			<td style="text-align:center"><?php echo $data['kurunegala']['trans']; ?></td>
			<td style="text-align:center"><?php echo $data['kurunegala']['pawning']; ?></td>
			<td style="text-align:center"><?php echo $data['kurunegala']['gold']; ?>g</td>
		</tr>
		<tr>
			<td>Medawachchiya</td>
			<td style="text-align:center"><?php echo $data['medawachchiya']['trans']; ?></td>
			<td style="text-align:center"><?php echo $data['medawachchiya']['pawning']; ?></td>
			<td style="text-align:center"><?php echo $data['medawachchiya']['gold']; ?>g</td>
		</tr>
	</tbody>

</table><br/><br/>
<h3>You Are viewing transactions on <?php echo $date; ?></h3>
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Pawning</li>
    <li class="TabbedPanelsTab" tabindex="0">Redeem</li>
    <li class="TabbedPanelsTab" tabindex="0">Expenses</li>
    <li class="TabbedPanelsTab" tabindex="0">Sinna</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><?php displayWODelete('pawning'); ?></div>
    <div class="TabbedPanelsContent"><?php displayWODelete('redeem'); ?></div>
     <div class="TabbedPanelsContent"><?php displayWODelete('expences'); ?></div>
    <div class="TabbedPanelsContent"><?php displayWODelete('sinna'); ?></div>
  </div>
</div>

<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>


