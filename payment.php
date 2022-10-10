<?php
    include("header.php");
    session_start()
    ?>
    <form action="receipt.php" method = "POST">

    <article class="paymentContainer ">



        <h3>Payment</h3>

        <label for="name">Name on Card</label>
        <input type="text" id="name" name="cardname" placeholder="Anna Andersson">
        <label for="cardnum">Credit card number</label>
        <input type="text" id="cardnum" name="cardnr" placeholder="1111-2222-3333-4444">
        <label for="expmonth">Exp Month</label>
        <input type="text" id="expmonth" name="exp month" placeholder="May">

        <label for="expyear">Exp Year</label>
        <input type="text" id="expyear" name="expyear" placeholder="2025">
        <label for="cvv">CVV</label>
        <input type="text" id="cvv" name="cvv" placeholder="352">


    </article>

    <input type="submit" value="Checkout" class="btn">
    </form>
<<<<<<< HEAD
<?php
    include("footer.php");
?>
=======

    <?php
    include('footer.php')
    ?>
>>>>>>> c403e1811c8a58cde61215411fde0dd5548974fc
