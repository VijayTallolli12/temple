 <style>
     #main {
         background-color: #f2f7ff;
     }
 </style>
 <div class="page-heading">
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Seva Payment List</h3>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Seva Payment List</li>
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
                             <th>Seva Name</th>
                             <th>seva_date</th>
                             <th>Devote Name</th>
                             <th>Rashi</th>
                             <th>Nakashatra</th>
                             <th>Gothra</th>
                             <th>Payment</th>
                             <th>Download</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            foreach ($payment_details->result_array() as $key => $value) :
                                $seva = json_decode($value['seva_name']);
                                $seva_name = implode(', ', $seva);
                                $date = date('d M,Y', strtotime($value['seva_date']));
                            ?>
                             <tr>
                                 <td><?php echo $key + 1; ?></td>
                                 <td><?= $seva_name; ?></td>
                                 <td><?= $date; ?></td>
                                 <td><?= $value['name']; ?></td>
                                 <td><?= $value['rashi']; ?></td>
                                 <td><?= $value['nakashatra']; ?></td>
                                 <td><?= $value['gothra']; ?></td>
                                 <?php if (empty($value['transaction_id'])) { ?>
                                     <td>UnPaid</td>
                                 <?php } else { ?>
                                     <td>Paid</td>
                                 <?php } ?>
                                 <td><a href="<?= site_url("admin/download_seva_invoice/" . $value['order_id']); ?>"><i class="fas fa-file-download"></i>Download</a></td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>

     </section>

 </div>