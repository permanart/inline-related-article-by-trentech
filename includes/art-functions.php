<?php
function InlineRelatedbyTrentechId($atts){
    echo '
    <style>
    .bacajuga{
position: relative;
display: inline-block;
	border: solid 2px #ffcc00;
padding: 20px 20px 0px 20px;
}
.bacajuga .titlebaca{
background-color: white;
position: absolute;
margin-left: 30px;
margin-top: -32px;
padding: 0px 15px;
}
.bacajuga .contentbaca{
border: solid 2px #006699;
padding: 20px 20px 0px 20px;
}
    </style>
    ';
   extract(shortcode_atts(array(
    'jumlah' => 5,
    'tag' => 'default-tag',
    'bacajuga' => '<div class="bacajuga">',
    'titlebaca' => '<div class="titlebaca"><strong>Baca Juga:</strong></div>',
    'contentbaca' => '<div class="contentbaca">',
    'openul' => '<ul>',
    'id' => get_the_ID(),
       ), $atts));
   $return_string .= ''.$bacajuga.''.$titlebaca.''.$openul.'';
        $the_query = new WP_Query(array('tag' => $tag, 'orderby' => 'date', 'order' => 'DESC' , 'showposts' => $number , 'post__not_in' => array( $id ), 'tag__not_in' => array(00001, 00002, 00003) ));
       if ( $the_query->have_posts() ) { while ( $the_query->have_posts() ) { $the_query->the_post();
    $return_string .= '<li><strong><a target="_blank" href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></strong></li>';
        } 
            } else {
        }
        wp_reset_postdata();
   $return_string .= '</ul>';
   $return_string .= '</div>';
   $return_string .= '<div class="partner-banner-aftc-baca-juga" style="text-align: center; margin-top: 30px;"></div>';
   return $return_string;
   

}
add_shortcode( 'post', 'InlineRelatedbyTrentechId' );

/*
 * Menambah menu baru di dashboard admin WordPress
 */
 
// Hubungkan action hook 'admin_menu', jalankan function bernama 'pp_Tambah_Link_Admin()'
add_action( 'admin_menu', 'pp_Tambah_Link_Admin' );
 
// Menambahkan link menu di dashboard admin WordPress
function pp_Tambah_Link_Admin()
{
 add_menu_page(
  'Inline Related by Trentech', // Judul dari halaman
  'Inline Related by Trentech.id', // Tulisan yang ditampilkan pada menu
  'manage_options', // Persyaratan untuk dapat melihat link
  'art-settings', // slug dari file untuk menampilkan halaman ketika menu link diklik.
  'tampil' 
 );
}

function tampil()
{
 require_once 'art-settings.php';
}
