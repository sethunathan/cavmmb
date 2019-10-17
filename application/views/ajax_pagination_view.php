 <?php if(!empty($client1)): foreach($client1 as $post): ?>
     <div class="list-item"><a href="javascript:void(0);"><h2><?php echo $post['ac_name']; ?></h2></a></div>
 <?php endforeach; else: ?>
 <p>Post(s) not available.</p>
 <?php endif; ?>
 <?php echo $this->ajax_pagination->create_links(); ?>
