
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
                                                                                                                                <a class="btn btn-outline-mat btn-sm mt-2" style="font-size:15px; padding:12px" href="dashboard"><i class="fa fa-laptop px-2"></i>Go to Dashboard</a>
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
                                <li class="profile-menu-list"><a href="profile" title=""><i class="fa fa-user"></i> My Profile</a></li>
                                <li class="profile-menu-list"><a href="editprofile.php" title=""><i class="fa fa-pencil"></i> Edit Profile</a></li>
                                <li class="profile-menu-list"><a href="profilelist.php" title=""><i class="fa fa-list"></i> Horoscope List</a></li>
                                <!--<li class="profile-menu-list"><a href="changepassword.php" title=""> <i class="fa fa-lock"></i> Change Password</a></li>-->
                                <li class="profile-menu-list"><a href="{{ route('logout') }}" title=""><i class="fa fa-sign-out"></i> Logout</a></li>
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
                                        <a class="mt-2 mb-2 p-2 mobile-menus" href="profile"> <i class="fa fa-user"></i> My Profile </a>
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
  </script><style>
.rasichart-planet-names
{
  float:left;
  width:100%;
  padding: 0;
  margin: 0;
  line-height: 16px;
}
.twitter {
  color: #000000;
  text-decoration: none;
  display: block;
  padding: 14px;
  /* -webkit-transition: all .5s ease;
  -moz-transition: all .5s ease;
  -ms-transition: all .5s ease;
  -o-transition: all .5s ease;
  transition: all .5s ease; */
}

.twitter:hover {
  color: #FF7D6D;
  text-decoration: none;
}

/* Floating Social Media Bar Style Starts Here */

.fl-fl {
  background: #00000030;
  text-transform: uppercase;
  letter-spacing: 3px;
  padding: 0px 0px 0px 0px !important;
  width: 190px;
  position: fixed;
  border-radius: 5px 0px 0px 5px;
  right: -136px;
  z-index: 1000;
  font: normal normal 10px Arial;
/*	-webkit-transition: all .5s ease;
  -moz-transition: all .5s ease;
  -ms-transition: all .5s ease;
  -o-transition: all .5s ease;
  transition: all .5s ease; */
  
}

.fl-fl:hover {
  right: 0;
  cursor:pointer;
}

.fl-fl a {
  color: #dc416e !important;
  text-decoration: none;
  text-align: center;
  line-height: 43px!important;
  vertical-align: top!important;
}

.float-fb {
  top: 160px;
}

.float-tw {
  top: 215px;
}

.float-gp {
  top: 270px;
}

.float-rs {
  top: 325px;
}

.float-ig {
  top: 380px;
}

