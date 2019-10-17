
<?php
	if(!empty($booktable ))  
 { 
    
      $output = '';
      $outputdata = '';  
      $outputtail ='';

      $output .= '<div class="container">
                   <div class="table-responsive">
                   <table class="table table-bordered">
	                <thead>
                          <tr>
			      <th>Book No</th>
                              <th>Book Name</th>
                              <th>Author</th>
                              <th>Price</th>
 		          </tr>
				   
                   </thead>
                   <tbody>
                   ';
                  
      foreach ($booktable as $objects)    
	   {   
           $outputdata .= ' 
                
                    <tr> 
		            <td >'.$objects->ac_code.'</td>
		            <td >'.$objects->ac_name.'</td>
		            <td>'.$objects->contactno.'</td>
                            <td>'.$objects->contactno.'</td>
                    </tr> 
                
           ';
        //  echo $outputdata; 
                
          }  

         $outputtail .= ' 
                         </tbody>
                         </table>
                         </div>
                         </div> ';
         
         echo $output; 
         echo $outputdata; 
         echo $outputtail; 
 }  
 
 else  
 {  
      echo 'Data Not Found';  
 } 
 ?>
 
<?php include 'bodyfooter.php';?>

  
