<?php


// Database connection
$conn = new mysqli('localhost', 'root', '', 'gro_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare SQL query to insert data into the contacts table
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone_number, subject, message) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssiss", $name, $email, $number, $subject, $message);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully!');window.location='gro.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>complete grocery site</title>
        <!--font awesome cdn link-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
 <!--css file link-->
 <link rel="stylesheet" href="gr1.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
<body>
    
<!--header seccion-->
<header>
<div class="header-1">
<a href="#" class="logo"><i class="fas fa-shopping-basket"></i>Mrgrocos</a>
<form action="" class="search-box-container">
    <input type="search" id="search-box" placeholder="search here........">
    <label for="search-box" class="fas fa-search"></label>
</form>
</div>
<div class="header-2">

<div id="menu-bar" class="fas fa-bars"></div>
<nav class="navbar">
    <a href="#home">Home</a>
    <a href="#categery">Category</a>
    <a href="#product">Product</a>
    <a href="#deal">Deal</a>
    <a href="#contact">Contact</a>
</nav>
<div class="icons">
    <a href="view_cart.php" class="fas fa-shopping-cart"></a>
    <a href="#" class="fas fa-heart"></a>
    <a href="index.php" class="fas fa-user-circle"></a>
    <!-- Add the logout icon -->
    <a href="logout.php" class="fas fa-sign-out-alt" title="Logout"></a>
</div>



</header>

<!--header end-->

<!--home seccion start-->
<section class="home" id="home">
<div class="image">
    <img src="images\top-view-assortment-vegetables-paper-bag.jpg" alt="" height="70%" width="80%">
</div>
<div class="content">
    <span>fresh and organic</span>
    <h3>your daily need products</h3>
    <a href="#"  class="btn">get started</a>
</div>

</section>
<!--home section end-->

<!-- banner section starts-->
<section class="banner-container">
    <div class="banner">
<img src="images\ketogenic-paleo-diet-fried-eggs-salmon-broccoli-microgreen-keto-breakfast-brunch_2829-20252.jpg" alt="">
<div class="content">
    <h3>special offer</h3>
    <p>upto 46% offer</p>
    <a href="#" class="btn">check out</a>

</div>
    </div>

    <div class="banner">
        <img src="images\plate-with-keto-diet-food-cherry-tomatoes-chicken-breast-eggs-carrot-salad-with-arugula-spinach-keto-lunch_2829-16953.jpg" alt="">
        <div class="content">
            <h3>Limited offer</h3>
            <p>upto 50% offer</p>
            <a href="#" class="btn">check out</a>
        
        </div>
            </div>


</section>
<!-- banner section ends-->

<!--categery section start-->
<section class="Category" id="Category">
    <h1 class="heading">shop by <span>Category</span></h1>
    <div class="box-container">
        <div class="box">
            <h3>vegetables</h3>
            <p>upto 50% off</p>
            <img src="images\categery-vegy.jpg" alt="" height="50%" width="50%">
            <form action="cart.php" method="post">
                <input type="hidden" name="product_name" value="Vegetables">
                <input type="hidden" name="price" value="10.00">
                <button type="submit" name="add_to_cart" class="btn">Shop Now</button>
            </form>
        </div>

        <div class="box">
            <h3>juice</h3>
            <p>upto 33% off</p>
            <img src="images\3709.jpg" alt="" height="50%" width="50%">
            <form action="cart.php" method="post">
                <input type="hidden" name="product_name" value="Juice">
                <input type="hidden" name="price" value="5.00">
                <button type="submit" name="add_to_cart" class="btn">Shop Now</button>
            </form>
        </div>

        <div class="box">
            <h3>meat</h3>
            <p>upto 15% off</p>
            <img src="images\categery-meat.jpg" alt="" height="50%" width="50%">
            <form action="cart.php" method="post">
                <input type="hidden" name="product_name" value="Meat">
                <input type="hidden" name="price" value="20.00">
                <button type="submit" name="add_to_cart" class="btn">Shop Now</button>
            </form>
        </div>

        <div class="box">
            <h3>fruits</h3>
            <p>upto 45% off</p>
            <img src="images\categery-fruits.jpg" alt="" height="50%" width="50%">
            <form action="cart.php" method="post">
                <input type="hidden" name="product_name" value="Fruits">
                <input type="hidden" name="price" value="15.00">
                <button type="submit" name="add_to_cart" class="btn">Shop Now</button>
            </form>
        </div>
    </div>
