<!DOCTYPE html>
<head>
<style>

.bodydiv {       
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  min-height: 100vh;
                  color: #454f54;
                  background-color: #f4f5f6;
                  background-image: linear-gradient(to bottom left, #abb5ba, #d5dadd);
                }
                
                .ticket {
              
                  display: grid;
                  grid-template-rows: auto 1fr auto;
                  max-width: 4rem;
                }
.ticket__header, .ticket__body, .ticket__footer {

  padding: 1.25rem;
  background-color: white;
  border: 1px solid #abb5ba;
  box-shadow: 0 2px 4px rgba(41, 54, 61, 0.25);
}
.ticket__header {

  font-size: 1.5rem;
  border-top: 0.25rem solid #dc143c;
  border-bottom: none;
  box-shadow: none;
}
.ticket__wrapper {
  
  box-shadow: 0 2px 4px rgba(41, 54, 61, 0.25);
  border-radius: 0.375em 0.375em 0 0;
  overflow: hidden;
}
.ticket__divider {
  
  position: relative;
  height: 1rem;
  background-color: white;
  margin-left: 0.5rem;
  margin-right: 0.5rem;
}
.ticket__divider::after {
  
  content: '';
  position: absolute;
  height: 50%;
  width: 100%;
  top: 0;
  border-bottom: 2px dashed #e9ebed;
}
.ticket__notch {

  position: absolute;
  left: -0.5rem;
  width: 1rem;
  height: 1rem;
  overflow: hidden;
}
.ticket__notch::after {
   
  content: '';
  position: relative;
  display: block;
  width: 2rem;
  height: 2rem;
  right: 100%;
  top: -50%;
  border: 0.5rem solid white;
  border-radius: 50%;
  box-shadow: inset 0 2px 4px rgba(41, 54, 61, 0.25);
  box-sizing: border-box;
}
.ticket__notch--right {
  
  left: auto;
  right: -0.5rem;
}
.ticket__notch--right::after {
  
  right: 0;
}
.ticket__body {
  
  border-bottom: none;
  border-top: none;
}
.ticket__body > * + * {

  margin-top: 1.5rem;
  padding-top: 1.5rem;
  border-top: 1px solid #e9ebed;
}
.ticket__section > * + * {
    margin: 0;
  margin-top: 0.25rem;
}
.ticket__section > h3 {
  font-size: 1.125rem;
  margin-bottom: 0.5rem;
}
.ticket__header, .ticket__footer {
  font-weight: bold;
  font-size: 1.25rem;
  display: flex;
  justify-content: space-between;
}
.ticket__footer {
  border-top: 2px dashed #e9ebed;
  border-radius: 0 0 0.325rem 0.325rem;
}
</style>
</head>
<body>
<div class="bodydiv">
<article class='ticket>
<header class='ticket__wrapper'>
  <div class='ticket__header'>
    2 🎟
  </div>
</header>
<div class='ticket__divider'>
  <div class='ticket__notch'></div>
  <div class='ticket__notch ticket__notch--right'></div>
</div>
<div class='ticket__body'>
  <section class='ticket__section'>
    <h3>Your Tickets</h3>
    <p>Level 1 VIP Club Seats and Bar</p>
    <p>Block 406   Row Q   Seats 34-35</p>
    <p>Your seats are together</p>
  </section>
  <section class='ticket__section'>
    <h3>Delivery Address</h3>
    <p>Addis ababa, 2321 px.box</p>
    <p>Ethiopia</p>
  </section>
  <section class='ticket__section'>
    <h3>Payment Method</h3>
    <p>Mastercard **** 3232</p>
  </section>
</div>
<footer class='ticket__footer'>
  <span>Total Paid</span>
  <span>£173.20</span>
</footer>
</article>
</div>
</body>
</html>