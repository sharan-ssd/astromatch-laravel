@extends('frontend.template') 

@section('content')
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
  </script>
  @php
    $profile = DB::table('ab15_userInfo_table')
        ->where('userID', auth()->id())
        ->first();
  @endphp

  <main class="float-start w-100 body-main">
  <section class="konow-more-zoidc d-inline-block w-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <span style="color:red;">  </span>
          <div class="form-zodiuc mb-5 mt-5 mt-lg-0">
           <div class="comon-heading text-center">
                <h2 class="common-heading mt-3 mb-3"> Edit Profile </h2>
            </div>
            <form id="tarotForm" class="reg-form" name="signupForm" action="#" method="post">
              <div class="myprofile-section edit profile-section">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12 text-center mb-3">
                      <img class="my-profile-img" src="assets/img/user.png" alt="profile">
                                          </div>
                    <div class="col-md-12 mb-2">
                      <div class="row">
                        <div class="col-md-4">
                          <label><i class="fa fa-user"></i> Full Name</label>
                          <span id="nameError" style="color: red;font-size: 11px;"></span>
                        </div>
                        <div class="col-md-8 edit-profile-value">                        
                          <input type="text" id="fullname" name="fullname" value="">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-2 mobile-number">
                      <div class="row">
                        <div class="col-md-4">
                          <label><i class="fa fa-phone"></i> Mobile Number </label>
                        </div>
                        <div class="col-md-5 edit-profile-value">
                          <input type="tel" required id="mobile" name="mobile" value="" maxlength="15" onkeypress="isNumberCheck(event)">
                        </div>
                        <div class="col-md-3" style="display:flex;justify-content: right;">
                          <button type="button" id="sendotp" class="bg-orange" onclick="checkDuplicateMobile()">
                            Send OTP                           
                          </button>
                        </div>
                        <div class="col-12" style="display:flex;justify-content: center;"><span id="mobileError" style="color: red;font-size: 11px;"></span></div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-2">
                      <div class="row verify-otp" style="justify-content: right;display:none;">
                       <div class="col-md-4">
                        <label><i class="fa fa-phone"></i> Enter OTP </label>
                       </div>
                        <div id="verifyotp" class="col-md-8">                              
                          <span id="otpError" class="text-danger"></span>
                          <input type="text" class="form-control otpctrl" id="otp" name="otp" placeholder="Enter OTP" maxlength="4"><br/>
                          <button type="button" id="edit_number_btn" class="btn btn-sm btn-secondary" onclick="showMobile()">
                              Edit Number                          </button>                          
                          <button type="button" id="btnVerifyOTP" class="bg-orange" onclick="verifyMobile()">
                              Verify OTP                          </button>   
                        <span class="sameaswhatsapp"> <input type="checkbox"  id="same_whatsapp" name="same_whatsapp" value="1">Same WhatsApp Number </span>
                      </div>
                      </div>
                    </div> 
                    <div class="col-md-12 mb-2">
                      <div class="row">
                        <div class="col-md-4">
                          <label><i class="fab fa-whatsapp" aria-hidden="true"></i> WhatsApp Number </label>
                          <span id="whatsappError" style="color: red;font-size: 11px;"></span>
                        </div>
                        <div class="col-md-8 edit-profile-value">
                          <input type="text" id="whatsapp" name="whatsapp" value="" maxlength="15" onkeypress="isNumberCheck(event)">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-2">
                      <div class="row">
                        <div class="col-md-4">
                          <label><i class="fa fa-envelope"></i> Email </label>
                          <span id="emailError" style="color: red;font-size: 11px;"></span>
                        </div>
                        <div class="col-md-8 edit-profile-value">
                          <input type="text" id="email" name="email" value="{{ $profile->email }}">
                        </div>
                      </div>
                    </div>

                    <!--
                    <div class="col-md-12 mb-2">
                      <div class="row">
                        <div class="col-md-4">
                          <label><i class="fa fa-calendar"></i> Date of Birth </label>
                        </div>
                        <div class="col-md-8 edit-profile-value">
                          <input type="text" name="dob" value="08-04-1996">
                        </div>
                      </div>
                    </div>
                    -->

                    <div class="col-md-12 mb-2">
                      <div class="row">
                        <div class="col-md-4">
                          <label><i class="fa fa-neuter"></i> Gender </label>
                          <span id="genderError" style="color: red;font-size: 11px;"></span>
                        </div>
                        <div class="col-md-8 edit-profile-value">
                          <div class="form-group mt-2">
                            <span id="genderError" style="color: red;font-size: 11px;"></span>
                            <div class="radio-group common-radio-btns">

                            
                              <div class="radio-item">
                                <label><input type="radio" class="form-check form-check-inline" name="gender"  value="Male"/>Male</label>
                              </div>
                              <div class="radio-item">
                                <label><input type="radio" class="form-check form-check-inline" name="gender"  value="Female"/>Female</label>
                              </div>
                              <div class="radio-item">
                                <label><input type="radio" class="form-check form-check-inline" name="gender"  value="transgender"/>Transgender</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-12 mb-2">

                                          <div class="row">
                        <div class="col-md-4">
                          <label><i class="fa fa-users"></i> User Type </label>
                          <span id="userlevelError" style="color: red;font-size: 11px;"></span>
                        </div>
                        <div class="col-md-8 edit-profile-value">
                          <div class="form-group mt-2">
                            <span id="genderError" style="color: red;font-size: 11px;"></span>
                            <div class="radio-group common-radio-btns">
                              <div class="radio-item">
                                <label><input type="radio" class="form-check form-check-inline" id="rbUser" name="userlevel"  value="User"/>General User</label>
                              </div>
                              <div class="radio-item">
                                <label><input type="radio" class="form-check form-check-inline" id="rbAstrologer" name="userlevel"  value="Astrologer"/>Astrologer</label>
                              </div>
                            </div>
                          </div>
                        </div>
                                                <div class="col-md-4">
                          <label><i class="fa fa-eye"></i> Password  </label>
                          <span id="userlevelError" style="color: red;font-size: 11px;"></span>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group mt-2">
                            <span id="passwordError" class="error-message"></span>
                            <input type="password" class="form-control" id="password" autocomplete="off" name="password" placeholder="Password" maxlength="8"/>
                            <a class="view-change-password login-view-pwd-icon" href="javascript:void(0);" onclick="viewPassword()">
                              <i class="fa fa-eye open_eye_current"></i>
                              <i class="fa fa-eye-slash close_eye_current" style="display: none"></i>
                            </a> 
                            <small>( <span>The password must be within 8 characters.</span> </small>
                            <small><span>Choose a Password to share account with Family or Friends</span> )</small>
                          </div>
                        </div>
                                              </div>
                    </div>

                    
                  </div>
                </div>
              </div>
              <div class="submit-edit-profile">
                <button class="btn btn-mat btn-sm" onclick="updateProfile(event)">Update Profile</button>                
              </div>
            <form>
          </div>
        </div>
         <div class="col-lg-6">
          <img src="assets/img/myprofileimg.jpg" class="login-image" alt ="Change Password">
        </div>
      </div>
    </div>
  </section>
