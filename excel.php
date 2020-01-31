
<?php

include 'config.php';
 $output='';
 

 if(isset($_POST["export_excel"])){
	  
	$query1 = "SELECT * FROM fridge,tv,emh,mobile,laptop WHERE fridge_pointname = 'WSMS FENI' AND tv_pointname = 'WSMS FENI' AND emh_pointname = 'WSMS FENI' AND mobile_pointname = 'WSMS FENI' AND lap_pointname = 'WSMS FENI'";
		$query2="SELECT * FROM fridge,tv,emh,ac WHERE fridge_pointname = 'WSMS COMILLA' AND fridge_date= '11/21/2019' AND tv_pointname = 'WSMS COMILLA' AND tv_date= '11/21/2019' AND emh_pointname = 'WSMS COMILLA' AND emh_date= '11/21/2019' AND ac_pointname = 'WSMS COMILLA' AND ac_date= '11/21/2019' ";
		$query3="SELECT * FROM mobile,laptop WHERE mobile_pointname = 'WSMS COMILLA CP' AND mobile_date= '11/21/2019' AND lap_pointname = 'WSMS COMILLA CP' AND lap_date= '11/21/2019' ";
	
	$run1=mysqli_query($con,$query1);  
	$run2=mysqli_query($con,$query2);  	
	$run3=mysqli_query($con,$query3);  	
	 
		$i=1;
		$row = mysqli_fetch_array($run1); /* wsms feni */
		$row1 = mysqli_fetch_array($run2); /* wsms comilla */
		$row3= mysqli_fetch_array($run3); /* wsms comilla cp */
		 $output.='
		
	<table>
	
		<tr>
		<th rowspan="4">SL</th>
		<th rowspan="4">Zone</th>
		<th rowspan="4" class="hide" >Service Point</th>
		<th colspan="11" align="center">FRIDGE</th>
		<th colspan="11" align="center">TV</td>
		<th colspan="11" align="center">EMH</td>
		<th colspan="11" align="center">MOBILE</th>
		<th colspan="11" align="center">LAPTOP</td>
		<th colspan="11" align="center">AC</td>
		
	</tr>
	
	<tr>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
		
	</tr>
	
	<tr>
		<th rowspan="2" align="center">Indoor</th>
		<th rowspan="2" align="center" >Outdoor</th>
		<th rowspan="2" align="center" >Indoor Pending</th>
		<th rowspan="2" align="center" >Outdoor Pending</th>
		<th colspan="2" align="center">Parts Pending</th>
		<th rowspan="2" align="center">Decision Pending</th>
		<th rowspan="2" align="center">Red Color Indicates More than 40</th>
		<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
		<th rowspan="2" align="center">5 Days Over Pending</th>
		<th rowspan="2" align="center">Indoor</th>
		<th rowspan="2" align="center" >Outdoor</th>
		<th rowspan="2" align="center" >Indoor Pending</th>
		<th rowspan="2" align="center" >Outdoor Pending</th>
		<th colspan="2" align="center">Parts Pending</th>
		<th rowspan="2" align="center">Decision Pending</th>
		<th rowspan="2" align="center">Red Color Indicates More than 40</th>
		<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
		<th rowspan="2" align="center">5 Days Over Pending</th>
		<th rowspan="2" align="center">Indoor</th>
		<th rowspan="2" align="center" >Outdoor</th>
		<th rowspan="2" align="center" >Indoor Pending</th>
		<th rowspan="2" align="center" >Outdoor Pending</th>
		<th colspan="2" align="center">Parts Pending</th>
		<th rowspan="2" align="center">Decision Pending</th>
		<th rowspan="2" align="center">Red Color Indicates More than 40</th>
		<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
		<th rowspan="2" align="center">5 Days Over Pending</th>
		<th rowspan="2" align="center">Indoor</th>
		<th rowspan="2" align="center" >Outdoor</th>
		<th rowspan="2" align="center" >Indoor Pending</th>
		<th rowspan="2" align="center" >Outdoor Pending</th>
		<th colspan="2" align="center">Parts Pending</th>
		<th rowspan="2" align="center">Decision Pending</th>
		<th rowspan="2" align="center">Red Color Indicates More than 40</th>
		<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
		<th rowspan="2" align="center">5 Days Over Pending</th>
		<th rowspan="2" align="center">Indoor</th>
		<th rowspan="2" align="center" >Outdoor</th>
		<th rowspan="2" align="center" >Indoor Pending</th>
		<th rowspan="2" align="center" >Outdoor Pending</th>
		<th colspan="2" align="center">Parts Pending</th>
		<th rowspan="2" align="center">Decision Pending</th>
		<th rowspan="2" align="center">Red Color Indicates More than 40</th>
		<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
		<th rowspan="2" align="center">5 Days Over Pending</th>
		<th rowspan="2" align="center">Indoor</th>
		<th rowspan="2" align="center" >Outdoor</th>
		<th rowspan="2" align="center" >Indoor Pending</th>
		<th rowspan="2" align="center" >Outdoor Pending</th>
		<th colspan="2" align="center">Parts Pending</th>
		<th rowspan="2" align="center">Decision Pending</th>
		<th rowspan="2" align="center">Red Color Indicates More than 40</th>
		<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
		<th rowspan="2" align="center">5 Days Over Pending</th>
	</tr>
	<tr>
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		
	</tr>
	
		
		 ';
		
		
			 $output.='
			
			<td><?php echo $i++ ?></td>
			<td>Zone</td>
			<td>WSMS FENI</td>
			<td>'.$row['fridge_rcvin'].'</td>
			<td>'.$row['fridge_rcvout'].'</td>
			<td>'.$row['fridge_wdonein'].'</td>
			<td>'.$row['fridge_inpending'].'</td>
			<td>'.$row['fridge_outpending'].'</td>
			<td>'.$row['fridge_intransit'].'</td>
			<td>'.$row['fridge_parts_pending'].'</td>
			<td>'.$row['fridge_decision'].'</td>
			<td>'.$row['fridge_red_color'].'</td>
			<td>'.$row['fridge_soft_wise'].'</td>
			<td>'.$row['fridge_5days'].'</td>
			
			<td>'.$row['tv_rcvin'].'</td>
			<td>'.$row['tv_rcvout'].'</td>
			<td>'.$row['tv_wdonein'].'</td>
			<td>'.$row['tv_inpending'].'</td>
			<td>'.$row['tv_outpending'].'</td>
			<td>'.$row['tv_intransit'].'</td>
			<td>'.$row['tv_parts_pending'].'</td>
			<td>'.$row['tv_decision'].'</td>
			<td>'.$row['tv_red_color'].'</td>
			<td>'.$row['tv_soft_wise'].'</td>
			<td>'.$row['tv_5days'].'</td>


			<td>'.$row['emh_rcvin'].'</td>
			<td>'.$row['emh_rcvout'].'</td>
			<td>'.$row['emh_wdonein'].'</td>
			<td>'.$row['emh_inpending'].'</td>
			<td>'.$row['emh_outpending'].'</td>
			<td>'.$row['emh_intransit'].'</td>
			<td>'.$row['emh_parts_pending'].'</td>
			<td>'.$row['emh_decision'].'</td>
			<td>'.$row['emh_red_color'].'</td>
			<td>'.$row['emh_soft_wise'].'</td>
			<td>'.$row['emh_5days'].'</td>		

			<td>'.$row['mobile_rcvin'].'</td>
			<td>'.$row['mobile_rcvout'].'</td>
			<td>'.$row['mobile_wdonein'].'</td>
			<td>'.$row['mobile_inpending'].'</td>
			<td>'.$row['mobile_outpending'].'</td>
			<td>'.$row['mobile_intransit'].'</td>
			<td>'.$row['mobile_parts_pending'].'</td>
			<td>'.$row['mobile_decision'].'</td>
			<td>'.$row['mobile_red_color'].'</td>
			<td>'.$row['mobile_soft_wise'].'</td>
			<td>'.$row['mobile_5days'].'</td>

			<td>'.$row['lap_rcvin'].'</td>
			<td>'.$row['lap_rcvout'].'</td>
			<td>'.$row['lap_wdonein'].'</td>
			<td>'.$row['lap_inpending'].'</td>
			<td>'.$row['lap_outpending'].'</td>
			<td>'.$row['lap_intransit'].'</td>
			<td>'.$row['lap_parts_pending'].'</td>
			<td>'.$row['lap_decision'].'</td>
			<td>'.$row['lap_red_color'].'</td>
			<td>'.$row['lap_soft_wise'].'</td>
			<td>'.$row['lap_5days'].'</td>			
			
			
			
		</tr>
		</table>
			 ';
			
		
		 $output.='</table>';
		 header("Content-type:application/xls");
		 header("Content-Disposition:attachment; filename=download.xls");
		 echo $output;
	 }
	 
 
 
?>