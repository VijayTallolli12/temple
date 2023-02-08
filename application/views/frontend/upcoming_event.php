 <!-- partial:partia/__subheader.html -->
 <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg") ?>)">
     <div class="container">
         <div class="sigma_subheader-inner">
             <div class="sigma_subheader-text">
                 <h3 style="color: white;"><?= $upcoming_event_details['title']; ?></h3>
             </div>
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a class="btn-link" href="<?= site_url() ?>">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Events</li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>
 <!-- partial -->
 <section class="section">
     <div class="container">
         <div class="row">
             <div class="col-lg-8">
                 <div class="post-detail-wrapper p-0" style="border: none !important;">

                     <div class="entry-content">
                         <div class="sigma_post-meta">
                             <div class="sigma_post-categories">
                                 <span class="sigma_post-category-a">Upcoming Event</span>
                             </div>
                         </div>
                         <a href="<?= site_url($upcoming_event_details['image']); ?>" class="gallery-thumb">
                             <img src="<?= site_url($upcoming_event_details['image']); ?>" alt="post">
                         </a>
                         <h4 class="entry-title"><?= $upcoming_event_details['title']; ?></h4>
                         <div class="sigma_post-meta">
                             <?php
                                $sampleDate = $upcoming_event_details['date'];
                                $convertDate = date("M d,Y", strtotime($sampleDate));
                                $day = date('l', strtotime($convertDate));
                                ?>
                             <a href="blog-details.html"> <i class="far fa-calendar"></i> <?= $day; ?>, <?= $convertDate; ?></a>

                             <div class="sigma_post-single-meta-item sigma_post-share">
                                 <ul class="sigma_sm">
                                     <li>
                                         <i class="fas fa-share-alt"></i>
                                     </li>
                                     <li>
                                         <a href="https://www.facebook.com/sharer/sharer.php?u=<?= site_url("upcoming_events/" . $upcoming_event_details['seo_title']); ?>" id="facebook_click"><i class="fab fa-facebook-f"></i></a>
                                     </li>
                                     <li>
                                         <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?= $upcoming_event_details['title'] ?>&url=<?= site_url("upcoming_events/" . $upcoming_event_details['seo_title']) ?>">
                                             <i class=" fab fa-twitter"></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="whatsapp://send?text=<?= site_url("upcoming_events/" . $upcoming_event_details['seo_title']); ?>" data-action="share/whatsapp/share">
                                             <i class=" fab fa-whatsapp"></i>
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <?= $upcoming_event_details['description']; ?>
                 </div>
                 <!-- Post Meta Start -->
                 <div class="sigma_post-single-meta text-end mt-0">
                     <div class="sigma_post-single-meta-item sigma_post-share">

                         <ul class="sigma_sm">
                             <li>
                                 <i class="fas fa-share-alt"></i>
                             </li>
                             <li>
                                 <a href="https://www.facebook.com/sharer/sharer.php?u=<?= site_url("upcoming_events/" . $upcoming_event_details['seo_title']); ?>" id="facebook_click"><i class="fab fa-facebook-f"></i></a>
                             </li>
                             <li>
                                 <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?= $upcoming_event_details['title'] ?>&url=<?= site_url("upcoming_events/" . $upcoming_event_details['seo_title']) ?>">
                                     <i class=" fab fa-twitter"></i>
                                 </a>
                             </li>
                             <li>
                                 <a href="whatsapp://send?text=<?= site_url("upcoming_events/" . $upcoming_event_details['seo_title']); ?>" data-action="share/whatsapp/share">
                                     <i class=" fab fa-whatsapp"></i>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <!-- Post Meta End -->
             </div>
             <div class="col-lg-4">
                 <div class="sidebar">
                     <!-- Popular Feed Start -->
                     <div class="sidebar-widget widget-recent-posts">
                         <h5 class="widget-title">Upcoming Events</h5>
                         <?php
                            $this->db->order_by("id", "desc");
                            $upcoming_events = $this->db->get_where('upcoming_events', array('status' => 1), 3)->result_array();
                            foreach ($upcoming_events as $key => $value) {
                                $sampleDate = $value['date'];
                                $convertDate = date("d-m-Y", strtotime($sampleDate));

                                $event_date = date("y-m-d", strtotime($sampleDate));
                                $present_date = date('d-m-Y');
                                $present_date = date("y-m-d", strtotime($present_date));

                                if ($present_date < $event_date) {
                                    if ($upcoming_event_details['id'] != $value['id']) {
                            ?>
                                     <article class="sigma_recent-post">
                                         <a href="<?= site_url("events/" . $value['seo_title']); ?>">
                                             <img style="width: 75px;height: 75px;" src="<?= site_url($value['image']); ?>" alt="post">
                                         </a>
                                         <div class="sigma_recent-post-body">
                                             <h6> <a href="<?= site_url('upcoming_events/' . $value['id'] . '/' . $value['seo_title']); ?>"><?= $value['title']; ?></a> </h6>
                                             <a href="#"> <i class="far fa-calendar"></i> <?= $convertDate; ?></a>
                                         </div>
                                     </article>
                         <?php
                                    }
                                }
                            }
                            ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>