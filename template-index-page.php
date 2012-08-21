<?php
/**
 * Template Name: Index Page
 *
 * This page is specifically designed for the index page of Prelude.12
 * 
 * @package Thematic
 * @subpackage Templates
 */

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

	// var definition for style directories
	$PRELUDEimagedir = get_stylesheet_directory_uri();
	$PRELUDEimagedir .= '/library/images/';
	
	$PRELUDEFlashdir = $PRELUDEimagedir;
	$PRELUDEFlashdir .= 'flash/' ; 
	
	$PRELUDEfronttempdir = $PRELUDEimagedir;
	$PRELUDEfronttempdir .= 'front_temp/' ;
	
	$PRELUDEscriptdir = get_stylesheet_directory_uri();
	$PRELUDEscriptdir .= '/library/scripts/'; 
	
?>
<div id="bodycontent">
    	<div id="flashmovies">
        <div id="west">
            <div id="farwest">
                  <div id="flashA">
<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="204" height="396">
                      <param name="movie" value="<?php echo $PRELUDEFlashdir?>P12_A.swf" />
                      <param name="quality" value="high" />
                      <param name="wmode" value="opaque" />
                      <param name="swfversion" value="6.0.65.0" />
                      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                      <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                      <!--[if !IE]>-->
                      <object type="application/x-shockwave-flash" data="<?php echo $PRELUDEFlashdir?>P12_A.swf" width="204" height="396">
                        <!--<![endif]-->
                        <param name="quality" value="high" />
                        <param name="wmode" value="opaque" />
                        <param name="swfversion" value="6.0.65.0" />
                        <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                        <div>
                          <a href="<?php echo home_url();?>/artists/"><img src="<?php echo $PRELUDEfronttempdir?>a_2.jpg"/></a>
                      </div>
                        <!--[if !IE]>-->
                    </object>
                      <!--<![endif]-->
                  </object>
                  </div>
            </div>
            <div id="central">
           	  <div id="flashB">
