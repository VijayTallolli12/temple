  var options = {
      "key": "<?= $api_key; ?>", // Enter the Key ID generated from the Dashboard
      "amount": "<?= $razorpayOrder['amount']; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
      "currency": "INR",
      "name": "<?= get_settings("
      system_name "); ?>",
      "description": "<?= get_settings("
      slogan "); ?>",
      "image": "<?= site_url(get_settings("
      logo ")); ?>",
      "order_id": "<?= $razorpayOrder['id']; ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
      "callback_url": "<?= site_url("
      payment / razorpay_payment_status ") ?>",
      "prefill": {
          "name": "<?= $customer_data['name']; ?>",
          "email": "<?= $customer_data['email']; ?>",
          "contact": "<?= $customer_data['phone_no']; ?>"
      },
      "notes": {
          "address": "Razorpay Corporate Office"
      },
      "theme": {
          "color": "#3399cc"
      }
  };
  var rzp1 = new Razorpay(options);
  document.getElementById('rzp-button1').onclick = function(e) {
      rzp1.open();
      e.preventDefault();
  }
  document.getElementById('rzp-button1').click();