<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
    // gọi class category
    $brand = new Brand(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $brandName = $_POST['brandName'];
        $insertBrand = $brand -> insertBrand($brandName); // hàm check catName khi submit lên
    }
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm nhãn hiệu sản phẩm</h2>
               <div class="block copyblock"> 
                <?php 
                    if(isset($insertBrand)){
                        echo $insertBrand;
                    }
                 ?>
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input name="brandName" type="text" placeholder="Nhập tên nhãn hiệu..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>