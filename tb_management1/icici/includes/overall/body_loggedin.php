<div class="section primary-section" id="service">
            <div class="logout1">
                <p><a href="logout.php" id="logout1">Log Out<a></p>
            </div>
            <div class="change_password">
                <h1><a href="changepassword.php" id="ch_password">Change Password<a></h1>
                <h2><a href="#" id="details">Edit Details<a></h2>
            </div>
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>Welcome</h1>
                    <!-- Section's title goes here -->
                    
                    <p> <?php echo $user_data['name'];  ?> !</p>
                    <!--Simple description for section goes here. -->
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="centered service">
                            <div  class="circle-border zoom-in">
                                <a href="stolen.php">
                                	<img  class="img-circle" src="images/Service1.png" alt="service 1"> 
                            	</a>
                            </div>
                            <h3>Report Stolen Vehicle</h3>
                            <p>Your vehicle is missing!! Don't worry, we'll find it for you.</p>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                            	<a href="recharge.php">
                                	<img class="img-circle" src="images/Service2.png" alt="service 2" />
                                </a>
                            </div>
                            <h3>Recharge</h3>
                            <p>Low on balance.? Recharge your account here.</p>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div  class="circle-border zoom-in">
                            	<a href="add_new_vehicle.php">
                                	<img class="img-circle" src="images/Service3.png" alt="service 3">
                                </a>
                            </div>
                            <h3>Add New Vehicle</h3>
                            <p>Just bought a new vehicle.? Share your joy with us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>