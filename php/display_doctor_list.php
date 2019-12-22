<div class="container" >
<?php
if(isset($_POST['symptom'])){
  include ('../config/connection.php');
	$symptom=$_POST['symptom'];
	$i=1;
	$doctor_id_array=array();
	$doctor_specialist=array();
    foreach ($symptom as $symptom_value) {
  	$result=mysqli_query($con,"SELECT doctor_info.doctor_id FROM doctor_info INNER JOIN symptom_doctor ON doctor_info.doctor_id=symptom_doctor.doctor_id INNER JOIN symptom ON symptom_doctor.symptom_id=symptom.symptom_id WHERE symptom.symptom_name='".$symptom_value."'");
  	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  	  	array_push($doctor_id_array,$row['doctor_id']);
  	  }
  }

  $doctor_id_array=array_unique($doctor_id_array);
  foreach ($doctor_id_array as $value) {
  	
  	$doctor_info=mysqli_query($con,"SELECT doctor_info.image,doctor_info.name,doctor_info.hospital_name,specialist_type.specialist_type_name FROM doctor_info INNER JOIN specialist_type on doctor_info.doctor_id=specialist_type.doctor_id WHERE doctor_info.doctor_id=".$value);
  	  if ($i==1) {
        	echo '<div class="row" style="margin-top: 2%;">';
        }
        echo '<div class="col-md-3 offset-md-1 border border-success">';
        echo '<div class="text-center">';
        echo '<img src="image/doctor.jpg" class="rounded-circle" alt="..." width="100" height="100">';
        $j=1;
        while ($row=mysqli_fetch_array($doctor_info,MYSQLI_ASSOC)) {    
          if($j==1){
          	 echo '<h6>'.$row['name'].'</h6>';
          }
          echo '<p style="line-height: 50%;">'.$row['specialist_type_name'].', </p>'; 
          	$hospital_name= $row['hospital_name'];   
           $j++;
    }
    echo '<h6>'.$hospital_name.'</h6>';
     echo '</div> </div>';
    if ($i==3) {
    	echo '</div>';
    	$i=0;
    }
    $i++;   
 }
}
else echo 'hii';
 ?>
 </div>