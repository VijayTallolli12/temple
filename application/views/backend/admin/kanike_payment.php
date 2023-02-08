 <style>
     #main {
         background-color: #f2f7ff;
     }
 </style>
 <div class="page-heading">
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Kanike Payment List</h3>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Kanike Payment List</li>
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
                             <th>Kanike</th>
                             <th>Devote Name</th>
                             <th>Kanike Amount</th>
                             <th>Payment</th>
                             <th>Download</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            foreach ($payment_details->result_array() as $key => $value) :
                                $this->db->where('id', $value['kanike_id']);
                                $kanike_details = $this->db->get("kanike")->row_array();
                            ?>
                             <tr>
                                 <td><?php echo $key + 1; ?></td>
                                 <td><?= $kanike_details['name']; ?></td>
                                 <td><?= $value['name']; ?></td>
                                 <td><?= $value['amount']; ?></td>
                                 <?php if (empty($value['transaction_id'])) { ?>
                                     <td>UnPaid</td>
                                 <?php } else { ?>
                                     <td>Paid</td>
                                 <?php } ?>
                                 <td><a href="<?= site_url("admin/download_kanike_invoice/" . $value['order_id']); ?>"><i class="fas fa-file-download"></i>Download</a></td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>

     </section>

 </div>