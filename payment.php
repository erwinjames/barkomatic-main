
    <?php  include_once 'modules/schedule/paypal_config.php'; ?>
    <?php require "resources/templates/_payment_header.php"; ?>

    <?php if (isset($_GET['reservetionId'])) {?>
          <?php if (isset($_SESSION['id'])== $_GET['userId'] && isset($_GET['typOfpymnt']))  { ?>

 <div class="coupon_container">
 <form id="redeemCode" method="POST">
<span class="show_all_except_clicked"></span>
<ul class="card_list">
<?php
$stmt_ship_sd = $con->prepare("SELECT * FROM tbl_tckt Where tckt_owner=? AND tckt_qty != 0 AND tckt_stats = 'Open For Avail'"); 
$stmt_ship_sd->bind_param('s',$_GET['shipName']);
$stmt_ship_sd->execute();
$row_ship_sd = $stmt_ship_sd->get_result();
while ($row1 = $row_ship_sd->fetch_assoc()) { 
    
$stmt_ship_sd1 = $con->prepare("SELECT * FROM tbl_rdeem_promo Where psnger_id=?"); 
$stmt_ship_sd1->bind_param('s',$_SESSION['id']);
$stmt_ship_sd1->execute();
$row_ship_sd1 = $stmt_ship_sd1->get_result();
$row2 = $row_ship_sd1->fetch_array(); 
    if ($row2==null) {
    ?>
                <li>
                                            <div class="coupon_box">
                                            <div class="body_card">
                                                <h4 class="title_card"> <?php echo $row1['tckt_promo'] ?></h4>
                                            <h2 class="how_much"> <b> <?php echo $row1['tckt_dscnt'] ?></b> </h2>
                                                <h3> OFF </h3>
                                             </div>
                                                        <input type="hidden" name="id" value=" <?php echo $row1['id'] ?>">
                                                        <input type="hidden" name="promo" value=" <?php echo $row1['tckt_promo'] ?>">
                                                        <input type="hidden" name="discount" value="<?php echo $row1['tckt_dscnt'] ?>'">
                                                        <button class="btn_card" id="btn_card"> Redeem </button>
                                                    
                                                    </div>
                </li>
    <?php } else{ ?>
  
  <li>
                                            <div class="coupon_box">
                                            <div class="body_card">
                                                <h4 class="title_card">ALREADY CLAIMED</h4>
                                             </div>
                                                    
                                                    </div>
                </li>


<?php } }?>
</ul>
</form>

</div>
<div class="container">
    <div class="progressbar" style="font-size: 12px;margin-top: 50px; font-weight: bolder;">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 text-center ">
                    SCHEDULE
                </div>
                <div class="col-sm-2 text-center ">
                    PASSENGER INFO
                </div>
                <div class="col-sm-2 text-center ">
                    PAYMENT
                </div>
                <div class="col-sm-2 text-center ">
                    COMPLETE
                </div>
            </div>
            <div class="row " style="margin-top: 10px">
                <div class="progress" style="width: 56%;margin-left: 11%; margin-right: 10; height:10px;">
                    <div class="one " style="background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px;"></div>
                    <div class="two " style="background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px; left: 36%;"></div>
                    <div class="three " style="background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px;left: 50%;"></div>
                    <div class="four " style="background-color:#007bff; border-radius: 100%; width: 20px; height: 20px; position: absolute;z-index:1;margin-top: -5px;left: 63%;"></div>
                    <div class="progress-bar" style="width: 70%;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container-lg">
        <div class="container" style="margin-top: 5%;">
            <div class="row ">
                <div class="col-sm-9 ">
                    <div class="your-almost-there-col  text-center" style=" padding:10px 20px 0px 20px; background-color: white;">
                        <p> <img src="./img/core-img/logoq.png" alt="" style="max-width: 60px;  height: auto;  ">You're Almost There</p>
                    </div>
                </div>
                <div class=" receipt-border-col  col-sm-3 border" style="margin-top: -5%; position: fixed; right: 2%; color: black; background-color: rgb(18, 68, 63); font-size: 60%;">
                    <div class="row">
                        <p class="col-sm-6" style=" margin-left: 10%; font-size: 200%;">Passenger </p>
                                            <p class="col-sm-6" style="margin-left: 10%; font-size: 200%;"> 2</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-6" style=" margin-left: 10%; font-size: 200%; ">Service Charge</p>
                                          <p class="col-sm-6" style="margin-left: 10%; font-size: 200%;"> 200</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-6" style=" margin-left: 10%; font-size: 200%; ">Terminal fee</p>
                                            <p class="col-sm-6" style="margin-left: 10%; font-size: 200%;"> 200</p>
                    </div>
                    <div class="row" style="margin-top:5%; border-top:0">
                        <p class="col-sm-6" style=" margin-left: 10%; font-size: 200%; ">Total</p>
                                            <p class="col-sm-6" style="margin-left: 10%; font-size: 200%;"> 400</p>
                    </div>
                    <br>
                    <br>

                </div>
            </div>
        </div>
    </div> -->
    <div class="container " style="margin-top: 8%;">
        <div class="row">
            <H4 style="color: black;">Payment Options *</H4>
        </div>
    </div>
    <div class="container" style="  padding-bottom:10%;">
        <div class="row">

            <div class=" col-sm-9 ">
                <div class="Important border" style=" padding:10px 20px 0px 20px; background-color: blanchedalmond;">
                    <p class="" style="font-size: 12px"> <span class="" style="color: red">Important: </span>Non-credit card payments will be posted on the next day banking </p>
                </div>
            </div>
        </div>
    </div>
    <!-- payment Option cards paypal -->
    <Div class="SELECT-PAYMENT">
        <div class="container">
            <div class="payment1 col-sm-9" style="background-color: white; padding:0;  margin-top: -9%;">
                <div class="container ">
                    <div class="asd row" style="padding: 1px; font-size: 10px;">
                        <div class="pay col-sm-3 text-center  border">
                            <span class="card-inforamation box fa fa-check-circle "></span>
                            <img src="./img/core-img/6.png" alt="">
                            <div class="radio-input" value="credit">
                                <label><input type="radio" name="payment" value="card-inforamation" disabled> credit card</label>
                            </div>
                        </div>
                        <div class="pay col-sm-3 text-center  border" style>
                            <span class=" paypal box  fa fa-check-circle "></span>
                            <img src="./img/core-img/7.png" alt="">
                            <div class="radio-input">
                                <input id="card" type="radio" name="payment" value="paypal"> paypal
                            </div>
                        </div>
                        <div class="pay col-sm-3 text-center  border">
                            <span class="e-cash box fa fa-check-circle "></span>
                            <img src="./img/core-img/8.png" alt="">
                            <div class="radio-input">
                                <input id="card" type="radio" name="payment" value="e-cash" disabled> e-cash
                            </div>
                        </div>
                        <div class=" pay col-sm-3 text-center  border">
                            <span class="counters box fa fa-check-circle "></span>
                            <img src="./img/core-img/8.png " alt="">
                            <div class="radio-input">
                                <input id="card" type="radio" name="payment" value="counters" disabled> over the counter
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Div>
    <div class="card-inforamation box container ">
        <div class="col-sm-9">
            <div class="row ">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 mt-3">
                    <div class="row">
                        <div class="col  ">
                            <div class="wrapper">
                                <div class="container">
                                    <article class="part card-details">
                                        <h1>
                                            Credit Card Details
                                        </h1>
                                        <form action="" if="cc-form" autocomplete="off">
                                            <div class="group card-number">
                                                <label for="first">Card Number</label>
                                                <input type="text" id="first" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;">
                                                <input type="text" id="second" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;">
                                                <input type="text" id="third" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;">
                                                <input type="text" id="fourth" class="cc-num" type="text" maxlength="4" placeholder="&#9679;&#9679;&#9679;&#9679;">
                                            </div>
                                            <div class="group card-name">
                                                <label for="name">Name On Card</label>
                                                <input type="text" id="name" class="" type="text" maxlength="20" placeholder="Name Surname">
                                            </div>
                                            <div class="group card-expiry">
                                                <div class="input-item expiry">
                                                    <label for="expiry">Expiry Date</label>
                                                    <input type="text" class="month" id="expiry" placeholder="02">
                                                    <input type="text" class="year" id="" placeholder="2017">
                                                </div>
                                            </div>
                                            <div class="group csv">
                                                <div class="input-item csv">
                                                    <label for="csv">CSV No.</label>
                                                    <a href="#what"></a>
                                                    <input type="text" class="csv">
                                                </div>
                                            </div>
                                            <div class="grup submit-group" style="display: none;">
                                                <span class="arrow"></span>
                                                <input type="submit" class="submit" value="Continue to payment">
                                            </div>
                                        </form>
                                    </article>
                                    <div class="part bg"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- payment Option cards paypal -->
    <!--Passenger Guidelines -->
    <div class="PassengerGuidelines-intro">
        <div class="  container ">
            <div class=" images col-sm-9 row ">
                <div class="imagess col-sm-3 ">
                    <img class="imgs" src="./img/core-img/9.png " alt="">
                    <p>print ticket</p>
                </div>
                <div class="arrow col-sm-1 ">
                    <i class="fa fa-chevron-right "></i>
                    <i class="fa fa-chevron-down "></i>
                </div>
                <div class="imagess col-sm-3 ">
                    <img class="imgs" src="./img/core-img/10.png" alt="">
                    <p>Bring ID</p>
                </div>
                <div class="arrow col-sm-1 ">
                    <i class="fa fa-chevron-right "></i>
                    <i class="fa fa-chevron-down "></i>
                </div>
                <div class="imagess be-there col-sm-3 ">
                    <img class="imgs" src="./img/core-img/logoq.png">
                    <p>Be There 30 Minutes Before The Departure</p>
                </div>
            </div>
        </div>

    </div>
    <!-- end Passenger Guidelines -->
    <!-- trip summary -->
    <div class="tripsummary" style="margin-top: 12%">
        <div class="container">
            <div class=" col-sm-9 border" style="background-color: white ;border-top: 50px; margin-top: -6%;">
                <div class=" " style="background-color: white ; margin-top: -6%;" id="tripsummary">
                </div>
            </div>
        </div>
    </div>
    <!-- **** tripsummary-text=end ***** -->
<div id="responsecontainer">  
</div>
    <div class="container" style="margin-top: 2%;">
 
			<!-- Display the payment button -->
	<div id='paypal'>
    </div>	
	
    </div>
   
    <?php  }else{?>
     <H1>Please Login</H1>
    <?php } ?>
  <?php }else{?>
  <h1>PLEASE CHECK YOUR EMAIL FIRST</h1>
    <?php }?>
  </div>

    <!-- **** All JS Files ***** -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/roberto.bundle.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main/active.js"></script>
    <script>
        var getReservetionId= <?php echo $_GET['reservetionId'] ?>;
        var passengerId= <?php echo $_GET['userId'] ?>;
        let typOfpymnts= "<?php echo $_GET['typOfpymnt'] ?>";
        let shipname= "<?php echo $_GET['shipName'] ?>";
       $(document).ready(function() {
         // fetch payment
        ajax_call = function() {
            $.ajax({
            type: "POST",
            url:'modules/schedule/payment.php?reservation='+getReservetionId+'&&passengersId='+passengerId+'&&typOfpymnt='+typOfpymnts+'&&shipName='+shipname,
            data: $('#responsecontainer').serialize() + '&action=responsecontainer',
            success: function(response){
                            $("#responsecontainer").html(response);
                        
                    }
                });
            };
            var interval = 100;
            setInterval(ajax_call, interval);
});

    </script>
    <script>
         $(document).ready(function() {
               ajax_call = function() {
            $.ajax({
            type: "POST",
            url:'modules/schedule/payment.php?reservation='+getReservetionId+'&&typOfpymnt='+typOfpymnts+'&&shipName='+shipname,
            data: $('#tripsummary').serialize() + '&action=tripsummary',
            success: function(response){
           
                            $("#tripsummary").html(response); 
                    }
                });
            };
            var intervals= 100;
            setInterval(ajax_call, intervals);
        });
    </script>
        <script>
         $(document).ready(function() {
            $('.card_list button').on('click', function() {
                       
             })
        });
    </script> 
    <script>
 $('#redeemCode').validate();
    $('#btn_card').click(function(e) {
        if (document.querySelector('#redeemCode').checkValidity()) {
            e.preventDefault();
            $(':input[type="submit"]').prop('disabled', true);
            $.ajax({
                url:'modules/schedule/payment.php',
                method: 'POST',
                data: $('#redeemCode').serialize() + '&action=redeemCode',
                success: function(response) {
                    alert(response);
                 if (response == 'success') {
                    // $(this).parent('li').hide();
                      setTimeout(function() {
                           window.location.reload();
                            }, 100);
                        }
                        else if(response == 'not')
                   {
                         alert('error');
                   }
                }
            });
        }
    });
    </script>
 </script>
    <script>
        $(document).ready(function() {

            // Radio box border
            $('.method').on('click', function() {
                $('.method').removeClass('blue-border');
                $(this).addClass('blue-border');
            });

            // Validation
            var $cardInput = $('.input-fields input');

            $('.next-btn').on('click', function(e) {

                $cardInput.removeClass('warning');

                $cardInput.each(function() {
                    var $this = $(this);

                    if (!$this.val()) {
                        $this.addClass('warning');
                    }
                });

            });
                   
        });
    </script>
    </script>
    <!-- creditcard payment -->
</body>
</html>