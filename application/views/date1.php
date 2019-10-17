<div class="txt-heading">Period </div>
<div class="brandSection"> 
<div id="rates">   
		 <?php							 
			$this->db->select('periodname,period_code');
			$this->db->order_by('period_code');
			$castxe= $this->db->get('masperiod');	
			$i=1;
			 foreach($castxe->result() as $data)
				             {
								 
								echo "<input type='radio'  class='addperiod' name='addperiod'  value= '$i'";
								if($i==$addperiod) {echo "checked";}
							    echo ">$data->periodname</input>";
								$i=$i+1;
				              } 
			?> </div>

</div>	 


<?php 
for($i=0;$i<12;$i++)
{?>
	 <input type="text" value ="<?php echo $daterange1[$i]?>"  
	 class="daterange"   name="daterange1[]"  id="daterangefrom_1"  ></input>
<?php }?>

<div id="container">
  
    <div class="box-body">
			
              <table class="someclass table table-bordered">
			  
                <tbody>
				
				
				<tr>
                  <th style="width: 10px">#</th>
                  <th>Date From-To</th>
                  <th>Due Date</th>
                 
                </tr>
           
			   <tr class="one" style="background-color:lightblue;">
                  <td>1</td>
                  <td>
				  <input type="text" value ="<?php echo $daterange1[0]?>"  class="daterange"   name="daterange1[]"  id="daterangefrom_1"  ></input>
                 <input type="text" value ="<?php echo $daterange2[0]?>" class="daterange"   name="daterange2[]"  id="daterangeto_1"  ></input></td>
				  <td><input type="text"  value ="<?php echo $singledate[0]?>" class="daterange"   name="singledate[]"  id="singledaterange_1"  ></input></td>
                </tr>
				
				<tr class="two" style="background-color:pink;">
                  <td>2.</td>
                  <td><input type="text"  class="daterange" value ="<?php echo $daterange1[1]?>"    name="daterange1[]"  id="daterangefrom_2"  ></input>
               <input type="text"  class="daterange" value ="<?php echo $daterange1[1]?>"   name="daterange2[]"  id="daterangeto_2"  ></input></td>
				  <td><input type="text"  class="daterange"  value ="<?php echo $singledate[1]?>"  name="singledate[]"  id="singledaterange_2"  ></input></td>
                </tr>
               <tr class="three" style="background-color:lightgreen;">
                  <td>3.</td>
                 <td><input type="text"  class="daterange" value ="<?php echo $daterange1[2]?>"   name="daterange1[]"  id="daterangefrom_3"  ></input>
                 <input type="text"  class="daterange" value ="<?php echo $daterange1[2]?>"   name="daterange2[]"  id="daterangeto_3"  ></input></td>
				  <td><input type="text"  class="daterange"  value ="<?php echo $singledate[2]?>"    name="singledate[]"  id="singledaterange_3"  ></input></td>
                <tr class="three" style="background-color:lightgreen;">
                  <td>4.</td>
                  <td><input type="text"  class="daterange" value ="<?php echo $daterange1[3]?>"   name="daterange1[]"  id="daterangefrom_4"  ></input>
               <input type="text"  class="daterange"  value ="<?php echo $daterange1[3]?>"  name="daterange2[]"  id="daterangeto_4"  ></input></td>
				  <td><input type="text"  class="daterange"  value ="<?php echo $singledate[3]?>"  name="singledate[]"  id="singledaterange_4"  ></input></td>
               <tr class="four" style="background-color:lightyellow;">
                  <td>5.</td>
                   <td><input type="text"  class="daterange"  value ="<?php echo $daterange1[4]?>"  name="daterange1[]"  id="daterangefrom_5"  ></input>
                  <input type="text"  class="daterange" value ="<?php echo $daterange1[4]?>"   name="daterange2[]"  id="daterangeto_5"  ></input></td>
				  <td><input type="text"  class="daterange"  value ="<?php echo $singledate[4]?>"  name="singledate[]"  id="singledaterange_5"  ></input></td>
                </tr>

				 
				<tr class="four" style="background-color:lightyellow;">
                  <td>6.</td>
                   <td><input type="text"  class="daterange" value ="<?php echo $daterange1[5]?>"   name="daterange1[]"  id="daterangefrom_6"  ></input>
                  <input type="text"  class="daterange"  value ="<?php echo $daterange1[5]?>"  name="daterange2[]"  id="daterangeto_6"  ></input></td>
				  <td><input type="text"  class="daterange" value ="<?php echo $singledate[5]?>"   name="singledate[]"  id="singledaterange_6"  ></input></td>
                   
                </tr>
               <tr class="four" style="background-color:lightyellow;">
                  <td>7.</td>
                  <td><input type="text"  class="daterange" value ="<?php echo $daterange1[6]?>"   name="daterange1[]"  id="daterangefrom_7"  ></input>
                  <input type="text"  class="daterange" value ="<?php echo $daterange1[6]?>"   name="daterange2[]"  id="daterangeto_7"  ></input></td>
				  <td><input type="text"  class="daterange" value ="<?php echo $singledate[6]?>"   name="singledate[]"  id="singledaterange_7"  ></input></td>
              <tr class="four" style="background-color:lightyellow;">
                  <td>8.</td>
                   <td><input type="text"  class="daterange" value ="<?php echo $daterange1[7]?>"   name="daterange1[]"  id="daterangefrom_8"  ></input>
                  <input type="text"  class="daterange"  value ="<?php echo $daterange1[7]?>"  name="daterange2[]"  id="daterangeto_8"  ></input></td>
				  <td><input type="text"  class="daterange" value ="<?php echo $singledate[7]?>"   name="singledate[]"  id="singledaterange_8"  ></input></td>
               <tr class="four" style="background-color:lightyellow;">
                  <td>9.</td>
                  <td><input type="text"  class="daterange" value ="<?php echo $daterange1[8]?>"   name="daterange1[]"  id="daterangefrom_9"  ></input>
                  <input type="text"  class="daterange" value ="<?php echo $daterange1[8]?>"  name="daterange2[]"  id="daterangeto_9"  ></input></td>
				  <td><input type="text"  class="daterange" value ="<?php echo $singledate[8]?>"   name="singledate[]"  id="singledaterange_9"  ></input></td>
                </tr> 
				<tr class="four" style="background-color:lightyellow;">
                  <td>10.</td>
                 <td><input type="text"  class="daterange" value ="<?php echo $daterange1[9]?>"   name="daterange1[]"  id="daterangefrom_10"  ></input>
                  <input type="text"  class="daterange" value ="<?php echo $daterange1[9]?>"   name="daterange2[]"  id="daterangeto_10"  ></input></td>
				  <td><input type="text"  class="daterange"   value ="<?php echo $singledate[9]?>"  name="singledate[]"  id="singledaterange_10"  ></input></td>
                </tr>
               <tr class="four" style="background-color:lightyellow;">
                  <td>11.</td>
                 <td><input type="text"  class="daterange" value ="<?php echo $daterange1[10]?>"   name="daterange1[]"  id="daterangefrom_11"  ></input>
                  <input type="text"  class="daterange" value ="<?php echo $daterange1[10]?>"   name="daterange2[]"  id="daterangeto_11"  ></input></td>
				  <td><input type="text"  class="daterange"  value ="<?php echo $singledate[10]?>"  name="singledate[]"  id="singledaterange_11"  ></input></td>
               <tr class="four" style="background-color:lightyellow;">
                  <td>12.</td>
                   <td><input type="text"  class="daterange" value ="<?php echo $daterange1[11]?>"  name="daterange1[]"  id="daterangefrom_12"  ></input>
                  <input type="text"  class="daterange"  value ="<?php echo $daterange1[11]?>"  name="daterange2[]"  id="daterangeto_12"  ></input></td>
				  <td><input type="text"  class="daterange" value ="<?php echo $singledate[11]?>"   name="singledate[]"  id="singledaterange_12"  ></input></td>
			  </tbody>
			  </table>
			  

    </div>	
            
 </div>
