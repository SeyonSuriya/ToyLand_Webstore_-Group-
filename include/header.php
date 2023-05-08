<div class="container-menu">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        <?php echo "Island Wide Delivary" ?>
                    </div>
    
                    <div class="right-top-bar flex-w h-full">
                    <?php if (isset($_SESSION['email']) && isset($_SESSION['fname'])
                            /*&& isset($_SESSION['lname'])*/)  {
                    ?>  <div class="drop-down-menu" id="account">
                            <a href="#" class="nav-link dropdown-toggle flex-c-m trans-04 p-lr-25" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo "My Account" ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <img src="images/profile-user.jpg" alt="">
                                <h6><?php echo $_SESSION['fname'] ?></h6>
                                <h6><?php //echo $_SESSION['lname'] ?></h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Shoppingcart/cart.php">My Cart</a>
                                <!--<a class="dropdown-item" href="#">My Wishlist</a>-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Log in and sign in 2/LogOut.php">Logout</a>
                            </div>
                        </div>
                    <?php 
                    }elseif(isset($_SESSION['adminemail']) && isset($_SESSION['adminName'])
                            /*&& isset($_SESSION['admin_lname'])*/){?>
                        <div class="drop-down-menu" id="account">
                            <a href="#" class="nav-link dropdown-toggle flex-c-m trans-04 p-lr-25" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo "My Account" ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <img src="images/profile-user.jpg" alt="">
                                <p>Administrator</p>
                                <h6><?php echo $_SESSION['adminName'] ?></h6>
                                <h6><?php //echo $_SESSION['admin_lname'] ?></h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cart.php">My Cart</a>
                                <!--<a class="dropdown-item" href="#">My Wishlist</a>-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../admin/adminpanel.php">Admin Panel</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Log in and sign in 2/LogOut.php">Logout</a>
                            </div>
                        </div>
                    <?php }else{?>
                            <a href="../log in and sign in 2/login.php" class="flex-c-m trans-01 p-lr-25" id="account">
                                <?php echo "Login" ?>
                            </a>
                    <?php }?>
                        <a href="../mainpage/help.php" class="flex-c-m trans-04 p-lr-25">
                            <?php echo "Help & FAQs" ?>
                        </a>
    
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            <?php echo "EN" ?>
                        </a>
    
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            <?php echo "LKR" ?>
                        </a>
                    </div>
                </div>
            </div>
    
            <!-- Menu bar -->
            <div class="wrap-menu">
                <nav class="limiter-menu container">
    
                    <!-- Logo -->
                    <a href="../mainpage/homepage.php" class="logo">
                        <img src="../logo.jpg" alt="IMG-LOGO">
                    </a>
                        
                    <!-- Menu -->
                    <div class="menu">
                        <ul class="main-menu">
                            <li <?php if($page == 'home'){ echo 'class = "active"';} ?> >
                                <a href="../mainpage/homepage.php">Home</a>
                            </li>   
    
                            <li <?php if($page == 'shop'){ echo 'class = "active"';} ?>>
                                <a href="../Product/shop.php">Shop</a>
                            </li>
    
                            <li <?php if($page == 'about'){ echo 'class = "active"';} ?>>
                                <a href="../mainpage/about.php">About us</a>
                            </li>
    
                            <li <?php if($page == 'contact'){ echo 'class = "active"';} ?>>
                                <a href="../mainpage/contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
    
                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <a href="../Product/search.php">
                                <i class="zmdi zmdi-search"></i>
                            </a>
    
                        </div>
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="2">
                            <a href="../Shoppingcart/cart.php">
                                <i class="zmdi zmdi-shopping-cart" <?php if($page == 'cart'){ echo 'id = "icon-active"';} ?>></i>
                            </a>
                        </div>
    
                        <!--<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                           data-notify="0">
                            <i class="zmdi zmdi-favorite-outline"></i>-->
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </header>