</section>


<!--categery section end-->
<!--product section starts-->

<section class="Product" id="Product">
    <h1 class="heading">latest<span>products</span></h1>
<div class="box-container">

    <div class="box">
<span class="discount">-28%</span>
<div class="icons">
<a href="#" class="fas fa-heart"></a>
<a href="#" class="fas fa-share"></a>
<a href="#" class="fas fa-eye"></a>
</div>
<img src="images\yellow-banana-productcategery.jpg"alt="" height="40%" width="38%">
<h3>organic banana</h3>
<div class="stars">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star-half-alt"></i>
    </div>
    <div class="price">$7.50<span>$14.10</span></div>
    <div class="quantity">
<span>quantity :</span>
<input type="number" min="1" max="1000" value="1">
<span> / kg</span>
    </div>
    <a href="#" class="btn">add to cart</a>
</div>

<div class="box">
    <span class="discount">-32%</span>
    <div class="icons">
    <a href="#" class="fas fa-heart"></a>
    <a href="#" class="fas fa-share"></a>
    <a href="#" class="fas fa-eye"></a>
    </div>
    <img src="images\tomatoes_productca.jpg"alt="" height="40%" width="38%">
    <h3>organic tomato</h3>
    <div class="stars">
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star-half-alt"></i>
        </div>
        <div class="price">$5.50<span>$7.10</span></div>
        <div class="quantity">
    <span>quantity :</span>
    <input type="number" min="1" max="1000" value="1">
    <span> / kg</span>
        </div>
        <a href="#" class="btn">add to cart</a>
    </div>
    <div class="box">
        <span class="discount">-42%</span>
        <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-share"></a>
        <a href="#" class="fas fa-eye"></a>
        </div>
        <img src="images\orange-productca.jpg"alt="" height="40%" width="38%">
        <h3>organic orange</h3>
        <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price">$2.50<span>$4.10</span></div>
            <div class="quantity">
        <span>quantity :</span>
        <input type="number" min="1" max="1000" value="1">
        <span> / kg</span>
            </div>
            <a href="#" class="btn">add to cart</a>
        
        </div>

        <div class="box">
            <span class="discount">-32%</span>
            <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-share"></a>
            <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images\Organic-Cow-Milk-Gurgaon.jpg"alt="" height="40%" width="38%">
            <h3>organic milk</h3>
            <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price">$8.50<span>$11.10</span></div>
                <div class="quantity">
            <span>quantity :</span>
            <input type="number" min="1" max="1000" value="1">
            <span> / ml</span>
                </div>
                <a href="#" class="btn">add to cart</a>
            </div>
            <div class="box">
                <span class="discount">-22%</span>
                <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
                </div>
                <img src="images\freshness-nature-bounty-ripprapes1-productca.jpg"alt="" height="40%" width="38%">
                <h3>organic grapes</h3>
                <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">$9.50<span>$11.00</span></div>
                    <div class="quantity">
                <span>quantity :</span>
                <input type="number" min="1" max="1000" value="1">
                <span> / kg</span>
                    </div>
                    <a href="#" class="btn">add to cart</a>
                
                
                </div>

                <div class="box">
                    <span class="discount">-32%</span>
                    <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                    </div>
                    <img src="images\close-up-fresh-apple_144627-14640productca.jpg"alt="" height="40%" width="38%">
                    <h3>organic apple</h3>
                    <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                        </div>
                        <div class="price">$2.50<span>$5.00</span></div>
                        <div class="quantity">
                    <span>quantity :</span>
                    <input type="number" min="1" max="1000" value="1">
                    <span> / kg</span>
                        </div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                    <div class="box">
                        <span class="discount">-22%</span>
                        <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                        <a href="#" class="fas fa-eye"></a>
                        </div>
                        <img src="images\butterproductca.jpg"alt="" height="35%" width="38%">
                        <h3>natural butter </h3>
                        <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div class="price">$13.50<span>$16.00</span></div>
                            <div class="quantity">
                        <span>quantity :</span>
                        <input type="number" min="1" max="1000" value="1">
                        <span> / kg</span>
                            </div>
                            <a href="#" class="btn">add to cart</a>
                        </div>
                        <div class="box">
                            <span class="discount">-22%</span>
                            <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-share"></a>
                            <a href="#" class="fas fa-eye"></a>
                            </div>
                            <img src="images\carrots-fresh-organic-carrots-productca.jpg"alt="" height="40%" width="38%">
                            <h3>organic carrot </h3>
                            <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                                </div>
                                <div class="price">$2.50<span>$6.00</span></div>
                                <div class="quantity">
                            <span>quantity :</span>
                            <input type="number" min="1" max="1000" value="1">
                            <span> / kg</span>
                                </div>
                                <a href="#" class="btn">add to cart</a>
                            </div>
                            <div class="box">
                                <span class="discount">-12%</span>
                                <div class="icons">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="fas fa-share"></a>
                                <a href="#" class="fas fa-eye"></a>
                                </div>
                                <img src="images\top-view-peanuts-bowl-productca.jpg"alt="" height="40%" width="38%">
                                <h3>organic peanuts </h3>
                                <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <div class="price">$3.50<span>$6.00</span></div>
                                    <div class="quantity">
                                <span>quantity :</span>
                                <input type="number" min="1" max="1000" value="1">
                                <span> / kg</span>
                                    </div>
                                    <a href="#" class="btn">add to cart</a>
                                </div>
                                <div class="box">
                                    <span class="discount">-42%</span>
                                    <div class="icons">
                                    <a href="#" class="fas fa-heart"></a>
                                    <a href="#" class="fas fa-share"></a>
                                    <a href="#" class="fas fa-eye"></a>
                                    </div>
                                    <img src="images\watermelon-with-proca.jpg"alt="" height="40%" width="38%">
                                    <h3>organic watermelon </h3>
                                    <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <div class="price">$6.50<span>$12.00</span></div>
                                        <div class="quantity">
                                    <span>quantity :</span>
                                    <input type="number" min="1" max="1000" value="1">
                                    <span> / kg</span>
                                        </div>
                                        <a href="#" class="btn">add to cart</a>
                                    </div>      

                                    <div class="box">
                                        <span class="discount">-42%</span>
                                        <div class="icons">
                                        <a href="#" class="fas fa-heart"></a>
                                        <a href="#" class="fas fa-share"></a>
                                        <a href="#" class="fas fa-eye"></a>
                                        </div>
                                        <img src="images\watermelon-with-proca.jpg"alt="" height="40%" width="38%">
                                        <h3>organic watermelon </h3>
                                        <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <div class="price">$6.50<span>$12.00</span></div>
                                            <div class="quantity">
                                        <span>quantity :</span>
                                        <input type="number" min="1" max="1000" value="1">
                                        <span> / kg</span>
                                            </div>
                                            <a href="#" class="btn">add to cart</a>
                                        </div>      

                                        <div class="box">
                                            <span class="discount">-42%</span>
                                            <div class="icons">
                                            <a href="#" class="fas fa-heart"></a>
                                            <a href="#" class="fas fa-share"></a>
                                            <a href="#" class="fas fa-eye"></a>
                                            </div>
                                            <img src="images\watermelon-with-proca.jpg"alt="" height="40%" width="38%">
                                            <h3>organic watermelon </h3>
                                            <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <div class="price">$6.50<span>$12.00</span></div>
                                                <div class="quantity">
                                            <span>quantity :</span>
                                            <input type="number" min="1" max="1000" value="1">
                                            <span> / kg</span>
                                                </div>
                                                <a href="#" class="btn">add to cart</a>
                                            </div>      
                            