<script>
function callSubJobAction() {
	$("#loadersubIcon").show();	     
	
	var action =$("#flag").val(); 
	var subjobcode =$("#subjobcode").val(); 
	var addsubjobname =$("#addsubjobname").val();
	var addyearid = $(".addyearid:checked").val();	
	var jobcode = $(".addjobcode:checked").val();
	var addperiod = $(".addperiod:checked").val();
	 
 
    
	var adddaterange1 = $("input[name='daterange1[]']")
              .map(function(){return $(this).val();}).get();
			  
	var adddaterange2 = $("input[name='daterange2[]']")
              .map(function(){return $(this).val();}).get();
			  
	var addsingledate = $("input[name='singledate[]']")
              .map(function(){return $(this).val();}).get();
     
		
	//var editsubjobname =$("#txteditsubjobname_"+id).val()  ;    		
	 
	
	jQuery.ajax({
	url: '<?php echo site_url("job/subjoball")?>',
	data:{              action:action,
	                    subjobname:addsubjobname,
						yearid:addyearid,
						jobcode:jobcode,
						period:addperiod,
						daterange1:adddaterange1,
						daterange2:adddaterange2,
						singledate:addsingledate,
						subjobcode:subjobcode,
						},
	type: "POST",
	success:function(data){
     switch(action) {
			
			case "ADD":		
              alert(data);			
			break;
			case "EDIT":
				alert(data);	
					
			break;
			 
		}
		
		$("#txtsubjob").val('');
		$("#loadersubIcon").hide();
	}
	,error: function(xhr, status, error) {
	alert(error);
	}
	
	});
}
	
</script>

<script>
$(document).ready(function(){
  $('.daterange').mask('00/00/0000',{placeholder: "__/__/____"}); 
});
</script>
 
<script>
$(function(){
	 $(".one").show();
     $(".two").show();
	 $(".three").show();

	$(".brandSection").click(function ()
	    {
            var radioValue = $("input[name='addperiod']:checked").val(); 
			
			
		  switch(radioValue)
		  {
			
			case "1":			
				  $(".one").show();
                  $(".two").show();
				  $(".three").show();
				  $(".four").show();
			break;
			case "2":
				  $(".one").show();
                  $(".two").show();
				  $(".three").show();
				  $(".four").hide();
			break;
			case "3":
				  $(".one").show();
                  $(".two").show();
				  $(".three").hide();
				  $(".four").hide();
			break;
			case "4":
				  $(".one").show();
                  $(".two").hide();
				  $(".three").hide();
				  $(".four").hide();
			break;
		}
						 
      
			
			
			
	 });		
	 

});
</script>
<script src="<?php echo base_url(); ?>assests/select2/jquery.mask.js"></script>