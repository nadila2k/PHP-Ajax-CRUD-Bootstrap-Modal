<?php 
$conn=mysqli_connect("localhost","root","","blog");

if ( isset ($_POST['save_student'] ) ) {
    $name= mysqli_real_escape_string($conn,$_POST['name']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $phone= mysqli_real_escape_string($conn,$_POST['phone']);
    $course= mysqli_real_escape_string($conn,$_POST['course']);

    if ($name==null|| $email==null|| $phone==null|| $course==null ){
        $res=[
            'status'=> 422,
            'messsage'=> 'All fields are mandarory'

        ];
        echo json_encode($res);
        return false;}
    $query="Insert into students (name, email, phone ,course ) VALUES( '$name', '$email', '$phone', '$course' )";
    $query_run=mysqli_query($conn,$query);

    if ($query_run==true) {
        $res=[
            'status'=> 200,
            'messsage'=> 'Student Created Successfully'

        ];
        echo json_encode($res);
        return false;
    } else {
        $res=[
            'status'=> 500,
            'messsage'=> 'Student Not Created '

        ];
        echo json_encode($res);
        return false; 
    }
    
    
} else {
    # code...
}
?>