<?php
require('top.inc.php');
$categories_id='';
$name='';
$price='';
$qty='';
$description	='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from event where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['class_id'];
		$name=$row['name'];

		$price=$row['dat'];
		$qty=$row['qty'];

		$description=$row['description'];


	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$name=get_safe_value($con,$_POST['name']);

	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['qty']);

	$description=get_safe_value($con,$_POST['description']);

	
	$res=mysqli_query($con,"select * from event where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Event already exist";
			}
		}else{
			$msg="Event already exist";
		}
	}

	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){

            $update_sql="update event set class_id='$categories_id',name='$name',dat='$price',qty='$qty',description='$description' where id='$id'";
            mysqli_query($con,$update_sql);
        }

		else{
			mysqli_query($con,"insert into event(class_id,name,dat,qty,description,status) values('$categories_id','$name','$price','$qty','$description',1)");
		}
		header('location:product.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Event</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Class</label>
									<select class="form-control" name="categories_id">
										<option>Select Class</option>
										<?php
										$res=mysqli_query($con,"select id,classr from classr order by classr asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['classr']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['classr']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Event Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
								</div>
								

								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Date</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Attendee#</label>
									<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty?>">
								</div>


								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>