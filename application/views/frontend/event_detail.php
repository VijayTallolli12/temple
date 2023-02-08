 <!-- partial:partia/__subheader.html -->
 <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg") ?>)">
     <div class="container">
         <div class="sigma_subheader-inner">
             <div class="sigma_subheader-text">
                 <h3 style="color: white;"><?= $event_detail['title']; ?></h3>
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
                 <div class="post-detail-wrapper">

                     <div class="entry-content">
                         <div class="sigma_post-meta">
                             <div class="sigma_post-categories">
                                 <?php
                                    $this->db->where("id", $event_detail['category']);
                                    $category = $this->db->get('category')->row_array();
                                    ?>
                                 <span class="sigma_post-category-a"><?= $category['category']; ?></span>
                             </div>
                         </div>
                         <h4 class="entry-title"><?= $event_detail['title']; ?></h4>
                         <a href="<?= site_url($event_detail['featured_image']); ?>" class="gallery-thumb">
                             <img src="<?= site_url($event_detail['featured_image']); ?>" alt="post">
                         </a>
                         <div class="sigma_post-meta">
                             <?php
                                $sampleDate = $event_detail['date'];
                                $convertDate = date("M d,Y", strtotime($sampleDate));
                                $day = date('l', strtotime($convertDate));
                                ?>
                             <a href="#"> <i class="far fa-calendar"></i> <?= $day; ?>,<?= $convertDate; ?></a>
                             <div class="sigma_post-single-meta-item sigma_post-share">
                                 <ul class="sigma_sm">
                                     <li>
                                         <i class="fas fa-share-alt"></i>
                                     </li>
                                     <li>
                                         <a href="https://www.facebook.com/sharer/sharer.php?u=<?= site_url("events/" . $event_detail['id'] . "/" . $event_detail['seo_title']); ?>" id="facebook_click"><i class="fab fa-facebook-f"></i></a>
                                     </li>
                                     <li>
                                         <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?= $event_detail['title'] ?>&url=<?= site_url("events/" . $event_detail['id'] . "/" . $event_detail['seo_title']); ?>">
                                             <i class=" fab fa-twitter"></i>
                                         </a>
                                     </li>

                                     <li>
                                         <a href="whatsapp://send?text=<?= site_url("events/" . $event_detail['id'] . "/" . $event_detail['seo_title']); ?>" data-action="share/whatsapp/share">
                                             <i class=" fab fa-whatsapp"></i>
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>

                         <?= $event_detail['description']; ?>

                         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                             <div class="carousel-inner">
                                 <?php
                                    $this->db->where('blog_id', $event_detail['id']);
                                    $event_images = $this->db->get('blogs_image')->result_array();
                                    foreach ($event_images as $key => $value) {
                                        if ($key == 0) {
                                    ?>
                                         <div class="carousel-item active">
                                             <a href="<?= site_url($value['image']); ?>" class="gallery-thumb">
                                                 <img class="d-block w-100" src="<?= site_url($value['image']); ?>" alt="<?= $event_detail['title'] ?>">
                                             </a>
                                         </div>
                                     <?php } else { ?>
                                         <div class="carousel-item">
                                             <a href="<?= site_url($value['image']); ?>" class="gallery-thumb">
                                                 <img class="d-block w-100" src="<?= site_url($value['image']); ?>" alt="<?= $event_detail['title'] ?>">
                                             </a>
                                         </div>
                                 <?php }
                                    } ?>
                             </div>
                             <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                 <span class="sr-only">Previous</span>
                             </a>
                             <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                 <span class="sr-only">Next</span>
                             </a>
                         </div>

                     </div>

                     <!-- Post Meta Start -->
                     <div class="sigma_post-single-meta row" style="display: flex;">
                         <div class="sigma_post-single-meta-item col-6">
                             <h6>Tags</h6>
                             <div class="tagcloud">
                                 <?php
                                    $this->db->where('id', $event_detail['category']);
                                    $category_details = $this->db->get('category')->row_array();
                                    $this->db->where('id', $category_details['parent']);
                                    $category_details_parent = $this->db->get('category')->row_array();
                                    if (isset($category_details_parent)) {
                                    ?>
                                     <a href="#"><?= $category_details_parent['category']; ?></a>
                                     <?php
                                        $this->db->where('parent', $category_details_parent['id']);
                                        $categorys = $this->db->get('category')->result_array();
                                        foreach ($categorys as $value) {
                                        ?>
                                         <a href="<?= site_url("events/category/" . $value['id']); ?>"><?= $value['category']; ?></a>
                                     <?php }
                                    } else { ?>
                                     <a href="#"><?= $category_details['category']; ?></a>
                                 <?php } ?>
                             </div>
                         </div>
                         <div class="sigma_post-single-meta-item sigma_post-share col-6">
                             <ul class="sigma_sm">
                                 <li>
                                     <i class="fas fa-share-alt"></i>
                                 </li>
                                 <li>
                                     <a href="https://www.facebook.com/sharer/sharer.php?u=<?= site_url("events/" . $event_detail['id'] . "/" . $event_detail['seo_title']); ?>" id="facebook_click"><i class="fab fa-facebook-f"></i></a>
                                 </li>
                                 <li>
                                     <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?= $event_detail['title'] ?>&url=<?= site_url("events/" . $event_detail['id'] . "/" . $event_detail['seo_title']); ?>">
                                         <i class=" fab fa-twitter"></i>
                                     </a>
                                 </li>

                                 <li>
                                     <a href="whatsapp://send?text=<?= site_url("events/" . $event_detail['id'] . "/" . $event_detail['seo_title']); ?>" data-action="share/whatsapp/share">
                                         <i class=" fab fa-whatsapp"></i>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     <!-- Post Meta End -->


                     <!-- Related Posts Start -->
                     <div class=" section">
                         <h5>Related Posts</h5>
                         <div class="row">
                             <?php
                                $this->db->limit("3", "0");
                                $this->db->where('category', $event_detail['category']);
                                $related_events = $this->db->get('blogs')->result_array();
                                foreach ($related_events as $key => $value) {
                                    if ($value['id'] != $event_detail['id']) {
                                        $sampleDate = $value['date'];
                                        $convertDate = date("M d,Y", strtotime($sampleDate));
                                ?>
                                     <!-- Article Start -->
                                     <div class="col-md-6">
                                         <article class="sigma_post">
                                             <div class="sigma_post-thumb events_image">
                                                 <a href="<?= site_url("events/" . $value['id'] . "/" . $value['seo_title']); ?>">
                                                     <img src="<?= site_url($value['featured_image']); ?>" alt="post">
                                                 </a>
                                             </div>
                                             <div class="sigma_post-body events_body card_adj_events">
                                                 <div class="sigma_post-meta">
                                                     <a href="blog-details.html" class="sigma_post-date"> <i class="far fa-calendar"></i><?= $convertDate ?></a>
                                                 </div>
                                                 <h5 class="text-2"> <a href="<?= site_url("events/" . $value['id'] . "/" . $value['seo_title']); ?>"><?= $value['title']; ?></a> </h5>
                                             </div>
                                         </article>
                                     </div>
                                     <!-- Article End -->
                             <?php
                                    }
                                } ?>
                         </div>
                     </div>
                     <!-- Related Posts End -->

                 </div>
             </div>

             <div class="col-lg-4">
                 <div class="sidebar">

                     <!-- Popular Feed Start -->
                     <div class="sidebar-widget widget-recent-posts">
                         <h5 class="widget-title">Recent Posts</h5>
                         <?php
                            $this->db->select('*');
                            $this->db->from('blogs');
                            $this->db->where('status', 1);
                            $this->db->order_by('id', 'DESC');
                            $this->db->limit(5);
                            $latest_events = $this->db->get()->result_array();
                            foreach ($latest_events as $value) {
                                $sampleDate = $value['date'];
                                $convertDate = date("M d,Y", strtotime($sampleDate));
                            ?>
                             <article class="sigma_recent-post">
                                 <a href="<?= site_url("events/" . $value['id'] . "/" . $value['seo_title']); ?>"><img style="width: 75px;height: 75px;" src="<?= site_url($value['featured_image']); ?>" alt="post"></a>
                                 <div class="sigma_recent-post-body">
                                     <h6 class="text-2"> <a href="<?= site_url("events/" . $value['id'] . "/" . $value['seo_title']); ?>"><?= $value['title']; ?></a> </h6>
                                     <a href="#"> <i class="far fa-calendar"></i> <?= $convertDate; ?></a>
                                 </div>
                             </article>
                         <?php
                            }
                            ?>
                     </div>
                     <!-- Popular Feed End -->

                     <!-- Popular Tags Start -->
                     <div class="sidebar-widget">
                         <h5 class="widget-title">Popular Tags</h5>
                         <div class="tagcloud">
                             <?php
                                $this->db->group_by('category');
                                $events_details1 = $this->db->get('blogs')->result_array();
                                foreach ($events_details1 as $value) {
                                    $this->db->where("id", $value['category']);
                                    $category = $this->db->get('category')->row_array();
                                    if (!empty($category['category'])) {
                                ?>
                                     <a href="<?= site_url("events/category/" . $category['id']); ?>"><?= $category['category']; ?></a>
                             <?php
                                    }
                                } ?>
                         </div>
                     </div>
                     <!-- Popular Tags End -->

                     <!-- Events Archive Start -->
                     <div class="sidebar-widget widget-categories">
                         <h5 class="widget-title"> Archive </h5>
                         <ul class="sidebar-widget-list">
                             <?php
                                $startdate = strtotime("2020-10");
                                $enddate = strtotime(date("Y-m"));

                                while ($startdate <= $enddate) {
                                    $month = date("m", $enddate);
                                    $year = date("Y", $enddate);
                                    $this->db->where("MONTH(date)", $month);
                                    $this->db->where("YEAR(date)", $year);
                                    $this->db->where("status", 1);
                                    $res = $this->db->get("blogs");
                                    if ($res->num_rows() > 0) {
                                ?>
                                     <li> <a href="<?= site_url("events/archieve/" . $month . "/" . $year) ?>"> <?= date("M Y", $enddate) ?> <span><?= $res->num_rows() ?></span> </a> </li>
                             <?php
                                    }
                                    $enddate = strtotime("-1 month", $enddate);
                                }
                                ?>
                         </ul>

                     </div>
                     <!-- Events Archive End -->
                 </div>
             </div>

         </div>
     </div>
 </section>