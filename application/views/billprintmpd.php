 <html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
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
			<h1 style="font-size:20px;">Bill Of Supply</h1>
			
			<?php foreach ($company as $rscompany)
			{
				$bill_no=$rscompany['bill_no'] ;
				$bill_date=$rscompany['bill_date'] ;
				$netval=$rscompany['netval'] ;
				$roundoff =$rscompany['roundoff'] ;
				$company_name=$rscompany['company_name'] ;
				$address1=$rscompany['address1'] ;$address2=$rscompany['address2'] ;$address3=$rscompany['address3'] ;
				$mobileno=$rscompany['mobileno'] ;$gstno=$rscompany['gstno'] ;$state=$rscompany['state'] ;
				
				
				
			} 
			?>    
			 <?php foreach ($masaccounts as $rsmasaccounts)
			{
				$address=$rsmasaccounts['address'] ;$ac_name=$rsmasaccounts['ac_name'] ;$contactno=$rsmasaccounts['contactno'] ;
				$email=$rsmasaccounts['email'] ;$gst=$rsmasaccounts['gst'] ;
			} 
			?> 
			 <?php foreach ($masbank as $rsmasbank)
			{
				$bank_name=$rsmasbank['bank_name'] ;$bank_acno=$rsmasbank['bank_acno'] ;$ifsc=$rsmasbank['ifsc'] ;
				 
			} 
			?> 
			<table border="1">
			<tr>
			 <td width="100%">
					
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
							<th>Bill #</th>
							<td><b><?php echo $bill_no; ?></b</td>
						</tr>
						<tr>
							<th>Bill Date</th>
							<td><?php echo $bill_date; ?></td>
						</tr>
						<tr>
							<th>Place Of Supply</th>
							<td><?php echo "33-TamilNadu" ?></td>
						</tr>
						
					</table>
			</td></tr>
			</table>
 	     
 </header>
 
 
<script>
 $("#e2").select2({closeOnSelect:true}); 
</script>
 
	 
				
			<article>
			<table class="inventory">
				<thead>
					<tr>
					    <th width="8%"><span >S.No</span></th>					    
						<th width="72%" align="center"><span contenteditable>Item</span></th>
						 
						<th width="20%">₹<span>Price</span></th>
						 
					</tr>
				</thead>
				<tbody>  
				<?php $i=1; foreach ($client as $clientt) :  ?>    
	        <tr>
						<td><?php echo $i; ?></td>						
						<td><span ><?php echo $clientt['task_name'] ; ?></span></td>
						<td>₹<span><?php echo $clientt['rate']; ?> </span></td>						
					</tr>
    
  <?php $i=$i+1; ?>
  <?php endforeach ; ?>
            <tr> <p style="font-size:10px;" align="center">
			<?php foreach ($gstt as $rsgst) : ?>
						<th colspan="2"><span ><?php 
							$number=$netval;
							$no = round($netval);
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
                         
                         
                        <th>₹ <span ><?php echo $rsgst['sumrate'] ; ?></span></th>
                        </p>						
						 			
			</tr>
