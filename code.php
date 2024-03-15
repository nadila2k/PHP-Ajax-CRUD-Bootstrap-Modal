<?php 
 include('dbcon.php');


 if (isset($_POST['student_delete'])) {
    $student_id = mysqli_real_escape_string($conn,$_POST['student_id']);

    $query="Delete from students where id ='$student_id'";
    $query_run=mysqli_query($conn,$query);

    if ($query_run)  {
        $res=[
            'status'=> 200,
            'message'=> 'Student Delete Successfully'

        ];
        echo json_encode($res);
        return false;
    } else {
        $res=[
            'status'=> 500,
            'message'=> 'Student Not Delete  '

        ];
        echo json_encode($res);
        return false; 
    }
    
 } else {
    # code...
 }
 

if ( isset ($_POST['save_student'] ) ) {
    $name= mysqli_real_escape_string($conn,$_POST['name']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $phone= mysqli_real_escape_string($conn,$_POST['phone']);
    $course= mysqli_real_escape_string($conn,$_POST['course']);

    if ($name==null|| $email==null|| $phone==null|| $course==null ){
        $res=[
            'status'=> 422,
            'message'=> 'All fields are mandarory'

        ];
        echo json_encode($res);
        return false;}
    $query="Insert into students (name, email, phone ,course ) VALUES( '$name', '$email', '$phone', '$course' )";
    $query_run=mysqli_query($conn,$query);

    if ($query_run==true) {
        $res=[
            'status'=> 200,
            'message'=> 'Student Created Successfully'

        ];
        echo json_encode($res);
        return false;
    } else {
        $res=[
            'status'=> 500,
            'message'=> 'Student Not Created '

        ];
        echo json_encode($res);
        return false; 
    }
    
    
} else {
    # code...
}

if (isset($_GET['student_id'])) {
    $student_id=mysqli_real_escape_string($conn,$_GET['student_id']);

    $query="Select*from students where id = '$student_id' ";
    $query_run=mysqli_query($conn,$query);
    
    if (mysqli_num_rows($query_run) == 1) {
        
        $student = mysqli_fetch_array($query_run);
        $res=[
            'status'=> 200,
            'message'=> 'Student Fetch Successfully by id',
            'data'=>$student

        ];
        echo json_encode($res);
        return false;

    } else {
        $res=[
            'status'=> 404,
            'message'=> 'Student ID Not Found'

        ];
        echo json_encode($res);
        return false;
    }
    
} 

if ( isset ($_POST['update_student'] ) ) {
    $student_id=mysqli_real_escape_string($conn,$_POST['student_id']);
    $name= mysqli_real_escape_string($conn,$_POST['name']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $phone= mysqli_real_escape_string($conn,$_POST['phone']);
    $course= mysqli_real_escape_string($conn,$_POST['course']);

    if ($name==null|| $email==null|| $phone==null|| $course==null ){
        $res=[
            'status'=> 422,
            'message'=> 'All fields are mandarory'

        ];
        echo json_encode($res);
        return false;}
        $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id=$student_id";

    $query_run=mysqli_query($conn,$query);

    if ($query_run==true) {
        $res=[
            'status'=> 200,
            'message'=> 'Student Updated Successfully'

        ];
        echo json_encode($res);
        return false;
    } else {
        $res=[
            'status'=> 500,
            'message'=> 'Student Not Updated '

        ];
        echo json_encode($res);
        return false; 
    }
    
    
} else {
    # code...
}


?>