</div>

</section>
<!--product section ends-->
<!--deal section start-->
<section class="deal" id="deal">
    <div class="content">
<h3 class="title">deal of today</h3>
<p>Looking for fresh and affordable groceries? Don't miss our deal of the day! Today only, you can get 20% off on all fruits and vegetables, plus a free reusable bag with any purchase over $50. Hurry and shop now, while supplies last!
</p>

<div class="count-down">
    <div class="box">
<h3 id="day">00</h3>
<span>day</span>
    </div>
    <div class="box">
        <h3 id="hour">00</h3>
        <span>hour</span>
            </div>
            <div class="box">
                <h3 id="minute">00</h3>
                <span>minute</span>
                    </div>

                    <div class="box">
                        <h3 id="second">00</h3>
                        <span>second</span>
                            </div>
</div>

<a href="#" class="btn">check the deal</a>
    </div>


</section>


<!--deal session end-->
<!--contact section starts-->


    <!-- contact section starts -->
    <section class="contact" id="contact">
    <h1 class="heading"><span>contact</span> us</h1>
    
    <form action="" method="post">
        <div class="inputBox">
            <input type="text" id="name" placeholder="name" name="fname" required>
            <input type="email" id="email" name="email" placeholder="email" required>
        </div>
        <div class="inputBox">
            <input type="number" id="number" placeholder="number" name="number" required>
            <input type="text" id="subject" placeholder="subject" name="subject" required>
        </div>
        
        <textarea placeholder="message" name="message" id="message" cols="30" rows="10" required></textarea>
        
        <input type="submit" value="send message" class="btn" name="submit">
    </form>
