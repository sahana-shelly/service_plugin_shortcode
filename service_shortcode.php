<?php
/**
 * Created by IntelliJ IDEA.
 * User: shelly
 * Date: 11/13/18
 * Time: 12:02 AM
 */

class Service_Shortcode{
    public $text="sahaaaaaaaaaaaaaaaaaa";

    function __construct()
    {
        add_shortcode('service', (array($this, 'service_shortcode')));
        add_shortcode('lorem','lorem_shortcode');
    }
    function service_shortcode()
    {


            $posts = get_posts(['post_type' => 'service']);
            foreach ($posts as $k => $v) {?>
                <div class="class">
                    <h1><?php echo get_the_title($v); ?></h1>
                    <div style="float: left">
                        <?php
                        echo get_the_post_thumbnail($v,array(600,300));
                        ?>
                    </div>
                    <p><?php echo get_the_content($v);?></p>
                </div>
          <?php  }
            



    }

    /**
     * @return string
     */
    function lorem_shortcode(){

        return $this->text;

    }




}
$service_shortcode=new Service_Shortcode();
