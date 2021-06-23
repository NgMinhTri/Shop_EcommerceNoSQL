<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
    $category = new Category(); 
    if(!isset($_GET['categoryid']) || $_GET['categoryid'] == NULL){
        echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['categoryid']; 
    }
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){     
        $catName = $_POST['catName'];
        $updateBrand = $category -> updateCategory($catName,$id); 
    }
    
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Cập nhật danh mục sản phẩm </h2>
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
                        $collection = $db->CategoryProduct;
                        $doc = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID( $id )]);                                             
                    ?>				
                        <tr>
                            <td>
                                <input name="catName" value="<?php print_r($doc->Name) ?>" type="text" placeholder="Nhập tên danh mục..." class="medium" />
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