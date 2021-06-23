<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require '../vendor/autoload.php';	?>
<?php include '../classes/product.php'; ?>
<?php 
	$pd = new Product();
	if(!isset($_GET['productid']) || $_GET['productid'] == NULL)
	{
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }
    else
     {
        $id = $_GET['productid']; 
		$con = new MongoDB\Client("mongodb://localhost:27017");		
		$db = $con->ShopEcommerceNoSQL;
		$collection = $db->Product;
		$document = $collection->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId ($id )) );
	}
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Tên sản phẩm</th>
					<th>Thể loại</th>
					<th>Nhãn hiệu</th>
					<th>Mô tả</th>
					<th>Giá</th>
					<th>Hình ảnh</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
					$con = new MongoDB\Client("mongodb://localhost:27017");		
					$db = $con->ShopEcommerceNoSQL;
		 			$collection = $db->Product;
		 			$document = $collection->find();
		 			foreach ($document as $doc) 
		 			{
		 				
		 		
				?>
				<tr class="odd gradeX">
					<td><?php print_r($doc->name) ?></td>
					<td><?php print_r($doc->category) ?></td>
					<td><?php print_r($doc->brand) ?></td>
					<td><?php print_r($doc->description) ?></td>
					<td><?php print_r($doc->price) ?></td>
					<td><img src="uploads/<?php print_r($doc->image) ?>" width="80"></td>
					<td><?php print_r($doc->type) ?></td>
					<td><a href="productedit.php?productid=<?php echo $doc->_id ?>">Sửa</a> || <a href="?productid=<?php echo $doc->_id ?>">Xóa</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
