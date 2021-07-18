<html>

<?php

get_header();




?>


<style>
#searchcon2 {
    display: none;
}

#searchBarContainer {
    margin-top: -100px;
}

<?php verify_user_code();
?>
</style>

<body>
    <script>
    function showpopup() {
        popup.classList.add('open');
    }

    function hidePopup() {
        popup.classList.remove('open');
    }
    </script>


    </div>

    <div id="fullArrow">
        <div id="arrowTop"></div>
        <div id="arrowBottom"></div>
    </div>

    <div class="jumbotron jumbotron-fluid jumbo1">
        <div class="container">


            <h1 style="font-size:50;">Your BJJ holiday starts here!</h1>


            <div id="searchBarContainer" class="center">

                <form role="search" method="get" id="searchform1" class="searchform"
                    action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div>
                        <input id="search" list="termsList" class="form-control"
                            value="<?php echo get_search_query(); ?>" name="s" id="s"
                            placeholder="Where do you want to train? " autocomplete="off">
                        <datalist>
                            <?php
     $terms = get_terms('country_state_city');
     print_r($terms);
     foreach($terms as $term)
     {

       if ($term != "")
    
       {
          echo '<option>'.$term->name.'</option>';
       }
     }

    // $args = array(  
    //     'hierarchical' => true, 
    //     'taxonomy' => 'country_state_city'
    // );

    // wp_dropdown_categories( $args);

     ?>
                        </datalist>
                        <input type="hidden" name="post_type" value="gyms" />
                    </div>

                    <div class="center">
                        <button id="but" type="submit" id="searchsubmit"
                            value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>"
                            class="banner-text-btn">Go!</button>
                    </div>

                </form>
            </div>





            <p></p>
            <div class="alert alert-success" id="logSuccess" role="alert">
                You're logged in!
            </div>

            <div class="alert alert-success" id="activatedAlert" role="alert">
                You're account has been fully activated!
            </div>





            <div class="alert alert-primary" id="searchRules" role="alert">
                Search by country, state, city or gym name.
            </div>
        </div>



        <div id="addYourGym" class="jumbotron jumbotron-fluid jumbo2">
            <div class="container">
                <h1 style="font-size:50;" class="addYourGymItem">Add your gym</h1>
                <p style="font-size:30;" class="addYourGymItem">Own or train at a gym you love? Add it to our database
                    and we'll show it off for you!</p>
                <a <?php

