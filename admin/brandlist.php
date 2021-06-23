<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require '../vendor/autoload.php';	?>
<?php 
	if(!isset($_GET['brandid']) || $_GET['brandid'] == NULL)
	{
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }
    else
     {
        $id = $_GET['brandid']; 
		$con = new MongoDB\Client("mongodb://localhost:27017");		
		$db = $con->ShopEcommerceNoSQL;
		$collection = $db->BrandProduct;
		$document = $collection->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId ($id )) );
	}
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách nhãn hiệ<u></u></h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số thứ tự</th>
							<th>Tên nhãn hiệu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
						<?php
							$i =1;
							$con = new MongoDB\Client("mongodb://localhost:27017");		
							$db = $con->ShopEcommerceNoSQL;
				 			$collection = $db->BrandProduct;
				 			$document = $collection->find();
				 			foreach ($document as $doc) 
				 			{				 				
				 		
						?>
							<td><?php echo $i ?></td>
							<td><?php print_r($doc->Name) ?></td>
							<td><a href="brandedit.php?brandid=<?php echo $doc->_id ?>">Sửa</a> || <a href="?brandid=<?php echo $doc->_id ?>">Xóa</a></td>
						</tr>
						<?php
								$i =$i+1;
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

