<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'; ?>
<?php include '../classes/category.php'; ?>
<?php

    $pd = new Product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $insertProduct = $pd -> insertProduct($_POST, $_FILES); 
    }
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm mới</h2>
        <?php 
            if(isset($insertProduct)){
                echo $insertProduct;
            }
         ?> 
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input name="NameProduct" type="text" placeholder="Nhập tên sản phẩm..." class="medium" />
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
                                $document = $collection->find();
                                foreach ($document as $doc) 
                                {                                                              
                            ?>
                               <option value="<?php print_r($doc->Name) ?>"><?php print_r($doc->Name) ?></option>
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
                            <option>Chọn nhãn hiệu</option>
                            <?php
                                $con = new MongoDB\Client("mongodb://localhost:27017");     
                                $db = $con->ShopEcommerceNoSQL;
                                $collection = $db->BrandProduct;
                                $document = $collection->find();
                                foreach ($document as $doc) 
                                {                                                              
                            ?>
                            <option value="<?php print_r($doc->Name) ?>"><?php print_r($doc->Name) ?></option>                        
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
                        <textarea name="DescriptionProduct" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input name="PriceProduct" type="text" placeholder="Nhập giá..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload hình ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="Type">
                            <option>Select Type</option>
                            <option value="1">Nổi bậc</option>
                            <option value="0">Không nổi bậc</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
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


