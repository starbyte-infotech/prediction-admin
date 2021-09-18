<?php 
include('../config.php');
if(isset($_POST['action']) && !empty($_POST['action']) == 'load_category_data') {

	$match_title = $_POST['match_title'];
	$selcat="SELECT * FROM `tbl_category` WHERE `match_title` = '$match_title'";
    $res_cat = mysqli_query($conn,$selcat);
    $fetch_data = mysqli_fetch_assoc($res_cat); ?>

    <h4 class="card-title">Edit Category</h4>

	<form class="forms-sample" method="POST" enctype="multipart/form-data">
	    <div class="row">
	        <div class="form-group col-12">
	            <label for="exampleFormControlSelect1">Select Category Title</label>
	            <select class="form-control form-control-lg" id="match_title" name="match_title" >
	              <option <?php echo $fetch_data['match_title']; ?>><?php echo $fetch_data['match_title']; ?></option>
	               
	              
	            </select>
	          </div>
	    </div>
	    <div class="row">
	        <div class="form-group col-6">
	            <label for="exampleInputName1">Heading</label>
	            <input type="text" class="form-control" id="exampleInputName1" name="heading"
	                placeholder="Heading" value="<?php echo $fetch_data['heading']; ?>">
	        </div>
	        <div class="form-group col-6">
	            <label for="exampleInputEmail3">Result Time</label>
	            <input type="datetime-local" class="form-control" id="exampleInputEmail3"
	                placeholder="Result Time"name="res_time" value="<?php echo $fetch_data['res_time']; ?>">
	        </div>
	    </div>
	    <div class="row">
	        <div class="form-group col-6">
	            <label for="exampleInputName1">Poster-1</label>
	            <input type="text" class="form-control" id="exampleInputName1"
	                placeholder="Poster 1" name="poster_1" value="<?php echo $fetch_data['poster_1']; ?>">
	        </div>
	        <div class="form-group col-6">
	            <label for="exampleInputEmail3">Poster-2</label>
	            <input type="text" class="form-control" id="exampleInputEmail3"
	                placeholder="Poster 2" name="poster_2" value="<?php echo $fetch_data['poster_2']; ?>">
	        </div>
	    </div>
	    <div class="row">
	        <div class="form-group col-6">
	            <label>Poster-1 Image</label>
	            <img src="<?php echo $dir_name.'/'.$fetch_data['poster1_img']; ?>">
	            <input type="file" name="poster1">
	            <!-- <input type="file" name="img[]" class="file-upload-default">
	            <div class="input-group col-xs-12">
	                <input type="text" class="form-control file-upload-info" disabled=""
	                    placeholder="Upload Image">
	                <span class="input-group-append">
	                    <button class="file-upload-browse btn btn-primary"
	                        type="button">Upload</button>
	                </span>
	            </div> -->
	        </div>
	        <div class="form-group col-6">
	            <label>Poster-2 Image</label>
	            <img src="<?php echo $dir_name.'/'.$fetch_data['poster2_img']; ?>">
	            <input type="file" name="poster2">
	            <!-- <input type="file" name="img[]" class="file-upload-default">
	            <div class="input-group col-xs-12">
	                <input type="text" class="form-control file-upload-info" disabled=""
	                    placeholder="Upload Image">
	                <span class="input-group-append">
	                    <button class="file-upload-browse btn btn-primary"
	                        type="button">Upload</button>
	                </span>
	            </div> -->
	        </div>
	    </div>

	    <div class="row">
	        <div class="form-group col-6">
	            <label for="exampleInputName1">Entry Fee </label>
	            <input type="text" class="form-control" id="exampleInputName1"
	                placeholder="Name" name="entry_fee>" value="<?php echo $fetch_data['entry_fee']; ?>">
	        </div>
	        <div class="form-group col-6">
	            <label for="exampleInputEmail3">Winning Coins</label>
	            <input type="text" class="form-control" id="exampleInputEmail3"
	                placeholder="Winning Coins" name="win_coins"> value="<?php echo $fetch_data['win_coins']; ?>">
	        </div>
	    </div>

	    <div class="row">
	        <div class="form-group col-6">
	            <label for="exampleInputName1">Active Users </label>
	            <input type="text" class="form-control" id="exampleInputName1"
	                placeholder="Active Users" name="active_users" value="<?php echo $fetch_data['active_users']; ?>">
	        </div>
	    </div>
	    <button type="submit" class="btn btn-primary mr-2" name="edit">Edit</button>
	    <button class="btn btn-light">Cancel</button>
	</form>

<?php } ?>