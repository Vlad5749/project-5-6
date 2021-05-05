<?php
include 'Sort.php';
?>
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=0">Від дешевших до дорожчих</a>
    <br>
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=1">Від дорожчих до дешевших</a>


<?php
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    } else { 
        $sort = "name";
    }
    
if (isset($_GET['order'])) {
    $order = $_GET['order'];
    $sort = new Sort($products);
    $sort->sort($order);
    } else {
    $order = 0;
    } 

foreach($products as $product)  :
?>
    <div class="product">
        <p class="sku">Код: <?php echo $product['sku']?></p>
        <h4><?php echo $product['name']?><h4>  
         <p> Ціна: <span class="price"><?php echo $product['price']?></span> грн</p>
         <p> Знижка: <span class="discount"><?php echo $product['discount']?></span> %</p>
        <p> Зі знижкою: <span class="priceWithDisc">
            <?php echo $product['price'] - (int)($product['price'] * ($product['discount']/100))?>
            </span> грн</p>
        <p><?php if(!$product['qty'] > 0) { echo 'Нема в наявності'; } ?></p>
    </div>
<?php endforeach; ?>
