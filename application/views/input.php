<?php include 'body.php';?>
<div class="container">
    
 <!-- search box container starts  -->
 
    <div class="search">
        <div class="space"></div>
  <form action="" method="get">
    
      <div class="row">
       <div class="col-lg-10 col-lg-offset-1">
        <div class="input-group">
            
            <span class="input-group-addon" >BOOK SEARCH</span>
  <input autocomplete="off" id="search"  type="text" class="form-control input-lg" placeholder="Search Book name or Author " >
   
        </div>
       </div>
      </div>   
      <div class="space"></div>
  </form>
     </div>  
  <!-- search box container ends  -->
  
    
     <div id="txtHint" style="padding-top:50px; text-align:center;" ><b>Book information will be listed here...</b></div>
     
</div>
<script>
$(document).ready(function(){alert('s');
   $("#search").keyup(function(){
       var str=  $("#search").val();
       if(str == "") {
               $( "#txtHint" ).html("<b>Book information will be listed here...</b>"); 
       }else {
               $.get( "<?php echo base_url();?>client1/ajaxsearch?id="+str, function( data ){
                   $( "#txtHint" ).html( data );  
            });
       }
   });  
});  
</script>