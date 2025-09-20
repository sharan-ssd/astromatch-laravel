@extends('frontend.template')

@section('content')
<main class="float-start w-100 body-main">
   <section class="listing-page-div">
      <div class="container">
         <h2 class="common-heading mt-3 mb-3 text-center">
            {{ __('messages.profilelist') }}
         </h2>
         <div class="recentsearch">
            <div class="row">
               <div class="col-md-7">
               </div>
               <div class="col-md-5 mt-2 mb-3">
                  <div class="horoscope-search">
                     <label class="keyword-label" for="keyword">Keyword</label>
                     <input type="text" class="form-control" id="searchInput" name="search" value=""
                        placeholder="Search">
                     <a title="view all" href="javascript:void(0)" onclick="clearSearch()"
                        class="viewall-horoscope">View All</a>
                  </div>
               </div>
            </div>
         </div>

         <div class="profile-box" id="profiles">
            <div id="reasonBox" style="display:none;">
               <form id="tarotForm" action="#" method="post">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="form-group mt-2">
                           <label>*{{ __('messages.deletereason') }}
                           </label>
                           <span id="reasonError" style="color: red;"></span>
                           <div class="radio-group common-radio-btns profil-radio-buttons mt-2">
                              <div class="radio-item">
                                 <label><input type="radio" class="form-check form-check-inline" id="rbWrong"
                                       name="reason" value="Wrong Data" onchange="showCommentBox()" />
                                    {{ __('messages.wrongdata') }}
                                 </label>
                              </div>
                              <div class="radio-item">
                                 <label><input type="radio" class="form-check form-check-inline" id="rbNoNeed"
                                       name="reason" value="No longer Needed" onchange="showCommentBox()" />
                                    {{ __('messages.noneed') }}
                                 </label>&nbsp;&nbsp;
                              </div>
                              <div class="radio-item">
                                 <label><input type="radio" class="form-check form-check-inline" id="rbCleanUp"
                                       name="reason" value="Just to clean up" onchange="showCommentBox()" />
                                    {{ __('messages.cleanup') }}
                                 </label>
                              </div>
                              <div class="radio-item">
                                 <label><input type="radio" class="form-check form-check-inline" id="rbOther"
                                       name="reason" value="Other" onchange="showCommentBox()" />
                                    {{ __('messages.otherreason') }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="commentBox" class="col-md-4" style="display:none;">
                        <div class="form-group mt-2">
                           <label>*
                              {{ __('messages.deleteremarks') }}
                           </label><br />
                           <span id="commentError" style="color: red;font-size: 11px;"></span>
                           <input type="text" class="form-control" id="deleteComment" />
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mt-2">
                           <input type="button" class="btn btn-mat" value="{{ __('messages.submit') }}"
                              onclick="confimrDelete();" />
                           <input type="hidden" id="profileID" /><input type="hidden" id="deleteReason" />
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="row mt-2">
               <?php 
                  if(isset($profiles))
                  {
                     foreach($profiles as $profile)
                     {
                        $editLink = "https://jenuineastro.com/editPlanetPositions.php?astroProfileID=" . $profile->astroProfileID . "&userID=" . auth()->user()->userId;
                        $reportLink = "astroreport.php?astroProfileID=" . $profile->astroProfileID;
               ?>
               <div class="col-md-6 mb-4">
                  <div class="card">
                     <div class="card-body">
                        <p class="card-text"><a class="deleteicons" title="Delete"
                              onclick="showDeleteReason(<?php echo $profile->astroProfileID;?>)"><i class="fa fa-trash"
                                 style="color:red;"></a></i>
                           <?php echo $profile->astroProfileName . " - " . $profile->DOB . " - " . $profile->TOB . " - " . $profile->placeOfBirthCity . ", " . $profile->placeOfBirthState . ", " . $profile->placeOfBirthCountry; ?>
                        </p>
                     </div>
                  </div>
               </div>
               <?php } } else { ?>
               <div class="item list-item col-md-12 col-xl-12 view-group grid-group-item collist">
                  <div class="comon-items-d1 d-inline-block w-100">
                     <div class="top-asto d-flex align-items-center justify-content-between w-100">
                        <div class="pro-astro d-flex align-items-start">
                           <div class="le-astro mt-4 text-center">
                              <h5> No records found </h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
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
            <i>
               <h5 class="modal-title" id="lblAlert" style="font-weight: bold">
                  {{ __('messages.deletingprofile') }}
               </h5>
            </i>
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
   document.getElementById('searchInput').addEventListener('keyup', function() {
      let input = this.value.toLowerCase();
      let cards = document.querySelectorAll('.profile-box .card');

      cards.forEach(card => {
         let text = card.textContent.toLowerCase();
         if (text.includes(input)) {
               card.parentElement.style.display = "block"; // Show card
         } else {
               card.parentElement.style.display = "none"; // Hide card
         }
      });
   });
   function clearSearch()
   {
      document.getElementById('searchInput').value = "";
      let cards = document.querySelectorAll('.profile-box .card');
      cards.forEach(card => {
         let text = card.textContent.toLowerCase();
         card.parentElement.style.display = "block"; // Show card
      });
   }

    function showDeleteReason(profileID)
    {
      //alert(profileID);
      $("#profileID").val(profileID);
      $("#reasonBox").show();
      window.scrollTo(0,0);
    }
    function showCommentBox()
    {
      // reason validation
      let reason = document.querySelector('input[name="reason"]:checked');
      const reasonError = document.getElementById('reasonError');
      if (!reason) {
            reasonError.innerText = "Please select any one reason";
            valid = false;
      }
      //alert(reason.value);
      $("#deleteReason").val(reason.value);
      if(reason.value == "Other")
      {
         $("#commentBox").show();
      }
      else
      {
         $("#commentBox").hide();
      }
    }
    function deleteProfile()
    {
      //alert(profileID);
      let isValid = true;
      let profileID = $("#profileID").val();
      let deleteComment = $("#deleteComment").val();
      let deleteReason = $("#deleteReason").val();
      if(deleteReason == "Other" && deleteComment == "")
      {
         isValid = false;
         $("commentError").innerText = "Please Enter Comment";
      }      
      if(deleteReason == "")
      {
         isValid = false;
         $("reasonError").innerText = "Please Select Any One Reason";
      }
      if(isValid)
      {
         $("#modalCenter").modal("show");
         $.ajax({
         url: 'deleteProfile.php',
         type: 'POST',            
         dataType: 'text',
         data: "profileID="+profileID+"&deleteReason="+deleteReason+"&deleteComment="+deleteComment,
         success: function (data) {
               //console.log(data);
               if(data != "")
               {            
                  //alert(data);
                  document.getElementById('lblAlert').innerText = data;
                  window.location.reload();
               }
         }
         });
      }
    }

function confimrDelete() {
    if (confirm("Are you sure you want to delete?")) {
        // your deletion code
        deleteProfile();
    }
    return false;
}

function deleteItem(){
    var checkstr =  confirm('are you sure you want to delete this?');
    if(checkstr == true){
      // do your code
    }else{
    return false;
    }
  }
</script>
@endsection