<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
    // gọi class category
    $cat = new Category(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $catName = $_POST['catName'];
        $insertCat = $cat -> insertCategory($catName); // hàm check catName khi submit lên
    }
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh mục sản phẩm mới</h2>
               <div class="block copyblock"> 
                <?php 
                    if(isset($insertCat)){
                        echo $insertCat;
                    }
                 ?>
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input name="catName" type="text" placeholder="Nhập tên danh mục..." class="medium" />
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