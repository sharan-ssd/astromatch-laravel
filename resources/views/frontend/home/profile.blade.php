
<!doctype html>
<html lang="en">
<head>
    <!--required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    
    <!--meta-->
    <meta name="description" content="Astrology Website">
    <meta name="author" content="JesperApps">

    <!--favicon icon-->
    <link rel="icon" href="assets/img/favicon.png" type="image/png" sizes="16x16">

    <!--title-->
    <title>Astro Match Online - Find Your Perfect Cosmic Connection</title>

    <!--build:css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/fonts/style.css" rel="stylesheet" />	
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
                                    
    <!-- endbuild -->

    <!--custom css start-->
    <!-- <link rel="stylesheet" href="assets/css/customs.css"> -->
    <!--custom css end-->

</head>
<body>
<!--preloader start-->
    <div id="preloader" class="bg-light-subtle">
        <div class="preloader-wrap">
            <img src="assets/img/favicon.png" alt="logo" class="img-fluid preloader-icon">
            <div class="loading-bar"></div>
        </div>
    </div>
    <!--preloader end-->


<div class="main-wrapper bg-soft-blue">
  <!--header section start-->
          <header class="main-header w-100 z-10 bg-white">
            <nav class="navbar navbar-expand-xl navbar-light sticky-header p-0">
                <div class="container d-flex align-items-center justify-content-lg-between position-relative">                    
                        <a href="index.php" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">                            
                            <img src="assets/img/logo-color.png" alt="logo" class="img-fluid logo-color" />
                        </a>
                        <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop" role="button">
                            <i class="flaticon-menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"></i>
                        </a>
                        <div class="clearfix"></div>                    
                        <div class="collapse navbar-collapse justify-content-center p-3">
                            <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                                <li class="nav-item -dropdown setup-process-item">
                                                                                                                                <a class="btn btn-outline-mat btn-sm mt-2" style="font-size:15px; padding:12px" href="dashboard.php"><i class="fa fa-laptop px-2"></i>Go to Dashboard</a>
                                                                                        <a class="btn btn-outline-mat btn-sm mt-2" style="font-size:15px; padding:12px" href="index.php"><i class="fa fa-home px-2"></i>Back to Home</a>
                                            <a href="https://drive.google.com/file/d/1U8j6etOcRhlkR6oL1Ekdbjg9NB2lNsv4/view?usp=sharing" target="_blank" class="btn btn-outline-mat btn-sm mt-2" style="font-size:15px; padding:12px"><img class="px-2" src="assets/img/Group.svg" class="user-guide" alt="User Guide" />User Guide</a>
                                                                        
                                </li>
                            </ul>
                        </div>                    
                                            <div class="action-btns text-end me-5 p-1.5 me-lg-0 d-none d-md-block d-lg-block justify-content-end">  
                                                            <form name="languageForm" method="post">
                                    <div class="form-group">
                                        <select class="form-select-lg language-selection multi-language-selectlist" name="languageSelected" action="#" onchange="javascript:this.form.submit();">
                                                                                        <option value="english" selected>English</option>
                                                                                        <option value="tamil" >தமிழ்</option>
                                                                                        <option value="hindi" >हिंदी</option>
                                                                                        <option value="telugu" >తెలుగు</option>
                                                                                        <option value="kannada" >ಕನ್ನಡ</option>
                                                                                        <option value="malayalam" >മലയാളം</option>
                                                            
                                        </select>
                                    </div>
                                </form>
                                                    </div>                    
                                        <div class="dropdown-profile">
                        <img class="header-profile" src="assets/img/profile.png" alt="Profile">
                        <div class="dropdown-content-profile">
                            <ul class="profile-list-main">
                                <li class="profile-menu-list"><a href="myprofile.php" title=""><i class="fa fa-user"></i> My Profile</a></li>
                                <li class="profile-menu-list"><a href="editprofile.php" title=""><i class="fa fa-pencil"></i> Edit Profile</a></li>
                                <li class="profile-menu-list"><a href="profilelist.php" title=""><i class="fa fa-list"></i> Horoscope List</a></li>
                                <!--<li class="profile-menu-list"><a href="changepassword.php" title=""> <i class="fa fa-lock"></i> Change Password</a></li>-->
                                <li class="profile-menu-list"><a href="logout.php" title=""><i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                                    </div>                
            </nav>
            <!--offcanvas menu start-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasWithBackdrop">
                <div class="offcanvas-header d-flex align-items-center mt-4">
                    <a href="index.php" class="d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="assets/img/logo-color.png" alt="logo" class="img-fluid ps-2" />
                    </a>
                    <button type="button" class="close-btn text-danger" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="flaticon-cancel"></i>
                    </button>
                </div>
                <div class="offcanvas-body">                    
                    <div class="action-btns mt-2 mob-action-btns">
                        <a href="https://drive.google.com/file/d/1U8j6etOcRhlkR6oL1Ekdbjg9NB2lNsv4/view?usp=sharing" class="btn btn-link text-decoration-none btn-outline-grey btn-sm mb-2 p-2"><img src="assets/img/Group.svg" class="user-guide" alt="User Guide" />User Guide</a>
                                                <form name="languageForm" method="post" style="">
                            <div class="form-group">
                                <select class="form-select-lg language-selection multi-language-selectlist" name="languageSelected" action="#" onchange="javascript:this.form.submit();">
                                                                        <option value="english" selected>English</option>
                                                                        <option value="tamil" >தமிழ்</option>
                                                                        <option value="hindi" >हिंदी</option>
                                                                        <option value="telugu" >తెలుగు</option>
                                                                        <option value="kannada" >ಕನ್ನಡ</option>
                                                                        <option value="malayalam" >മലയാളം</option>
                                                    
                                </select>
                            </div>
                        </form>
                    </div>
                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item -dropdown mt-3">
                                                                    <a class="mt-2 mb-2 p-2 mobile-menus" href="dashboard.php"> <i class="fa fa-home"></i> Dashboard </a>
                                        <a class="mt-2 mb-2 p-2 mobile-menus" href="myprofile.php"> <i class="fa fa-user"></i> My Profile </a>
                                        <a class="mt-2 mb-2 p-2 mobile-menus" href="editprofile.php"> <i class="fa fa-pencil"></i> Edit Profile </a>
                                        <a class="mt-2 mb-2 p-2 mobile-menus" href="profilelist.php"> <i class="fa fa-list"></i> Horoscope List </a>
                                        <!--<a class="mt-2 mb-2 p-2 mobile-menus" href="changepassword.php"> <i class="fa fa-lock"></i> Change Password </a>-->
                                        <a class="mt-0 mobile-menus" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                                            </li>
                    </ul>
                </div>
            </div>
            <!--offcanvas menu end-->
        </header>
                <!--header section end-->        
