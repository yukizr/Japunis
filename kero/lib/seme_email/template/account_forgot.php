<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!-- If you delete this meta tag, Half Life 3 will never be released. -->
		<meta name="viewport" content="width=device-width" />
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Lupa Password #{{order_id}}</title>
		
		<link rel="stylesheet" type="text/css" href="https://jangiman.com/assets/css/email.min.css" />
		
	</head>
	
	<body bgcolor="#FFFFFF">
		
		<!-- HEADER -->
		<table class="head-wrap" bgcolor="#dd1818">
			<tr>
				<td></td>
				<td class="header container" >
					
					<div class="content">
						<table bgcolor="#dd1818">
							<tr>
								<td><img src="https://jangiman.com/assets/img/jangiman-logo-wide.png" /></td>
								<td align="right"><h6 class="collapse">Lupa Password #{{order_id}}</h6></td>
							</tr>
						</table>
					</div>
					
				</td>
				<td></td>
			</tr>
		</table><!-- /HEADER -->
		
		
		<!-- BODY -->
		<table class="body-wrap">
			<tr>
				<td></td>
				<td class="container" bgcolor="#FFFFFF">
					
					<div class="content">
						<table>
							<tr>
								<td>
									<h3>Hi, {{fnama}}</h3>
									<p class="lead">Terimakasih anda sudah mempercayakan titip beli makanan di JangIman.com.</p>
									<p class="lead">Resi pemesanan anda sudah dibuat dengan TranID <a href="https://jangiman.com/account/orderan/{{order_id}}">#{{order_id}}</a>.</p>
									<p class="lead">Silakan transfer ke rekening ini sejumlah <b>{{order_total}}</b>,</p>
									<p class="lead">Sebelum hari <strong>{{date_expire}}</strong>.</p>
									<table class="" border="1" cellpadding="1" cellspacing="2">
										<thead>
											<tr>
												<th>Bank</th>
												<th>No Rekening</th>
												<th>Atas Nama</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="text-align:center">{{bank_nama}}</td>
												<td style="text-align:center">{{bank_norek}}</td>
												<td style="text-align:center">{{bank_an}}</td>
											</tr>
										</tbody>
									</table>
									<br />
									<br />
									<p class="callout">
										Jika sudah transfer, segera lakukan <a href="https://jangiman.com/konfirmasi/{{order_id}}">konfirmasi</a>, supaya bisa kami proses lebih cepat.
									</p>	
									<br />
									<!-- social & contact -->
									<table class="social" width="100%">
										<tr>
											<td>
												
												<!-- column 1 -->
												<table align="left" class="column">
													<tr>
														<td>
															
															<h5 class="">Ikuti kami di:</h5>
															<p class="">
																<a href="https://www.facebook.com/jangimandotcom/" class="soc-btn fb">Facebook</a>
																<a href="https://twitter.com/jangimandotcom" class="soc-btn tw">Twitter</a>
																<a href="https://instagram.com/jangimandotcom" class="soc-btn gp">Instagram</a>
															</p>
															
														</td>
													</tr>
												</table><!-- /column 1 -->	
												
												<!-- column 2 -->
												<table align="left" class="column">
													<tr>
														<td>				
															
															<h5 class="">Informasi:</h5>												
															<p>Phone: <strong>+62 813 2001 2157</strong><br/>
															Email: <strong><a href="emailto:hi@jangiman.com">hi@jangiman.com</a></strong></p>
															
														</td>
													</tr>
												</table><!-- /column 2 -->
												
												<span class="clear"></span>	
												
											</td>
										</tr>
									</table><!-- /social & contact -->
									
								</td>
							</tr>
						</table>
					</div><!-- /content -->
					
				</td>
				<td></td>
			</tr>
		</table><!-- /BODY -->
		
		<!-- FOOTER -->
		<table class="footer-wrap">
			<tr>
				<td></td>
				<td class="container">
					
					<!-- content -->
					<div class="content">
						<table>
							<tr>
								<td align="center">
									<p>
										<a href="https://jangiman.com/dukungan/syarat-ketentuan">Syarat dan Ketentuan</a> |
										<a href="https://jangiman.com/dukungan/kebijakan-privasi">Kebijakan Privasi</a> |
										<a href="https://jangiman.com/account/seting/email"><unsubscribe>Unsubscribe</unsubscribe></a>
									</p>
								</td>
							</tr>
						</table>
					</div><!-- /content -->
					
				</td>
				<td></td>
			</tr>
		</table><!-- /FOOTER -->
		
	</body>
</html>