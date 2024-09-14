<?php require 'auth.php'; ?>
<?php if($_SESSION['lang'] == 'en'):?>
<div id="layoutSidenav_nav" class=" text-bg-primary">

                <nav class="sb-sidenav accordion " id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link text-white" href="index.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-gear-wide"></i></i></div>
                                Dashboard
                            </a>
                                     
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsFinancial" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-cash-coin"></i></div>
                                Financial movements
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsFinancial" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="incomes.php">the incomes </a>
                                    <a class="nav-link text-white" href="Invoices.php">view plyers Invoices</a>
                               
                             
                                </nav>
                            </div>

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsPlayers" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-raised-hand"></i></div>
                                players
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsPlayers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="players.php">view players</a>
                                    <a class="nav-link text-white" href="players-create.php">Add players</a>
                                    <a class="nav-link text-white" href="players-suspended.php">suspended players</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsClass" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-calendar-week"></i></div>
                                classes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsClass" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="class.php">view class</a>
                                    <a class="nav-link text-white" href="class-create.php">Add class</a>
                                </nav>
                            </div>

                                          
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsCustomers" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                                customers
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsCustomers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="customer.php">view customers</a>
                                    <a class="nav-link text-white" href="customer-create.php">Add customers</a>
                                </nav>
                            </div>

                                          
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsEvents" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-card-text"></i></div>
                                Events
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsEvents" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="events.php">view events</a>
                                    <a class="nav-link text-white" href="events-create.php">Add event   </a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                                admins
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-white" href="admins-create.php">add admin</a>
                                    <a class="nav-link text-white" href="admin.php">view admins</a>
                             
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">interface</div>
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSlider" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-images"></i></div>
                              Slider
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSlider" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-white" href="slider-create.php">add slider</a>
                                    <a class="nav-link text-white" href="slider.php">view slders</a>
                             
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading ">Store</div>
             
              

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseWarehouse" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-building"></i></div>
                                Warehouse
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseWarehouse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-white" href="warehouse-create.php">add Warehouse</a>
                                    <a class="nav-link text-white" href="warehouse.php">view Warehouse</a>
                                    <a class="nav-link text-white" href="warehouse-management.php">management Warehouse</a>
                             
                                </nav>
                            </div>

        
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsCategory" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-tags-fill"></i></div>
                                categories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="category.php">view categoies</a>
                                    <a class="nav-link text-white" href="category-create.php">Add categoies</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsProducts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-shop-window"></i></div>
                                products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="products.php">view products</a>
                                    <a class="nav-link text-white" href="products-create.php">Add products</a>
                                </nav>
                            </div>
                            
                            
                            <a class="nav-link text-white" href="scan.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-upc-scan"></i></div>
                                Scaner
                            </a>
                            
                         
                            <a class="nav-link text-white" href="orders.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-list"></i></i></div>
                                Orders
                            </a>

                            <!--
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>-->
                            <div class="sb-sidenav-footer mt-12">
                        <div class="small">Logged in as:</div>
                        <?= $_SESSION['loggedInUser']['name'] ?>
                    </div>
                      
                        </div>
                    </div>
               
                </nav>
            </div>




 <?php else: ?>




    <div id="layoutSidenav_nav" class=" text-bg-primary">

                <nav class="sb-sidenav accordion " id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">تحكمات</div>
                            <a class="nav-link text-white" href="index.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-gear-wide"></i></i></div>
                                مركز التحكم
                            </a>
                                     
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsFinancial" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-cash-coin"></i></div>
                                الحركات الماليه
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsFinancial" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="incomes.php">الدخل </a>
                                    <a class="nav-link text-white" href="Invoices.php">وصولات اللاعبين</a>
                               
                             
                                </nav>
                            </div>

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsPlayers" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-raised-hand"></i></div>
                                اللاعبين
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsPlayers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="players.php">كل اللاعبين</a>
                                    <a class="nav-link text-white" href="players-create.php">اضافة لاعب</a>
                                    <a class="nav-link text-white" href="players-suspended.php">الاعبين الموقوفين</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsClass" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-calendar-week"></i></div>
                                الحصص
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsClass" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="class.php">كل الحصص</a>
                                    <a class="nav-link text-white" href="class-create.php">اضافة الحصص</a>
                                </nav>
                            </div>

                                          
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsCustomers" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                             اولياء الامور
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsCustomers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="customer.php">كل  اولياء الامور</a>
                                    <a class="nav-link text-white" href="customer-create.php">اضافة  ولي امر</a>
                                </nav>
                            </div>

                                          
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsEvents" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-card-text"></i></div>
                                الانشطة
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsEvents" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="events.php">كل الانشطة</a>
                                    <a class="nav-link text-white" href="events-create.php">اضافة نشاط  </a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                                المدربين
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-white" href="admins-create.php">اضافة مدرب</a>
                                    <a class="nav-link text-white" href="admin.php">كل المدربين</a>
                             
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">الواجهة الرئيسية</div>
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSlider" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-images"></i></div>
                              لوحة الاخبار
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSlider" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-white" href="slider-create.php">اضافة لوحه</a>
                                    <a class="nav-link text-white" href="slider.php">كل اللوحات</a>
                             
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading ">المتجر</div>
             
              

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseWarehouse" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-building"></i></div>
                                الخازن
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseWarehouse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-white" href="warehouse-create.php">اضافة مخزن</a>
                                    <a class="nav-link text-white" href="warehouse.php">كل المخازن</a>
                                    <a class="nav-link text-white" href="warehouse-management.php">ادارة المخازن</a>
                             
                                </nav>
                            </div>

        
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsCategory" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-tags-fill"></i></div>
                                الفئات
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="category.php">كل الفئات</a>
                                    <a class="nav-link text-white" href="category-create.php">اضافة فئه</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsProducts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="bi bi-shop-window"></i></div>
                               المنتجات
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 
                                    <a class="nav-link text-white" href="products.php">كل المنتجات</a>
                                    <a class="nav-link text-white" href="products-create.php">اضافة منتج</a>
                                </nav>
                            </div>
                            
                            
                            <a class="nav-link text-white" href="scan.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-upc-scan"></i></div>
                               الماسح الضوئي
                            </a>
                            
                         
                            <a class="nav-link text-white" href="orders.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-list"></i></i></div>
                                الطلبات
                            </a>

                            <!--
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>-->
                            <div class="sb-sidenav-footer mt-12">
                        <div class="small">تسجيل الدخول باسم:</div>
                        <?= $_SESSION['loggedInUser']['name'] ?>
                    </div>
                      
                        </div>
                    </div>
               
                </nav>
            </div>



<?php endif; ?>