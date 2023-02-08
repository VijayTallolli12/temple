 <style>
     #main {
         background-color: #f2f7ff;
     }
 </style>
 <div class="page-heading">
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Category Details</h3>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                         <li class="breadcrumb-item"><a href="<?= site_url('admin/blogs'); ?>">Blogs</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Category</li>
                     </ol>
                 </nav>
             </div>
         </div>
     </div>
     <section class="section">
         <div class="card">
             <div class="card-header">
                 <a href="<?= site_url("admin/category/add"); ?> " class="btn btn-primary rounded-pill "><i class="bi bi-plus"></i> Add New Category</a>
             </div>
             <div class="card-body">
                 <table class="table table-striped" id="table1">
                     <thead>
                         <tr>
                             <th>Sl No.</th>
                             <th>Category</th>
                             <th>Parent-Category</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            foreach ($category->result_array() as $key => $category) :
                            ?>
                             <tr>
                                 <td><?php echo $key + 1; ?></td>
                                 <td><?= $category['category']; ?></td>
                                 <?php
                                    $this->db->where('id', $category['parent']);
                                    $parent = $this->db->get('category')->row_array();
                                    if ($parent != "") {
                                    ?>
                                     <td><?= $parent['category']; ?></td>
                                 <?php } else { ?>
                                     <td> </td>
                                 <?php } ?>
                                 <?php if ($category['parent'] != "") {
                                    ?>
                                     <td>
                                         <a href="<?= site_url('admin/category/edit_category/' . $category['id'] . '') ?>"><i class="bi bi-pencil-fill"></i>Edit Category</a>
                                     </td>
                                 <?php } else { ?>
                                     <td>
                                         <a href="<?= site_url('admin/category/edit_category/' . $category['id'] . '') ?>"><i class="bi bi-pencil-fill"></i>Edit Parent</a>
                                     </td>
                                 <?php } ?>
                                 <td>
                                     <a href="" class="delete" data-bs-toggle="modal" data-id="<?= $category['id']; ?>" data-bs-backdrop="false" data-bs-target="#delete"><i class="bi bi-trash2" style="color: red;"></i></a>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>

     </section>

     <!-- Modal popups -->
     <section id="basic-modals">
         <!-- category Delete Modal -->
         <div class="col-md-6 col-12">
             <div class="card-content">
                 <div class="card-body">
                     <!--Disabled Backdrop Modal -->
                     <div class="modal fade text-left" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h4 class="modal-title" id="myModalLabel4">Category Delete</h4>
                                     <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                         <i data-feather="x"></i>
                                     </button>
                                 </div>
                                 <form action="<?= site_url("admin/category/delete") ?>" method="POST" enctype="multipart/form-data">
                                     <input type="hidden" id="d_id" name="id" readonly>
                                     <div class="modal-body">
                                         <span style="color: red;">
                                             Do You Want to Delete the Category?
                                         </span>
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                             <i class="bx bx-x d-block d-sm-none"></i>
                                             <span class="d-none d-sm-block">Close</span>
                                         </button>
                                         <button type="submit" class="btn btn-primary ml-1">
                                             <i class="bx bx-check d-block d-sm-none"></i>
                                             <span class="d-none d-sm-block">Accept</span>
                                         </button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- End of category Delete Modal -->

     </section>
     <!-- end of modal popups -->
 </div>