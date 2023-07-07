const express = require('express');
const bodyParser = require('body-parser');
const paypal = require('paypal-rest-sdk');

const app = express();
const PORT = process.env.PORT || 3000;

// Set up the PayPal REST API credentials
paypal.configure({
  mode: 'sandbox', // Change to 'live' for production
  client_id: 'YOUR_CLIENT_ID_HERE',
  client_secret: 'YOUR_CLIENT_SECRET_HERE'
});

// Set up middleware to parse JSON request bodies
app.use(bodyParser.json());

// Endpoint to create a PayPal payment order
app.post('/create-paypal-order', (req, res) => {
  const { cart } = req.body;

  const items = cart.map(item => ({
    name: item.name,
    sku: item.sku,
    price: item.price,
    currency: 'AED',
    quantity: item.quantity
  }));

  const create_payment_json = {
    intent: 'sale',
    payer: {
      payment_method: 'paypal'
    },
    redirect_urls: {
      return_url: 'http://localhost:3000/success',
      cancel_url: 'http://localhost:3000/cancel'
    },
    transactions: [{
      item_list: {
        items
      },
      amount: {
        currency: 'AED',
        total: cart.reduce((acc, item) => acc + (item.price * item.quantity), 0).toFixed(2)
      },
      description: 'My shop purchase'
    }]
  };

  paypal.payment.create(create_payment_json, function (error, payment) {
    if (error) {
      console.log(error);
      res.status(500).send({ error });
    } else {
      const { id } = payment;
      console.log(`Created PayPal order ${id}`);
      res.send({ id });
    }
  });
});

// Endpoint to capture a PayPal payment
app.post('/capture-paypal-order', (req, res) => {
  const { orderID } = req.body;

  const execute_payment_json = {
    payer_id: req.query.PayerID,
    transactions: [{
      amount: {
        currency: 'AED',
        total: $get_order_price= "SELECT order_price FROM orders"
      }
    }]
  };

  paypal.payment.execute(orderID, execute_payment_json, function (error, payment) {
    if (error) {
      console.log(error.response);
      res.status(500).send({ error });
    } else {
      console.log(`Captured PayPal payment ${payment.id}`);
      res.send({ payment });
    }
  });
});

app.listen(PORT, () => console.log(`Server started on port ${PORT}`));