</main>
<script>

document.getElementById('same_whatsapp').addEventListener('change', function () {
    const whatsppBox = document.getElementById('whatsapp');
    const mobileBox = document.getElementById('mobile');
    if (this.checked) {
      whatsppBox.value = mobileBox.value;
    } else {
      whatsppBox.value = "";
    }
  });

function updateProfile(e)
{

  //event.preventDefault();
  
  let profileUpdated = "Profile Updated Successfully..!";
  let valid = true;

  // Clear previous error messages
  document.getElementById('nameError').innerText = '';
  document.getElementById('emailError').innerText = '';
  document.getElementById('mobileError').innerText = '';
  document.getElementById('whatsappError').innerText = '';
  document.getElementById('genderError').innerText = '';
  document.getElementById('userlevelError').innerText = '';

  // Full name validation
  const fullName = document.querySelector("input[name='fullname']");
  const nameError = document.getElementById('nameError');
  if (fullName.value.trim() === "") {
    //alert("Please enter your full name.");
    nameError.innerText = 'Please enter full name';
    fullName.focus();
    valid = false;
  }

  //Mobile validation
  const mobileInput = document.getElementById('mobile');
  const mobileError = document.getElementById('mobileError');
  if (mobileInput.value.trim() === "") {
    mobileError.innerText = 'Please enter mobile number';
    mobileInput.focus();
    valid = false;
  }

  //WhatsApp validation
  const whatsappInput = document.getElementById('whatsapp');
  const whatsappError = document.getElementById('whatsappError');
  if (whatsappInput.value.trim() === "") {
    whatsappError.innerText = 'Please enter whatsapp number';
    whatsappInput.focus();
    valid = false;
  }

  // Email validation
  const emailInput = document.getElementById('email');
  const emailError = document.getElementById('emailError');
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (emailInput.value.trim() === "") {
    emailError.innerText = 'Please enter email address';
    emailInput.focus();
    valid = false;
  } else if (!emailPattern.test(emailInput.value)) {
    emailError.innerText = 'Please enter a valid email address';
    emailInput.focus();
    valid = false;
  }

  // Gender validation
  let gender = document.querySelector('input[name="gender"]:checked');
  const genderError = document.getElementById('genderError');
  if (!gender) {
    genderError.innerText = "Please select gender";
    valid = false;
  }

  let userlevel = document.querySelector('input[name="userlevel"]:checked');
  const userlevelError = document.getElementById('userlevelError');
  if (!userlevel) {
    userlevelError.innerText = "Please select user type";
    valid = false;
  }

  const passwordInput = document.getElementById('password');
  const passwordError = document.getElementById('passwordError');
  if (passwordInput.value.trim() === "" || passwordInput.value.trim().length < 8) {
      //alert("Please enter your password.");
      passwordError.innerText = "Please enter password";
      passwordInput.focus();
      valid = false;
  }
    
  if(valid)
  {
    displaySuccessToaster(profileUpdated);
  }
  else{
    e.preventDefault();              
  }

  /*if(valid){
       $.ajax({
            url: 'loginMaster.php',
            type: 'POST', 
            dataType: 'text',
            data: "validateLogin=Y&updateProfile=N&fullName=" + fullName.value + "&mobile=" + mobileInput.value + "&whatsapp=" + whatsappInput.value + "&email=" + emailInput.value + "&gender=" + gender.value + "&userlevel=" + userlevel.value,
            success: function (data) {
                //alert(data);
                console.log(data)
                if(data == "login success")
                {
                    displaySuccessToaster(profileUpdated);
                    window.location.reload();
                }
                else
                {
                    displayErrorToaster(data);
                }
            }
        });
  }*/
}

