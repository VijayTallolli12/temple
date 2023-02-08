 <style>
     #main {
         background-color: #f2f7ff;
     }
 </style>
 <div class="page-heading">
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Subscribers List</h3>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Subscribers</li>
                     </ol>
                 </nav>
             </div>
         </div>
     </div>
     <section class="section">
         <div class="card">
             <div class="card-header">

             </div>
             <div class="card-body">
                 <table class="table table-striped" id="table1">
                     <thead>
                         <tr>
                             <th>Sl No.</th>
                             <th>Subscribers Name</th>
                             <th>Subscribers E-mail</th>
                             <th>Status</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            foreach ($subscribers->result_array() as $key => $subscribers) :
                            ?>
                             <tr>
                                 <td><?php echo $key + 1; ?></td>
                                 <td><?= $subscribers['name']; ?></td>
                                 <td><?= $subscribers['email']; ?></td>
                                 <td>
                                     <?php if ($subscribers['active'] == '1') { ?>
                                         <span class="badge bg-success">Active</span>
                                     <?php } else { ?>
                                         <span class=" badge bg-danger">Inactive</span>
                                     <?php } ?>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>

     </section>

 </div>