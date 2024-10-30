<?php

/**
 * @desc			This file loads mobile device detect as plugin to Wordpress.
 * @copyright       2014 Guilherme Desimon
 * @package			Wordpress
 * @author			Guilherme Desimon
 * @license			http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License
 * @version			1.4.1
 * @web				http://www.desimon.net/mobile-device-detect-reloaded/
 */
/*
  Plugin Name: Mobile Device Detect Reloaded
  Plugin URI: http://www.desimon.net/mobile-device-detect-reloaded/
  Description: Based on Matthias Reuter Plugin (<a href="http://wordpress.org/extend/plugins/mobile-device-detect/">http://wordpress.org/extend/plugins/mobile-device-detect/</a>). This Wordpress plugin integrates the Detect Mobile Browsers (Open source mobile phone detection) script from (<a href="http://detectmobilebrowsers.com/">http://detectmobilebrowsers.com/</a>) to wordpress.<br><br>It allows to redirect mobile visitors to a custom target URL. Mobile Device Detect for Wordpress is licensed to GNU General Public License v3. <b>Now includes the Detect Mobile Browser was created by <a href="http://twitter.com/chadsmith">Chad Smith</a>.</b><br><br>More Informations, Installation Guide and Download are available on the plugin homepage of <a href="http://www.desimon.net/mobile-device-detect-reloaded">Mobile Device Detect Reloaded for Wordpress</a>.
  Version: 1.4.1
  Author: Guilherme Desimon
  Author URI: http://www.desimon.net/
 */

function mobile_device_detect_reloaded() {
    define('MOBILE_DD_PLUGINFILE', WP_PLUGIN_DIR . '/mobile-device-detect-reloaded/mobile_device_detect.php');
    // load plugin functions
    if (file_exists(MOBILE_DD_PLUGINFILE)) {
        require_once(MOBILE_DD_PLUGINFILE);
        if ($_GET['mobile_dd'] == 'non_mobile' || $_POST['mobile_dd'] == 'non_mobile') {
            setcookie('mobile_dd', 1);
        } elseif ($_COOKIE['mobile_dd'] != 1) {
            if (get_option('mobile_ddr_iphone_option') == "false") {
                $iphoneOption = !(bool)get_option('mobile_ddr_iphone_option');
            } elseif (get_option('mobile_ddr_iphone_option') == "true") {
                $iphoneOption = (bool) get_option('mobile_ddr_iphone_option');
            } else {
                $iphoneOption = get_option('mobile_ddr_iphone_option');
            }
            
            if (get_option('mobile_ddr_ipad_option') == "false") {
                $ipadOption = !(bool)get_option('mobile_ddr_ipad_option');
            } elseif (get_option('mobile_ddr_ipad_option') == "true") {
                $ipadOption = (bool) get_option('mobile_ddr_ipad_option');
            } else {
                $ipadOption = get_option('mobile_ddr_ipad_option');
            }
            
            if (get_option('mobile_ddr_android_option') == "false") {
                $androidOption = !(bool)get_option('mobile_ddr_android_option');
            } elseif (get_option('mobile_ddr_android_option') == "true") {
                $androidOption = (bool) get_option('mobile_ddr_android_option');
            } else {
                $androidOption = get_option('mobile_ddr_android_option');
            }

            if (get_option('mobile_ddr_windowsphone_option') == "false") {
                $windowsPhoneOption = !(bool)get_option('mobile_ddr_windowsphone_option');
            } elseif(get_option('mobile_ddr_windowsphone_option') == "true") {
                $windowsPhoneOption = (bool)get_option('mobile_ddr_windowsphone_option');
            } else {
                $windowsPhoneOption = get_option('mobile_ddr_windowsphone_option');
            }
            
            if (get_option('mobile_ddr_opera_option') == "false") {
                $operaOption = !(bool)get_option('mobile_ddr_opera_option');
            }elseif (get_option('mobile_ddr_opera_option') == "true") {
                $operaOption = (bool)get_option('mobile_ddr_opera_option');
            } else {
                $operaOption = get_option('mobile_ddr_opera_option');
            }
            
            if (get_option('mobile_ddr_blackberry_option') == "false") {
                $blackberryOption = !(bool)get_option('mobile_ddr_blackberry_option');
            } elseif (get_option('mobile_ddr_blackberry_option') == "true") {
                $blackberryOption = (bool)get_option('mobile_ddr_blackberry_option');
            } else {
                $blackberryOption = get_option('mobile_ddr_blackberry_option');
            }
            
            if (get_option('mobile_ddr_palm_option') == "false") {
                $palmOption = !(bool)get_option('mobile_ddr_palm_option');
            } elseif (get_option('mobile_ddr_palm_option') == "true") {
                $palmOption = (bool)get_option('mobile_ddr_palm_option');
            } else {
                $palmOption = get_option('mobile_ddr_palm_option');
            }
            
            if (get_option('mobile_ddr_windows_option') == "false") {
                $windowsOption = !(bool)get_option('mobile_ddr_windows_option');
            } elseif(get_option('mobile_ddr_windows_option') == "true") {
                $windowsOption = (bool)get_option('mobile_ddr_windows_option');
            } else {
                $windowsOption = get_option('mobile_ddr_windows_option');
            }
            
            if (get_option('mobile_ddr_mobile_redirect_option') == "false") {
                $mobileOption = !(bool) get_option('mobile_ddr_mobile_redirect_option');
            } else {
                $mobileOption = get_option('mobile_ddr_mobile_redirect_option');
            }
            
            if (get_option('mobile_ddr_desktop_redirect_option') == "false") {
                $desktopOption = !(bool) get_option('mobile_ddr_desktop_redirect_option');
            } else {
                $desktopOption = get_option('mobile_ddr_desktop_redirect_option');
            };

            mobile_device_detect($iphoneOption, $ipadOption, $androidOption, $windowsPhoneOption, $operaOption, $blackberryOption, $palmOption, $windowsOption, $mobileOption, $desktopOption);
        }
    }
}

