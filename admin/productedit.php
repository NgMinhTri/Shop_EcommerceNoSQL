<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'; ?>
<?php include '../classes/category.php'; ?>
<?php 
    $pd = new Product();
    if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        echo "<script> window.location = 'productlist.php' </script>";      
    }
    else {
        $id = $_GET['productid']; 
    } 
    //-----------------//
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){       
        $updateProduct = $pd -> updateProduct( $id); 
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Cập nhật sản phẩm</h2>
         <?php 
            if(isset($updateProduct)){
                echo $updateProduct;
            }
         ?>   
              
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               <?php           
                    $con = new MongoDB\Client("mongodb://localhost:27017");     
                    $db = $con->ShopEcommerceNoSQL;
                    $collection = $db->Product;
                    $doc = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID( $id )]);                                             
                ?>
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input name="NameProduct" value="<?php print_r($doc->name) ?>" type="text" placeholder="Nhập tên sản phẩm..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thể loại</label>
                    </td>
                    <td>                
                        <select id="select" name="CategoryProduct">
                            <option>Chọn danh mục</option>
                            <?php
                                $con = new MongoDB\Client("mongodb://localhost:27017");     
                                $db = $con->ShopEcommerceNoSQL;
                                $collection = $db->CategoryProduct;
                                $category = $collection->find();
                                foreach ($category as $cat) 
                                {                                                              
                            ?>
                               <option value="<?php print_r($cat->Name) ?>"><?php print_r($cat->Name) ?></option>
                            <?php
                                }
                            ?>
                              
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Nhãn hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="BrandProduct">
                            <option value=" ">Chọn nhãn hiệu</option>
                            <?php
                                $con = new MongoDB\Client("mongodb://localhost:27017");     
                                $db = $con->ShopEcommerceNoSQL;
                                $collection = $db->BrandProduct;
                                $brand = $collection->find();
                                foreach ($brand as $br) 
                                {                                                              
                            ?>
                            <option                              
                                value="<?php print_r($br->Name) ?>"><?php print_r($br->Name) ?>            
                            </option>   

                            <?php
                                }
                            ?>
                            
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả sản phẩm</label>
                    </td>
                    <td>
                        <textarea name="DescriptionProduct" class="tinymce">
                            <?php print_r($doc->description) ?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input name="PriceProduct" value="<?php print_r($doc->price) ?>" type="text" placeholder="Nhập giá..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload hình ảnh</label>
                    </td>
                    <td>
                        <img src="uploads/<?php print_r($doc->image) ?>" width="100"><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Type</label>
                    </td>
                    <td>
                        <select id="select" name="Type">
                            <option>Chọn loại sản phẩm</option>
                             <?php 
                                if ($doc->type == 1) {
                             ?>
                            <option selected value="1">Nổi bậc</option>
                            <option value="0">Không nổi bậc</option>
                            <?php 
                                }
                                else
                                {
                            ?>
                            <option value="1">Nổi bậc</option>
                            <option selected value="0">Không nổi bậc</option> 
                            <?php 
                                }
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Cập nhật" />
                    </td>
                </tr>
            </table>
            </form>
            
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


