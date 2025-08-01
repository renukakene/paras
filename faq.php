
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>FAQ</title>
  <link rel="stylesheet" href="css/faq.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>

<body>
  <section class="accordion">
    <div class="image-box">
      <img src="images/faq.png" alt="Accordion Image">
    </div>
    <div class="accordion-text">
      <div class="title">Frequently Asked Questions</div>
      <div class="scroll-div">
      <ul class="faq-text">
        <li>
          <div class="question-arrow">
            <span class="question">What kind of stationery will I find at Paras Stationery &amp; Xerox?</span>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <p>Paras Stationery &amp; Xerox stocks a wide variety of stationery ranging from different types of pens,
            colours, pencils, books, paper, office &amp; school supplies, glues for various surfaces, decorative items
            that can be used creatively, pins and attachments, and several other art supplies. </p>
          <span class="line"></span>
        </li>
        <li>
          <div class="question-arrow">
            <span class="question">Will I be able to return something to Paras Stationery &amp; Xerox in case it was the
              wrong item?</span>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <p>Ideally, goods once sold cannot be returned. But, if it is unused and intact in pristine saleable
            condition, the retailer might accept a return. Please call Paras Stationery &amp; Xerox to ask about their
            return or exchange policy</p>
          <span class="line"></span>
        </li>
        <li>
          <div class="question-arrow">
            <span class="question">Will I be able to purchase items in bulk here?</span>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <p>Depending on the stock Paras Stationery &amp; Xerox has, they will be able to supply stationery at retail
            prices as it is not a wholesale outlet. Please speak with the shop salesman and verify if they are willing
            to lower prices or even consider bulk purchases. </p>
          <span class="line"></span>
        </li>
        <li>
          <div class="question-arrow">
            <span class="question">Can I purchase art supplies at this shop?</span>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <p> You may have a look at the stock Paras Stationery &amp; Xerox keeps in person for a better understanding,
            although they maintain an inventory of fast-selling art items.</p>
          <span class="line"></span>
        </li>
        <li>
          <div class="question-arrow">
            <span class="question"> Can you give me a landmark?</span>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <p>Paras Stationery &amp; Xerox is located right Near Gundecha Chambers.</p>
          <span class="line"></span>
        </li>
        <li>
          <div class="question-arrow">
            <span class="question"> What is your return policy?</span>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <p>We want you to be satisfied with your purchase. If you're not happy with your order, please check our
            return policy for details on how to initiate a return or exchange.</p>
          <span class="line"></span>
        </li>
        <li>
          <div class="question-arrow">
            <span class="question"> When will this shop be open?</span>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <p>Paras Stationery &amp; Xerox is open during <br>
            Monday: 8:30 am - 9:00 pm, <br>
            Tuesday: 8:30 am - 9:00 pm,<br>
            Wednesday: 8:30 am - 9:00 pm,<br> 
            Thursday:- 8:30 am - 9:00 pm,<br> 
            Friday: 8:30 am - 9:00 pm,<br>
            Saturday: 8:30 am - 9:00pm,<br> 
            Sunday:- Closed.</p>
          <span class="line"></span>
        </li>
        <li>
          <div class="question-arrow">
            <span class="question"> Are your products eco-friendly?</span>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <p>We are committed to sustainability and offer a selection of eco-friendly stationery products. Look for
            products labeled as eco-friendly or sustainable in our store.</p>
          <span class="line"></span>
        </li>
        <li>
          <div class="question-arrow">
            <span class="question"> What is your shipping policy and delivery times?</span>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <p>We offer various shipping options, and delivery times may vary based on your location and the chosen
            shipping method. Please refer to our shipping policy for detailed information.</p>
          <span class="line"></span>
        </li>
        <li>
          <div class="question-arrow">
            <span class="question"> Are there bulk order discounts available for businesses or schools?</span>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <p>Yes, we offer bulk order discounts for businesses and educational institutions. Contact our customer
            support team for information on bulk pricing and custom orders.</p>
          <span class="line"></span>
        </li>
      </ul>
    </div>
    <a href="home.php" class="delete-btn">Go Back</a>
    </div>
  </section>

  <script>
    let li = document.querySelectorAll(".faq-text li");
    for (var i = 0; i < li.length; i++) {
      li[i].addEventListener("click", (e) => {
        let clickedLi;
        if (e.target.classList.contains("question-arrow")) {
          clickedLi = e.target.parentElement;
        } else {
          clickedLi = e.target.parentElement.parentElement;
        }
        clickedLi.classList.toggle("showAnswer");
      });
    }
  </script>

</body>

</html>