<?php
session_start();
ini_set("display_errors", 0);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
if (!isset($_SESSION["user"])){
    header( "Refresh:1; url=login.html", true, 303);
}
$query = "";
if(isset($_POST['query'])){
    $query = $_POST['query'];
    require_once('functions.php');
    $data = Client::search_doctor($query);
    $output = array("data"=>json_decode($data,true));
}
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <link href="startbootstrap-creative-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="startbootstrap-creative-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="startbootstrap-creative-gh-pages/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="startbootstrap-creative-gh-pages/css/creative.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js"></script>
    <script>


        // This code depends on jQuery Core and Handlebars.js

    </script>

    <style>


        body {
            font-family: ProximaNovaReg, 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        h3 {
            color: #bb3794;
        }
        a {
            text-decoration: none;
        }

        a, a:visited {
            color: rgb(84, 180, 210);
        }

        a:hover {
            color: rgb(51,159,192);
        }

        th {
            text-align: left;
        }

        td, th {
            padding-right: 20px;
        }

        form{
            display:block;
            padding-top: 5%;
        }
        #mainNav {
            background-color: #f05f40;
        }

    </style>
</head>
<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="searchpage.php">DocSearch</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="tobevisited.php">To-be Visited</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<form method="POST">
    <input type="text" name="query" placeholder="Enter Name" value="<?php echo $query;?>"/>
    <input type="Submit" value="Lets ask"/>
</form>
<div id="output">
    <h3>BetterDoctor - Doctor Search Results</h3>
   <p>Since API is down. This is fake data for demonstration purposes!</p>
 <head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Doctors Available</h2>

<table>
  <tr>
    <th>Doctor</th>
    <th>Office Info</th>
    <th>Insurance</th>
    <th>Specialty</th>
  </tr>
  <tr>
    <td>Dr.Alfred</td>
    <td>1941 Oak Tree Rd # 203, Edison, NJ 08820</td>
    <td>Aetna Advantage 6350</td>
    <td>Neuropathology</td>
  </tr>
  <tr>
    <td>Dr.Maria</td>
    <td>1941 Oak Tree Rd # 204, Edison, NJ 08820</td>
    <td>Aetna DMO</td>
    <td>Pediatrician</td>
  </tr>
  <tr>
    <td>Dr.Ernst</td>
    <td>1941 Oak Tree Rd # 205, Edison, NJ 08820</td>
    <td>Aetna Choice POS II</td>
    <td>Dentist</td>
  </tr>
  <tr>
    <td>Dr.Helen</td>
    <td>1941 Oak Tree Rd # 206, Edison, NJ 08820</td>
    <td>Aetna Signature Administrators PPO</td>
    <td>Legal Medicine</td>
  </tr>
  <tr>
    <td>Dr.Yoshi</td>
    <td>1941 Oak Tree Rd # 207, Edison, NJ 08820</td>
    <td>Aetna Advantage 6350</td>
    <td>Body Imaging</td>
  </tr>
  <tr>
    <td>Dr.Toegel</td>
    <td>1941 Oak Tree Rd # 208, Edison, NJ 08820</td>
    <td>Aetna HMO</td>
    <td>Tough Project</td>
  </tr>
</table>
<form action="/tobevisited.php">
  <p>Please select your Doctor:</p>
  <input type="radio" name="doctor" value="Dr.Alfred">
  <label for="doctor">Dr.Alfred</label><br>
  <input type="radio" name="doctor" value="Dr.Maria">
  <label for="doctor">Dr.Maria</label><br>
  <input type="radio" name="doctor" value="Dr.Ernst">
  <label for="doctor">Dr.Ernst</label><br>
  <input type="radio" name="doctor" value="Dr.Helen">
  <label for="doctor">Dr.Helen</label><br>
  <input type="radio" name="doctor" value="Dr.Yoshi">
  <label for="doctor">Dr.Yoshi</label><br>
  <input type="radio" name="doctor" value="Dr.Teogel">
  <label for="doctor">Dr.Toegel</label><br>

  <br>  
  
   <input type="submit" value="Submit">
</form>
</body>
    <div id="content-placeholder"></div>
    <script id="docs-template" type="text/x-handlebars-template">
        <table>
            <thead>
            <th>Name</th>
            <th>Title</th>
            <th>Bio</th>
            <th>Picture</th>
            </thead>
            <tbody>
            {{#data}}
            <tr>
                <td><a href="?lic={{uid}}&name={{profile.first_name}} {{profile.last_name}}" target="_new">{{profile.first_name}} {{profile.last_name}}</a><br>
                    <img src="{{ratings.0.image_url_small}}"></img></td>
                <td>{{profile.title}}</td>
                <td>{{uid}}</td>
                <td><img src="{{profile.image_url}}"></img></td>
            </tr>
            {{/data}}
            </tbody>
        </table>
    </script>
</div>
</body>
</html>
