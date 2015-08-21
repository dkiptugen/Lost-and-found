<?php
class users
   {
	   
	 /*
	      START OF USER REDIRECT
	*/ 
	 function det_user($group,$test="")
	   { 
             $x[0]=array('GROUP'=>'ADMIN','LOCATION'=>'ADMINISTRATOR'); 
             $x[1]=array('GROUP'=>'CLERK','LOCATION'=>'CLERK');
             #$x[2]=array('GROUP'=>'','LOCATION'=>'');
			 #$x[3]=array('GROUP'=>'','LOCATION'=>'');
			 #$x[4]=array('GROUP'=>'','LOCATION'=>'');
			 #$x[5]=array('GROUP'=>'','LOCATION'=>'');
             $xx=0;		 
             foreach($x as $y)
                {
	                if(strtoupper($group) == strtoupper($y['GROUP']))
			           {
			             $xx=0;
			             header('location:'.$test.$y['LOCATION']);
			             exit;
			           }
		           else
			           { 
			              $xx++;				 
			           }					 
	            }
	        if($xx!=0)
		       { 
	              echo 'Invalid user';
		       }
           } 
		#---------------------------------END OF USER REDIRECT----------------------------------------#
     function user_check($user,$usertype)
		{
			#session_start();
            if(!empty($user))
			  {
			    if($user!=$usertype)
				   {
					$this->det_user($user,"../");   
				   }
			  }
			else
			   {
				header("location:../index.php");exit; 
			   }
		}
   } 

?>