<style>

.mob-action-btns {
    display: flex;
    width: 100%;
}

li.profile-menu-list a i {
    background: #dc416e;
    padding: 7px;
    border-radius: 50%;
    color: #fff;
}

    a.mobile-menus i {
    background: #d93970;
    padding: 10px;
    border-radius: 50%;
    color: #fff;
    margin-right: 4px;
}

   a.mobile-menus {
    float: left;
    width: 100%;
    color: black;
    padding: 7px 0px !important;
    margin: 0 !important;
    font-size: 14px !important;
    /* border-bottom: 1px solid #ddd; */
}
    li.profile-menu-list a {
        padding: 5px 10px;
        color: #000;
        float: left;
        width: 100%;
    }
    li.profile-menu-list a:hover {
        background: #eeeeee;
        transition: 0.5s;
    }
    img.header-profile 
    {
        height: 45px;
        width: 48px;
        border-radius: 50%;
        margin-left: 10px;
    }
    .dropdown-profile {
        position: relative;
        display: inline-block;
    }

    .dropdown-content-profile {
        display: none;
        position: absolute;
        right: -10%;
        background-color: #f9f9f9;
        min-width: 250px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 0;
        z-index: 1;
    }
    li.profile-menu-list {
        list-style-type: none;
        font-size: 14px;
        margin-bottom: 0px;
        float: left;
        width: 100%;
    }
    ul.profile-list-main {
        padding-left: 0;
        margin-bottom:0;
    }

    .dropdown-profile:hover .dropdown-content-profile {
        display: block;
    }

     .dropbtn {
        background: linear-gradient(341deg, #ec446db5, #23a4da96);
        color: white;
        /* padding: 16px; */
        /* font-size: 16px; */
        border: none;
        /* padding: 10px; */
        height: 40px;
        widdth: 40px;
        vertical-align: middle;
        border-radius: 50%;
        margin-left: 10px;
    }

    .dropbtn:hover, .dropbtn:focus {
      background-color: #fff;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #fff;
      min-width: 160px;
      overflow: auto;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      right: 10%;
      top: 38px;
      padding: 6px;
      border-radius: 10px;
    }

   .dropdown-content a {
      color: black;
      padding: 3px 10px;
      text-decoration: none;
      display: block;
      font-size: 14px;
    }

    .dropdown a:hover {background-color: #ddd;}

    .show {display: block;}
    @media(max-width: 991px) {
    .dropdown.menulist {
        display: none !important;
    }
}
  </style>

  <script>
   /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }    
    document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.navigate-after-close').forEach(function(link) {
        link.addEventListener('click', function (e) {
            e.preventDefault(); // prevent immediate navigation
            const targetHref = link.getAttribute('href');
            
            // Close the offcanvas
            const offcanvasElement = document.getElementById('offcanvasWithBackdrop');
            const offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);
            
            if (offcanvasInstance) {
                offcanvasInstance.hide();
                
                // Wait for transition to finish before navigating
                offcanvasElement.addEventListener('hidden.bs.offcanvas', function handleNav() {
                    window.location.href = targetHref;
                    offcanvasElement.removeEventListener('hidden.bs.offcanvas', handleNav); // cleanup
                });
            } else {
                // fallback in case offcanvas instance not found
                window.location.href = targetHref;
            }
        });
    });
});

    function showLogin()
    {
        document.getElementById('compatibility-check').scrollIntoView({ behavior: 'smooth' });
        $("#loginDiv").show();
        $("#signupDiv").hide();
    }
    function showRegister()
	{
		document.getElementById('compatibility-check').scrollIntoView({ behavior: 'smooth' });
        $("#loginDiv").hide();
        $("#signupDiv").show();
	}
  </script><main class="float-start w-100 body-main">
  <section class="konow-more-zoidc d-inline-block w-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <span style="color:red;">  </span>
          <div class="form-zodiuc mb-5 mt-5 mt-lg-0">
            <div class="comon-heading text-center">
                <h2 class="common-heading mt-3 mb-3"> My Profile </h2>
            </div>
            <div class="myprofile-section">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12 text-center mb-3">
                                               <img src="assets/img/user.png" class="my-profile-img" alt ="Profile Image">
                          
                                       </div>
                  <div class="col-md-12 mb-2">
                    <div class="row">
                      <div class="col-md-4">
                        <label><i class="fa fa-user"></i> Full Name</label>
                      </div>
                      <div class="col-md-8 profile-value">
                        <span></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-2">
                    <div class="row">
                      <div class="col-md-4">
                        <label><i class="fa fa-phone"></i> Mobile Number </label>
                      </div>
                      <div class="col-md-8 profile-value">
                        <span> </span>
                      </div>
                    </div>
                  </div> 
                  <div class="col-md-12 mb-2">
                    <div class="row">
                      <div class="col-md-4">
                        <label><i class="fab fa-whatsapp" aria-hidden="true"></i> WhatsApp Number </label>
                      </div>
                      <div class="col-md-8 profile-value">
                        <span> </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-2">
                    <div class="row">
                      <div class="col-md-4">
                        <label><i class="fa fa-envelope"></i> Email </label>
                      </div>
                      <div class="col-md-8 profile-value">
                        <span> </span>
                      </div>
                    </div>
                  </div>                  

                  <div class="col-md-12 mb-2">
                    <div class="row">
                      <div class="col-md-4">
                        <label><i class="fa fa-neuter"></i> Gender </label>
                      </div>
                      <div class="col-md-8 profile-value">
                        <span> </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-2">
                    <div class="row">
                      <div class="col-md-4">
                        <label><i class="fa fa-users"></i> User Type </label>
                      </div>
                      <div class="col-md-8 profile-value">
                        <span> </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div class="col-lg-6">
          <img src="assets/img/myprofileimg.jpg" class="login-image" alt ="Profile Image">              
        </div>
      </div>
    </div>
  </section>
