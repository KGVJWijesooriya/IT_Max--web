<?php include('partials-front/menu.php'); ?>


<section id="Topic">
    <h1>CONTACT</h1>
</section>

<section id="contactus" class="contactus section-p1">
    <div id="contact">
        <h2>Drop Your Comment or Inquiry</h2>
        <form action="" method="post">
            <div class="contactus">
                <div>
                    <p>Your Name:</p>
                    <input type="text" name="name">
                    <p>Your Email:</p>
                    <input type="email" name="email">
                </div>
                <div class="b">
                    <p>Phone Number:</p>
                    <input type="number" name="number">
                    <p>Subject:</p>
                    <input type="text" name="subject" id="">
                </div>
            </div>
            <div>
                <p>Comments/inquiry:</p>
                <textarea name="comment" id="" rows="10"></textarea>
                <div class="submit">
                    <button name="submit" >SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
    <div class="section-p1">
        <p>Phone Number: <br> 0775548648</p>
        <p>Email: <br>itmax.info@gmail.com</p>
        <p>Address:<br> No: 437, Kandy Rd, Ranmuthugala Rd, Kadawatha</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9090964179677!2d79.96975081479525!3d7.0199710191399625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f9d2b8936857%3A0xcebea37ab90312c8!2sIT%20Max%20Computer%20Arcade%20(AVS%20Technologies)!5e0!3m2!1sen!2slk!4v1654615499217!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<?php

if (isset($_POST['submit'])) {

    //get the data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $comment = $_POST['comment'];

    //sql query to save the data into database
    $sql = "INSERT Into tbl_contact SET
    name='$name',
    email='$email',
    number=$number,
    subject='$subject',
    comment='$comment'
    ";

    // Executing Query and Saving data into database
    $res = mysqli_query($conn, $sql);


    //check data is insert or not
    if ($res == TRUE) {
        echo "Data Inserted";
        // header("Location: add-admin.php");
    } else {
        echo "Faild";
        echo $sql;
    }
}

?>