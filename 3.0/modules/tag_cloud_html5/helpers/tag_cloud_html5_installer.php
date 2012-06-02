<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2012 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */
class tag_cloud_html5_installer {
  static function install() {
    // clear and reset default values.  this is also called in the admin menu for
    // 'reset all to default values' and if the upgrader sees variables missing.
    module::clear_all_vars("tag_cloud_html5");
    module::set_var("tag_cloud_html5", "show_wholecloud_link", true);
    module::set_var("tag_cloud_html5", "show_add_tag_form", true);
    module::set_var("tag_cloud_html5", "show_wholecloud_list", true);
    module::set_var("tag_cloud_html5", "height_sidebar", 0.8);
    module::set_var("tag_cloud_html5", "maxtags_sidebar", 30);
    module::set_var("tag_cloud_html5", "maxtags_wholecloud", 500);
    module::set_var("tag_cloud_html5", "options_sidebar", json_encode(array(
      "maxSpeed"      => 0.05,
      "deadZone"      => 0.25,
      "initial"       => array(0.8,-0.3),
      "initialDecel"  => true,
      "zoom"          => 1.25,
      "depth"         => 0.5, 
      "outlineMethod" => "colour",
      "outlineOffset" => 8,
      "outlineColour" => "#eeeeee",
      "textColour"    => "",
      "textFont"      => "", 
      "textHeight"    => 12, 
      "frontSelect"   => true,
      "wheelZoom"     => false
    )));
    module::set_var("tag_cloud_html5", "options_wholecloud", json_encode(array(
      "maxSpeed"      => 0.05, 
      "deadZone"      => 0.25,
      "initial"       => array(0.8,-0.3),
      "initialDecel"  => true,
      "zoom"          => 1.25,
      "depth"         => 0.5, 
      "outlineMethod" => "colour",
      "outlineOffset" => 8,
      "outlineColour" => "#eeeeee",
      "textColour"    => "",
      "textFont"      => "", 
      "textHeight"    => 13, 
      "frontSelect"   => true,
      "wheelZoom"     => false
    )));
    module::set_version("tag_cloud_html5", 4);
  }

  static function upgrade() {
    if (is_null(module::get_var("tag_cloud_html5", "options_sidebar")) ||
        is_null(module::get_var("tag_cloud_html5", "options_wholecloud")) ||
        (module::get_version("tag_cloud_html5") < 4) ) {
      module::install("tag_cloud_html5");
    }
  }

  static function uninstall() {
    module::clear_all_vars("tag_cloud_html5");
  }
  
}