</section>


    
        
  




<!--contact section ends-->
<!--newsletter section start-->
<section class="newsletter">
<h3>subscribe us for latest updates</h3>
<form action="">
<input class="box" type="email" placeholder="enter your email address">
<input type="submit" value="subscribe" class="btn">
</form>

</section>
<!--newsletter section end-->
<!--footer section start-->
<section class="footer">
<div class="box-container">
<div class="box">
<a href="#" class="logo"><i class="fa-shopping-basket"></i>tharusha organics</a>
<p>Looking for fresh and affordable groceries? Don't miss our deal of the day! Today only, you can get 20% off on all fruits and vegetables, plus a free reusable bag with</p>
<div class="share">
    <a href="#" class="btn fab fa-facebook-f"></a>
    <a href="#"  class="btn fab fa-twitter"></a>
    <a href="#"  class="btn fab fa-instagram"></a>
    <a href="#"  class="btn fab fa-linkedin"></a>
</div>
</div>

<div class="box">
    <h3>our location</h3>
    <div class="links">
   <a href="#">Colombo</a>
   <a href="#">Jaffna</a>
   <a href="#">Galle</a>
   <a href="#">Gampaha</a>
   <a href="#">Matara</a>
    </div>
</div>

<div class="box">
    <h3>quick links</h3>
    <div class="links">
   <a href="#">home</a>
   <a href="#">categery</a>
   <a href="#">product</a>
   <a href="#">deal</a>
   <a href="#">contact</a>
    </div>
</div>

<div class="box">
    <h3>download our app</h3>
    <div class="links">
   <a href="#">google play store</a>
   <a href="#">windows store</a>
   <a href="#">app store</a>
  
    </div>
</div>

</div>
<h1 class="credit">created by<span>Tharusha Bishan Rathnawardhana</span>| all rights reserved!</h1>
</section>
<!---footer section end-->
<!--custom js file link-->
<script src="gg.js"></script>

</body>
    </html>