<?php endforeach ; ?>
				
					
				</tbody>
			</table>
	
		   
			<table>
			    <tr>
				 
				<td  width="40%">
					  <table>	
                        <tr>
						    <td colspan="2">
						        <p style="font-size:10px;" align="center">Bank Details</p> 	
						    </td>
                        </tr>						
					    <tr> 
							<th><span contenteditable>Bank Name:</span></th>
							<td><p style="font-size:12px;font-weight: bold;" align="center"><?php echo $bank_name; ?></p></td>
					    </tr>
						<tr> 
							<th><span contenteditable>Bank Account No:</span></th>
							<td><p style="font-size:11px;font-weight: bold;" align="center"><span id="prefix" contenteditable></span><span><?php echo $bank_acno; ?></span></p></td>
					    </tr>
						<tr> 
							<th><span contenteditable>Bank IFSC Code:</span></th>
							<td><p style="font-size:12px;font-weight: bold;" align="center"><span id="prefix" contenteditable></span><span><?php echo $ifsc; ?></span></p></td>
					    </tr>
						<tr>
					    <td colspan="2">
			    <p style="font-size:10px;" align="center">Thanks for doing business with us!!!</p> 
				  <p style="font-size:10px;" align="center">Your earliest payment very much appreciated and it makes us to serve you in a better manner!!!</p> 
			 </td>
						</tr>
						</table>
					    
                </td>
				<td  width="20%">
                    <table>	
					    <tr>
                           <td colspan="2">
						           <p style="font-size:10px;" align="center">Amount Details-UPI</p> 	
						    </td>
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
							<td   colspan="2">  <p   align="right">Partner</p>
							</td>
                        </tr>						   
					     
					</table>	
                </td>					
                <td  width="20%">
                    <table>	
                        <td colspan="2">
						           <p style="font-size:10px;" align="center">Amount Details</p> 	
						   </td>					
					    <tr> 
							<th><span contenteditable>Round Off.</span></th>
							<td><span id="prefix" contenteditable></span><span><p   align="right">₹<?php  echo $roundoff; ?></p></span></td>
					    </tr>
						 <tr>
							<th><span contenteditable>Bill Amount</span></th>
							<td><span id="prefix" contenteditable></span><span>
							  <p style="font-size:12px;font-weight: bold;" align="right">₹<?php  echo $netval; ?></p></span></td>
					    </tr>
						 <tr>
							<th><span contenteditable>Previous Balance</span></th>
							<td><span id="prefix" contenteditable></span><span><?php 						
							  $prebal=abs($closbal)-$netval;
							?> <p   align="right">₹<?php  echo $prebal; ?></span></td>
					    </tr>
					   
					    <tr>
							<th><span contenteditable>Closing  Balance </span></th>
							<td><span data-prefix></span>
							 <span>
								
							   <p   align="right">₹<?php  echo abs($closbal); ?>
							</span>
							</td>
						 </tr>
					</table>
				</td>
								
				</tr>
			</table>
			
 		</article>
		 
	
		<script>
		(function (document) {
	var
	head = document.head = document.getElementsByTagName('head')[0] || document.documentElement,
	elements = 'article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output picture progress section summary time video x'.split(' '),
	elementsLength = elements.length,
	elementsIndex = 0,
	element;

	while (elementsIndex < elementsLength) {
		element = document.createElement(elements[++elementsIndex]);
	}

	element.innerHTML = 'x<style>' +
		'article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}' +
		'audio[controls],canvas,video{display:inline-block}' +
		'[hidden],audio{display:none}' +
		'mark{background:#FF0;color:#000}' +
	'</style>';

	return head.insertBefore(element.lastChild, head.firstChild);
})(document);



/* Update Invoice
/* ========================================================================== */
 

/* Prototyping
/* ========================================================================== */

(function (window, ElementPrototype, ArrayPrototype, polyfill) {
	function NodeList() { [polyfill] }
	NodeList.prototype.length = ArrayPrototype.length;

	ElementPrototype.matchesSelector = ElementPrototype.matchesSelector ||
	ElementPrototype.mozMatchesSelector ||
	ElementPrototype.msMatchesSelector ||
	ElementPrototype.oMatchesSelector ||
	ElementPrototype.webkitMatchesSelector ||
	function matchesSelector(selector) {
		return ArrayPrototype.indexOf.call(this.parentNode.querySelectorAll(selector), this) > -1;
	};

	ElementPrototype.ancestorQuerySelectorAll = ElementPrototype.ancestorQuerySelectorAll ||
	ElementPrototype.mozAncestorQuerySelectorAll ||
	ElementPrototype.msAncestorQuerySelectorAll ||
	ElementPrototype.oAncestorQuerySelectorAll ||
	ElementPrototype.webkitAncestorQuerySelectorAll ||
	function ancestorQuerySelectorAll(selector) {
		for (var cite = this, newNodeList = new NodeList; cite = cite.parentElement;) {
			if (cite.matchesSelector(selector)) ArrayPrototype.push.call(newNodeList, cite);
		}

		return newNodeList;
	};

	ElementPrototype.ancestorQuerySelector = ElementPrototype.ancestorQuerySelector ||
	ElementPrototype.mozAncestorQuerySelector ||
	ElementPrototype.msAncestorQuerySelector ||
	ElementPrototype.oAncestorQuerySelector ||
	ElementPrototype.webkitAncestorQuerySelector ||
	function ancestorQuerySelector(selector) {
		return this.ancestorQuerySelectorAll(selector)[0] || null;
	};
})(this, Element.prototype, Array.prototype);

/* Helper Functions
/* ========================================================================== */

function generateTableRow() {
	var emptyColumn = document.createElement('tr');

	emptyColumn.innerHTML = '<td><a class="cut">-</a><span contenteditable></span></td>' +
		'<td><span contenteditable></span></td>' +
		'<td><span data-prefix>$</span><span contenteditable>0.00</span></td>' +
		'<td><span contenteditable>0</span></td>' +
		'<td><span data-prefix>$</span><span>0.00</span></td>';

	return emptyColumn;
}

function parseFloatHTML(element) {
	return parseFloat(element.innerHTML.replace(/[^\d\.\-]+/g, '')) || 0;
}

function parsePrice(number) {
	return number.toFixed(2).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1,');
}

 

		</script>
	</body>
</html>