</main>
<script src="js/jquery-3.5.1.js"></script>
<style>
ul.cms-links {
    margin: 0;
    padding-left: 10px;
}

ul.cms-links li {
    font-size: 16px;
    list-style-type: circle;
    padding: 0;
    margin: 0px;
    color: #000;
}
ul.cms-links li a {
    color: #000;
}

.socialmedia-icons-footer {
        float: right;
    position: relative;
    top: 10px;
    left: 0;
    text-align: left;
}
</style>
<!--footer section start-->
        <footer class="footer-section">
            <!--footer top start-->
            <!--for light footer add .footer-light class and for dark footer add .bg-dark .text-white class-->
            <div class="footer-top ptb-60">
                <div class="container">
                    <div class="row justify-content-between pt-4">
                        <div class="col-md-8 col-lg-4 mb-md-4 mb-lg-0">
                            <div class="footer-single-col">
                                <div class="footer-single-col mb-4">
                                    <img src="assets/img/logo-footer.png" alt="logo" class="img-fluid logo-white">
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8 mt-4 mt-md-0 mt-lg-0">
                            <div class="row">
                                
                                <div class="col-md-6 col-lg-6 mt-4 mt-md-0 mt-lg-0 text-right">
                                    <div class="footer-single-col">
                                        <h3>Contact Us :</h3>
                                        <ul class="list-unstyled footer-nav-list mb-lg-0">
                                            <li class="ft-ct-li"><img src="assets/img/whatsapp.svg" alt="Whatsapp" /> <span class="ftr-ct">+(91) - 9962022209</span></li>
                                            <li class="ft-ct-li"><img src="assets/img/mail.svg" alt="Mail" /> <span class="ftr-ct">wonderful.couples@astromatch.online</span></li>
                                            <li class="ft-ct-li"><img src="assets/img/call.svg" alt="Call" /> <span class="ftr-ct">044 - 46972104</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--<div class="col-md-6 col-lg-6 mt-4 mt-md-0 mt-lg-0 text-right">
                                    <div class="footer-single-col">
                                        <h3>Follow us on :</h3>
                                        <div class="">
                                            <a href="javascript:void(0)" class="text-decoration-none soc-py"><img src="assets/img/insta.svg" alt="Instagram" /> </a>
                                            <a href="javascript:void(0)" class="text-decoration-none soc-py"><img src="assets/img/facebook.svg" alt="Facebook" /> </a>
                                            <a href="javascript:void(0)" class="text-decoration-none soc-py"><img src="assets/img/Youtube.svg" alt="Youtube" /> </a>
                                        </div>                                           
                                    </div>
                                </div>-->
                                <div class="col-md-4 col-lg-4 mt-4 mt-md-0 mt-lg-0">
                                    <div class="footer-single-col">                                        
                                        <div class="cms-section mt-3">                                    
                                            <ul class="cms-links">
                                            <li><a href="contactus.php" title="Contact Us">Contact Us</a></li>                                            
                                            <li><a href="cancelpolicy.php" title="Refund Policy">Refund Policy</a></li>
                                            <li><a href="termsofuse.php" title="Terms of Use">Terms of Use</a></li>
                                            <li><a href="privacypolicy.php" title="Privacy Policy">Privacy Policy</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                                                    <a href="faq.php" class="btn btn-mat btn-sm mt-2"><img class="mr-1 px-2" src="assets/img/Faq.svg" alt="FAQ" /> FAQ</a>
                                    <a href="https://drive.google.com/file/d/1U8j6etOcRhlkR6oL1Ekdbjg9NB2lNsv4/view?usp=sharing" target="_blank" class="btn btn-outline-mat btn-sm mt-2" style="font-size:15px; padding:12px"><img src="assets/img/Group.svg" class="user-guide" alt="User Guide" />User Guide</a>
                                    <a href="#feedbackModal" data-bs-toggle="modal" class="btn btn-outline-mat btn-sm mt-2"><img class="px-2" src="assets/img/Feedback.svg" alt="Feedback" />Send Feedback</a>                                    
                                    <div class="socialmedia-icons-footer mt-2 d-none">
                                        <a href="javascript:void(0)" title="Instagram" class="text-decoration-none soc-py"><img src="assets/img/insta.svg" alt="Instagram" /> </a>
                                        <a href="javascript:void(0)" title="Facebook" class="text-decoration-none soc-py"><img src="assets/img/facebook.svg" alt="Facebook" /> </a>
                                        <a href="javascript:void(0)" title="Youtube" class="text-decoration-none soc-py"><img src="assets/img/Youtube.svg" alt="Youtube" /> </a>
                                    </div> 
                                </div>                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--footer top end-->

            <!--footer bottom start-->
            <div class="footer-bottom py-4">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="copyright-text">
                            <p>Copyright © 2025 VEALES Vedic Decisions Private Limited</p>                            </div>                            
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="copyright-text">
                                <p class="mb-lg-0 mb-md-0">Build Number: 25Q1R1.Sprint-1-QA.MAT-V1_0.250416.1</p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <!--footer bottom end-->
        </footer>
        <!--footer section end--> <!--footer section end-->
        </div>
        
