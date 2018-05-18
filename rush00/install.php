<?php
$servername = "localhost";
$username = "root";
$password = "111111";


$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}

$sql = "CREATE DATABASE us_db";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_select_db($conn, "us_db") or die("Cannot select DB");


$products = "CREATE TABLE products (
	  id BIGINT NOT NULL AUTO_INCREMENT,
  		name TEXT NOT NULL,
  		img_path TEXT NOT NULL,
  		price DECIMAL NOT NULL,
  		category TEXT NOT NULL,
  		PRIMARY KEY (id)
)";

if (mysqli_query($conn, $products)){  
 echo "<br />Table products created successfully";  
} else {  
	echo "<br />Could not create table: ".mysqli_error($conn);  
}  


if (mysqli_query($conn, "INSERT INTO products (id,name,img_path,price,category) 
	VALUES (NULL,'Bailey','https://images-na.ssl-images-amazon.com/images/I/71ZnuBH3Y9L._SL1000_.jpg',34.99,'Bears'),
	(NULL,'Bingo','https://images-na.ssl-images-amazon.com/images/I/31UHFBNMIoL._SL500_AC_SS350_.jpg',12.99,'Cats'),
	(NULL,'Coco','https://pics.drugstore.com/prodimg/597958/900.jpg',45.99,'Cats'),
	(NULL,'Buttercup','https://www.miniso-au.com/files/images.cache/ee028a90255df2ed5674f262985579ef-view.jpg',34.99,'Cats'),
	(NULL,'Romeo','https://cdn.shopify.com/s/files/1/1829/4817/products/rumb-tfdog-plush_large.jpg?v=1508432569',11.99,'Dogs'),
	(NULL,'Rusty','https://i5.walmartimages.ca/images/Large/604/127/6000197604127.jpg?odnBound=460',88.99,'Dogs'),
	(NULL,'Taffy','https://cdn.shopify.com/s/files/1/2622/2548/products/5410-Bulldog-B-Wholesale-Plush_large.jpg?v=1519702462',44.99,'Dogs'),
	(NULL,'Sharik','https://images-na.ssl-images-amazon.com/images/I/71Qo5EutDTL._SY355_.jpg',46.99,'Rabbits'),
	(NULL,'Walter','http://www.peepsandcompany.com/media/catalog/product/2/2/2228692428.jpg',18.99,'Rabbits'),
	(NULL,'Terminator','https://www.maileg.com/admin/public/getimage.ashx?image=/Files/Images/ecom/products/16-7990-02.jpg&crop=0&Width=1200',21.99,'Rabbits'),
	(NULL,'Sleepy','https://i.pinimg.com/originals/68/85/83/68858318892bd765ccc2f856877e8c59.jpg',23.99,'Ducks'),
	(NULL,'Sydney','https://cdn.shopify.com/s/files/1/1417/0972/products/e08284y_large.jpg?v=1489433253',55.99,'Ducks'),
	(NULL,'Berty','https://sc01.alicdn.com/kf/HTB1c_sLlHsTMeJjSsziq6AdwXXa0/Cozy-Microwave-Plush-Duck-Plush-Toy.jpg',89.99,'Ducks'),
	(NULL,'Rosy','https://media.istockphoto.com/photos/brown-teddy-bear-picture-id495727296?k=6&m=495727296&s=612x612&w=0&h=wvb28SSrA_ujHCIlC5HdLD1IyDllSblbg6f7Kdswp70=',15.99,'Bears'),
	(NULL,'Teddy','https://images-eu.ssl-images-amazon.com/images/I/91JOJgosfML._SX355_.jpg',46.99,'Bears'),
	(NULL,'Pooh','https://i5.walmartimages.com/asr/7617e51c-6004-42c1-ae63-006728db4ced_1.e3d0bbf4faa40c0a21af34e4f1d02546.jpeg?odnHeight=450&odnWidth=450&odnBg=FFFFFF',11.99,'Bears')")) {
	echo "<br />Table successfully inserted";  
} else {  
	echo "<br />Could not insert: ".mysqli_error($conn); 
}

mysqli_close($conn);
?>