.float-pn {
  top: 435px;
}
.fl-fl a i {
  font-size: 24px;
  padding-right: 20px;
  padding-left: 14px;
  padding-top: 14px;
}
</style>
<main class="float-start w-100 body-main">
  <section class="konow-more-zoidc d-inline-block w-100" style="background-color:white;">
    <div class="container" style="overflow-x:hidden;">
              <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4">
            <button name="btnDownload" class="btn btn-mat report-btns" onclick="downloadReport();">
              <i class="fa fa-download"></i> Download            </button>
          </div>          
            <div class="col-sm-12 col-md-6 col-lg-4">
              <button name="btnSendMail" class="btn btn-mat report-btns" onclick="sendMail();">
                <i class="fa fa-envelope"></i> Send Mail              </button>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
              <button name="btnSendWhatsApp" class="btn btn-mat report-btns" onclick="sendWhatsApp();">
                <i class="fab fa-whatsapp"></i> Send in WhatsApp              </button>
            </div>          
      </div>
            
        <div style="color:darkblue;font-weight:bold;text-align:center;font-size:x-large;">Marriage Match Making</div><br/><div style="display:flex;justify-content:space-around;"><div style='width: 45%;float:left;margin-right:10px;border:2px solid #02a698;border-radius:15px;'><table cellpadding='5' style='vertical-align: middle;color:darkblue;border-collapse: collapse;font-weight:bold;width:100%;text-align:center;'><tr><td style='text-wrap:pretty;'>asf</td></tr><tr><td>Male</td></tr><tr><td>04/06/2021, 03:03 AM</td></tr><tr><td>Asdas<br/> Ma’rib<br/> Yemen</td></tr><tr><td>Uttara Bhādrapadā - Pisces</td></tr><tr><td>Lagna : Aries</td></tr></table></div><div style='width: 45%;float:left;margin-left:10px;border:2px solid #02a698;border-radius:15px;'><table cellpadding='5' style='vertical-align: middle;color:darkblue;border-collapse: collapse;font-weight:bold;width:100%;text-align:center;'><tr><td>asdfa</td></tr><tr><td>Female</td></tr><tr><td>03/02/2023, 01:00 AM</td></tr><tr><td>Asdas<br/> Ma’rib<br/> Yemen</td></tr><tr><td>Ardra - Gemini</td></tr><tr><td>Lagna : Scorpio</td></tr></table></div></div><div style='width:100%;margin-top:20px;border-top:2px solid #02a698;border-left:2px solid #02a698;border-right:2px solid #02a698;border-bottom:2px solid #02a698;text-align:center;font-size:22px;color:darkgreen;font-weight:bold;'>Standard Match</div><div style='text-align:center;margin-top:0px;border-left:2px solid #02a698;border-right:2px solid #02a698;width:100%;'><table style='border-collapse: collapse;color:maroon;font-weight:bold;width:99%;white-space:normal;font-size:1.5rem;text-align:center;'><tr><td style='border-bottom: 1px solid #cccccc;'>Dhina Match</td><td style='border-bottom: 1px solid #cccccc;'>0%</td><td style='border-bottom: 1px solid #cccccc;'>No Match</td></tr><tr><td style='border-bottom: 1px solid #cccccc;'>Gana Match</td><td style='border-bottom: 1px solid #cccccc;'>90%</td><td style='border-bottom: 1px solid #cccccc;'>Best Match</td></tr><tr><td style='border-bottom: 1px solid #cccccc;'>Mahendra Match</td><td style='border-bottom: 1px solid #cccccc;'>0%</td><td style='border-bottom: 1px solid #cccccc;'>No Match</td></tr><tr><td style='border-bottom: 1px solid #cccccc;'>Sthree Dheerga Match</td><td style='border-bottom: 1px solid #cccccc;'>100%</td><td style='border-bottom: 1px solid #cccccc;'>Perfect Match</td></tr><tr><td style='border-bottom: 1px solid #cccccc;'>Yoni Match</td><td style='border-bottom: 1px solid #cccccc;'>50%</td><td style='border-bottom: 1px solid #cccccc;'>Average Match</td></tr><tr><td style='border-bottom: 1px solid #cccccc;'>Rasi Match</td><td style='border-bottom: 1px solid #cccccc;'>70%</td><td style='border-bottom: 1px solid #cccccc;'>Good Match</td></tr><tr><td style='border-bottom: 1px solid #cccccc;'>Rasi Lord Match</td><td style='border-bottom: 1px solid #cccccc;'>0%</td><td style='border-bottom: 1px solid #cccccc;'>No Match</td></tr><tr><td style='border-bottom: 1px solid #cccccc;'>Vasiya Match</td><td style='border-bottom: 1px solid #cccccc;'>0%</td><td style='border-bottom: 1px solid #cccccc;'>No Match</td></tr><tr><td style='border-bottom: 1px solid #cccccc;'>Rajju Match</td><td style='border-bottom: 1px solid #cccccc;'>60%</td><td style='border-bottom: 1px solid #cccccc;'>Above Average Match</td></tr><tr><td style='border-bottom: 1px solid #cccccc;'>Vedhai Match</td><td style='border-bottom: 1px solid #cccccc;'>100%</td><td style='border-bottom: 1px solid #cccccc;'>Perfect Match</td></tr></table></div><div style='width:100%;margin-top:0px;border-top:2px solid #02a698;border-left:2px solid #02a698;border-right:2px solid #02a698;border-bottom:2px solid #02a698;text-align:center;color:deeppink;font-size:18px;font-weight:bold;padding-top:5px;'>Standard Match Percentage : <span style='color:deeppink;font-size:24px;'>47%</span><br/></div><br/><div style="float:left;width:100%;"><div style="display:flex;margin-top:20px;justify-content:space-around;flex-wrap:wrap;"><div style="margin-bottom:10px;"><table id="mainrasichart" style="border-collapse: collapse;font-weight:bold;height:450px;"><tr><td id="b12" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Moon</span></td><td id="b1" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Ascendant</span></td><td id="b2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fd52fd;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Sun</span><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mercury</span><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Rahu</span></td><td id="b3" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fd5353;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Venus</span></td></tr><tr><td id="b11" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#ffeb3b;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Jupiter</span></td><td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">Male<br/>Rasi Chart</td><td id="b4" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mars</span></td></tr><tr><td id="b10" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Saturn</span></td><td id="b5" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"></td></tr><tr><td id="b9" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"></td><td id="b8" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Kethu</span></td><td id="b7" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"></td><td id="b6" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"></td></tr></table></div><div><table id="alliancerasichart" style="border-collapse: collapse;font-weight:bold;height:450px;width:100%;"><tr><td id="b12" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Jupiter</span></td><td id="b1" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Rahu</span></td><td id="b2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mars</span></td><td id="b3" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Moon</span></td></tr><tr><td id="b11" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Venus</span><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Saturn</span></td><td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">Female<br/>Rasi Chart</td><td id="b4" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"></td></tr><tr><td id="b10" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fd5353;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Sun</span></td><td id="b5" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"></td></tr><tr><td id="b9" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fd52fd;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mercury</span></td><td id="b8" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Ascendant</span></td><td id="b7" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Kethu</span></td><td id="b6" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#ffeb3b;color: darkblue;"></td></tr></table></div></div></div><div class="col-lg-12 text-center"><img src="img/houses.png" style="object-fit: cover;padding-top:50px;padding-bottom:40px;" /></div><div style="float:left;width:100%;"><div style="display:flex;margin-top:10px;justify-content:space-around;flex-wrap:wrap;"><div style="margin-bottom:10px;"><table id="mainnavamsachart" style="border-collapse: collapse;font-weight:bold;height:450px;font-size: 14px;font-family: maiandra gd;"><tr><td id="b12" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"></td><td id="b1" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"></td><td id="b2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#ffeb3b;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Rahu</span></td><td id="b3" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Sun</span><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Saturn</span></td></tr><tr><td id="b11" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"></td><td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">Male<br/>Navamsa Chart</td><td id="b4" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Ascendant</span><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mars</span></td></tr><tr><td id="b10" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"></td><td id="b5" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fd52fd;color: white;"></td></tr><tr><td id="b9" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Jupiter</span><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Venus</span></td><td id="b8" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Kethu</span></td><td id="b7" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"></td><td id="b6" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: bluefont-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fd5353;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Moon</span><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mercury</span></td></tr></table></div><div><table id="alliancenavamsachart" style="border-collapse: collapse;font-weight:bold;height:450px;width:100%;"><tr><td id="b12" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Moon</span></td><td id="b1" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"></td><td id="b2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#ffeb3b;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mars</span></td><td id="b3" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Sun</span></td></tr><tr><td id="b11" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Venus</span><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Kethu</span></td><td colspan="2" rowspan="2" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">Female<br/>Navamsa Chart</td><td id="b4" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Ascendant</span></td></tr><tr><td id="b10" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"></td><td id="b5" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fd52fd;color: white;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Rahu</span></td></tr><tr><td id="b9" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;"></td><td id="b8" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mercury</span></td><td id="b7" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;"><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Jupiter</span><span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Saturn</span></td><td id="b6" style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fd5353;color: white;"></td></tr></table></div></div></div>        <p class="mb-4">Dear user, do you know?  Based on birth star <span style='color:red; font-weight:bold;  font-style: italic;'>That experienced astrologers give <u>only 20% importance</u></span> to these ten matches?</p>
        
        <p class="mb-4"><span style='color: maroon; font-weight:bold;'>This is why even if you send your horoscope based on this ten matching method, many times it is rejected by the groom's family as not suitable.</span></p>
        
        <p class="mb-4">Based on our survey of over 150 marriage matching astrologers over the past 2 years,</p>
        
        <p class="mb-4">Beyond these ten matches, software-based the various prediction methods they use to make the final decision.</p>
        
        <p class="mb-4"><span style='color:#0EC4E8; font-weight:bold; font-style: italic;'><u>With over 80% accuracy</u></span>, our exclusive invention <span style='color:blue; font-weight:bold;'>Vihaga Yoga Pattathi (VYP) matching-method</span> by looking for matching,</p>
        
        <p class="mb-4">Find your perfect life partner fast - get our most accurate high-quality marriage match report, <span style='font-weight:bold;font-style: italic;'>now at a discounted price!</span></p>        
                  <div class="pricing-table table-1">
                    <div class="ptable-item featured-item">
                        <div class="ptable-single">
                            <div class="ptable-header">                                
                              <a href="horoscopeConfirmation.php?mainProfileId=11115&allianceProfileId=11116&decisionID1=8653&decisionID2=8654&matchMethod=complete&matchID=1774">
                                <div class="ptable-title">
                                    <h2>See The Exact Match</h2>
                                </div>
                                <div class="ptable-price">
                                    <h2><small>₹</small>599 <span class="strikethrough">₹1,000</span><span> <span> + GST</span></h2>
                                    <span class="price-note"><i>per Report</i></span>
                                </div>
                              </a>
                            </div>
                        </div>
                    </div>
                </div>                    

                <h3>Here, It's for you:</h3>

                <p class="mb-4">📝 What's included in the report?</p>
                <div class="content-section">
                    <span class="underline"></span>
                    <span class="short-underline"></span>
                </div>
                <p class="mb-4"><ul style='list-style-type: none;'>
