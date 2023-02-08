 <!-- partial:partia/__subheader.html -->
 <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg") ?>)">
     <div class="container">
         <div class="sigma_subheader-inner">
             <div class="sigma_subheader-text">
                 <h1><?= $page_title ?></h1>
             </div>
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a class="btn-link" href="<?= site_url() ?>">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?= $page_title ?></li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>

 <!-- Broadcast Start -->
 <div class="section section-padding">
     <div class="container">
         <div class="section-title text-center">
             <p class="subtitle">Watch Video</p>
             <h4>Our Video's(Youtube)</h4>
         </div>
         <div class=" row sigma_broadcast-video">
             <?php
                if (sizeof($yt_videos) > 0) {
                    foreach ($yt_videos as $key => $value) {
                        //convert normal link to embeded link 
                        $videoURL = $value['link'];
                        $convertedURL = str_replace("watch?v=", "embed/", $videoURL);

                        //fetch thumbnail from link
                        $video_id = explode("?v=", $videoURL);
                        $video_id = $video_id[1];
                        $thumbnail = "http://img.youtube.com/vi/" . $video_id . "/hqdefault.jpg";
                ?>
                     <div class="col-lg-3 col-sm-6 mb-30">
                         <div class="sigma_video-popup-wrap">
                             <img src="<?= $thumbnail; ?>" alt="video">
                             <a href="<?= $value['link']; ?>" class="sigma_video-popup popup-sm popup-youtube">
                                 <i class="fas fa-play"></i>
                             </a>
                         </div>
                         <h6 class="mb-0 mt-3" style="color: black;"><?= $value['title']; ?></h6>
                     </div>
             <?php }
                } ?>

         </div>
     </div>
 </div>
 <!-- Broadcast End -->