<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require '../vendor/autoload.php';	?>
<?php 
	if(!isset($_GET['categoryid']) || $_GET['categoryid'] == NULL)
	{
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }
    else
     {
        $id = $_GET['categoryid']; 
		$con = new MongoDB\Client("mongodb://localhost:27017");		
		$db = $con->ShopEcommerceNoSQL;
		$collection = $db->CategoryProduct;
		$document = $collection->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId ($id )) );
	}
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách danh mục</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số thứ tự</th>
							<th>Tên thể loại</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$i =1;
							$con = new MongoDB\Client("mongodb://localhost:27017");		
							$db = $con->ShopEcommerceNoSQL;
				 			$collection = $db->CategoryProduct;
				 			$document = $collection->find();
				 			foreach ($document as $doc) 
				 			{				 				
				 		
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php print_r($doc->Name) ?></td>
							<td><a href="catedit.php?categoryid=<?php echo $doc->_id ?>">Edit</a> || <a href="?categoryid=<?php echo $doc->_id ?>">Delete</a></td>
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

