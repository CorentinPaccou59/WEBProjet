<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', 'root'); //connection à la bdd

require('fpdf/fpdf.php');

$req = $bdd->query('SELECT * FROM producteurs');
$donnees = $req -> fetch();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$donnees['nom_Responsable']);

$req1 = $bdd->query('SELECT * FROM producteurs');
$donnees1 = $req1 -> fetch();

$pdf1 = new FPDF();
$pdf1->AddPage();
$pdf1->SetFont('Arial','B',16);
$pdf1->Cell(70,30,$donnees1['nom_Responsable']);
$pdf1->Output();

?>