<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
    $brand = new Brand(); 
    if(!isset($_GET['brandid']) || $_GET['brandid'] == NULL){
        echo "<script> window.location = 'brandlist.php' </script>";
        
    }else {
        $id = $_GET['brandid']; 
    }
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){     
        $brandName = $_POST['brandName'];
        $updateBrand = $brand -> updateBrand($brandName,$id); 
    }
    
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Cập nhật nhãn hiệu sản phẩm</h2>
               <div class="block copyblock">               
                 <?php 
                    if(isset($updateBrand)){
                            echo $updateBrand;
                        }
                 ?> 
                 <form action="" method="post">
                    <table class="form">
                    <?php           
                        $con = new MongoDB\Client("mongodb://localhost:27017");     
                        $db = $con->ShopEcommerceNoSQL;
                        $collection = $db->BrandProduct;
                        $doc = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID( $id )]);                                             
                    ?>					
                        <tr>
                            <td>
                                <input name="brandName" value="<?php print_r($doc->Name) ?>" type="text" placeholder="Nhập tên nhãn hiệu..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Cập nhật" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>