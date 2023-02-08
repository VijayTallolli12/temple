 <style>
     #main {
         background-color: #f2f7ff;
     }

     .match-height {
         padding-left: 8%;
     }

     /* .page-heading {
            padding-bottom: ;
        } */
 </style>
 <?php
    $blogs = $this->db->get_where('blogs', array('id' => $blogs_id))->row_array();
    ?>
 <div class="page-heading">
     <section id="section">
         <div class="row">
             <div class="col-12 col-md-12 ml-4">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Blog</h4>
                     </div>
                     <div class="card-content">
                         <div class="card-body">
                             <form id="blogs_u_title" action="<?php echo site_url('admin/blogs/update'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                 <input type="hidden" name="id" id="id" value="<?= $blogs['id']; ?>" readonly>
                                 <div class="form-body">
                                     <div class="row">
                                         <div class="col-md-4">
                                             <label>Blog Title</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" class="form-control" name="blog_title" id="blog_title" placeholder="Blog Title" value="<?= $blogs['title']; ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Featured Image</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <div class="row">
                                                 <div class="col-md-6 col-sm-4">
                                                     <?php if ($blogs['featured_image'] != "") { ?>
                                                         <img src="<?= site_url($blogs['featured_image']); ?>" alt="Shiroor Math" style="width:inherit;height:inherit" id="preview_img">
                                                         <br>
                                                     <?php } else { ?>
                                                         <span id="preview_img"></span>
                                                     <?php } ?>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                             <label style="color:seashell">.</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="file" name="featured_image" id="formFile" class="form-control" accept="image/*" onchange="readURL(this);">
                                         </div>
                                         <div class="col-md-4">
                                             <div id="change_img" style="display: none;margin-top: 26rem;margin-left: 9rem;">
                                                 <a type="button" onclick="change_img();" class="btn btn-primary me-1 mb-1">Remove Image</a>
                                             </div>
                                         </div>
                                         <div class=" col-md-8 form-group">
                                             <img id="blah" src="#" alt="your image" / style="display: none;">
                                         </div>

                                         <div class="col-md-4">
                                             <label>Date</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="date" id="first-name" class="form-control" name="blog_date" placeholder="Blog Date" value="<?= $blogs['date']; ?>" required>
                                         </div>
                                         <div class="col-md-4">
                                             <label>Place</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="blog_place" placeholder="Place" value="<?= $blogs['place']; ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Description</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <textarea name="blog_desc" id="default" cols="30" rows="10"><?= $blogs['description']; ?></textarea>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Category</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <select name="blogs_category" class="choices form-select">
                                                 <?php
                                                    $this->db->where('parent', "");
                                                    $parent = $this->db->get('category');
                                                    foreach ($parent->result_array() as $key => $parent) :
                                                    ?>
                                                     <optgroup label="<?= $parent['category']; ?>">
                                                         <?php
                                                            $this->db->where('parent', $parent['id']);
                                                            $category = $this->db->get('category');
                                                            foreach ($category->result_array() as $key => $category) :
                                                            ?>
                                                             <option value="<?= $category['id']; ?>" <?php if ($blogs['category'] == $category['id']) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?= $category['category']; ?></option>
                                                         <?php
                                                            endforeach;
                                                            ?>
                                                     </optgroup>
                                                 <?php
                                                    endforeach; ?>
                                             </select>
                                         </div>
                                         <div class="col-md-4">
                                             <div>
                                                 <label>Images</label>
                                             </div>
                                             <br>
                                             <div>
                                                 <a href="<?= site_url("admin/blogs/edit_images/" . $blogs['id'] . ""); ?>" class="btn btn-danger rounded-pill"><i class="bi bi-images"></i> EDIT</a>
                                             </div>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <div class="row">
                                                 <div class="col-md-8 col-sm-8">
                                                     <div class="card-body">
                                                         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                             <div class="carousel-inner">
                                                                 <?php
                                                                    $this->db->where('blog_id', $blogs['id']);
                                                                    $blog_image = $this->db->get('blogs_image');
                                                                    foreach ($blog_image->result_array() as $key => $blog_image) : ?>
                                                                     <div class="carousel-item <?php if ($key == '0') {
                                                                                                    echo "active";
                                                                                                } ?> ">
                                                                         <img src=" <?= site_url($blog_image['image']); ?>" class="d-block w-100" alt="...">
                                                                     </div>
                                                                 <?php
                                                                    endforeach; ?>
                                                             </div>
                                                             <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                                                                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                 <span class="visually-hidden">Previous</span>
                                                             </a>
                                                             <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                                                                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                 <span class="visually-hidden">Next</span>
                                                             </a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-md-4 col-sm-4 justify-content-start">
                                             <a href="<?= site_url('admin/blogs'); ?>" class="btn btn-secondary "><i class="fas fa-backward"></i> Back</a>
                                         </div>
                                         <div class="col-md-8 col-sm-8 d-flex justify-content-end">
                                             <button type="submit" class="btn btn-primary">Submit</button>
                                             <button type="reset" class="btn btn-light-secondary">Reset</button>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>
 <script>
     tinymce.init({
         selector: '#kanike_desc'
     });

     function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             document.getElementById('blah').style.display = "block";
             document.getElementById('change_img').style.display = "block";
             document.getElementById('preview_img').style.display = "none";
             reader.onload = function(e) {
                 $('#blah')
                     .attr('src', e.target.result)
                     .width(625)
                     .height(450);
             };

             reader.readAsDataURL(input.files[0]);
         }
     }

     function change_img() {
         document.getElementById('blah').style.display = "none";
         document.getElementById('change_img').style.display = "none";
         document.getElementById('preview_img').style.display = "block";
         document.getElementById('formFile').value = "";
     }
 </script>