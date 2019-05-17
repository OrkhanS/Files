c<?php
	session_start();

	if($_SESSION['login_true'] != 'yes' || $_SESSION['login_true'] == 'no')
	{

		?>
		<script>
			window.location.href = "http://localhost/login.php";
		</script>
		<?php
	}
?>


<!DOCTYPE html>

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body>



		<br><br>

		<?php
				mysql_connect("localhost", "root","");
				mysql_select_db("PayPal_Task");

				$product = mysql_query("SELECT * FROM `products`");
				$results = mysql_fetch_array($product);

				echo "Product name is : ";
				echo $results[1]; echo "<br>";
				echo "\nColor is : ";
				echo $results[2]; echo "<br>";
				echo "Price is : ";
				echo $results[3];



		?>


		<br><br>
<br><br><hr><br>		

		<form action="logout.php">
			<button type="submit"> Log OUT</button>
		</form>




      
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
 <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script> 

    <script>
        
    	var name =  "<?php echo $_SESSION['name']; ?>"
    	var surname = "<?php echo $_SESSION['surname']; ?>"
    	var email_address = "<?php echo $_SESSION['email']; ?>"

        paypal.Buttons({

		createOrder: function(data, actions)
		{
      		return actions.order.create
      		({
	        		purchase_units: [{
							          amount: {
							            value: '120'
							          }
							        }],


					payer: {
                    name: {
                        given_name: name,
                        surname: surname
                        },
                        email_address: email_address
                	}
                	 
             
	      	});
    	},
   		
   		onApprove: function(data, actions) 
   		{
	        return actions.order.capture().then(function(details) 
	        {
	        
	        	alert('Transaction completed by ' + details.payer.name.given_name);
	        
	        return fetch('/paypal-transaction-complete',
	        {
		          method: 'post',
		          headers: 
		          {
		            'content-type': 'application/json'
		          },
		          body: JSON.stringify
		          ({
		            orderID: data.orderID
		          })
		    });
		    });
	    },

	    onCancel: function (data)
	    {	
	    	  alert("You have cancelled the payment!");
	    	  setTimeout("location.href = 'http://localhost/index.php';",100);    
	    	  
			
	  	}

  }).render('#paypal-button-container');
    </script>
</body>
    