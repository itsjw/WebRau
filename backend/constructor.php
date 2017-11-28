<?php

require_once "config.php";

class constructor {

     private static $_instance  = null;
     public $title;
	public $headline;
     public $subs	            = [];
     public $modfile;
     public $viewfile	       = ".default";
	public $cssfiles	       = [];
	public $jsfiles	       = [];

     function __construct() {
          self::$_instance = $this;
     }

     public function build() {

          if ($_GET[0] == "admin") {

               switch ($_GET[1]) {

                    case "dashboard":
                         $this->headline   = "Dashboard";
                         $this->viewfile   = "dashboard.php";
                         $this->cssfiles[] = "";
                         $this->jsfiles[]  = "";
                         break;

                    case "posts":
                         $this->headline   = "Posts Verwalten";
                         $this->viewfile   = "posts.php";
                         if ($_GET[2] == "new") {
                              $this->headline   = "Neuen Post verfassen";
                         }
                         if ($_GET[2] == "edit") {
                              $this->headline   = "Posts bearbeiten";
                         }
                         break;

                    default:
                         $this->headline   = "Dashboard";
                         $this->viewfile   = "dashboard.php";
                         break;
               }

          } else {

               switch ($_GET[0]) {

                    case "";
                         $this->headline   = "Aktuelles";
                         $this->viewfile   = "aktuelles.php";
                         $this->subs	   = array_merge($this->subs, ["Impressum" => "/impressum", "Stadt Elstra"  => "http://elstra.de/"]);
                    break;

                    case "sportfest":
                         $this->headline   = "Unser Sportfest";
                         $this->viewfile   = "sportfest.php";
                         break;

                    case "bildergalerie":
                         $this->headline   = "Bildergalerie";
                         $this->viewfile   = "bildergalerie.php";
                         $this->cssfiles[] = "";
                         $this->jsfiles[]  = "";
                         break;

                    case "feuerwehr":
                         $this->headline   = "Feuerwehr";
                         $this->viewfile   = "feuerwehr.php";
                         $this->subs	   = array_merge($this->subs, ["Jugendfeuerwehr" => "#jugendfeuerwehr", "Freiwillige Feuerwehr" => "#feuerwehr"]);
                         break;

                    case "allgemeines":
                         $this->headline   = "Allgemeines";
                         $this->viewfile   = "allgemeines.php";
                         $this->subs       = array_merge($this->subs, ["Ortschaftsrat" => "#ortschaftsrat", "Gödlau" => "#gödlau", "Kindisch" => "#kindisch", "Rauschwitz" => "#rauschwitz"]);
                         break;

                    case "kontakt":
                         $this->headline   = "So ereichen sie mich";
                         $this->viewfile   = "kontakt.php";
                         $this->cssfiles[] = "kontakt.css";
                         break;

                    case "impressum":
    			          $this->headline   = "Impressum";
    			          $this->viewfile   = "impress.php";
    			          break;

                    default:
                         $this->headline   = "Error 404";
                         $this->viewfile   = "error-404.html";
                         break;
               }
          }

          switch ($this->view) {

               case "view":
                    $this->title	     = pages_title;
                    $this->modfile	     = "view.php";
                    $this->cssfiles     = array_merge($this->cssfiles);
                    $this->jsfiles	     = array_merge($this->jsfiles);
                    break;

               case "login":
                    $this->title	     = login_title;
  			     $this->modfile	     = "login.php";
  			     $this->cssfiles	= array_merge($this->cssfiles);
                    $this->jsfiles      = array_merge($this->jsfiles);
                    break;

               case "admin":
  			     $this->title	     = admin_title;
  			     $this->modfile	     = "admin.php";
  			     $this->cssfiles	= array_merge($this->cssfiles);
  			     $this->jsfiles	     = array_merge($this->jsfiles);
  			     break;

               default :
  			     return false;
                    break;
          }

          include_once "resources/views/blueprint.php";
		return true;

     }

     static public function getInstance() {
		if (self::$_instance === null) {
		     self::$_instance = new Constructor();
          }

          return self::$_instance;
	}
}

?>