<!--build:js-->
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/swiper-bundle.min.js"></script>
    <script src="assets/js/vendors/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/vendors/parallax.min.js"></script>
    <script src="assets/js/vendors/aos.js"></script>
    <script src="assets/js/vendors/massonry.min.js"></script>
    <script src="assets/js/app.js"></script>
    <!--endbuild-->

    <div class="modal fade login-div-modal contact-form01" id="feedbackModal">
        <div class="modal-dialog modal-width">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                 <h2> Feedback </h2>
                    <button type="button" class="btn-close colis-btn" data-bs-dismiss="modal">
                                            </button>
                </div>

                <div class="modal-body">
                    <div class="modla-contact">
                        <div class="form-div-sections d-inline-block w-100">
                            <form name="feedback" action="feedback.php" method="post" enctype="multipart/form-data" onsubmit="javascript:if(validateForm())showPopup();">
                                <div class="row">                                                        
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label> Feedback For </label>
                                            <div class="radio-group">
                                                <div class="radio-item"><label> <input type="radio" class="form-check form-check-inline" name="feedbackfor" value="Product" checked id="product" onchange="showProduct()"/>Product </label></div>
                                                <div class="radio-item"><label> <input type="radio" class="form-check form-check-inline" name="feedbackfor" value="Service" id="service" onchange="showProduct()"/> Service </label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="productoption" class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label> Select Product </label>
                                            <select class="form-control form-select product-List" id="productlist" name="productlist">
                                                                                        <option value="MyGenie" >MyGenie</option>
                                                                                        <option value="xSpaz" >xSpaz</option>
                                                                                        <option value="JenuineAstro" >JenuineAstro</option>
                                                                                        <option value="TarotTalk" >TarotTalk</option>
                                                                                        <option value="QuickDezider" >QuickDezider</option>
                                                                                        <option value="Premium Reports" >Premium Reports</option>
                                                                                        <option value="General Products" >General Products</option>
                                                                                        <option value="Integrated Matchmaking" selected>Integrated Matchmaking</option>
                                                                                        <option value="Daily Automated Panchang" >Daily Automated Panchang</option>
                                                                                        <option value="Astrologer Public Page" >Astrologer Public Page</option>
                                                                                        <option value="Color Tool" >Color Tool</option>
                                                                                        <option value="Business Potential Tool" >Business Potential Tool</option>
                                                                                        <option value="Govt Job Tool" >Govt Job Tool</option>
                                                                                        <option value="Foreign Life Tool" >Foreign Life Tool</option>
                                                                                        </select>
                                        </div>
                                    </div>
                                    <div id="serviceoption" class="col-md-6">
                                        <div class="form-group mt-2">
                                        <label> Select Service </label>
                                        <select class="form-control form-select product-List" id="servicelist" name="servicelist">
                                                                                <option value="DoDiES">DoDiES</option>
                                                                                <option value="DoD">DoD</option>
                                                                                <option value="VB">VB</option>
                                                                                <option value="VBOT">VBOT</option>
                                                                                <option value="CSM">CSM</option>
                                                                                <option value="General Service">General Service</option>
                                                                                </select>                          
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-2">                                                                    
                                            <label> Feedback Category </label><br/>
                                            <div class="radio-group gender-radio-btns">
                                                <div class="radio-item"><label><input type="radio" class="form-check form-check-inline" name="feedbackcategory" id="Positive" value="Positive" onchange="showFeedbackOptions()"/> Positive </label></div>
                                                <div class="radio-item"><label><input type="radio" class="form-check form-check-inline" name="feedbackcategory" id="Negative" value="Negative" onchange="showFeedbackOptions()"/> Negative </label></div>
                                                <div class="radio-item"><label><input type="radio" class="form-check form-check-inline" name="feedbackcategory" id="General" value="General" checked onchange="showFeedbackOptions()"/>General </label></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div id="positiveproduct" class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label> Positive </label>
                                        <select class="form-control form-select product-List" id="positiveproductlist" name="positiveproductlist">
                                                                                <option value="Useful Feature">Useful Feature</option>
                                                                                <option value="Easy Navigation">Easy Navigation</option>
                                                                                <option value="Good Look & Feel">Good Look & Feel</option>
                                                                                <option value="Good Performance of Fast PageLoading">Good Performance of Fast PageLoading</option>
                                                                                <option value="Others">Others</option>
                                                                                </select>
                                    </div>
                                    </div>
                                    <div id="positiveservice" class="col-md-6">
                                        <div class="form-group mt-2">
                                        <label> Positive </label>
                                        <select class="form-control form-select product-List" id="positiveservicelist" name="positiveservicelist">
                                                                                <option value="Useful Service">Useful Service</option>
                                                                                <option value="Easy to Reach">Easy to Reach</option>
                                                                                <option value="Good Experience">Good Experience</option>
                                                                                <option value="Fast Responses">Fast Responses</option>
                                                                                <option value="Others">Others</option>
                                                                                </select>                          
                                        </div>
                                    </div>
                                    <div id="negativeproduct" class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label> Negative </label>
                                        <select class="form-control form-select product-List" id="negativeproductlist" name="negativeproductlist">
                                                                                <option value="Feature is not working">Feature is not working</option>
                                                                                <option value="Difficult to Navigate">Difficult to Navigate</option>
                                                                                <option value="Bad Look & Feel">Bad Look & Feel</option>
                                                                                <option value="Poor Performance of Slow PageLoading">Poor Performance of Slow PageLoading</option>
                                                                                <option value="Others">Others</option>
                                                                                </select>
                                    </div>
                                    </div>
                                    <div id="negativeservice" class="col-md-6">
                                        <div class="form-group mt-2">
                                        <label> Negative </label>
                                        <select class="form-control form-select product-List" id="negativeservicelist" name="negativeservicelist">
                                                                                <option value="Service is unavailable">Service is unavailable</option>
                                                                                <option value="Difficult to Reach">Difficult to Reach</option>
                                                                                <option value="Bad Experience">Bad Experience</option>
                                                                                <option value="Slow Responses">Slow Responses</option>
                                                                                <option value="Others">Others</option>
                                                                                </select>                          
                                        </div>
                                    </div>
                                    <div id="generaltype" class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label> General </label>
                                        <select class="form-control form-select product-List" id="generallist" name="generallist">
                                                                                <option value="Sales">Sales</option>
                                                                                <option value="Service">Service</option>
                                                                                <option value="Partnership">Partnership</option>
                                                                                <option value="Others">Others</option>
                                                                                </select>
                                    </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group mt-2">
                                        <label> Feedback Description </label><br/>
                                        <textarea class="form-control" id="feedbackdesc" placeholder="Feedback Description" name="feedbackdesc" rows="4" style="height:80px; !important"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                        <label> Attachment (s) </label><br/>
                                        <input type="file" name="files[]" id="files[]" multiple />                          
                                        </div>
                                        <span class="text-red mt-2">Note : Your maximum upload size upto 2MB. Press CTRL button and select multiple files to upload.</span>
                                    </div>
                                    <div class="col-md-12 mt-3" style="text-align:center">
                                        <input name="submitFeedback" type="submit" class="btn btn-submit btn-mat" value="Submit" onclick='submitFeedback()'/>
                                        <input type="hidden" id="action" value="submitFeedback" />
                                    </div>
                                </div>
                            </form>
                        </div>             
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>         
    $("#serviceoption").hide();
    $("#positiveproduct").hide();
    $("#negativeproduct").hide();
    $("#positiveservice").hide();
    $("#negativeservice").hide();

    function showProduct()
    {
        if(document.getElementById("product").checked)
        {
        $("#productoption").show();
        $("#serviceoption").hide();
        }
        if(document.getElementById("service").checked)
        {
        $("#productoption").hide();
        $("#serviceoption").show();
        }
        showFeedbackOptions();
    }

    function showFeedbackOptions()
    {    
        if((document.getElementById("product").checked) && (document.getElementById("Positive").checked))
        {
        $("#positiveproduct").show();
        $("#negativeproduct").hide();
        $("#positiveservice").hide();
        $("#negativeservice").hide();
        $("#generaltype").hide();
        }
        if((document.getElementById("product").checked) && (document.getElementById("Negative").checked))
        {
        $("#positiveproduct").hide();
        $("#negativeproduct").show();
        $("#positiveservice").hide();
        $("#negativeservice").hide();
        $("#generaltype").hide();
        }
        if((document.getElementById("product").checked) && (document.getElementById("General").checked))
        {
        $("#positiveproduct").hide();
        $("#negativeproduct").hide();
        $("#positiveservice").hide();
        $("#negativeservice").hide();
        $("#generaltype").show();      
        }
        if((document.getElementById("service").checked) && (document.getElementById("Positive").checked))
        {
        $("#positiveproduct").hide();
        $("#negativeproduct").hide();
        $("#positiveservice").show();      
        $("#negativeservice").hide();
        $("#generaltype").hide();
        }
        if((document.getElementById("service").checked) && (document.getElementById("Negative").checked))
        {
        $("#positiveproduct").hide();
        $("#negativeproduct").hide();
        $("#positiveservice").hide();
        $("#negativeservice").show();
        $("#generaltype").hide();
        }
        if((document.getElementById("service").checked) && (document.getElementById("General").checked))
        {
        $("#positiveproduct").hide();
        $("#negativeproduct").hide();
        $("#positiveservice").hide();
        $("#negativeservice").hide();
        $("#generaltype").show();
        }
    }

    function showPopup()
    {
        $('#modalCenter').modal('show');    
        setTimeout(function(){
        $('#modalCenter').modal('hide');
        }, 3000);
    }

    var fd = new FormData();

    $('input[type="file"]').on('change', function (e) {
        [].forEach.call(this.files, function (file) {
            fd.append('files[]', file);
        });
    });

  function validateForm()
  {
    var feedback = "";
    feedback = $("#feedbackdesc").val();
    if(feedback == "")
    {
      document.getElementById('alertMessage').innerHTML = "Feedback description should not be empty";
      return false;
    }
    else
      return true;
  }

  function submitFeedback()
  {
    var selectedPlatform = "";
    var productname = "";
    var servicename = "";
    var feedbackCategory = "";
    var feedbackType = "";
    var feedback = "";
        
    selectedPlatform = $("input[name='feedbackfor']:checked").val();
    if(selectedPlatform == "Product")
      productname = $("#productlist").val();
    else if(selectedPlatform == "Service")
      servicename = $("#servicelist").val();

    feedbackCategory = $("input[name='feedbackcategory']:checked").val();

    if((feedbackCategory == "Positive") && (selectedPlatform == "Product"))
    {
      feedbacktype = $("#positiveproductlist").val();
    }
    if((feedbackCategory == "Negative") && (selectedPlatform == "Product"))
    {
      feedbacktype = $("#negativeproductlist").val();
    }
    if((feedbackCategory == "Positive") && (selectedPlatform == "Service"))
    {
      feedbacktype = $("#positiveservicelist").val();
    }
    if((feedbackCategory == "Negative") && (selectedPlatform == "Service"))
    {
      feedbacktype = $("#negativeservicelist").val();
    }
    if(feedbackCategory == "General")
    {
      feedbacktype = $("#generallist").val();
    }

    feedback = $("#feedbackdesc").val();
  }   
</script>
</body>

</html>