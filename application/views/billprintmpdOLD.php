 <html>
	<head>
		<meta charset="utf-8">
		<title>Bill of Supply</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<style >
		/* reset */

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

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
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

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

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
			<h1 style="font-size:20px;">Bill of Supply</h1>
			<?php foreach ($company as $rscompany)
			{
				$bill_no=$rscompany['bill_no'] ;
				$bill_date=$rscompany['bill_date'] ;
				$netval=$rscompany['netval'] ;
				
				 $company_name=$rscompany['company_name'] ;
				$address1=$rscompany['address1'] ;$address2=$rscompany['address2'] ;$address3=$rscompany['address3'] ;
				$mobileno=$rscompany['mobileno'] ;$gstno=$rscompany['gstno'] ;$state=$rscompany['state'] ;
				
				
				
			} 
			?>    
			 <?php foreach ($masaccounts as $rsmasaccounts)
			{
				$address=$rsmasaccounts['address'] ;$ac_name=$rsmasaccounts['ac_name'] ;$contactno=$rsmasaccounts['contactno'] ;
				$email=$rsmasaccounts['email'] ;$gst=$rsmasaccounts['gst'] ;$clos_bal=$rsmasaccounts['clos_bal'] ;
			} 
			?> 
			<table border="1">
			<tr>
			 
			 <td width="100%">
					
			<address contenteditable>
			    <p style="font-size:20px;" align="center"><?php echo $company_name; ?></p>
				<p style="font-size:10px;" align="center"><?php echo $address1.' '.$address2.' '.$address3; ?></p>
				<p style="font-size:10px;" align="center"><?php echo 'Conact Nos.'.$mobileno; ?></p>
			 				
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
					<p style="font-size:10px;" align="left"><?php echo 'Conact Nos.'.$contactno; ?></p>
					 
				
				</address>
            </td>
            <td  width="25%">			
					<table>
						<tr>
							<th>Bill #</th>
							<td><b><span contenteditable><?php echo $bill_no; ?></span></b</td>
						</tr>
						<tr>
							<th>Bill Date</th>
							<td><span contenteditable><?php echo $bill_date; ?></span></td>
						</tr>
						<tr>
							<th>Bill Amount</th>
							<td><span contenteditable>₹<?php echo $netval; ?></span></td>
							
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
					    <th><span >S.No</span></th>					    
						<th><span contenteditable>Particulars</span></th>	
						<th>₹<span>Amount</span></th>
					</tr>
				</thead>
				<tbody>  
				<?php $i=1; foreach ($client as $clientt) :  ?>    
	        <tr>
						<td><?php echo $i; ?></td>						
						<td><span contenteditable><?php echo $clientt['task_name'] ; ?></span></td>								
						<td>₹<span contenteditable> <?php echo $clientt['rate'] ; ?> </span></td>						
					</tr>
    
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
				
					
				</tbody>
			</table>
			
			
			
			
			
			
		 
			<table class="balance">
				<tr>
					<th><span contenteditable>Bill Amount</span></th>
					<td><span id="prefix" contenteditable>₹</span><span><?php echo $netval; ?></span></td>
				</tr>
				 
				<tr>
					<th><span contenteditable>Total Balance </span></th>
					<td><span data-prefix>₹</span><span>
					<?php 
					          
					    if( $closbal<0) {echo abs($closbal).'Dr';} else { echo abs($closbal).'Cr';} 
					       
					   ?>
					</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span contenteditable></span></h1>
			
		</aside>
	 
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