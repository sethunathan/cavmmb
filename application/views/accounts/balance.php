<script>
function contact(){
	
var number = $('#mobile').val() ;
var contactnoo = $('#contactnoo').val() ;
var address = $('#address').val() ;
var kulam = $('#kulam').val() ;
var god = $('#god').val() ;
var kgp = $('#kgp').val() ;
var emailid = $('#emailid').val() ;
var nplace = $('#nplace').val() ;
var pplace = $('#pplace').val() ;
var fathername = $('#fathername').val() ;
var mothername = $('#mothername').val() ;
$.ajax({
        type: 'POST',
        url: '<?php echo site_url("userr/home/increase")?>',
        data: { kulam:kulam,god:god,kgp:kgp,
	    address:address,emailid:emailid,nplace:nplace,pplace:pplace,contactnoo:contactnoo,fathername:fathername,mothername:mothername },
        success:function(response){
			alert(response);
            $('#break').html(response);
            //$('#casteee').html(caste);
			//$('#subcasteee').html(subcaste);
			//$('#kulammm').html(kulam);
        }
		
});
}
</script>

<?php
	$id=$this->session->userdata('user_id');
    $result = mysql_query("SELECT contactno,contactno1,emailid,fathername,
	mothername,address,agent_id from user WHERE user_id = ".$id.""); 
	$row = mysql_fetch_row($result);
	$contactno= $row[0];$contactno1= $row[1];$emailid= $row[2];$fathername= $row[3];$mothername= $row[4];$address= $row[5];$agent_code= $row[6];
?>
<!-- Modal -->
<div class="container">
    <div class="row">
        <div class="col-sm-2  col-m-8 col-lg-8">
						<form class="form-horizontal">
							<fieldset>
							
							
										<table>
		 <tr>
		 <?php 
		    if (($agent_code)!=9) {
		 ?>
				    <td><label>தொடர்பு எண்:I-<label></td></tr>
					<tr>
				    <td><input class="form-control" readonly pattern="[0-9]{10,10}"  value="<?php echo $contactno;?>"  placeholder="Enter a valid mobile no" 
					name="mobile" maxlength="10" id="mobile" type="tel" />
					</td></tr>
					<tr><td>Edit Customer Care</td></tr>
		          
		 <tr>
				    <td><label>தொடர்பு எண்:II</label></td></tr><tr>
				    <td><input   class="form-control" value="<?php echo $contactno1;?>"  placeholder="Enter a valid mobile no"  
					name="contactnoo"  id="contactnoo" type="tel" /></td>
		</tr>
		 <?php 
		    }
		 ?>
		
		<tr>
				    <td><label>இ-மெயில் id</label></td></tr><tr>
				    <td><input class="form-control"  readonly value="<?php echo $emailid;?>"  placeholder=""  name="emailid"   id="emailid" type="email" />Edit Customer Care</td>
		</tr>
			<tr>
				    <td><label>தந்தை பெயர்</label></td></tr><tr>
				    <td>
					<textarea class="form-control" id="fathername" name="fathername"cols="25" rows="2"><?php echo $fathername;?> </textarea></td>
			
		</tr>
		<tr>
				    <td><label>தாயார் பெயர்</label></td></tr><tr>
				    <td>
					<textarea  class="form-control" id="mothername" name="mothername"cols="25" rows="2"><?php echo $mothername;?> </textarea></td>
			
		</tr>
		
		<tr>
				    <td><label>முகவரி</label></td></tr><tr>
				    <td>
					<textarea class="form-control" id="address" name="address"cols="25" rows="6"><?php echo $address;?> </textarea></td>
			
		</tr>
		<tr>
		 <td><label>ஜாதி தேர்வு செய்யவும்</label></td></tr><tr>
		<td>
		<select class="form-control" id="kulam" name="kulam"><option value="Select" selected>ஜாதி தேர்வு செய்யவும்</option>		  
		    <?php
			                $previousCountry = null;
							$id=$this->session->userdata('user_id');
                            $result = mysql_query("SELECT kulam_tamil from kulam left outer join 
							user on user.kulam_id=kulam.kulam_id WHERE user_id = ".$id.""); 
                            $row = mysql_fetch_row($result);//print_r($row);exit();
                            $rasii= $row[0];
						   
							$this->db->select('kulam_tamil,CONCAT(caste_tamil, " ",subcaste_tamil) as castex',FALSE);
							$this->db->order_by('caste_tamil,subcaste_tamil,kulam_tamil');       
                           // $castxe= $this->db->get('edu');	
                            $this->db->from('caste');
                            $this->db->join('subcaste', 'caste.caste_id = subcaste.casteid');	
							$this->db->join('kulam', 'subcaste.subcaste_id = kulam.subcasteid');	
                            $castxe = $this->db->get();							 
foreach ($castxe->result() as $airport) {
    if ($previousCountry != $airport->castex) {
        // close the previous optgroup tag only if this isn't our first time through the loop
        if ($previousCountry !== null) {
            echo '</optgroup>';
        }
        echo '<optgroup label="'.$airport->castex.'">';
    }
	
	echo "<option value= '$airport->kulam_tamil'";
							   if($rasii==$airport->kulam_tamil) {echo "selected";}
				               echo ">$airport->kulam_tamil</option>";
    
    $previousCountry = $airport->castex;
}

if ($previousCountry !== null) {
    echo '</optgroup>';
}?>
			</select>	
		</td> 
		<tr><td><label>குலதெய்வம்:</label></td></tr><tr>
				    <td>
					<select  class="form-control" id="god" name="god">		 <option value="Select" selected>தேர்வு செய்யவும்</option>     
					    <?php
							 $user_id=$this->session->userdata('user_id');
							 
							$id=$this->session->userdata('user_id');
                            $result = mysql_query("SELECT god_tamil from god left outer join user on user.god_id=god.god_id WHERE user_id = ".$id.""); 
					        $row = mysql_fetch_row($result);//print_r($row);exit();
                            $castee= $row[0]; 
							$this->db->select('god_tamil'); $this->db->order_by('god_tamil');                          
                            $castxe= $this->db->get('god');	
							
							 $row = mysql_fetch_row($result);
							 
	                        						
				            foreach($castxe->result() as $data)
				             {
				               echo "<option value= '$data->god_tamil'";
							   if($castee==$data->god_tamil) {echo "selected";}
				               echo ">$data->god_tamil</option>";
				              } 
							  ?>  </select>
					</td>
				  </tr>		  
		<tr><td><label>குலதெய்வம் ஊர்:</label></td></tr><tr>
				    <td>
					<select  class="form-control" id="kgp" name="kgp">		 <option value="Select" selected>தேர்வு செய்யவும்</option>     
					    <?php
							 $user_id=$this->session->userdata('user_id');
							 
							$id=$this->session->userdata('user_id');
                            $result = mysql_query("SELECT kgp_tamil from kgp inner join user on user.kgp_id=kgp.kgp_id WHERE user_id = ".$id.""); 
					        $row = mysql_fetch_row($result);//print_r($row);exit();
                            $castee= $row[0]; 
							$this->db->select('kgp_tamil');  $this->db->order_by('kgp_tamil');                         
                            $castxe= $this->db->get('kgp');	
							
							 $row = mysql_fetch_row($result);
							 
	                        						
				            foreach($castxe->result() as $data)
				             {
				               echo "<option value= '$data->kgp_tamil'";
							   if($castee==$data->kgp_tamil) {echo "selected";}
				               echo ">$data->kgp_tamil</option>";
				              } 
							  ?>  </select>
					</td>
				  </tr>		  		  
		
		<tr> <td><label>பூர்விக வட்டம்</label></td></tr><tr>
				    <td>
					<select  class="form-control" id="nplace" name="nplace">	 <option value="Select" selected>தேர்வு செய்யவும்</option>	     

                       <?php
			$previousCountry = null;
			                $id=$this->session->userdata('user_id');
                             $result = mysql_query("SELECT place_tamil from place inner join user on user.nativeplace_id=place.place_id WHERE user_id = ".$id.""); 
					        $row = mysql_fetch_row($result);//print_r($row);exit();
                            $rasii= $row[0]; 
							$this->db->select('place_tamil,placegroup'); $this->db->order_by('placegroup,place_id');       
                            $castxe= $this->db->get('place');	        
foreach ($castxe->result() as $airport) {
    if ($previousCountry != $airport->placegroup) {
        // close the previous optgroup tag only if this isn't our first time through the loop
        if ($previousCountry !== null) {
            echo '</optgroup>';
        }
        echo '<optgroup label="'.$airport->placegroup.'">';
    }
	
	echo "<option value= '$airport->place_tamil'";
							   if($rasii==$airport->place_tamil) {echo "selected";}
				               echo ">$airport->place_tamil</option>";
    
    $previousCountry = $airport->placegroup;
}

if ($previousCountry !== null) {
    echo '</optgroup>';
}?>					
					 </select>
					</td>
				  </tr>			  
				  
		<tr>
				   <td><label>வசிக்கும் வட்டம்</label></td></tr><tr>
				    <td>
					<select  class="form-control" id="pplace" name="pplace">	 <option value="Select" selected>தேர்வு செய்யவும்</option>
                         <?php
			$previousCountry = null;
			                $id=$this->session->userdata('user_id');
                             $result = mysql_query("SELECT place_tamil from place inner join user on user.presentplace_id=place.place_id WHERE user_id = ".$id.""); 
					        $row = mysql_fetch_row($result);//print_r($row);exit();
                            $rasii= $row[0]; 
							$this->db->select('place_tamil,placegroup'); $this->db->order_by('placegroup,place_id');       
                            $castxe= $this->db->get('place');	        
foreach ($castxe->result() as $airport) {
    if ($previousCountry != $airport->placegroup) {
        // close the previous optgroup tag only if this isn't our first time through the loop
        if ($previousCountry !== null) {
            echo '</optgroup>';
        }
        echo '<optgroup label="'.$airport->placegroup.'">';
    }
	
	echo "<option value= '$airport->place_tamil'";
							   if($rasii==$airport->place_tamil) {echo "selected";}
				               echo ">$airport->place_tamil</option>";
    
    $previousCountry = $airport->placegroup;
}

if ($previousCountry !== null) {
    echo '</optgroup>';
}?>										
					    </select>
					</td>
				 </tr><tr>				  
				  <td><button type="button"  onclick="contact()"  id="number" data-dismiss="modal" class="btn btn-primary">Save</button></td></tr>
	
				  </table>
						  </form>
				
				</div>
			</div>
			</div>
 