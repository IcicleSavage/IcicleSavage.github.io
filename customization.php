<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="IcicleSavage" />
        <title>Customizing MinerBot</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/tabpic.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bungee:wght@300&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&display=swap" rel="stylesheet">
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="/#page-top">MinerBot</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="btn btn-primary btn-block nav-link js-scroll-trigger" href="/#get-to-know-minerbot">About MinerBot</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#invite">Invite</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#commands">Commands</a></li>
                        <li class="nav-item"><a class="btn btn-primary nav-link-customization js-scroll-trigger" href="#p">Customization</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- About-->
        <section class="page-section bg-primary" id="p">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Signup for MinerBot's calling system!</h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">Get your phone number [Works only with MinerBot, and in Discord<a class="js-scroll-trigger" href="#footer">*</a>]</p>
                        <a class="btn btn-light btn-xl" href="#phone">See Numbers</a>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#more-information">More Info</a>                    </div>
                </div>
            </div>
        </section>
        <!-- Number -->
        <section class="page-section" id="phone">
            <style>
                      .error {color: #FF0000;}
            </style>
            <div class="container-fluid p-0">
                <div class="container">
                    <div class="text-center h2">Available Numbers</div>
                    <div class="text-center body-text">Use the ID shown, to assign your number (officially).<br><br> To do this, use this command: <pre><code>=number [the ID number]</code></pre>
                    </div>
                    <!-- 1( <button class="btn btn-light btn-xl" id="generate" onclick="eeee(10); Numbers();">VIEW</button> -->
                    <!--<button class="btn btn-light btn-xl" id="generate" onclick="eeee();">VIEW</button>-->
                    <!-- 1( <div class="text-center" id="myData">[_]</div> -->
                    <?php
                    $usernameErr = $selected = "";
                    $username = $selected = "";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                      $username = test_input($_POST["username"]);
                      if (!preg_match("/^((.{2,32})#\d{4})/",$username)) {
                        $usernameErr = "Please input a valid Discord username!"; 
                      }
                      $selected = test_input($_POST["selected"]);
                    }

                    function test_input($data) {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = htmlspecialchars($data);
                      return $data;
                    }
                    ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <select name="selected" id="selected">
                        </select>
                        <br>Discord Username: <input type="text" name="username"><span class="error">* <?php echo $usernameErr;?></span><br>
I will attempt to DM you, with your new number. (This requires you to be in a server which I am, also, in.)
                        <input type="submit" name="submit" value="Submit">
                    </form>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        Your Discord username:
                        <?php
                        echo $username;
                        echo $selected;
                        ?>
                    </div>
                    <script>
                        fetch('numbers.json')
                            .then(function (response) {
                            return response.json();
                        })
                            .then(function (data) {
                            appendData(data);
                        })
                            .catch(function (err) {
                            console.log(err);
                        });
                        function appendData(data) {
                            var mainContainer = document.getElementById("selected");
                            for (var i = 0; i < data.length; i++) {
                                var option = document.createElement("option");
                                var att = document.createAttribute("value");
                                var att2 = document.createAttribute("label");
                                option.innerHTML = data[i].number;
                                att.value = data[i].number;
                                att2.value = 'Selected Number\'s ID: ' + data[i].id;
                                mainContainer.appendChild(option);
                                option.setAttributeNode(att);
                                option.setAttributeNode(att2);
                            }
                        }
                    </script>
                    <!-- Script, of number generation here: https://www.w3schools.com/code/tryit.asp?filename=GMSZ7FWC4WJH -->
                    <!-- 1( 
                    <script src="https://randojs.com/1.0.0.js"></script>
                    <script>
                        function eeee(times){
                            for (var number = 1; number <= times; number++) {
                                var numbs = document.getElementById("mynum").innerHTML;
                                document.getElementById("mynum").innerHTML = numbs + '<br>' + rando(100, 999) + '-' + rando(100,999) + '-' + rando(1000,9999) + '<br>' + rando(100, 999) + '-' + rando(100,999) + '-' + rando(1000,9999);
                            }
                        }
                        function Numbers(){
                            document.getElementById("mynum").innerHTML = rando(100, 999) + '-' + rando(100,999) + '-' + rando(1000,9999) + '<br>' + rando(100, 999) + '-' + rando(100,999) + '-' + rando(1000,9999);
                        }
                        Numbers();
                    </script> -->
                    <!-- For Reference:
                        function numberSave(){
                            setTimeout(() => {
                                var number = document.getElementById("mynum").innerHTML;
                            }, 2000); -->
                    <!-- This is where myfunction(); script *would* go -->
                </div>
            </div
        </section>
        <!-- Contact-->
        <section class="page-section" id="more-information">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">More Information</h2>
                        <div class="text-muted">About this website.</div>
                        <hr class="divider my-4" />
                    </div>
                    <div class="row justify-content-center">
                        <h4 class="col-lg-8 text-center">LICENSE INFORMATION</h4>                        
                        <p class="col-lg-8 text-left"><code class="d-block">
                            This program is free software: you can redistribute it and/or modify
                            it under the terms of the GNU General Public License as published by
                            the Free Software Foundation, either version 3 of the License, or
                            (at your option) any later version.
                        <br>
                        <br>
                            This program is distributed in the hope that it will be useful,
                            but WITHOUT ANY WARRANTY; without even the implied warranty of
                            MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
                            GNU General Public License for more details.
                        <br>
                        <br>
                            You should have received a copy of the GNU General Public License
                            along with this program. If not, see https://www.gnu.org/licenses/.
                        <br>You can find the full license notice <a href="https://github.com/IcicleSavage/IcicleSavage.github.io/blob/main/LICENSE">here</a>
                        </code></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5 page-section" id="footer">
            <div class="container"><div class="small text-center text-muted">* = The numbers defined by MinerBot are meant, solely, for use in Discord (only through MinerBot, to be more specific). The owner of the bot is not liable for any incidents that happen in result of any calls made to any of the numbers, provided by MinerBot.</div></div>
            <div class="container"><div class="small text-center text-muted">MinerBot, a Discord bot, who's main purpose is to entertain. <br>Copyright © 2021  IcicleSavage</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
