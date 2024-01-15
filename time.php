<?php  
 date_default_timezone_set('Europe/Amsterdam');  
 echo facebook_time_ago('2024-01-15 20:31:30');  
 function facebook_time_ago($timestamp)  
 {  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "one minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "an hour ago";  
     }  
           else  
           {  
       return "$hours hrs ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "a week ago";  
     }  
           else  
           {  
       return "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "a month ago";  
     }  
           else  
           {  
       return "$months months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "one year ago";  
     }  
           else  
           {  
       return "$years years ago";  
     }  
   }  
 }  

















echo "<br><br><br>";

 echo timeago("2024-01-15 20:31:30");

 function timeago($timeStr) {
     $time = strtotime($timeStr);
     
     $output = "";
     $time_difference = time() - $time; 
     $seconds = $time_difference ; 
     $minutes = round($time_difference / 60 );
     $hours = round($time_difference / 3600 ); 
     $days = round($time_difference / 86400 ); 
     $weeks = round($time_difference / 604800 ); 
     $months = round($time_difference / 2419200 ); 
     $years = round($time_difference / 29030400 ); 
     
     if($seconds <= 60) {
         // Seconds
         $output = "$seconds seconds ago"; 
     } else if($minutes <=60) {
         //Minutes
         if($minutes==1) {
             $output = "one minute ago"; 
         } else {
             $output = "$minutes minutes ago"; 
         }
     } else if($hours <=24) {
         //Hours
         if($hours==1) {
             $output = "one hour ago";
         } else {
             $output = "$hours hours ago";
         }
     } else if($days <= 7) {
         //Days
         if($days==1) {
             $output = "one day ago";
         } else {
             $output = "$days days ago";
         }
     } else if($weeks <= 4) {
         //Weeks
         if($weeks==1) {
             $output = "one week ago";
         } else {
             $output = "$weeks weeks ago";
         }
     } else if($months <=12) {
         //Months
         if($months==1) {
             $output = "one month ago";
        } else {
             $output = "$months months ago";
        }
     } else {
         //Years
         if($years==1) {
             $output = "one year ago";
         } else {
             $output = "$years years ago";
         }
     }
     return $output;
 }
 ?>