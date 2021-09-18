<?php 
include('header.php');
include('config.php');

if(isset($_POST['submit'])){

    $match_title = $_POST['match_title'];
    $heading = $_POST['heading'];
    $res_time = $_POST['res_time'];
    $poster_1 = $_POST['poster_1'];
    $poster_2 = $_POST['poster_2'];
    $entry_fee = $_POST['entry_fee'];
    $win_coins = $_POST['win_coins'];
    $active_users = $_POST['active_users'];

    $poster1_img = $_FILES["poster1"]["name"];
    $poster1_newnm = rand(00000, 99999).'_'.$poster1_img;
    $poster1_temp = $_FILES["poster1"]["tmp_name"]; 
    $folder1 = "posters/".$poster1_newnm;

    $poster2_img = $_FILES["poster2"]["name"];
    $poster2_newnm = rand(00000, 99999).'_'.$poster2_img;
    $poster2_temp = $_FILES["poster2"]["tmp_name"];   
    $folder2 = "posters/".$poster2_newnm;

    $poster1_move = move_uploaded_file($poster1_temp, $folder1);
    $poster2_move = move_uploaded_file($poster2_temp, $folder2);

    if($poster1_move && $poster2_move){

        $sql = "INSERT INTO `tbl_category`(`id`, `match_title`, `heading`, `res_time`, `poster_1`, `poster_2`, `poster1_img`, `poster2_img`, `entry_fee`, `win_coins`, `active_users`, `created_at`) VALUES (NULL, '$match_title', '$heading','$res_time' ,'$poster_1','$poster_2','$poster1_newnm','$poster2_newnm','$entry_fee','$win_coins','$active_users' ,current_timestamp())"; 
        $res = mysqli_query($conn, $sql);  
        if($res){
            echo "<script>alert('Category Successfuly Added');</script>";
        }else{
            echo "<script>alert('Failed to Add Category');</script>";
        }
    }else{
        echo "string"; die();
    }
}
?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Category</h4>

                            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="exampleInputName1">Match Title</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Match Title" name="match_title">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputName1">Heading</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Heading" name="heading">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail3">Result Time</label>
                                        <input type="datetime-local" class="form-control" id="exampleInputEmail3"
                                            placeholder="Result Time" name="res_time">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputName1">Poster-1</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Poster-1" name="poster_1">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail3">Poster-2</label>
                                        <input type="text" class="form-control" id="exampleInputEmail3"
                                            placeholder="Poster-2" name="poster_2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Poster-1 Image</label>
                                        <input type="file" name="poster1">
                                        <!-- <input type="file" name="img" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" 
                                                placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>  -->
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Poster-2 Image</label>
                                        <input type="file" name="poster2" >
                                        <!-- <input type="file" name="img" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" 
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
                                            placeholder="Entry Fee" name="entry_fee">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail3">Winning Coins</label>
                                        <input type="text" class="form-control" id="exampleInputEmail3"
                                            placeholder="Winning Coins" name="win_coins">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputName1">Active Users </label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Active Users" name="active_users">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>                    
             
            </div>
        </div>
        <!-- content-wrapper ends -->
<?php include('footer.php'); ?>