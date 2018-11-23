<?php
	require('fpdf181/fpdf.php');
	include '../includes/db.php';
	$orderId=$_GET['order_id'];
	$date=date("Y/m/d");
	
							



			$run_pro=$con->query("select * from `invoice_info` where id='$orderId'");
		
			$row=mysqli_fetch_array($run_pro);
						$customerId=$row['customer_id'];
						$name=$row['card_name'];
						$address=$row['card_address'];
						$method=$row['paid_via'];
						$contact=$row['phone'];
						$ptotal=$row['total_price'];
						
						$pIDs=$row['product_names'];
						$pQtys=$row['product_qtys'];

		$p_ids = explode(",", $pIDs);
		$p_qtys = explode(",", $pQtys);
		$p_Size=sizeof($p_ids);

		$run_pro2=$con->query("select * from `customer` where customer_id='$customerId'");
			$row2=mysqli_fetch_array($run_pro2);
						$city=$row2['customer_city'];
						
		$tprice=round(($ptotal*100)/115, 0);
		$percentage = 15;
		$p_price = round(($percentage / 100) * $tprice,0);				

	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',14);

	$pdf->Cell(120,5,'VPN COMPUTERS',0,0);
	$pdf->Cell(69,5,'CUSTOMER INVOICE',0,1);

	$pdf->Cell(120,5,'',0,0);
	$pdf->Cell(69,5,'',0,1);

	$pdf->Cell(120,5,'Address :'.$address,0,0);
	$pdf->Cell(69,5,'Invoice No: '.$orderId,0,1);

	$pdf->Cell(120,5,'City :'.$city,0,0);
	$pdf->Cell(69,5,'Customer Name :'.$name,0,1);

	$pdf->Cell(120,5,'Contact No :'.$contact,0,0);
	$pdf->Cell(69,5,'Date of Order :'.$date,0,1);

	$pdf->Cell(189,5,'',0,1);

	$pdf->Cell(120,5,'',0,0);
	$pdf->Cell(69,5,'Payment By :'.$method,0,1);

	$pdf->Cell(120,5,'',0,0);
	$pdf->Cell(69,5,'',0,1);

	$pdf->Cell(189,5,'',0,1);
	$pdf->Cell(189,5,'',0,1);
	$pdf->Cell(189,5,'',0,1);
	$pdf->Cell(189,5,'',0,1);

	$pdf->SetFont('Arial','B',12);

	/*start*/
	$pdf->Cell(20,5,'Item No.',1,0,'C');
	$pdf->Cell(80,5,'Description',1,0,'C');
	$pdf->Cell(20,5,'Quantity',1,0,'C');
	$pdf->Cell(30,5,'Price',1,0,'C');
	$pdf->Cell(39,5,'Total',1,1,'C');

	$pdf->SetFont('Arial','',12);


	for ($i=0; $i <$p_Size; $i++) { 
		$pdf->Cell(20,5,''.($i+1),1,0);
		$run_pro3=$con->query("select * from `products` where product_id='$p_ids[$i]'");
			$row3=mysqli_fetch_array($run_pro3);
		$pdf->Cell(80,5,''.$row3['product_title'],1,0);
		$pdf->Cell(20,5,''.$p_qtys[$i],1,0,'C');
		$pdf->Cell(30,5,''.$row3['product_price'],1,0,'C');
		$pdf->Cell(39,5,''.($p_qtys[$i]*$row3['product_price']),1,1,'C');
	}
	/*$pdf->Cell(20,5,'',1,0);
	$pdf->Cell(80,5,'',1,0);
	$pdf->Cell(20,5,'',1,0,'C');
	$pdf->Cell(30,5,'',1,0,'C');
	$pdf->Cell(39,5,'',1,1,'R');

	$pdf->Cell(20,5,'',1,0);
	$pdf->Cell(80,5,'',1,0);
	$pdf->Cell(20,5,'',1,0,'C');
	$pdf->Cell(30,5,'',1,0,'C');
	$pdf->Cell(39,5,'',1,1,'R');

	$pdf->Cell(20,5,'',1,0);
	$pdf->Cell(80,5,'',1,0);
	$pdf->Cell(20,5,'',1,0,'C');
	$pdf->Cell(30,5,'',1,0,'C');
	$pdf->Cell(39,5,'',1,1,'R');

	$pdf->Cell(20,5,'',1,0);
	$pdf->Cell(80,5,'',1,0);
	$pdf->Cell(20,5,'',1,0,'C');
	$pdf->Cell(30,5,'',1,0,'C');
	$pdf->Cell(39,5,'',1,1,'R');
*/

	$pdf->SetFont('Arial','B',12);

	$pdf->Cell(120,5,'',0,0);
	$pdf->Cell(30,5,'SUBTOTAL',1,0);
	$pdf->Cell(10,5,'BDT '.$tprice,1,0);
	$pdf->Cell(29,5,'',1,1);

	$pdf->Cell(120,5,'',0,0);
	$pdf->Cell(30,5,'VAT(15%)',1,0);
	$pdf->Cell(10,5,'BDT '.$p_price,1,0);
	$pdf->Cell(29,5,'',1,1);

	$pdf->Cell(120,5,'',0,0);
	$pdf->Cell(30,5,'TOTAL',1,0);
	$pdf->Cell(10,5,'BDT '.$ptotal,1,0);
	$pdf->Cell(29,5,'',1,1);

	$pdf->Cell(189,5,'',0,1);
	$pdf->Cell(189,5,'',0,1);
	$pdf->Cell(189,5,'',0,1);
	$pdf->Cell(189,5,'',0,1);

	$pdf->SetFont('Arial','I',12);

	$pdf->Cell(30,5,'',0,0);
	$pdf->Cell(129,5,'Thanks for purchasing from VPN COMPUTERS!',0,0);
	$pdf->Cell(30,5,'',0,1);

	$pdf->Output();
?>