add_action('wp_loaded', 'mobile_device_detect_reloaded');

// Hook for adding toplevel menu
function mobile_dd_add_toplevel_menu() {
    add_menu_page('Mobile Device Detect Reloaded', 'Mobile Device Detect Reloaded', 8, __FILE__, 'options_mobile_device_detect');
}

add_action('admin_menu', 'mobile_dd_add_toplevel_menu');

function options_mobile_device_detect() {
    ?>

    <div class="wrap">
        <h2>Welcome to Mobile Device Detect Reloaded configuration panel</h2>
        <div class="status"></div>
        <p>This wordpress plugin integrates the Detect Mobile Browsers (Open source mobile phone detection script from <a href="http://detectmobilebrowsers.com/">detectmobilebrowsers.com</a> in wordpress. It allows to redirect visitors to a custom target URL, which can be specified here.</p>
        <p>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----" />
                <input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira mais f‡cil e segura de efetuar pagamentos online!" />
                <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1" />
            </form>
        </p>
    <?php
    if (file_exists(MOBILE_DD_PLUGINFILE)) {
        echo '';
    } else {
        echo '<div class="error fade"><p>File "mobile_device_detect.php" not found.</p></div>';
    }
    ?>

        <form method="post" action="options.php" id="pluginForm">
            <input type="hidden" name="update_pluginoptions" value="true" />
            <div>
                <h2 style="margin-left:0px;">Detect iPhones</h2>
                <select name="iphone_form" id="iphone_form" onchange="javascript:iphoneCheck(this.value);">
                    <option value="" <?php if (get_option('mobile_ddr_iphone_option') == "") echo 'selected="selected"'; ?>>How do you wish to treat the iPhone?</option>
                    <option value="true" <?php if (get_option('mobile_ddr_iphone_option') == "true") echo 'selected="selected"'; ?>>Treat iPhones like mobile devices</option>
                    <option value="redirect" <?php if (strpos(get_option('mobile_ddr_iphone_option'), 'http://') !== false) echo 'selected="selected"'; ?>>Redirect iPhones to a specific URL</option>
                    <option value="false" <?php if (get_option('mobile_ddr_iphone_option') == "false") echo 'selected="selected"'; ?>>Treat iPhones like full desktop browsers</option>
                </select>
                <div id="iphone"><p>&nbsp;</p></div>
            </div>

            <div>
                <h2 style="margin-left:0px;">Detect iPads</h2>
                <select name="ipad_form" id="ipad_form" onchange="javascript:ipadCheck(this.value);">
                    <option value="" <?php if (get_option('mobile_ddr_ipad_option') == "") echo 'selected="selected"'; ?>>How do you wish to treat the iPad?</option>
                    <option value="true" <?php if (get_option('mobile_ddr_ipad_option') == "true") echo 'selected="selected"'; ?>>Treat iPads like mobile devices</option>
                    <option value="redirect" <?php if (strpos(get_option('mobile_ddr_ipad_option'), 'http://') !== false) echo 'selected="selected"'; ?>>Redirect iPads to a specific URL</option>
                    <option value="false" <?php if (get_option('mobile_ddr_ipad_option') == "false") echo 'selected="selected"'; ?>>Treat iPads like full desktop browsers</option>
                </select>
                <div id="ipad"><p>&nbsp;</p></div>
            </div>

            <div>
                <h2 style="margin-left:0px;">Detect Android Devices</h2>
                <select name="android_form" id="android_form" onchange="javascript:androidCheck(this.value);">
                    <option value="" <?php if (get_option('mobile_ddr_android_option') == "") echo 'selected="selected"'; ?>>How do you wish to treat Android phones?</option>
                    <option value="true" <?php if (get_option('mobile_ddr_android_option') == "true") echo 'selected="selected"'; ?>>Treat Android phones like mobile devices</option>
                    <option value="redirect" <?php if (strpos(get_option('mobile_ddr_android_option'), 'http://') !== false) echo 'selected="selected"'; ?>>Redirect Android phones to a specific URL</option>
                    <option value="false" <?php if (get_option('mobile_ddr_android_option') == "false") echo 'selected="selected"'; ?>>Treat Android phones like full desktop browsers</option>
                </select>
                <div id="android"><p>&nbsp;</p></div>
            </div>

            <div>
                <h2 style="margin-left:0px;">Detect Windows Phone Devices</h2>
                <select name="windowsphone_form" id="windowsphone_form" onchange="javascript:windowsPhoneCheck(this.value);">
                    <option value="" <?php if (get_option('mobile_ddr_windowsphone_option') == "") echo 'selected="selected"'; ?>>How do you wish to treat Windows Phone devices?</option>
                    <option value="true" <?php if (get_option('mobile_ddr_windowsphone_option') == "true") echo 'selected="selected"'; ?>>Treat Windows Phone devices like mobile devices</option>
                    <option value="redirect" <?php if (strpos(get_option('mobile_ddr_windowsphone_option'), 'http://') !== false) echo 'selected="selected"'; ?>>Redirect Windows Phone devices to a specific URL</option>
                    <option value="false" <?php if (get_option('mobile_ddr_windowsphone_option') == "false") echo 'selected="selected"'; ?>>Treat Windows Phone devices like full desktop browsers</option>
                </select>
                <div id="windowsphone"><p>&nbsp;</p></div>
            </div>

            <div>
                <h2 style="margin-left:0px;">Detect Opera Browsers (Mobile/Mini)</h2>
                <select name="opera_form" id="opera_form" onchange="javascript:operaCheck(this.value);">
                    <option value="" <?php if (get_option('mobile_ddr_opera_option') == "") echo 'selected="selected"'; ?>>How do you wish to treat Opera Mini browsers?</option>
                    <option value="true" <?php if (get_option('mobile_ddr_opera_option') == "true") echo 'selected="selected"'; ?>>Treat Opera Mini browsers like mobile devices</option>
                    <option value="redirect" <?php if (strpos(get_option('mobile_ddr_opera_option'), 'http://') !== false) echo 'selected="selected"'; ?>>Redirect Opera Mini to a specific URL</option>
                    <option value="false" <?php if (get_option('mobile_ddr_opera_option') == "false") echo 'selected="selected"'; ?>>Treat Opera Mini browsers like full desktop browsers</option>
                </select>
                <div id="opera"><p>&nbsp;</p></div>
            </div>

            <div>
                <h2 style="margin-left:0px;">Detect BlackBerry Devices</h2>
                <select name="blackberry_form" id="blackberry_form" onchange="javascript:blackberryCheck(this.value);">
                    <option value="" <?php if (get_option('mobile_ddr_blackberry_option') == "") echo 'selected="selected"'; ?>>How do you wish to treat Blackberry devices?</option>
                    <option value="true" <?php if (get_option('mobile_ddr_blackberry_option') == "true") echo 'selected="selected"'; ?>>Treat Blackberry devices like mobile devices</option>
                    <option value="redirect" <?php if (strpos(get_option('mobile_ddr_blackberry_option'), 'http://') !== false) echo 'selected="selected"'; ?>>Redirect Blackberry devices to a specific URL</option>
                    <option value="false" <?php if (get_option('mobile_ddr_blackberry_option') == "false") echo 'selected="selected"'; ?>>Treat Blackberry devices like full desktop browsers</option>
                </select>
                <div id="blackberry"><p>&nbsp;</p></div>
            </div>

            <div>
                <h2 style="margin-left:0px;">Detect Palm Mobiles</h2>
                <select name="palm_form" id="palm_form" onchange="javascript:palmCheck(this.value);">
                    <option value="" <?php if (get_option('mobile_ddr_palm_option') == "") echo 'selected="selected"'; ?>>How do you wish to treat Palm OS devices?</option>
                    <option value="true" <?php if (get_option('mobile_ddr_palm_option') == "true") echo 'selected="selected"'; ?>>Treat Palm OS devices like mobile devices</option>
                    <option value="redirect" <?php if (strpos(get_option('mobile_ddr_palm_option'), 'http://') !== false) echo 'selected="selected"'; ?>>Redirect Palm OS devices to a specific URL</option>
                    <option value="false"  <?php if (get_option('mobile_ddr_palm_option') == "false") echo 'selected="selected"'; ?>>Treat Palm OS devices like full desktop browsers</option>
                </select>
                <div id="palm"><p>&nbsp;</p></div>
            </div>

            <div>
                <h2 style="margin-left:0px;">Detect Windows Mobile Devices</h2>
                <select name="windows_form" id="windows_form" onchange="javascript:windowsCheck(this.value);">
                    <option value="" <?php if (get_option('mobile_ddr_windows_option') == "") echo 'selected="selected"'; ?>>How do you wish to treat Windows Mobile devices?</option>
                    <option value="true" <?php if (get_option('mobile_ddr_windows_option') == "true") echo 'selected="selected"'; ?>>Treat Windows Mobile devices like mobile devices</option>
                    <option value="redirect" <?php if (strpos(get_option('mobile_ddr_windows_option'), 'http://') !== false) echo 'selected="selected"'; ?>>Redirect Windows Mobile devices to a specific URL</option>
                    <option value="false" <?php if (get_option('mobile_ddr_windows_option') == "false") echo 'selected="selected"'; ?>>Treat Windows Mobile devices like full desktop browsers</option>
                </select>
                <div id="windows"><p>&nbsp;</p></div>
            </div>

            <div>
                <h2 style="margin-left:0px;">Redirect Mobile Browsers</h2>
                <select name="mobile_redirect_form" id="mobile_redirect_form" onchange="javascript:mobile_redirectCheck(this.value);">
                    <option value="" <?php if (get_option('mobile_ddr_mobile_redirect_option') == "") echo 'selected="selected"'; ?>>Do we want to redirect mobile browsers to a different URL?</option>
                    <option value="true" <?php if (get_option('mobile_ddr_mobile_redirect_option') == "true") echo 'selected="selected"'; ?>>Yes - Redirect mobile visitors to a different address</option>
                    <option value="false" <?php if (get_option('mobile_ddr_mobile_redirect_option') == "false") echo 'selected="selected"'; ?>>No - Do not redirect mobile visitors - function will return TRUE</option>
                </select>
                <div id="mobile_redirect"><p>&nbsp;</p></div>
            </div>

            <div>
                <h2>Redirect Desktop Browsers</h2>
                <select name="desktop_redirect_form" id="desktop_redirect_form" onchange="javascript:desktop_redirectCheck(this.value);">
                    <option value="" <?php if (get_option('mobile_ddr_desktop_redirect_option') == "") echo 'selected="selected"'; ?>>Do we redirect regular desktop browsers to a different URL?</option>
                    <option value="true" <?php if (get_option('mobile_ddr_desktop_redirect_option') == "true") echo 'selected="selected"'; ?>>Yes - Redirect desktop visitors to a different address</option>
                    <option value="false" <?php if (get_option('mobile_ddr_desktop_redirect_option') == "false") echo 'selected="selected"'; ?>>No - Do not redirect desktop visitors - function will return FALSE</option>
                </select>
                <div id="desktop_redirect"><p>&nbsp;</p></div>
            </div>

            <p class="submit"><input type="submit" name="Submit" class="button-primary" /></p>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.50/jquery.form.min.js"></script>
    <script>
        (function($) {
            $('#pluginForm').ajaxForm(function() {
                var body = $("html, body");
                body.animate({scrollTop:0}, '500', 'swing');
                $('.status').html('<div class="updated fade"><p>Settings saved.</p></div>');
            }); 
            
            iphoneCheck($('#iphone_form option[selected="selected"]').val());
            ipadCheck($('#ipad_form option[selected="selected"]').val());
            androidCheck($('#android_form option[selected="selected"]').val());
            windowsPhoneCheck($('#windowsphone_form option[selected="selected"]').val());
            operaCheck($('#opera_form option[selected="selected"]').val());
            blackberryCheck($('#blackberry_form option[selected="selected"]').val());
            palmCheck($('#palm_form option[selected="selected"]').val());
            windowsCheck($('#windows_form option[selected="selected"]').val());
            mobile_redirectCheck($('#mobile_redirect_form option[selected="selected"]').val());
            desktop_redirectCheck($('#desktop_redirect_form option[selected="selected"]').val());
        })( jQuery );
        function iphoneCheck(value) {
            if(value == "redirect") {
                jQuery("#iphone p").html("URL: <input type=\"text\" name=\"iphone\" value=\"<?php echo get_option('mobile_ddr_iphone_option'); ?>\" /> ");
            } else {
                jQuery("#iphone p").html("<input type=\"hidden\" name=\"iphone\" value=\""+value+"\" />&nbsp;");
            }
        }
        function ipadCheck(value) {
            if(value == "redirect") {
                jQuery("#ipad p").html("URL: <input type=\"text\" name=\"ipad\" value=\"<?php echo get_option('mobile_ddr_ipad_option'); ?>\" /> ");
            } else {
                jQuery("#ipad p").html("<input type=\"hidden\" name=\"ipad\" value=\""+value+"\" />&nbsp;");
            }
        }
        function androidCheck(value) {
            if(value == "redirect") {
                jQuery("#android p").html("URL: <input type=\"text\" name=\"android\" value=\"<?php echo get_option('mobile_ddr_android_option'); ?>\" /> ");
            } else {
                jQuery("#android p").html("<input type=\"hidden\" name=\"android\" value=\""+value+"\" />&nbsp;");
            }
        }
        function windowsPhoneCheck(value) {
            if(value == "redirect") {
                jQuery("#windowsphone p").html("URL: <input type=\"text\" name=\"windowsphone\" value=\"<?php echo get_option('mobile_ddr_windowsphone_option'); ?>\" /> ");
            } else {
                jQuery("#windowsphone p").html("<input type=\"hidden\" name=\"windowsphone\" value=\""+value+"\" />&nbsp;");
            }
        }
        function operaCheck(value) {
            if(value == "redirect") {
                jQuery("#opera p").html("URL: <input type=\"text\" name=\"opera\" value=\"<?php echo get_option('mobile_ddr_opera_option'); ?>\" /> ");
            } else {
                jQuery("#opera p").html("<input type=\"hidden\" name=\"opera\" value=\""+value+"\" />&nbsp;");
            }
        }
        function blackberryCheck(value) {
            if(value == "redirect") {
                jQuery("#blackberry p").html("URL: <input type=\"text\" name=\"blackberry\" value=\"<?php echo get_option('mobile_ddr_blackberry_option'); ?>\" /> ");
            } else {
                jQuery("#blackberry p").html("<input type=\"hidden\" name=\"blackberry\" value=\""+value+"\" />&nbsp;");
            }
        }
        function palmCheck(value) {
            if(value == "redirect") {
                jQuery("#palm p").html("URL: <input type=\"text\" name=\"palm\" value=\"<?php echo get_option('mobile_ddr_palm_option'); ?>\" /> ");
            } else {
                jQuery("#palm p").html("<input type=\"hidden\" name=\"palm\" value=\""+value+"\" />&nbsp;");
            }
        }
        function windowsCheck(value) {
            if(value == "redirect") {
                jQuery("#windows p").html("URL: <input type=\"text\" name=\"windows\" value=\"<?php echo get_option('mobile_ddr_windows_option'); ?>\" /> ");
            } else {
                jQuery("#windows p").html("<input type=\"hidden\" name=\"windows\" value=\""+value+"\" />&nbsp;");
            }
        }
        function mobile_redirectCheck(value) {
            if(value == "true") {
                jQuery("#mobile_redirect p").html("URL: <input type=\"text\" name=\"mobile_redirect\" value=\"<?php echo get_option('mobile_ddr_mobile_redirect_option'); ?>\" /> ");
            } else {
                jQuery("#mobile_redirect p").html("<input type=\"hidden\" name=\"mobile_redirect\" value=\""+value+"\" />&nbsp;");
            }
        }
        function desktop_redirectCheck(value) {
            if(value == "true") {
                jQuery("#desktop_redirect p").html("URL: <input type=\"text\" name=\"desktop_redirect\" value=\"<?php echo get_option('mobile_ddr_desktop_redirect_option'); ?>\" /> ");
            } else {
                jQuery("#desktop_redirect p").html("<input type=\"hidden\" name=\"desktop_redirect\" value=\""+value+"\" />&nbsp;");
            }
        }
    </script>
    <?php
}

if ($_POST['update_pluginoptions'] == 'true') {
    pluginoptions_update();
}

function pluginoptions_update() {

    update_option('mobile_ddr_iphone_option', $_POST['iphone']);
    update_option('mobile_ddr_ipad_option', $_POST['ipad']);
    update_option('mobile_ddr_android_option', $_POST['android']);
    update_option('mobile_ddr_windowsphone_option', $_POST['windowsphone']);
    update_option('mobile_ddr_opera_option', $_POST['opera']);
    update_option('mobile_ddr_blackberry_option', $_POST['blackberry']);
    update_option('mobile_ddr_palm_option', $_POST['palm']);
    update_option('mobile_ddr_windows_option', $_POST['windows']);
    update_option('mobile_ddr_mobile_redirect_option', $_POST['mobile_redirect']);
    update_option('mobile_ddr_desktop_redirect_option', $_POST['desktop_redirect']);


    if ($_POST['iphone'] != get_option('mobile_ddr_iphone_option')) {
        update_option('mobile_ddr_iphone_option', $_POST['iphone']);
    }
    if ($_POST['ipad'] != get_option('mobile_ddr_ipad_option')) {
        update_option('mobile_ddr_ipad_option', $_POST['ipad']);
    }
    if ($_POST['android'] != get_option('mobile_ddr_android_option')) {
        update_option('mobile_ddr_android_option', $_POST['android']);
    }
    if ($_POST['windowsphone'] != get_option('mobile_ddr_windowsphone_option')) {
        update_option('mobile_ddr_windowsphone_option', $_POST['windowsphone']);
    }
    if ($_POST['opera'] != get_option('mobile_ddr_opera_option')) {
        update_option('mobile_ddr_opera_option', $_POST['opera']);
    }
    if ($_POST['blackberry'] != get_option('mobile_ddr_blackberry_option')) {
        update_option('mobile_ddr_blackberry_option', $_POST['blackberry']);
    }
    if ($_POST['palm'] != get_option('mobile_ddr_palm_option')) {
        update_option('mobile_ddr_palm_option', $_POST['palm']);
    }
    if ($_POST['windows'] != get_option('mobile_ddr_windows_option')) {
        update_option('mobile_ddr_windows_option', $_POST['windows']);
    }
    if ($_POST['mobile_redirect'] != get_option('mobile_ddr_mobile_redirect_option')) {
        update_option('mobile_ddr_mobile_redirect_option', $_POST['mobile_redirect']);
    }
    if ($_POST['desktop_redirect'] != get_option('mobile_ddr_desktop_redirect_option')) {
        update_option('mobile_ddr_desktop_redirect_option', $_POST['desktop_redirect']);
    }
}
?>