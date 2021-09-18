<?php
include('header.php');
include('config.php');



if(isset($_POST['edit'])){

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

}
?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body" id="editcat_data">
                            <h4 class="card-title">Edit Category</h4>

                            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="exampleFormControlSelect1">Select Category Title</label>
                                        <select class="form-control form-control-lg" id="match_title" name="match_title" onchange="getCat_detail()">
                                          <option>--Select--</option>
                                            <?php
                                                $selcat="SELECT * FROM `tbl_category` ";
                                                $res_cat = mysqli_query($conn,$selcat);
                                                while($fetch_cat = mysqli_fetch_array($res_cat)){ ?>
                                                    <option <?php echo $fetch_cat['match_title']; ?>><?php echo $fetch_cat['match_title']; ?></option>
                                            <?php  } ?>
                                          
                                        </select>
                                      </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputName1">Heading</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Name" name="heading">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail3">Result Time</label>
                                        <input type="datetime-local" class="form-control" id="exampleInputEmail3"
                                            placeholder="Email" name="res_time">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputName1">Poster-1</label>
                                        <input type="text" name="poster_1" class="form-control" id="exampleInputName1" placeholder="Name">
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
                                        <!-- <input type="file" name="img[]" class="file-upload-default"> -->
                                        <!-- <div class="input-group col-xs-12">
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
                                            placeholder="Name" name="entry_fee">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail3">Winning Coins</label>
                                        <input type="email" class="form-control" id="exampleInputEmail3"
                                            placeholder="text" name="win_coins">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputName1">Active Users </label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Name" name="active_users">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2" name="edit">Edit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>

             
             
            </div>
        </div>
        <!-- content-wrapper ends -->
<?php include('footer.php'); ?>
<script type="text/javascript">
    function getCat_detail(){
        var match_title = $('#match_title').val();  
        $.ajax({
            type: "POST",
            url: "ajax/load_category_data.php", 
            data: {action:'load_category_data', match_title:match_title},
            success: function(html)
            {
                $("#editcat_data").html(html);
            }
        }); 

    }
</script>