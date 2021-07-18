<?php
/* Template Name: Form1*/
if(is_user_logged_in()) {
 if(my_theme_create_new_gym()){
 global $current_user;
     wp_get_current_user();
     $user_login = $current_user->user_login;
     $user_email = $current_user->user_email;
     $user_firstname = $current_user->user_firstname;
     $user_lastname = $current_user->user_lastname;
     $user_id = $current_user->ID;
    $post_title = sanitize_text_field($_POST['gymName']);
    $taxonomy = 'country_state_city';
    $new_post = array(
              'post_title' =>$post_title,
              'post_author' =>$user_id,
              'post_type' => 'Gyms',
              'post_name' => $post_title,
    );
$country = sanitize_text_field($_POST['country']);
    $state = sanitize_text_field($_POST['state']);
    $city = sanitize_text_field($_POST['city']);
 set_post_term($new_post, $country, $state, $city, $taxonomy );
  echo "<style>#gymSuccessBlock {display:block !important}</style>";

 }
}
?>
<style type="text/css">
/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {

    height: 50%;
    width: 50%;
}

label {
    color: #1b1b58 !important;
}
</style>
<?php
get_header();
include get_template_directory() . '/dbconfig.php';

$query = $db->query("SELECT * FROM _S9Q_countries ORDER BY name ASC");