<object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="376" height="192">
            	  <param name="movie" value="<?php echo $PRELUDEFlashdir?>P12_B.swf" />
            	  <param name="quality" value="high" />
            	  <param name="wmode" value="opaque" />
            	  <param name="swfversion" value="6.0.65.0" />
            	  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
            	  <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
            	  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
            	  <!--[if !IE]>-->
            	  <object type="application/x-shockwave-flash" data="<?php echo $PRELUDEFlashdir?>P12_B.swf" width="376" height="192">
            	    <!--<![endif]-->
            	    <param name="quality" value="high" />
            	    <param name="wmode" value="opaque" />
            	    <param name="swfversion" value="6.0.65.0" />
            	    <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
            	    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
            	    <div>
            	      <a href="<?php echo home_url();?>/artists/"><img src="<?php echo $PRELUDEfronttempdir?>b_1.jpg"/></a>
                    </div>   
          	      
            	    <!--[if !IE]>-->
          	    </object>
            	  <!--<![endif]-->
          	  </object>
              </div>
              <div id="flashC">
              <object id="FlashID3" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="205" height="192">
                <param name="movie" value="<?php echo $PRELUDEFlashdir?>P12_C.swf" />
                <param name="quality" value="high" />
                <param name="wmode" value="opaque" />
                <param name="swfversion" value="6.0.65.0" />
                <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                <!--[if !IE]>-->
                <object type="application/x-shockwave-flash" data="<?php echo $PRELUDEFlashdir?>P12_C.swf" width="205" height="192">
                  <!--<![endif]-->
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="6.0.65.0" />
                  <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                  <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                  <div>
                       <a href="themes.html"><img src="<?php echo $PRELUDEfronttempdir?>c_1.jpg"/></a>
                  </div>
                  <!--[if !IE]>-->
                </object>
                <!--<![endif]-->
              </object>
              </div>
              <div id="flashE">
                <object id="FlashID7" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="288" height="195">
                  <param name="movie" value="<?php echo $PRELUDEFlashdir?>P12_E.swf" />
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="6.0.65.0" />
                  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                  <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                  <!--[if !IE]>-->
                  <object type="application/x-shockwave-flash" data="<?php echo $PRELUDEFlashdir?>P12_E.swf" width="288" height="195">
                    <!--<![endif]-->
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="6.0.65.0" />
                    <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                    <div>
                      <a href="<?php echo home_url();?>/artists/"><img src="<?php echo $PRELUDEfronttempdir?>e_1.jpg"/></a>
                    </div>
                    <!--[if !IE]>-->
                  </object>
                  <!--<![endif]-->
                </object>
              </div>
              <div id="flashF">
                <object id="FlashID6" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="291" height="195">
                  <param name="movie" value="<?php echo $PRELUDEFlashdir?>P12_F.swf" />
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="6.0.65.0" />
                  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                  <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                  <!--[if !IE]>-->
                  <object type="application/x-shockwave-flash" data="<?php echo $PRELUDEFlashdir?>P12_F.swf" width="291" height="195">
                    <!--<![endif]-->
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="6.0.65.0" />
                    <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                    <div>
                      <a href="<?php echo home_url();?>/artists/"><img src="<?php echo $PRELUDEfronttempdir?>f_2.jpg"/></a>
                    </div>
                    <!--[if !IE]>-->
                  </object>
                  <!--<![endif]-->
                </object>
              </div>
            </div>
            <div id="south">
              <div id="flashG">	
              <object id="FlashID8" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="267" height="187">
                <param name="movie" value="<?php echo $PRELUDEFlashdir?>P12_G.swf" />
                <param name="quality" value="high" />
                <param name="wmode" value="opaque" />
                <param name="swfversion" value="6.0.65.0" />
                <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                <!--[if !IE]>-->
                <object type="application/x-shockwave-flash" data="<?php echo $PRELUDEFlashdir?>P12_G.swf" width="267" height="187">
                  <!--<![endif]-->
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="6.0.65.0" />
                  <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                  <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                  <div>
                    <a href="<?php echo home_url();?>/artists/"><img src="<?php echo $PRELUDEfronttempdir?>g_2.jpg"/></a>
                  </div>
                  <!--[if !IE]>-->
                </object>
                <!--<![endif]-->
              </object>
              </div>
              <div id="flashH">
                <object id="FlashID9" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="312" height="187">
                  <param name="movie" value="<?php echo $PRELUDEFlashdir?>P12_H.swf" />
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="6.0.65.0" />
                  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                  <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                  <!--[if !IE]>-->
                  <object type="application/x-shockwave-flash" data="<?php echo $PRELUDEFlashdir?>P12_H.swf" width="312" height="187">
                    <!--<![endif]-->
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="6.0.65.0" />
                    <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                    <div>
                      <a href="themes.html"><img src="<?php echo $PRELUDEfronttempdir?>h_3.jpg"/></a>
                    </div>
                    <!--[if !IE]>-->
                  </object>
                  <!--<![endif]-->
                </object>
              </div>
              <div id="flashI">
                <object id="FlashID10" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="205" height="187">
                  <param name="movie" value="<?php echo $PRELUDEFlashdir?>P12_I.swf" />
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="6.0.65.0" />
                  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                  <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                  <!--[if !IE]>-->
                  <object type="application/x-shockwave-flash" data="<?php echo $PRELUDEFlashdir?>P12_I.swf" width="205" height="187">
                    <!--<![endif]-->
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="6.0.65.0" />
                    <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                    <div>
                      <a href="<?php echo home_url();?>/artists/"><img src="<?php echo $PRELUDEfronttempdir?>i_1.jpg"/></a>
                    </div>
                    <!--[if !IE]>-->
                  </object>
                  <!--<![endif]-->
                </object>
              </div>
            </div>
        </div>    
        <div id="east">
          <div id="flashD">
          <object id="FlashID4" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="180" height="287">
            <param name="movie" value="<?php echo $PRELUDEFlashdir?>P12_D.swf" />
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
            <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="<?php echo $PRELUDEFlashdir?>P12_D.swf" width="180" height="287">
              <!--<![endif]-->
              <param name="quality" value="high" />
              <param name="wmode" value="opaque" />
              <param name="swfversion" value="6.0.65.0" />
              <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
              <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
              <div>
                <a href="<?php echo home_url();?>/artists/"><img src="<?php echo $PRELUDEfronttempdir?>d_1.jpg"/></a>
              </div>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object>
          </div>
          <div id="flashJ">
            <object id="FlashID5" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="180" height="297">
              <param name="movie" value="<?php echo $PRELUDEFlashdir?>P12_J.swf" />
              <param name="quality" value="high" />
              <param name="wmode" value="opaque" />
              <param name="swfversion" value="6.0.65.0" />
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
              <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="<?php echo $PRELUDEFlashdir?>P12_J.swf" width="180" height="297">
                <!--<![endif]-->
                <param name="quality" value="high" />
                <param name="wmode" value="opaque" />
                <param name="swfversion" value="6.0.65.0" />
                <param name="expressinstall" value="<?php echo $PRELUDEscriptdir?>expressInstall.swf" />
                <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                <div>
                  <a href="themes.html"><img src="<?php echo $PRELUDEfronttempdir?>j_1.jpg"/></a>
                </div>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
            </object>
          </div>
      </div>
        
    </div>




<?php 
    // action hook for placing content below #container
    thematic_belowcontainer();
    
    // calling footer.php
    get_footer();
?>