<?php
require_once("publicinc/header.php");
?>
<section class="fdb-block py-0" style="background-color:#118187">
    <div class="container bg-r py-5" id="innerhero">
        <div class="row">
            <div class="col-md-4" style="border-right: 5px solid white">
                <h3 class="headerintro">THE CONSULTUM FOR EDUCATIONAL EVALUATORS, RESEARCHERS AND STATISTICIANS</h3>
            </div>
            <div class="col-12 col-sm-10 col-md-8 text-center text-sm-left">
                <h1 class="whitetext">Contact Us</h1>
            </div>
        </div>
    </div>
</section>


<div id="playground">
</div>

<section class="fdb-block pt-0">

    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-md-6 col-lg-5">
                <h2>Contact Us</h2>
                <p class="lead">
                    For enquiries, complains and requests, please fill out the form, or reach out to us
                    using any of the details provided below.
                </p>

                <p class="h3 mt-5">
                    <strong>Address: </strong>Faculty of Education, Imo State University
                    <strong>Email:</strong> <a href="mailto:enquiries@ceers.com.ng">enquiries@tceers.com</a>
                    <br>
                    <strong>Phone: </strong>+234 806 807 2496
                </p>
            </div>

            <div class="col-12 col-md-6 ml-auto pt-5 pt-md-0">

                <?php
                if (isset($_GET['msg']) && $_GET['msg'] == "messagesent") {
                    echo "<h2>Your message has been sent; we will get back to you promptly.</h2>";
                } else {
                    echo '
                <form action="modules/runcontact.php" method="post">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="fname" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" name="lname" class="form-control" placeholder="Last name">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <input type="email" name="email" class="form-control" placeholder="Enter email">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <input type="text" name="subject" class="form-control" placeholder="Subject">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <textarea class="form-control" name="body" rows="3" placeholder="How can we help?"></textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button type="submit" class="btn bg-info text-white pull-right">Submit</button>
                        </div>
                    </div>
                </form>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php
require_once("publicinc/footer.php");
?>