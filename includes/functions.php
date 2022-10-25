<?php

//-------------------------Score Letter Grade -------------------------------

function getScoreLetterGrade($score){

    $letterGrade = "";
<<<<<<< HEAD
     if($score >= 75)
     {
        $letterGrade = "AA";
     }
     else if($score >= 70){
        $letterGrade = "A";
     }
     else if($score >= 65){
        $letterGrade = "AB";
     }
     else if($score >= 60){
         $letterGrade = "B";
     }
     else if($score >= 55){
        $letterGrade = "BC";
     }
      else if($score >= 50){
        $letterGrade = "C";
     }
      else if($score >= 45){
        $letterGrade = "CD";
     }
     else if($score >= 40){
        $letterGrade = "D";
     }
     else if($score <= 39){
         $letterGrade = "F";
=======
     if($score >= 90)
     {
        $letterGrade = "A+";
     }
     else if($score >= 80){
        $letterGrade = "A";
     }
     else if($score >= 75){
        $letterGrade = "B";
     }
     else if($score < 74){
         $letterGrade = "Fail";
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
     }

     return $letterGrade;
}

<<<<<<< HEAD
// -------------------------- Score Grade Point -------------------------
=======
// -------------------------- Score Grade Point Incase og naay GPA ang school Mao ni e call -------------------------
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2

function getScoreGradePoint($score){

    $gradePoint = "";

     if($score >= 75)
     {
        $gradePoint = 4.00;
     }
     else if($score >= 70){
        $gradePoint = 3.50;
     }
     else if($score >= 65){
        $gradePoint = 3.25;
     }
     else if($score >= 60){
         $gradePoint = 3.00;
     }
     else if($score >= 55){
        $gradePoint = 2.75;
     }
      else if($score >= 50){
        $gradePoint = 2.50;
     }
      else if($score >= 45){
        $gradePoint = 2.25;
     }
     else if($score >= 40){
        $gradePoint = 2.00;
     }
     else if($score <= 39){
         $gradePoint = 0.00;
     }

     return $gradePoint;
}

<<<<<<< HEAD
// -------------------------- Class of Diploma -------------------------

function getClassOfDiploma($gpa){

    $classOfDiploma = "";

     if($gpa >= 3.50)
     {
        $classOfDiploma = "Distinction";
     }
     else if($gpa >= 3.00){
        $classOfDiploma = "Upper Credit";
     }
     else if($gpa >= 2.50){
       $classOfDiploma = "Lower Credit";
     }
     else if($gpa >= 2.00){
         $classOfDiploma = "Pass";
     }
     else if($gpa < 2.00){
        $classOfDiploma = "Fail";
=======
// -------------------------- syntax sa passing grade-------------------------

function getClassOfDiploma($avg){

    $classOfDiploma = "";

     if($avg >= 90)
     {
        $classOfDiploma = "Excellent";
     }
     else if($avg >= 85){
        $classOfDiploma = "Very Nice";
     }
     else if($avg >= 80){
       $classOfDiploma = "Nice";
     }
     else if($avg >= 75){
         $classOfDiploma = "Good";
     }
     else if($avg < 74){
        $classOfDiploma = "Failed";
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
     }

     return $classOfDiploma;
}


<<<<<<< HEAD
?>
<!-- Log on to codeastro.com for more projects! -->
=======
?>
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
