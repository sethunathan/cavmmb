 <html>
	<head>
		<meta charset="utf-8">
		<title>Receipt Entry</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<style >
	 
*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background:green; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address {   font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: left; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 100%;  }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) {  text-align: center; }
table.inventory td:nth-child(2) { text-align: center;  }
table.inventory td:nth-child(3) { text-align: right; }
table.inventory td:nth-child(4) { text-align: right;  }
table.inventory td:nth-child(5) { text-align: right;}
table.inventory td:nth-child(6) { text-align: right;  }
table.inventory td:nth-child(7) { text-align: right; }
table.inventory td:nth-child(8) { text-align: right;  }
/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
		</style>
	</head>
	<body> 
		<header style=" margin-bottom: 1px;">
		<style>
		h2 {
  font-size: 72px;
  background: -webkit-linear-gradient(green, red);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
</style>
			<h1 style="font-size:20px;">Receipt Voucher</h1>
			
			<?php foreach ($company as $rscompany)
			{
				$vch_no=$rscompany['vch_no'] ;
				$vch_dt=$rscompany['vch_dt'] ;
				$cr_amt=$rscompany['cr_amt'] ;$ac_namee=$rscompany['ac_name'] ;
				 
				$company_name=$rscompany['company_name'] ;
				$address1=$rscompany['address1'] ;$address2=$rscompany['address2'] ;$address3=$rscompany['address3'] ;
				$mobileno=$rscompany['mobileno'] ;$gstno=$rscompany['gstno'] ;  $partner=$rscompany['partner'] ;
			} 
			?>    
			 <?php foreach ($masaccounts as $rsmasaccounts)
			{
				$address=$rsmasaccounts['address'] ;$ac_name=$rsmasaccounts['ac_name'] ;$contactno=$rsmasaccounts['contactno'] ;
				$email=$rsmasaccounts['email'] ;$gst=$rsmasaccounts['gst'] ;
			} 
			?> 
			  
			  
			<table border="1">
			<tr>
			<td  width="10%">
            <span><img style="width: 50px;height: 50px;" alt="" src="https://www.bahrain-icai.org/img/logo_download.jpg">
			<input type="file" accept="image/*">
			</span>	
			</td>
			 <td width="90%">
					
			<address contenteditable>
			    
			    <p style=" font-size:20px;background: -webkit-linear-gradient(blue,green);
				 -webkit-background-clip: text;
                 -webkit-text-fill-color: transparent;" align="center"><?php echo $company_name; ?></p>
				<p style="font-size:10px;" align="center"><?php echo $address1.' '.$address2.' '.$address3; ?></p>
				<p style="font-size:10px;" align="center"><?php echo $mobileno.' ,'.$gstno.' ,'.$state;; ?>.</p>
			 				
			</address>
            </address>
			</td></tr>
			</table>
			
			<table border="1">
			<tr>
			<td  width="75%">
			    <address contenteditable>
					<p style="font-size:15px;" align="left"><?php echo $ac_name; ?></p>
					<p style="font-size:10px;" align="left"><?php echo $address; ?></p>
					<p style="font-size:10px;" align="left"><?php echo $contactno; ?></p>
					<p style="font-size:10px;" align="left"><?php echo 'GST No:.'.$gst; ?></p>
					 				 
				
				</address>
            </td>
            <td  width="25%">			
					<table>
						<tr>
							<th>Voucher #</th>
							<td><b><?php echo $vch_no; ?></b</td>
						</tr>
						<tr>
							<th>Voucher Date</th>
							<td><?php echo $vch_dt; ?></td>
						</tr>
						 
						
					</table>
			</td></tr>
			</table>
 	     
 </header>
  
				
			<article>
			<table class="inventory">
				<thead>
					<tr>  
						 <th width="70%" align="center"><span contenteditable>Particulars</span></th>
					     <th width="30%" align="center"><span contenteditable>Amount</span></th>
					</tr>
				</thead>
				<tbody>  
				<tr>
				   <td><?php echo $ac_namee; ?> </td>
                
				   <td><?php  echo $cr_amt;?> </td>
                </tr>
                 <tr> <p style="font-size:10px;" align="center">
		 
						<th colspan="4"><span ><?php 
							$number=$cr_amt;
							$no = round($cr_amt);
    $decimal = round($number - ($no = floor($number)), 2) * 100;    
    $digits_length = strlen($no);    
    $i = 0;
    $str = array();
    $words = array(0 => '',1 => 'One',2 => 'Two',3 => 'Three', 4 => 'Four',
        5 => 'Five', 6 => 'Six', 7 => 'Seven',8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven',12 => 'Twelve', 13 => 'Thirteen',
        14 => 'Fourteen', 15 => 'Fifteen',16 => 'Sixteen',
        17 => 'Seventeen',18 => 'Eighteen', 19 => 'Nineteen',
        20 => 'Twenty', 30 => 'Thirty', 40 => 'Forty',
        50 => 'Fifty', 60 => 'Sixty',70 => 'Seventy',
        80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
            $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
        } else {
            $str [] = null;
        }  
    }
    $Rupees = implode(' ', array_reverse($str));
    $paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
    echo ($Rupees ? 'Rupees: ' . $Rupees : '') . $paise . " Only";
							
							 ?></span> </th>
                         
                          
                         
                        </p>						
						 			
			</tr>
 
				
					
				</tbody>
			</table>
	
		   
			<table>
			    <tr> 
               				
                <td  width="20%">
                    <table>	
                        <td colspan="2">
						           <p style="font-size:10px;" align="center">Amount Details</p> 	
						   </td>					
					   
						 <tr>
							<th><span contenteditable>Receipt Amount</span></th>
							<td><span id="prefix" contenteditable></span><span>
							  <p style="font-size:12px;font-weight: bold;" align="right">₹<?php  echo $cr_amt; ?></p></span></td>
					    </tr>
						  
					</table>
				</td>
				 <td  width="20%">
                  <table>	
					    <tr>
                           <td colspan="2">
						           <p style="font-size:10px;" align="center">For <?php echo $company_name; ?></p> 	
						    </td>
							</tr>
							<tr>
							<td  colspan="2">
							<br>
							<br>
							<br>
							<br><br><br><br><br><br>
							</td>
							</tr>
							<tr> 
							<td   colspan="2">  <p   align="right"><?php echo $partner; ?></p>
							</td>
                        </tr>						   
					     
					</table>	
                </td>					
				</tr>
			</table>
			
 		</article>
		 
	 
	</body>
</html>