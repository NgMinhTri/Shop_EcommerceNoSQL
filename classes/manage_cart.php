<?php 
    session_start();
    require_once '../vendor/autoload.php';

    use Laudis\Neo4j\Databags\Statement;


    $client = Laudis\Neo4j\ClientBuilder::create()
        ->addHttpConnection('backup', 'http://neo4j:123@localhost')
        ->addBoltConnection('default', 'bolt://neo4j:123@localhost:7687')
        ->setDefaultConnection('default')
        ->build();
    
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['add_to_cart'])){
            if(isset($_SESSION['username'])){
                if (isset($_SESSION['cart'])){
                    $myitem = array_column($_SESSION['cart'],'name');
                    if(in_array($_POST['name'],$myitem)){
                        echo "<script>
                        alert('Item alreay added');
                        window.location.href='../Products.php';
                        </script>";
                    }
                    else{
                        $count = count($_SESSION['cart']);
                        $_SESSION['cart'][$count]=array('name'=>$_POST['name'], 'Price'=>$_POST['price'], 'Quantity'=>1);
                        if(isset($_SESSION['username'])){
                            $user= $_SESSION['username'];
                            $product = $_POST['name'];
                            $results = $client->run("MATCH (a:Customer), (b:Product)
                                                WHERE a.name = '$user' AND b.name = '$product'
                                                CREATE (a)-[r:HasCart]->(b)
                                                RETURN type(r)");
                        }
                        echo "<script>
                        alert('Item added');
                        window.location.href='../Products.php';
                        </script>";
                }
                }    
                else {               
                    $_SESSION['cart'][0]=array('name'=>$_POST['name'], 'Price'=>$_POST['price'], 'Quantity'=>1);
                    if(isset($_SESSION['username'])){
                        $user= $_SESSION['username'];
                        $product = $_POST['name'];
                        $results = $client->run("MATCH (a:Customer), (b:Product)
                                            WHERE a.name = '$user' AND b.name = '$product'
                                            CREATE (a)-[r:HasCart]->(b)
                                            RETURN type(r)");
                    }
                    echo "<script>
                        alert('Item added');
                        window.location.href='../Products.php';
                        </script>";
                }
            }
            else{
                echo "<script>
                        alert('You need to log in first');
                        window.location.href='../login.php';
                        </script>";
            }
        }
        if(isset($_POST['Remove'])) {
            foreach ($_SESSION['cart'] as $key=>$value){
                if($value['name']==$_POST['name']){
                    $product=$_POST['name'];
                    $user=$_SESSION['username'];
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    echo "<script>
                    alert('Item removed');
                    window.location.href='../cart.php';
                    </script>";
                    $client->run("MATCH (n {name: '$user'})-[r:HasCart]->(m {name: '$product'})
                    DELETE r");
                }
            }
        }
        if(isset($_POST['Mod_Quantity'])){
            foreach($_SESSION['cart'] as $key=>$value){
                if($value['name']==$_POST['name']){
                    $product=$_POST['name'];
                    $storeQuan = $client->run("MATCH (n:Product{name: '$product'}) return n.quantity");
                    
                    foreach($storeQuan as $key1=> $value1){
                        $Quan=$value1['n.quantity'];    
                    }
                    print_r($Quan);
                    if($_POST['Mod_Quantity']<=$Quan){
                        $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
                        echo "<script>
                        alert('change');
                            window.location.href='../cart.php';
                        </script>";
                    }
                    else {
                        echo "<script>
                        alert('Not enough product available');
                        window.location.href='../cart.php';
                        </script>";
                    }
                }
            }            
        }
        if(isset($_POST['order'])){
            $user =$_SESSION['username'];
            foreach ($_SESSION['cart'] as $key=>$value){
                $product = $value['name'];
                $quantity = $value['Quantity'];  
                unset($_SESSION['cart']);
                $client->run("MATCH (n {name: '$user'})-[r:HasCart]->(m {name: '$product'})
                    DELETE r");
                $client->run("MATCH (a:Customer), (b:Product)
                WHERE a.name = '$user' AND b.name = '$product'
                CREATE (a)-[r:Buy{Quantity: $quantity, Date: datetime()}]->(b)
                RETURN type(r)");
                $client->run("MATCH (n {name: '$product'})
                            SET n.quantity = n.quantity-$quantity");
                echo "<script>
                window.location.href='../Products.php';
                </script>";
                
             } 
        }
    }
?>