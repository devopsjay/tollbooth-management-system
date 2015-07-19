<?php
include 'core/init.php'; 
include 'includes/overall/header_recharge.php'; 

if (empty($_POST) === false) {
	$amount = $_POST['amount']; 
	$mode = $_POST['card'];
	$bank = $_POST['bank'];
	if (empty($amount) === true) {
		$errors[] = 'Enter the amount to be charged.';
	} if ($bank == 'none') {
		$errors[] = 'Choose a bank.';
	}
}

if ((empty($errors) === true)&&(empty($_POST) === false)) {
	if (preg_match("/\\s/", $_POST['amount']) == true) {
			$errors[] = 'Amount must not contain any spaces.';
	}if (strlen($_POST['amount']) > 5) {
			$errors[] = 'Amount must be less than 5 digits long.';
	}if (!preg_match("/^[0-9]*$/",$_POST['amount'])) {
 		 	$errors[] = 'Amount should only contain digits.';
	}
}
?>

<?php
if ((empty($errors) === false)&&(empty($_POST) === false)){
			/*echo output_errors($errors);*/
			$error_all = output_errors($errors);
			echo "<script type='text/javascript'>alert('$error_all');</script>";
		} else {
			$amount = $_POST['amount']; 
			$mode = $_POST['card'];
			$bank = $_POST['bank'];
			$page = $bank . $mode;
			/*echo $page;
			echo $amount;*/
			if ($page == 'citidebitcard')
			header("Location: citi/citidebitcard.php?amount=$amount");
			else if ($page == 'centraldebitcard')
			header("Location: central/centraldebitcard.php?amount=$amount");
			else if ($page == 'icicidebitcard')
			header("Location: icici/icicidebitcard.php?amount=$amount");
			else if ($page == 'iobdebitcard')
			header("Location: iob/iobdebitcard.php?amount=$amount");
			else if ($page == 'axisdebitcard')
			header("Location: axis/axisdebitcard.php?amount=$amount");
			else if ($page == 'ingdebitcard')
			header("Location: ing/ingdebitcard.php?amount=$amount");
			else if ($page == 'boidebitcard')
			header("Location: boi/boidebitcard.php?amount=$amount");
			else if ($page == 'laxmidebitcard')
			header("Location: laxmi/laxmidebitcard.php?amount=$amount");
	}
?>

<!-- &nbsp;&nbsp;<h1>Payment Portal</h1>
<form action="bank_page.php" method="post">
	<ul>
		<br>&nbsp;<h2>Amount:</h2>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="amount">
		<br><br>&nbsp;<h2>Payment Mode:</h2>
		<li>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="card" value="net_banking" checked>Net Banking
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="card" value="creditcard">Credit Card
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="card" value="debitcard">Debit Card
		</li><br>
		<li>
			<br>&nbsp;<h2>Select Bank:</h2>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="bank">
  			<option value="none">Select Bank</option>
  			<option value="sbi">State Bank of India</option>
  			<option value="canara">Canara Bank</option>
  			<option value="hdfc">HDFC</option>
  			<option value="icici">ICICI</option>
  			<option value="iob">IOB</option>
  			<option value="idbi">IDBI</option>
  			<option value="boi">Bank of India</option>
  			<option value="axis">AXIS</option>
			</select>
		</li>
		<li>
			<br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Make Payment">
		</li>
	</ul>
</form>
 -->


 <div id="home">
                    <!-- Start cSlider -->
                    <div id="da-slider" class="da-slider">
                        <!-- <div class="triangle"></div> -->
                        <!-- mask elemet use for masking background image -->
                        <div class="mask"></div>
                        <!-- All slides centred in container element -->
                        <div class="container">
                            <div class="logout2">
                                <p><a href="logout.php" id="logout2">Log Out<a></p>
                            </div>
                            <!-- Start first slide -->
                            
                             <div id="wrap">
                                <div id="regbar1">
                                  <div id="navthing1">
                                    
                                    <h5>RECHARGE YOUR ACCOUNT</h5>
                                    </div>
                                    <form action="" method="post">
                                    <div class="user_login">
                                      <div class="arrow-up"></div>
                                      <div class="formholder">
                                        <div class="randompad">
                                           <fieldset>
                                             <h6>Recharge Amount</h6>
                                             <input type="text" name="amount" />
                                             <h6>Payment Mode</h6>
                                             <div class="status1">   
                                                <input type="radio" name="card" value="net_banking"><p>Net Banking</p>
                                             </div>
                                             <div class="status2">   
                                                <input type="radio" name="card" value="creditcard"><p>Credit Card</p>
                                             </div>
                                             <div class="status3">   
                                                <input type="radio" name="card" value="debitcard"><p>Debit Card</p>
                                             </div>
                                              <h6>Select Bank</h6>
                                             <select name="bank">
                                                 <option value="none">Select Bank</option>
                                                 <option value="citi">CITI Bank</option>
                                                 <option value="central">Canara Bank</option>
                                                 <option value="ing">ING Bank</option>
                                                 <option value="icici">ICICI</option>
                                                 <option value="iob">IOB</option>
                                                 <option value="laxmi">Laxmi Vilas</option>
                                                 <option value="boi">Bank of India</option>
                                                 <option value="axis">AXIS</option>
                                             </select>

                                             <input type="submit" value="Pay" />
                                           </fieldset>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                    <script src="js/jlibrary1.js"></script>
                                    <script src="js/index1.js"></script>
                              </div>
                            <!-- End cSlide navigation arrows -->
                        </div>
                    </div>
                </div> 

<?php include 'includes/overall/footer.php'; ?>