function verifyMobile()
    {
        let otp = document.getElementById("otp").value;   
        //let otp_verified = document.getElementById("otp_valid").value;   
        if(otp == "")
        {
            document.getElementById("otpError").innerText = "Please enter OTP sent to your mobile";
        }
        else
        {
            $.ajax({
                url: 'checkDuplicate.php',
                type: 'POST',            
                dataType: 'text',                        
                data: "checkDuplicateMobile=N&checkDuplicateEmail=N&validateLogin=N&validateOTP=Y&otp=" + otp,
                success: function (data) {      
                    //alert(data);
			              console.log("validate otp : " + data);
                    if(data == "yes")
                    {
                        document.getElementById("otpError").innerText = "";
			                  $("#btnVerifyOTP").hide();
                        $("#edit_number_btn").hide();
                        $("#btnSignup").removeClass("register-btn-new");
                        //otp_verified.value = "ok";
                        //window.location.reload();
                    }
                    else
                    {
                        document.getElementById("otpError").innerText = "Invalid OTP";
                    }
                }
            });
        }
    }


function checkDuplicateMobile()
    {
        const input = document.querySelector('#mobile');
        /*const iti = intlTelInput.getInstance(input);
        const countryData = iti.getSelectedCountryData();
        var isdCode = countryData.dialCode;*/
        var isdCode = "91"
        let mobile = document.getElementById('mobile').value;
        const mobileError = document.getElementById('mobileError');
        let email = document.getElementById('email').value;
        mobileError.innerText = "";
        console.log("Check Duplicate Function Called");
        console.log(" Mobile : " + mobile + " Email : " + email);
        $.ajax({
            url: 'checkDuplicate.php',
            type: 'POST',            
            dataType: 'text',        
            data: "checkDuplicateMobile=Y&checkDuplicateEmail=N&validateLogin=N&validateOTP=N&mobile=" + mobile + "&isdCode=" + isdCode + "&email=" + email,
            success: function (data) {      
                console.log(data);
                if(data != "")
                {
                    isValid = false;        
                    mobileError.innerText = data;
                }
                else
                {
                    isValid = true;
                    $(".verify-otp").show();
                    $("#edit_number_btn").show();
                    $(".mobile-number").hide();
                    $("#mobile").attr("readonly", true);
                }      
            }
        });
    }
    
    function isNumberCheck(event) {
      let charCode = event.which ? event.which : event.keyCode;
      if (charCode < 48 || charCode > 57) {
          event.preventDefault(); // Prevent non-numeric input
      }
   }

  function displaySuccessToaster(successMessage) {
        toastr.options.timeOut = 2500; // 1.5s 
        toastr.success(successMessage);
    }

    function viewPassword() 
    {
      var currentPassword = document.getElementById("password");

      if (currentPassword.type === "password") {
        currentPassword.type = "text";
        $(".open_eye_current").hide();
        $(".close_eye_current").show();
      } else {
        currentPassword.type = "password";
        $(".open_eye_current").show();
        $(".close_eye_current").hide();
      }
    }

    function showMobile()
    {
        $(".verify-otp").hide();
        $(".mobile-number").show();
        $("#mobile").attr("readonly", false);
        document.getElementById('mobileError').innerText = '';
        document.getElementById('otpError').innerText = '';
        document.getElementById('otp').value = '';
        document.getElementById('sendotp').style.display = "block";
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
@endsection