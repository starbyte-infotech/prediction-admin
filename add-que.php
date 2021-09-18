<?php 
include('header.php');
include('config.php');

if(isset($_POST['submit'])){

    $match_title = $_POST['match_title']; 
    $selcat1="SELECT * FROM `tbl_category` WHERE `match_title` = '$match_title'";
    $res_cat1 = mysqli_query($conn,$selcat1);
    $fetch_cat1 = mysqli_fetch_assoc($res_cat1);
    $cat_id = $fetch_cat1['id'];

    $question = $_POST['question'];
    $per1 = $_POST['per1'];
    $opt1 = $_POST['opt1'];
    $per2 = $_POST['per2'];
    $opt2 = $_POST['opt2'];
    $per3 = $_POST['per3'];
    $opt3 = $_POST['opt3'];

    $sql = "INSERT INTO `tbl_que`(`id`, `cat_id`, `match_title`, `question`, `per1`, `opt1`, `per2`, `opt2`, `per3`, `opt3`, `created_at`) VALUES (NULL, '$cat_id', '$match_title','$question' ,'$per1','$opt1','$per2','$opt2','$per3','$opt3' ,current_timestamp())"; 
    $res = mysqli_query($conn, $sql);  
    if($res){
        echo "<script>alert('Question Successfuly Added');</script>";
    }else{
        echo "<script>alert('Failed to Add Question !!');</script>";
    }
}
?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Questions</h4>

                            <form class="forms-sample" method="POST">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="exampleFormControlSelect1">Select Category Title</label>
                                        <select class="form-control form-control-lg" id="match_title" name="match_title">
                                            <option>--Select--</option>
                                            <?php
                                                $selcat="SELECT * FROM `tbl_category` ";
                                                $res_cat = mysqli_query($conn,$selcat);
                                                while($fetch_cat = mysqli_fetch_array($res_cat)){ ?>
                                                    <option value="<?php echo $fetch_cat['match_title'] ?>"><?php echo $fetch_cat['match_title']; ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="exampleInputName1">Questions</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Questions" name="question">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="exampleInputName1">Percentage</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="%" name="per1">
                                    </div>
                                    <div class="form-group col-10">
                                        <label for="exampleInputEmail3">Option-1</label>
                                        <input type="text" class="form-control" id="exampleInputEmail3"
                                            placeholder="option" name="opt1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="exampleInputName1">Percentage </label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="%" name="per2">
                                    </div>
                                    <div class="form-group col-10">
                                        <label for="exampleInputEmail3">Option-2</label>
                                        <input type="text" class="form-control" id="exampleInputEmail3"
                                            placeholder="option" name="opt2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-2">
                                        <label for="exampleInputName1">Percentage</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="%" name="per3">
                                    </div>
                                    <div class="form-group col-10">
                                        <label for="exampleInputEmail3">Option-3</label>
                                        <input type="text" class="form-control" id="exampleInputEmail3"
                                            placeholder="option" name="opt3">
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