$callquery1 = $db->query("SELECT * FROM _S9Q_callcodes");


 $rowCount1 = mysqli_num_rows($query);


 function my_theme_create_new_gym() {
 if (isset($_POST['d73he3gehj4ge6yr']))
 {
  if ( wp_verify_nonce($_POST['d73he3gehj4ge6yr'], 'create_gym_form_submit' ))
 {

  $gymName = sanitize_text_field($_POST['gymName']);
  $address1 = sanitize_text_field($_POST['address1']);
  $country = sanitize_text_field($_POST['country']);
  $state = sanitize_text_field($_POST['state']);
  $city = sanitize_text_field($_POST['city']);
  $email = sanitize_text_field($_POST['email']);
  $phone = sanitize_text_field($_POST['phone']);
  $postcode = sanitize_text_field($_POST['postcode']);
  $callcode = sanitize_text_field($_POST['callcode']);
  $mapID = sanitize_text_field($_POST['mapID']);
  
  $errors = 0;

  if ($gymName == '') {
    echo "<style type='text/css'>
    #gymName{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";

      $errors += 1;
  } else 
  if (strlen($gymName) > 40)
  {
      echo "<style>#gymNameInvalid {display:block !important}</style>";
  }

  if ($address1 == '') {
    echo "<style type='text/css'>
    #inaddress1{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";

      $errors += 1;

  }

  if ($country == '0' || $country == '') {
    echo "<style type='text/css'>
    #country{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";
      $errors += 1;
    

  }

  if ($state == '0' || $state == '') {
    echo "<style type='text/css'>
    #state{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";
      $errors += 1;

  }

  if ($city == '0' || $city == '') {
    echo "<style type='text/css'>
    #city{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";
      $errors += 1;
     

  }

  if ($postcode == '') {
    echo "<style type='text/css'>
    #postcode{
      border-color:#fca1a1 !important;
      border-width:3px !important;    }</style>";

      echo "<style>#fillFields {display:block !important}</style>";
      $errors += 1;
     

  }

  if ($email == '') {
    echo "<style type='text/css'>
    #emailin{
      border-color:#fca1a1 !important;
      border-width:3px !important;
    }</style>";

    echo "<style>#fillFields {display:block !important}</style>";
    $errors += 1;
    

  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     echo "<style>#emailValidMsg {display:block !important}</style>";
     $errors += 1;
     

  }
  }

  if ($phone == '') {
    echo "<style type='text/css'>
    #phone{
      border-color:#fca1a1 !important;
      border-width:3px !important;
    }</style>";

    echo "<style>#fillFields {display:block !important}</style>";
    $errors += 1;


  } else {

    $justNums = preg_replace("/[^0-9]/", '', $phone);

    if (strlen($justNums) == 11) {
      
      $justNums = preg_replace("/^1/", '',$justNums);

    } else if (strlen($justNums) < 8 || strlen($justNums) > 11 ) { 
      $errors =+ 1;
      echo "<style>#phoneValidMsg {display:block !important}</style>";
      echo "<style type='text/css'>
      #phone{
        border-color:#fca1a1 !important;
        border-width:3px !important;
      }</style>";
    }

  }


  if ($callcode == '0') {
    echo "<style type='text/css'>
    #callcode{
      border-color:#fca1a1 !important;
      border-width:3px !important;
    }</style>";

    echo "<style>#fillFields {display:block !important}</style>";
    $errors += 1;


  }

  if ($mapID == '') {
   echo "<style>#mapValidMessage {display:block !important}</style>";

    echo "<style>#fillFields {display:block !important}</style>";
    $errors += 1;
  }

  if  ($errors > 0) {
    return false;
  } else {
  return true;
  }
  
  
 }
}
 }




   function set_post_term( $new_post, $country,$state, $city, $taxonomy ) 
   {	
    $gymName = sanitize_text_field($_POST['gymName']);
    $address1 = sanitize_text_field($_POST['address1']); 
    $address2 = sanitize_text_field($_POST['address2']); 
    $email = sanitize_text_field($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $postcode = sanitize_text_field($_POST['postcode']);
    $callcode = sanitize_text_field($_POST['callcode']);
    $website = sanitize_text_field($_POST['website']);
    $facebook = sanitize_text_field($_POST['facebook']);
    $mapID = sanitize_text_field($_POST['mapID']);
  

      $term1 = term_exists( $country, $taxonomy );
      $term2 = term_exists( $state, $taxonomy );
      $term3 = term_exists( $city, $taxonomy );

      // If the taxonomy doesn't exist, then we create it	
      	if ( 0 === $term1 || null === $term1 ) {	
        $term1 = wp_insert_term(
                $country,
                $taxonomy,
                array(
                  'slug' => strtolower( str_ireplace( ' ', '-', $country ))
                  )
              );	
      }	

      if ( 0 === $term2 || null === $term2 ) {	
        $term2 = wp_insert_term(
                $state,
                $taxonomy,
                array(
                  'parent'=> $term1['term_id'],
                  'slug' => strtolower( str_ireplace( ' ', '-', $state ))
                  )
              );	
      }	

      if ( 0 === $term3 || null === $term3 ) {	
        $term3 = wp_insert_term(
                $city,
                $taxonomy,
                array(
                  'parent'=> $term2['term_id'],
                  'slug' => strtolower( str_ireplace( ' ', '-', $city ))
                  )
              );	
      }	


      // Then we can set the taxonomy	
      $pid = wp_insert_post($new_post);
      wp_set_post_terms( $pid, $term1, $taxonomy, true );	
      wp_set_post_terms( $pid, $term2, $taxonomy, true );	
      wp_set_post_terms( $pid, $term3, $taxonomy, true );	
   
    add_post_meta($pid, 'phone', $phone);
    add_post_meta($pid, 'Gym_name', $gymName);
    add_post_meta($pid, 'call_code', $callcode);
    add_post_meta($pid, 'address_1', $address1);
    add_post_meta($pid, 'address_2', $address2);
    add_post_meta($pid, 'postcode', $postcode);
    add_post_meta($pid, 'website', $website);
    add_post_meta($pid, 'facebook', $facebook);
    add_post_meta($pid, 'mapID', $mapID);
    add_post_meta($pid, 'email', $email);
      
    wp_publish_post($pid);


   
    }

    // $_POST['country'];
    // $_POST['state'];
    // $_POST['city'];
    // set_post_term($new_post, $country, $state, $city, $taxonomy );


 

 
  if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){      
   
 $query2 =  $db->query("SELECT `name` FROM _S9Q_countries WHERE id = ".$_POST['country']);

    while($row = $query2->fetch_assoc()){$country = $row['name'];}

    $query3 =  $db->query("SELECT `name` FROM _S9Q_state WHERE id = ".$_POST['state']);
    
    while($row2 = $query3->fetch_assoc()){$state = $row2['name'];}

    $query4 =  $db->query("SELECT `name` FROM _S9Q_city WHERE id = ".$_POST['city']);
   
   while($row3 = $query4->fetch_assoc()){$city = $row3['name'];}
   }



