<!DOCTYPE html>
<html>
<head>
	<title>ivoire translator</title>
	 <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	  <link type="text/css" rel="stylesheet" href="styl.css">
	  <link type="text/css" rel="stylesheet" href="insert/ionicons-2.0.1/css/ionicons.min.css">
	  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<?php include('config.php');

var_dump($_POST);

if(!empty($_POST)){
 
  
  /*$sql = "INSERT INTO `data` (texte1, langue_start, texte2, langue_end, audio, date_enr)
  VALUES (?,?,?,?,?,?)";
  $resultat = $conn->prepare($sql)->execute($texte1, $langue_start, $texte2, $langue_end, $target_file, $date);*/


  /*$stmt = $conn->prepare("INSERT INTO `data` (texte1, langue_start, texte2, langue_end, audio, date_enr)
  VALUES (?,?,?,?,?,?)");
   $stmt->bind_param($lang, $traduction, langue, $langue_end, $target_file, $date);

   @$texte1 = @$_POST['lang'];
  @$langue_start = @$_POST['traduction'];
  @$texte2 = @$_POST['langue'];
  @$langue_end = @$_POST['nom_du_fichier'];
  @$date = date("Y-m-d h:i:s");
  @$target_dir = "daudios/";
  @$target_file = @$target_dir.basename($_FILES["audio"]["name"]);
  $resultat = $stmt->execute();
  if ($resultat) {
   echo "insertion effectué";
  } else {
    echo "insertion echoué";
  }*/



// prepare and bind
$stmt = $conn->prepare ("INSERT INTO data (texte1, langue_start, texte2,langue_end,audio,date_enr) VALUES (?, ?, ?,?,?,?)");
$stmt->bind_param($texte1, $langue_start, $texte2, $langue_end, $target_file, $date);

// set parameters and execute
$texte1 = "mot";
$langue_start = "lang";
$texte2 = "traduction";
$langue_end = "langue";
$date = date("Y-m-d h:i:s");
$target_dir = "daudios/";
$target_file = @$target_dir.basename($_FILES["audio"]["name"]);
$resultat = $stmt->execute();


echo "New records created successfully";
  

  if (move_uploaded_file($_FILES['audio']['tmp_name'], $target_file) )
  {
   echo "Audio saved" ;
  }

if (mysqli_query($conn, $sql)) {
  echo '<script language="Javascript">';
        echo 'document.location.replace("./home.php")'; // -->
        echo ' </script>';

    echo "";
} else {
  echo "";
}

}else{
    echo "";
}

mysqli_close($conn);



?>
<body>
	 <header>
            <div class="logo">
               <img src="img/logo2.png" width="200" >
            </div>
            <div class="header-content">
                <div class="breadcrumb">
                    <div class="br-content">
                        <span class="home">
                            <a href="index.php">DASHBOARD</a>
                        </span>
                        <span class="path-divider">/</span>
                        <span class="link">
                            <a href="index.php">Utilisateurs</a>
                        </span>
                        
                    </div>
                </div>
            </div>
        </header>
        <center><h1 style="color: black; margin-top: 30px; font-size: 30px;" ><b>AJOUTER UNE TRADUCTION</b></h1></center>
           <form action="" enctype="multipart/form-data"  method="POST">
               <fieldset>
                 
                 
                 <div class="form-group">
                   <label for="nom">Entrez le mots</label>
                   <input type="text" class="form-control" id="nom" name="mot">
                 </div>
                 
                 <div class="form-group">
                   <label for="selection">choisir une langue</label>
                   <select id="selection" class="form-control" name="lang">
                     	<option value="">Liste de choix</option>
                       <option value="">anglais</option>
                       <option value="">français</option>
                    </select>
                 </div>
                  <div class="form-group">
                   <label for="nom">donner la traduction</label>
                   <input type="text" class="form-control" id="nom" name="traduction">
                 </div>
                 
                 <div class="form-group">
                   <label for="selection">Une liste de choix</label>
                   <select id="selection" class="form-control" name="langue">
                     <option value="">Liste de choix</option>
                       <option value="">Baoulé</option>
                       <option value="">Agni</option>
                       <option value="">Bété</option>
                       <option value="">Dida</option>
                       <option value="">Sénoufo</option>
                       <option value="">Gouro</option>
                       <option value="">Wobè</option>
                       <option value="">Tagbanan</option>
                       <option value="">Gagou</option>
                       <option value="">Dioula</option>
                   </select>
                 </div>
                 <div class="form-group col-md-6">
      			      <label for="inputEmail4">Date d'ajout</label>
      			      <input type="date" class="form-control" id="inputEmail4" name="date_enr">
      			    </div>
                 <div class="form-group">
                   <label for="audio">ajouter l'audio</label>
                   <input type="hidden" name="MAX_FILE_SIZE" value="2097152"> <input type="file" name="nom_du_fichier">
                 </div>

                 <input type="submit" name="submit" value="AJOUTER" class="box-button"  style="background-color: #2a8950" />
               </fieldset>
             </form>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="app.js"></script>

</body>
</html>