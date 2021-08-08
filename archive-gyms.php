<html>

<?php

get_header();

?>

<style>
    .container {
      margin-top:100px;
      margin-bottom:100px;
        
    }

    .gymCardsCon {
        position:relative;
        top:100px;
        margin-bottom:200px;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        
    }

    .gymPagnation {
        margin-bottom:50px;
        position:relative;
        bottom:50px;
    }

    .nav-links {
        font-weight:bold;
    }


    </style>

 


<body>


<div id = "searchBarContainer" class="center" >

<form role="search" method="get" id="searchform1" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div>
<input id="search" class="form-control" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="banner-text-box" placeholder="Where do you want to train?">
<input type="hidden" name="post_type" value="gyms" />
</div>

<div class="center">
<button id="but" type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" class="banner-text-btn">Go!</button>
</div>

</form>
</div>


<div class = "center">
<div class="gymCardsCon">

<?php

class gymClass {
    public $bool;
    public $string;

  }

function append($string) {

    return '<div>'.$string.' <i class="fas fa-check-circle"></i>'.'</div>';
  }

// echo "<pre>";print_r($query);echo "</pre>";

$term = $_GET['s'];

$lower = strtolower($term);

if (strpos($lower,' ')) {
$expTerm = explode(" ",$lower);
} else {
    $expTerm = $lower;
}


$search = "";

if (is_string($expTerm)) {
    $search = $lower;
} else {

foreach($expTerm as $ek => $ev) {

    if($ek == 0)
    {
        $search .= $ev."-";
    } else if ($ek == sizeof($expTerm) - 1) {
        $search .= $ev;

    }
}
}


$args = array(  
        'post_type' => 'gyms',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'title', 
        'tax_query' => array(
            array (
                'taxonomy' => 'country_state_city',
                'field' => 'slug',
                'terms' => $search

            )
        )
    );

     $query = new WP_Query(  $args  );


  if($query-> have_posts() ) {

      while($query-> have_posts() ) {

          $query->the_post();
          get_template_part( 'Template-parts/content', 'archive-gyms');
      
      }
  } else 
       if( have_posts() ) {

      while( have_posts() ) {

          the_post();
          get_template_part( 'Template-parts/content', 'archive-gyms');
      
      }
    } else
  {
      echo "<div class='center'><i class='fas fa-sad-tear fa-4x'></i></div>
      <div id='noGyms'><h2>Sorry, but none of our gyms match your search criteria.</h2></div>";
  }


?>




</div>
</div>

<div class="center gymPagnation">
  <?php 

  $pagination = array(
      'screen_reader_text' => 'Gym Navigation',
      'prev_next' => true,
      'mid_size' => 2,
      'prev_text' => __('« '),
      'next_text' => __(' »')

  );

  the_posts_pagination($pagination);

  ?>
  </div>

</body>

<div>

<?php

get_footer();

?>

</div>