$currentUser = wp_get_current_user();
$id = $currentUser->ID;
$status = get_user_meta ($id, 'user_status', true);


  if ( ! is_user_logged_in() ||  $status != 1){
    echo "";} else {
    echo "href ='https://www.roamingrolls.com/add%20your%20gym/'";}?>><button type="button" id="but2"><svg width="1em"
                            height="1em" viewBox="0 0 16 16" class=" bi bi-plus-square-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z" />
                        </svg></button></a>
            </div>
        </div>


        <div class="jumbotron jumbotron-fluid jumbo3">
            <div class="container">
                <div Id="articles">
                    <h1 style="font-size:55;">BJJ Travel and training guides</h1>
                </div>
                <p></p>
                <p></p>

                <div id="cards">

                    <a href="https://www.roamingrolls.com/how-to-prepare-for-a-jujitsu-holiday/">
                        <div class="card">
                            <img class="cardImages"
                                src="https://roamingrolls.com/wp-content/uploads/2020/08/plane-scaled.jpg"
                                alt="Card image cap">
                            <div class="cardBody">
                                <h5 class="cardTitle"> Tips from experience on preparing for a BJJ Holiday</h5>
                            </div>
                        </div>
                    </a>

                    <a href="https://www.roamingrolls.com/jujitsu-in-taiwan/">
                        <div class="card">
                            <img class="cardImages" src="https://roamingrolls.com/wp-content/uploads/2020/08/taiwan.jpg"
                                alt="Card image cap">
                            <div class="cardBody">
                                <h5 class="cardTitle">A Complete Guide To Rolling In Taiwan</h5>
                            </div>
                        </div>
                    </a>

                    <a href="https://www.roamingrolls.com/rolling-in-okinawa-a-complete-guide/">
                        <div class="card">
                            <img class="cardImages"
                                src="https://roamingrolls.com/wp-content/uploads/2019/09/DSC_0302.jpg"
                                alt="Card image cap">
                            <div class="cardBody">
                                <h5 class="cardTitle">A Complete Guide To Rolling In Okinawa.</h5>
                            </div>
                        </div>
                    </a>

                    <a href="https://www.roamingrolls.com/rolling-in-daegu-korea-a-complete-guide/">
                        <div class="card">
                            <img class="cardImages"
                                src="https://roamingrolls.com/wp-content/uploads/2019/11/72698357_131876461538430_808452766551769088_o-1-1.jpg"
                                alt="Card image">
                            <div class="cardBody">
                                <h5 class="cardTitle">Rolling in Daegu, Korea: A Complete Guide</h5>
                            </div>
                        </div>
                    </a>

                    <a href="https://www.roamingrolls.com/how-build-an-awesome-diy-bjj-gym-on-a-budget-case-study/">
                        <div class="card">
                            <img class="cardImages"
                                src="https://roamingrolls.com/wp-content/uploads/2020/08/homegym.jpg"
                                alt="Card image cap">
                            <div class="cardBody">
                                <h5 class="cardTitle">How Build a Home BJJ Gym On a Budget</h5>
                            </div>
                        </div>
                    </a>

                    <a href="https://www.roamingrolls.com/how-dangerous-is-jiujitsu-a-closer-look/">
                        <div class="card">
                            <img class="cardImages"
                                src="https://roamingrolls.com/wp-content/uploads/2019/08/5b3a422dc234878410d1801505f9f7ab-e1569810402990.jpg"
                                alt="Card image cap">
                            <div class="cardBody">
                                <h5 class="cardTitle">How Dangerous Is Jiujitsu Really? A Closer Look.</h5>
                            </div>
                        </div>
                    </a>

                    <a href="https://www.roamingrolls.com/how-to-learn-bjj-in-another-language/">
                        <div class="card">
                            <img class="cardImages"
                                src="https://roamingrolls.com/wp-content/uploads/2020/08/brazilian-jiu-jitsu-2957075_1280.jpg"
                                alt="Card image">
                            <div class="cardBody">
                                <h5 class="cardTitle">How To Learn BJJ in Another Language</h5>
                            </div>
                        </div>
                    </a>

                    <a
                        href="https://www.roamingrolls.com/the-6-best-bjj-podcasts-for-jiujitsu-progression-off-the-mats/">
                        <div class="card">
                            <img class="cardImages"
                                src="https://roamingrolls.com/wp-content/uploads/2020/08/podcast.jpg" alt="Card image">
                            <div class="cardBody">
                                <h5 class="cardTitle">The 6 Best BJJ Podcasts For Jiujitsu Progression Off The Mats</h5>
                            </div>
                        </div>
                    </a>




                    <a href="https://www.roamingrolls.com/sk-fight-club-the-great-unifier-daegu-korea/">
                        <div class="card">
                            <img class="cardImages"
                                src="https://www.roamingrolls.com/wp-content/uploads/2019/10/53519655_2298152746917757_2401142238953340928_n.jpg"
                                alt="Card image">
                            <div class="cardBody">
                                <h5 class="cardTitle">SK Fight Club, Daegu, Korea. The Great Unifier.</h5>
                            </div>
                        </div>
                    </a>


                </div>
            </div>



            <div class="center">
                <a href="https://www.roamingrolls.com/articles/">
                    <button type="button" id="but3" style="
color:white;
margin-top:10px;
margin-bottom:20px;
border:none;
border-radius:5px;
height:50px;
width:100px;
font-size:30px;
margin-top:50px;">More
                    </button>
                </a>
            </div>

        </div>



        <script>
        <?php 

