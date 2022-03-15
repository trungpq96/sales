<?php 
	//ket noi voi CSDL 
	$dbc = mysqli_connect("localhost","root","hyckuot996","db_sales");
	mysqli_set_charset($dbc, 'UTF8');

	//neu ket noi khong thanh cong thi bao loi ra trinh duyet
	if (!$dbc) {
		trigger_error("Could not connect to DB: " . mysqli_connect_error());
	}else{
		//dat phuong thuc ket noi la utf-8
		mysqli_set_charset($dbc,'utf-8');
	}
 ?>