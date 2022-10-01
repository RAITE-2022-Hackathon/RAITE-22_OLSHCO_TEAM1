<?php 
//LOGIN
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbName ="crypto_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])){
    if (isset($_POST['U_name']) && isset($_POST['U_password'])) {
        function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
         }
            $U_name = validate($_POST['U_name']);
    if (empty($U_name)) {
        //Username Alert!
        function user_alert($message) {
            echo "<script>alert('$message');</script>";
        }
        user_alert("Error Input username");
    }
    else if(empty($U_password)){
        //Password Alert!
        function pass_alert($message) {
            echo "<script>alert('$message');</script>";
        }
        pass_alert("Error Input Password");
    }
    else{
        $sql = "SELECT * FROM tbl_accounts WHERE U_name ='$U_name' AND U_password ='$U_password';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
                "<script>clearAll(U_name);</script>";

                //Sets the username
                $_SESSION['U_name'] = $row['U_name'];
                header("Location: dashboard.php");
                
                }
        else{
            //Username & Password Alert!
                function UP_alert($message) {
                    echo "<script>alert('$message');</script>";
                }
                UP_alert("Error Input User & Password");
                
                }
        }
    }}
    else{
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>tesla-website</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Button-Modal-popup-team-member-Modal-popup-team-member.css">
    <link rel="stylesheet" href="assets/css/Button-Modal-popup-team-member-styles.css">
    <link rel="stylesheet" href="assets/css/Clients.css">
    <link rel="stylesheet" href="assets/css/dh-row-text-image-right.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login-.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form-.css">
    <link rel="stylesheet" href="assets/css/Single-Page-Contact-Us-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body style="background: rgb(255,255,255);color: rgb(1,1,1);">
    <section class="d-flex flex-column justify-content-between" id="hero" style="background: url(&quot;assets/img/bg11.jpg&quot;) center / cover no-repeat;">
        <div id="hero-top">
            <nav class="navbar navbar-light navbar-expand-md">
                <div class="container-fluid"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <p class="navbar-text" style="font-size: 20px;color: rgb(66,29,145);"><img width="95" height="53" style="width: 95px;height: 53px;background: url(&quot;assets/img/bittorrent-btt-logo.png&quot;);" src="assets/img/bittorrent-btt-logo.png"></p>
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#video-and-stats">about us</a></li>
                            <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                            <li class="nav-item"></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        </ul>
                        <div id="Modal-button-wrapper-1" class="text-center"><a class="bs4_modal_trigger" href="" data-modal-id="bs4_team" data-toggle="modal" style="width: 112.825px;height: 40.5px;">
                                <p style="background: #116cd9;border-radius: 24px;border-color: rgb(2,2,2);">LOGOUT</p>
                            </a>
                            <div id="bs4_team-1" class="modal fade bs4_modal bs4_blue bs4_bg_transp bs4_bd_black bs4_bd_semi_trnsp bs4_none_radius bs4_shadow_none bs4_center bs4_animate bs4FadeInDown bs4_duration_md bs4_easeOutQuint bs4_size_team" data-modal-backdrop="true" data-show-on="click" data-modal-delay="false" data-modal-duration="false">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="/*background: var(--indigo);*/">
                                        <div class="bs4_team_content bg-card1" style="background: rgba(255,255,255,0);">
                                            <div class="login-card"><img class="profile-img-card" src="assets/img/avatar_2x.png">
                                                <p class="profile-name-card"> </p>
                                                <form class="form-inline form-signin">
                                                    <span class="reauth-email"></span>
                                                    <input class="form-control" type="email" name="U_name" id="inputEmail-1" required="" placeholder="Email address" autofocus="">
                                                    <input class="form-control" type="password" name="U_password" id="inputPassword-1" required="" placeholder="Password">
                                                    <div class="checkbox">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Remember me</label></div>
                                                    </div><button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="submit">Sign in</button><a href="registration.html">Create Account</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <div id="Modal-button-wrapper" class="text-center"><a class="bs4_modal_trigger" href="" data-modal-id="bs4_team" data-toggle="modal"><i class="fas fa-user" style="font-size: 21px;"></i></a>
                                    <div id="bs4_team" class="modal fade bs4_modal bs4_blue bs4_bg_transp bs4_bd_black bs4_bd_semi_trnsp bs4_none_radius bs4_shadow_none bs4_center bs4_animate bs4FadeInDown bs4_duration_md bs4_easeOutQuint bs4_size_team" data-modal-backdrop="true" data-show-on="click" data-modal-delay="false" data-modal-duration="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="/*background: var(--indigo);*/">
                                                <div class="bs4_team_content bg-card1" style="background: rgba(255,255,255,0);">
                                                    <div class="login-card"><img class="profile-img-card" src="assets/img/avatar_2x.png">
                                                        <p class="profile-name-card"> </p>
                                                        
                                                        <form class="form-inline form-signin">
                                                            <span class="reauth-email"> </span>
                                                                <input name="U_name" id="inputEmail" class="form-control" type="text" required placeholder="Username" autofocus />
                                                                <input name="U_pass"class="form-control" type="password" id="inputPassword" required="" placeholder="Password">
                                                            <div class="checkbox">
                                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">Remember me</label></div>
                                                            </div><button class="btn btn-primary btn-block btn-lg btn-signin" name="signin" type="submit">Sign in</button><a href="registration.html">Create Account</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <section data-aos="fade-up" data-aos-duration="700" id="video-and-stats" style="padding-top: 66px;padding-bottom: 66px;background: url(&quot;assets/img/b1.jpg&quot;);">
        <h1 style="padding-bottom: 0px;margin-bottom: 46px;">Why Choose Us?</h1><iframe allowfullscreen="" frameborder="0" src="https://www.youtube.com/embed/DoirrCfhjf0?autoplay=1&amp;mute=1&amp;loop=1&amp;playlist=DoirrCfhjf0&amp;controls=0" width="560" height="315"></iframe>
    </section>
    <section data-aos="fade-up" data-aos-duration="700" id="services">
        <div class="row clearmargin clearpadding row-image-txt">
            <div class="col-xs-12 col-sm-6 col-md-6 col-sm-pull-6" style="padding:20px;">
                <h1 style="text-align: left;">Bring it to the next level with mobile app</h1>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam, integer placerat et turpis mi eros nec lobortis taciti, vehicula nisl litora tellus ligula porttitor metus.&nbsp;<br></p>
                <div style="text-align:center"></div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 clearmargin clearpadding col-sm-push-6"><img style="width: 100%;" src="assets/img/b3.png"></div>
        </div>
    </section>
    <div data-aos="fade-up" data-aos-duration="700" id="contact" style="padding-top: 0px;padding-bottom: 0px;margin-top: 56px;margin-bottom: 56px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="background: rgb(255,255,255);">
                    <form>
                        <div class="form-group">
                            <h1 class="text-center" style="font-family: Montserrat, sans-serif;font-weight: bold;">CONTACT US</h1>
                        </div>
                        <div class="form-group"><input class="form-control" type="text" placeholder="Name" required="" style="width: 330px;"></div>
                    </form>
                    <div class="form-group"><input type="email" style="width: 330px;height: 39px;" required="" placeholder="Email"></div>
                    <div class="form-group"><input type="tel" placeholder="Phone No" style="width: 330px;height: 38px;" required=""></div>
                    <div class="form-group"><input type="text" placeholder="Subject" style="width: 330px;height: 38px;" required=""></div>
                    <div class="form-group"><textarea style="width: 330px;" placeholder="Message" required=""></textarea></div>
                    <div class="form-group"><button class="btn btn-info" type="submit" style="width: 330px;">Submit</button></div>
                </div>
                <div class="col-md-6" style="padding-left: 20px;padding-right: 20px;background: rgb(255,255,255);">
                    <fieldset></fieldset>
                    <legend>OUR LADY OF THE SACRED HEART</legend>
                    <p></p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-map-marker-alt" style="height: 24px;width: 24px;"></i></td>
                                    <td>597,Ghandhi Nagar,Rangasamutram Post,Sathyamangalam - 638 402</td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td><i class="fa fa-phone" style="width: 24px;height: 24px;"></i></td>
                                    <td>+91 98428 73007</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-envelope" style="width: 24px;height: 24px;"></i></td>
                                    <td>kalaivaniagencieserd@gmail.com<br>kalaivanisarees@gmail.com<br><br></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <aside id="section-clients" class="clients">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3"><a href="#"> <img class="img-fluid" src="assets/img/envato.jpg"></a></div>
                    <div class="col-sm-6 col-md-3"><a href="#"> <img class="img-fluid" src="assets/img/designmodo.jpg"></a></div>
                    <div class="col-sm-6 col-md-3"><a href="#"> <img class="img-fluid" src="assets/img/themeforest.jpg"></a></div>
                    <div class="col-sm-6 col-md-3"><a href="#"> <img class="img-fluid" src="assets/img/creative-market.jpg"></a></div>
                </div>
            </div>
        </aside>
    </section>
    <section></section>
    <div class="footer-basic">
        <footer data-aos="fade-up" data-aos-duration="700">
            <div id="vertical-line"></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">reserved© 2022</a></li>
                <li class="list-inline-item"><a href="#">Privacy &amp; Legal</a></li>
                <li class="list-inline-item"><a href="#">Contact </a></li>
                <li class="list-inline-item"><a href="#">Careers </a></li>
                <li class="list-inline-item"><a href="#">Forums </a></li>
                <li class="list-inline-item"><a href="#">Locations </a></li>
                <li class="list-inline-item"><a href="#">United States</a></li>
            </ul>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/Button-Modal-popup-team-member.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
</body>

</html>