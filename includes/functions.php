<?php

//-------------------------Score Letter Grade -------------------------------

function getScoreLetterGrade($score){

    $letterGrade = "";
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
     }

     return $letterGrade;
}

// -------------------------- Score Grade Point Incase og naay GPA ang school Mao ni e call -------------------------

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
     }

     return $classOfDiploma;
}


?>