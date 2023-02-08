 <!-- partial:partia/__scripts.html -->

 <!-- <script src="<?= site_url("assets/pwa/index.js"); ?>" type="module"></script> -->
 <script src="<?= site_url("assets/frontend/js/plugins/jquery-3.4.1.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/bootstrap.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/popper.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/imagesloaded.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/jquery.magnific-popup.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/jquery.countdown.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/jquery.waypoints.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/jquery.counterup.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/jquery.zoom.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/jquery.inview.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/jquery.event.move.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/wow.min.js"); ?>"></script>

 <script src="<?= site_url("assets/frontend/js/plugins/isotope.pkgd.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/slick.min.js"); ?>"></script>
 <script src="<?= site_url("assets/frontend/js/plugins/ion.rangeSlider.min.js"); ?>"></script>

 <script src="<?= site_url("assets/frontend/js/main.js?v=" . rand(10, 100) . ""); ?>"></script>

 <div id="fb-root"></div>
 <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0" nonce="gYfcx0Gu"></script>

 <!-- toastify -->
 <script src="<?= site_url("vendor/toastify/toastify.js"); ?>"></script>
 <!-- end of toastify -->

 <!-- partial -->
 <script src="<?= site_url("assets/frontend/js/custom.js?v=" . rand(10, 100) . ""); ?>"></script>
 <script>
     $(document).ready(function() {
         $('.carousel').carousel({
             interval: 3000
         })
     });
     $(document).ready(function() {
         $("#facebook_click").click(function() {

             $(".fb-share-button").click()
             //  document.getElementById('facebook_button').click();
         });
     });
 </script>