?>

<style>
label {
    color: white;
    font-weight: bold;
}

.form-control {
    text-align: left !important;
}

body {
    margin-top: 100px;
}
</style>

<body>



    <div class="center">

        <h1 id="nameLoc" class="titles">Name and Location</h1>

    </div>


    <div class="center">
        <div Id="emailValidMsg" class="alert alert-danger" role="alert">
            Please use a valid email address
        </div>
    </div>

    <div class="center">
        <div Id="mapValidMessage" class="alert alert-danger" role="alert">
            Please add your location on the map
        </div>
    </div>

    <div class="center">
        <div Id="phoneValidMsg" class="alert alert-danger" role="alert">
            Please enter a valid phone number.
        </div>
    </div>

    <div class="center">
        <div Id="fillFields" class="alert alert-danger" role="alert">
            Please fill required fields
        </div>
    </div>


    <div class="center">
        <div Id="gymNameInvalid" class="alert alert-danger" role="alert">
            Please use less than 40 characters for the Gym Name.
        </div>
    </div>

    <div style="margin-bottom:-10px;" class="center">

        <p class="gymsug">Find your location on the map below. We'll then fill the address fields automatically for you.
            </h1>

    </div>

    <div class="center">

        <p class="gymsug" id="gymFillSuggestion">(Some address fields may still require filling/editing.)</h1>

    </div>
    <form name="initgymform" method="post" enctype="multipart/form-data">
        <?php wp_nonce_field( 'create_gym_form_submit', 'd73he3gehj4ge6yr' ); ?>
        <div class="center">
            <input id="mapID" name="mapID"></input>
        </div>

        <div id="mapContain">
            <input id="pac-input" class="controls" type="text" placeholder="Search Box" />
            <div id="map">
            </div>
        </div>
        <?php

       if ($_POST)
       {
$gymName = sanitize_text_field($_POST['gymName']);
    $address1 = sanitize_text_field($_POST['address1']); 
    $address2 = sanitize_text_field($_POST['address2']); 
    $email = sanitize_text_field($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $postcode = sanitize_text_field($_POST['postcode']);
    $callcode = sanitize_text_field($_POST['callcode']);
    $website = sanitize_text_field($_POST['website']);
    $facebook = sanitize_text_field($_POST['facebook']);
    $mapID = sanitize_text_field($_POST['mapID']);
       }
       ?>

        <div class="center">
            <div class="forms" id="form1">

                <div class="form-group">
                    <label for="name">Gym Name</label>
                    <input name="gymName" class="form-control" id="gymName" value="<?php

          if (isset($gymName))
          {
            echo $gymName;
          }

        ?>">
                </div>
                <label>Gym Address</label>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="inaddress1" style="float:left;">Address line 1 </label>
                        <input src="" type="text" name="address1" class="form-control" id="inaddress1"
                            placeholder="Street and building" value="<?php

          if (isset($address1))
          {
            echo $address1;
          }

        ?>">
                    </div>
                    <div style="float:left;" class="col-sm-6">
                        <label for="inaddress2" style="float:left;">Address Line 2 (optional)</label>
                        <input type="text" name="address2" class="form-control" id="inaddress2"
                            placeholder="Flat number, Suite, Floor, etc" value="<?php

          if (isset($address2))
          {
            echo $address2;
          }

        ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="country" style="float:left;">Country</label>
                        <input id="country" name="country" class="form-control" list="countryList"
                            placeholder="Select a Country" value="<?php

          if (isset($country))
          {
            echo $country;
          }

        ?>">
                        <datalist id="countryList">
                            <?php 
        if($rowCount1 > 0) {
            while($row = $query->fetch_assoc()) {
              echo '<option data-value="'.$row['id'].'" value="'.$row['name'].'">'.$row['name'].'</option>';
            }
        } else {
          echo '<option value="">Country not availible</option>';
        }
        ?>
                        </datalist>
                        <!-- <input  type="hidden" name ="country" id="answer-hidden"> -->
                    </div>
                    <div style="float:left;" class="col-sm-6">
                        <label for="postcode" style="float:left;">Postcode/Zip code</label>
                        <input name="postcode" class="form-control" id="postcode" value="<?php

          if (isset($postcode))
          {
            echo $postcode;
          }

        ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="state" style="float:left;">State/province</label>
                        <input list="stateList" placeholder="Select a State" name="state" id="state"
                            class="form-control" value="<?php

          if (isset($state))
          {
            echo $state;
          }

        ?>">
                        <datalist id="stateList">
                        </datalist>
                    </div>
                    <div style="float:left;" class="col-sm-6">
                        <label for="city" style="float:left;">City</label>
                        <input list="cityList" placeholder="Select a City" name="city" id="city" class="form-control"
                            value="<?php

          if (isset($city))
          {
            echo $city;
          }

        ?>">
                        <datalist id="cityList">
                        </datalist>
                    </div>
                </div>

            </div>
        </div>


        <div class="center">
            <h1 class="titles">Contact Details</h1>
        </div>



        <div class="center">
            <div class=" forms" id="form2">

                <div class="form-group">
                    <label for="exampleInputEmail1">Website</label>
                    <input type="text" name="website" class="form-control" id="webin" value="<?php

          if (isset($website))
          {
            echo $website;
          }

        ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Facebook URL</label>
                    <input type="text" name="facebook" class="form-control" id="fbin" value="<?php

          if (isset($facebook))
          {
            echo $facebook;
          }

        ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" name="email" class="form-control" id="emailin" aria-describedby="emailHelp"
                        value="<?php

          if (isset($email))
          {
            echo $email;
          }

        ?>">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group"></div>
                <label for="number">Phone number</label>
                <div class="center">
                    <input list="codeList" name="callcode" id="callCode">
                    <datalist id="codeList">
                        <?php
        if ($callquery1 > 0)
        {
        while($row = $callquery1->fetch_assoc()) {
          echo '<option value="'.$row['phoneCode'].'">'.$row['code'].' (+'.$row['phoneCode'].')</option>';
        }
      } else
      {
        echo '<option value="0">Country Code</option>';
      }
        ?>
                    </datalist>
                    <input id="phone" type="text" name="phone" class="form-control" id="phonein" value="<?php

          if (isset($phone))
          {
            echo $phone;
          }

        ?>">
                </div>
            </div>
        </div>


        </div>

        <div id="btnsub1d">
            <button id="btnsub1" type="submit" name="gymsub" class="btn">Submit</button>
        </div>
    </form>





    <br>

    </div>
    </div>

    <div id="gymSuccessBlock" class="blocker">
        <div class="center">
            <div id="gymSuccess" class="alert alert-success" role="alert">
                Congratulations! You've given us all the information we need. All we need to do now is verify your gym.
                This will take 1-3 days. We'll then send you an email confirming your gym page is live and ready to
                edit!
            </div>
        </div>

        <div class="center">
            <button id="navHome" type="submit" class="btn"><a href="https://www.roamingrolls.com/">Homepage</a></button>
        </div>

    </div>
</body>

<div>

    <?php

 

get_footer();

?>

</div>