<?php
$conn=mysqli_connect("localhost","root","","leavesys");
$id=$_GET["id"];
$sql="SELECT * FROM leavestype WHERE id = '{$id}'";
$run=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($run);



?>

<?php
include("../include/meta.php");
include("../include/navbar.php");
?>

    <div class="container-fluid">
        <div class="row">
            <?php
            include("../include/sidebar.php");
            ?>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 d-flex align-items-start flex-column">
                <h3 class="text-center mt-4  d-inline-block">Edit Leave Types</h3>




                <div class=" border border-1 w-50 p-3 mt-3">
                    <form action="lev_update.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $data["id"] ?>" class="form-control " id="">
                        <br>
                        <label class="form-label">Leave Type</label>
                        <input type="text" name="lev_type" value="<?php echo $data["lev_type"] ?>" class="form-control "
                            id=""> <br>
                        <label class="form-label">Discription</label>
                        <input type="text" name="lev_desc" value="<?php echo $data["discription"] ?>"
                            class="form-control" id=""> <br>
                        

                        <input type="submit" value="update" name="lev_update" class="btn-primary btn">
                    </form>
                </div>





            </main>
        </div>
    </div>


   <?php
  include('../include/footer.php');
 ?>