<li>✅ <b>15 pages for you</b> – Simple, clear compatibility analysis (emotional, psychological, spiritual, and astrological).</li>
<li>✅ <b>15 pages for your astrologer</b> – Advanced technical calculations using our exclusive Vivaha Yoga Pathi (VYP) system.</li>
<li>✅ <b>Your personal relationship strengths and weaknesses</b> – So you know exactly what to expect.</li>
<li>✅ <b>Spiritual and psychological solutions</b> – Personalized remedies to enhance your bond and overcome challenges.</li>
<li>✅ <b>Exclusive Astro Music Therapy</b> – Special raga-based mantras to neutralize planetary imbalances.</li>
</ul>
<p>This is not just another basic horoscope matching.<br>
It is a deep, scientific marriage compatibility analysis trusted by astrologers and spiritual seekers worldwide.</p></p>

                <h3></h3><iframe src="New Alliance Match Making Report.pdf" width="100%" height="750px" style="border: none;"></iframe> 
        <div class="mt-3">
        <h3>What happens if you ignore this?</h3>
        <p class="mb-4"><ul style='list-style-type: none;'>
<li>⏳ <b>You may unknowingly choose an incompatible partner, leading to years of struggle.</b></li>
<li>⏳ <b>Wrong compatibility can lead to emotional pain, stress, and separation.</b></li>
<li>⏳ <b>Missed opportunities – Your perfect match may slip away if you don’t check deep compatibility.</b></li>
<li>⏳ <b>Karmic mismatches can create lifelong challenges that could have been avoided.</b></li>
</ul>
<p>Why take a chance when you can make an informed decision?<br>
Introducing the most advanced 30-page personalized marriage compatibility report!</p></p>
        
        <div class="macth-payment">
          <a href="horoscopeConfirmation.php?mainProfileId=11115&allianceProfileId=11116&decisionID1=8653&decisionID2=8654&matchMethod=complete&matchID=1774" class="btn btn-mat mb-1 mt-3 btn-sm">Instantly, See The Exact Match!</a>
          <span class="buynow-note"><b>Note</b>: Click this button to buy this package</span>
        </div>
        </div>   
        </div>   
  </section>
