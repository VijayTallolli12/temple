 <style>
     #main {
         background-color: #f2f7ff;
     }

     p {
         white-space: nowrap;
         overflow: hidden;
         text-overflow: ellipsis;
         max-width: 200px;
     }
 </style>
 <div class="page-heading">
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Parampara Details</h3>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Parampara</li>
                     </ol>
                 </nav>
             </div>
         </div>
     </div>
     <section class="section">
         <div class="card">
             <div class="card-header">
                 <a href="<?= site_url("admin/parampara/add") ?>" class="btn btn-primary rounded-pill "><i class="bi bi-plus"></i> Add New Parampara</a>
             </div>
             <div class="card-body">
                 <table class="table table-striped" id="table1">
                     <thead>
                         <tr>
                             <th>Sl No.</th>
                             <th>Shri's Name</th>
                             <th>Image</th>
                             <th>Description</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            foreach ($parampara->result_array() as $key => $parampara) :
                            ?>
                             <tr>
                                 <td><?php echo $key + 1; ?></td>
                                 <td><b><?= $parampara['name']; ?></b></td>
                                 <?php if ($parampara['image'] == "") { ?>
                                     <td>--</td>
                                 <?php } else { ?>
                                     <td><img src="<?= site_url($parampara['image']); ?>" alt="Shiroor Math" border=3 height=100 width=100></td>
                                 <?php } ?>
                                 <td><?= $parampara['description']; ?></td>
                                 <td>
                                     <?php if ($parampara['status'] == '1') { ?>
                                         <a href="" class="status" data-bs-toggle="modal" data-bs-backdrop="false" data-bs-target="#status_change" data-id="<?= $parampara['id']; ?>" data-status="<?= $parampara['status']; ?>"><span class="badge bg-success">Active</span></a>
                                     <?php } else { ?>
                                         <a href="" class="status" data-bs-toggle="modal" data-id="<?= $parampara['id']; ?>" data-status="<?= $parampara['status']; ?>" data-bs-backdrop="false" data-bs-target="#status_change"><span class=" badge bg-danger">Inactive</span></a>
                                     <?php } ?>
                                 </td>
                                 <td>
                                     <a href="<?= site_url("admin/parampara/edit/" . $parampara['id'] . "") ?>"><i class="bi bi-pencil-fill"></i></a>
                                 </td>
                                 <td>
                                     <a href="" class="delete" data-bs-toggle="modal" data-id="<?= $parampara['id']; ?>" data-bs-backdrop="false" data-bs-target="#delete"><i class="bi bi-trash2" style="color: red;"></i></a>
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
         <!-- status change modal -->
         <div class="col-md-6 col-12">
             <div class="card-content">
                 <div class="card-body">
                     <!--Disabled Backdrop Modal -->
                     <div class="modal fade text-left" id="status_change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h4 class="modal-title" id="myModalLabel4">E-seva Status</h4>
                                     <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                         <i data-feather="x"></i>
                                     </button>
                                 </div>
                                 <form action="<?= site_url("admin/parampara/status") ?>" method="POST" enctype="multipart/form-data">
                                     <input type="hidden" id="id" name="id" readonly>
                                     <input type="hidden" id="status" name="status" readonly>
                                     <div class="modal-body">
                                         <span style="color: red;">
                                             Do You Want to Change Status of Shri's Details?
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
         <!-- end of status change modal -->

         <!-- parampara Delete Modal -->
         <div class="col-md-6 col-12">
             <div class="card-content">
                 <div class="card-body">
                     <!--Disabled Backdrop Modal -->
                     <div class="modal fade text-left" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h4 class="modal-title" id="myModalLabel4">E-seva</h4>
                                     <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                         <i data-feather="x"></i>
                                     </button>
                                 </div>
                                 <form action="<?= site_url("admin/parampara/delete") ?>" method="POST" enctype="multipart/form-data">
                                     <input type="hidden" id="d_id" name="id" readonly>
                                     <div class="modal-body">
                                         <span style="color: red;">
                                             Do You Want to Delete Shri's Detials?
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
         <!-- End of parampara Delete Modal -->
     </section>
     <!-- end of modal popups -->
 </div>