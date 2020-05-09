
<?php
session_start();
ini_set("display_errors", 0);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
if (!isset($_SESSION["user"])){
    header( "Refresh:1; url=login.html", true, 303);
}
$insurance = "";
if(isset($_POST['insurance'])){
    $insurance = $_POST['insurance'];
    require_once('functions.php');
    $data = Client::search_insurance($insurance);
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
<form>


    <select size="5" id="insurance">
        <option value="amerihealth-amerihealthregionalprefntwkhmohmopos">Amerihealth Regional Pref Ntwk HMO HMO POS</option>
        <option value="amerihealth-amerihealthlocalvaluenetworkepoposppo">Amerihealth Local Value Network EPO POS PPO</option>
        <option value="amerihealth-amerihealthlocalvaluenetworkhmohmopos">Amerihealth Local Value Network EPO POS PPO</option>
        <option value="aetna-aetnasignatureadministratorsppo">Aetna Signature Administrators PPO</option>
        <option value="aetna-aetnaadvantage6350">Aetna Advantage 6350</option>
        <option value="aetna-aetnaadvantage6350hix">Advantage 6350 - HIX</option>
        <option value="aetna-aetnadmo">Aetna DMO</option>
        <option value="aetna-aetnahmo">Aetna HMO</option>
        <option value="aetna-aetnachoiceposii">Aetna Choice POS II</option>
    </select>
</form>
<form method="POST">
        <input type="text" name="insuarance" placeholder="Enter Name" value="<?php echo $insurance;?>"/>
        <input type="Submit" value="Lets ask"/>

</form>
<div id="output">
    <h3>BetterDoctor - Insurances</h3>
    <div id="content-placeholder"></div>
    <script id="insurances-template" type="text/x-handlebars-template">
        <table>
            <thead>
            <th>Name</th>
            <th>uid</th>
            <th>Categories</th>
            </thead>
            <tbody>
            {{#data}}
            <tr class="provider">
                <td>{{name}}</td>
                <td>{{uid}}</td>
                <td></td>
            </tr>
            {{#plans}}
            <tr>
                <td>{{name}}</td>
                <td>{{uid}}</td>
                <td>{{category}}
            </tr>
            {{/plans}}
            {{/data}}
            </tbody>
        </table>
    </script>
</div>
</body>
</html>
