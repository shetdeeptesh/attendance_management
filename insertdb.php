<?php require "dbconnect.php";

if(isset($_POST['submit'])){ //<- this line is used to check if user submited or not
// below code to check if data exits or not
 if(!empty($_POST)){
    $rollno=$_POST['rollno'];
    $cardid=$_POST['cardid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $class=$_POST['class'];

if(!empty($rollno) && !empty($cardid) && !empty($name) && !empty($email) && !empty($class)  ){ //<-this condition is used to remove error of sql if form submited empty
$sql="insert into user values(".$rollno.",'".$cardid."','".$name."','".$email."', '".$class."')";
if ($conn->query($sql) === TRUE) { // to display if record is inserted. else error
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}
else{
    echo "something went wrong"; // error msg for if didnot received any data using post method
}
  $conn->close(); // to close mysql connection
}

?>
<html>
    <head>
        <title>Add User</title>
        <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css"
        rel="stylesheet"
        /> 
    </head>
    <body>
        <section class="container p-3" >
            <form action="<?php echo $_SERVER['PHP_SELF']; //this send data to same file ?>" method="POST">
                <!-- Full Name input -->
                <div class="form-outline mb-4">
                    <input type="text" name="name" id="name"  class="form-control"/>
                    <label for="name" class="form-label" >Full Name</label>
                </div>

                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="roll" name="rollno" class="form-control"/>
                            <label for="roll" class="form-label" >Roll No</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="cardid"  id="cardid" class="form-control"/>
                            <label for="cardid" class="form-label" >Card Id</label>
                        </div>
                    </div>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" name="class" id="class" class="form-control"/>
                    <label for="class" class="form-label" >Class</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Add User</button>
        </form>

        </section>
        
        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"> </script>
    </body>
</html>