$currentUser = wp_get_current_user();
$id = $currentUser->ID;
$status = get_user_meta($id, 'user_status',true);



if ( !is_user_logged_in()) {
  echo " addgym = document.getElementById('but2');
                addgym.addEventListener('click', function() { showpopup()
                logGymShow(addGymMsg)
                setTimeout(function(){logGymFade(addGymMsg)}, 1000)
                setTimeout(function(){logGymNone(addGymMsg)}, 2000);})";
}else
if( $status != 1 )
{
  echo " addgym = document.getElementById('but2');
  addgym.addEventListener('click', function() { 
       notActivated(addgym, activatedFail); 
                });";
}

?>




        const successLog = document.getElementById("logSuccess");
        const activatedAlert = document.getElementById("activatedAlert");
        const searchRules = document.getElementById('searchRules');
        const search = document.getElementById('search');
        const card = document.getElementsByClassName('card')

        setTimeout(function() {
            logGymFade(successLog)
        }, 1000);
        setTimeout(function() {
            logGymNone(successLog)
        }, 2000);
        setTimeout(function() {
            logGymFade(activatedAlert)
        }, 1000);
        setTimeout(function() {
            logGymNone(activatedAlert)
        }, 2000);





        search.onmouseover = function() {

            searchRules.style.opacity = "100%";

        };

        search.onmouseout = function() {

            searchRules.style.opacity = "0%";

        };

        document.getElementById("but").onmouseover = function() {

            document.getElementById("but").style.backgroundImage = "linear-gradient(#AD0E2C, black)";

        };

        document.getElementById("but").onmouseout = function() {

            document.getElementById("but").style.backgroundImage = "linear-gradient(#0A0A23, #071A4B)";

        };

        document.getElementById("but2").onmouseover = function() {

            document.getElementById("but2").style.backgroundImage = "linear-gradient(#AD0E2C, black)";

        };

        document.getElementById("but2").onmouseout = function() {

            document.getElementById("but2").style.backgroundImage = "linear-gradient(#0A0A23, #071A4B)";

        };


        document.getElementById("but3").onmouseover = function() {

            document.getElementById("but3").style.backgroundImage = "linear-gradient(#AD0E2C, black)";

        };

        document.getElementById("but3").onmouseout = function() {

            document.getElementById("but3").style.backgroundImage = "linear-gradient(#0A0A23, #071A4B)";


        };

        document.getElementById("sidebarbtn").onmouseover = function() {

            document.getElementById("sidebarbtn").style.backgroundImage = "linear-gradient(white, white)";


        }

        document.getElementById("sidebarbtn").onmouseout = function() {

            document.getElementById("sidebarbtn").style.backgroundImage = "linear-gradient(#0A0A23, #071A4B)";


        };

        const arrow = document.getElementById('fullArrow');


        function arrowInit() {


            setInterval(function() {
                arrow.style.top = "85px"
            }, 300);
            setInterval(function() {
                arrow.style.top = "80px"
            }, 600);
        }

        arrowInit();

        searchInput = document.getElementById('search');
        datalist = document.querySelector("datalist");
        // function hideList(input) {
        // 	var datalist = document.querySelector("datalist");
        // 	if (input.value == "") {
        // 		datalist.id = "";  
        //     searchInput.addEventListener("keyup", function() {
        //       datalist.id = "termsList";
        //     })
        // 	} else {
        // 		datalist.id = "termsList";
        // 	}
        // }
        searchInput.addEventListener("keyup", function() {
            datalist.setAttribute("id", "termsList");
        })


        searchInput.addEventListener('click', function() {
            searchInput.addEventListener("keyup", function() {
                datalist.setAttribute("id", "termsList");
            })
        });

        document.addEventListener('click', function() {
            if (searchInput.value == "") {
                datalist.removeAttribute("id", "termsList");
            }
        })
        </script>


</body>

<div class="footer">

    <?php

get_footer();

?>

</div>




</html>