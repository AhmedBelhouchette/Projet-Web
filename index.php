<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link rel="stylesheet" href="formii.css">
</head>
<body>
    <div class="title-containerr">
        <h1>استرزق</h1>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $hostname = 'localhost';
          
       $database = 'projet';
       try
       {$db = new PDO("mysql:host=$hostname;dbname=$database","root","") ;}
       catch (Exception $e){die('Erreur : ' . $e->getMessage());}
       $nom = $_POST['nom'];
       $prenom = $_POST['prenom'];
       $datenais= $_post ['dob'] ;
       $city= $_POST['city'];
       $adress = $_POST['adress'];
       $school = $_POST['school'];
       $college = $_POST['college'];
       $degree = $_POST['degree'];
       /*$requete = 'INSERT INTO coordonneesclient (nom, prenom, clientemail, dateclient, clientnumero, clientcommentaire)
       VALUES($nom, $prenom, $email, $datec, $num, $com)';*/
       $requete = $db->prepare('INSERT INTO user (nom, prenom, dob, city, adress, school, college, degree)
       VALUES(:nn, :pre, :cm, :dc, :cnum, :cc)');
       $requete->bindParam(':nn', $nom);
       $requete->bindParam(':pre', $prenom);
      
       $requete->bindParam(':dc', $datenais);
       $requete->bindParam(':cnum', $school);
       $requete->bindParam(':cnum', $college);
       $requete->bindParam(':cc', $degree);
       $requete->execute();
       /*$requete->execute(array('n' => $nom’,'pre' => $prenom,'cm' => $email, 'dc' => $datec, 'cnum' =>$num, 'cc' =>$com));
       /*$db->query($requete)*/
       if ($requete->execute()) {
           header("Location: form_projet.php?registration_success=true");
           exit();
       } else {
           echo "Error: " . $requete->errorInfo()[2] . "<br>";
       }
       $db->close();
       /*PDO::close();*/
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Applicant's Personal Information -->
        <h2>Applicant's Personal Information</h2>
        <label for="first-name">First Name:</label><br>
        <input type="text" id="first-name" name="first-name" required><br>
        <label for="last-name">Last Name:</label><br>
        <input type="text" id="last-name" name="last-name" required><br>
        <label for="dob">Date of Birth (mm/dd/yyyy):</label><br>
        <input type="text" id="dob" name="dob" pattern="(0[1-9]|1[012])/(0[1-9]|1[0-9]|2[0-9])/((19|20)[0-9][0-9])" required><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" required><br>
        <label for="address">Home Address:</label><br>
        <input type="text" id="address" name="address" required><br>
        <!-- Education -->
        <h2>Education</h2>
        <label for="high-school">High School:</label><br>
        <input type="text" id="high-school" name="high-school" required><br>
        <label for="college">College:</label><br>
        <input type="text" id="college" name="college" required><br>
        <label for="degree">Degree:</label><br>
        <input type="text" id="degree" name="degree" required><br>
        <input type="submit" value="Apply Now" class="apply" style="width: 90%;margin-left: 0;">
    </form>
</body>
</html>