</main>

<!-- Modal -->
<div class="modal fade" id="modalCenter">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <i><h5 class="modal-title" id="lblAlert" style="font-weight: bold"></h5></i>
        <div class="col-md">
          <div class="demo-inline-spacing">
            <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

  localStorage.removeItem("submittedOnce");

  function downloadReport() {
    document.getElementById('lblAlert').innerText = "PDF is downloading";
    window.location.href = "downloadReport.php?decisionId=8653&mainProfileId=11115&allianceProfileId=11116&matchmethod=10point&language=en";
    setTimeout(function() {
       hidePopup();
      },2000);
  }
  function sendMail() {
    document.getElementById('lblAlert').innerText = "Sending EMail (You will receive mail within 5mins)";
    showPopup();
    let mainProfileId = "11115";
    let allianceProfileId = "11116";
    let decisionId = "8653";
    let matchmethod = "10point";
    let language = "en";
    $.ajax({
      url: 'sendMarriageReportMail.php',
      type: 'POST',
      dataType: 'text',
      data: "mainProfileId=" + mainProfileId + "&allianceProfileId=" + allianceProfileId + "&decisionId=" + decisionId + "&matchmethod=" + matchmethod + "&language=" + language,
      success: function (data) {
        if(data != "")
          hidePopup();
        else
          document.getElementById('lblAlert').innerText = data;
      }
    });
  }
  function sendWhatsApp() {
    document.getElementById('lblAlert').innerText = "Sending to WhatsApp";
    showPopup();
    let mainProfileId = "11115";
    let allianceProfileId = "11116";
    let decisionId = "8653";
    let matchmethod = "10point";
    let language = "en";
    $.ajax({
      url: 'sendMarriageReportWhatsApp.php',
      type: 'POST',
      dataType: 'text',
      data: "mainProfileId=" + mainProfileId + "&allianceProfileId=" + allianceProfileId + "&decisionId=" + decisionId + "&matchmethod=" + matchmethod + "&language=" + language,
      success: function (data) {
        if(data != "")
          hidePopup();
        else
          document.getElementById('lblAlert').innerText = data;
      }
    });
  }
  function showPopup()
  {
    $('#modalCenter').modal('show');
  }
  function hidePopup()
  {
    $('#modalCenter').modal('hide');
  }
</script><style>
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