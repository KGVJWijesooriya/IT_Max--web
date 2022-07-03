<title>Add New Admin</title>
<body class="content">
<?php include('part/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1 align="center">ADD NEW ADMIN</h1><br><br>

        

        <table class="tbl-31">
            <tr>
                <td >Full Name:<br><br>
                    <input type="text" name="full_name" placeholder="Enter Your Full Name" class="textbox"><br>
                </td>
                <td></td>

                <td>Username: <br><br>
                    <input type="text" name="username" placeholder="Enter Your Username"class="textbox">
                </td>
                <td></td>

                <td>Password: <br><br>
                    <input type="password" name="password" placeholder="Enter Your Pasword"class="textbox">
                </td>
            </tr>
            
                <td colspan="5">
                    <input type="submit" name="submit" value="Add Admin" class="btn-primary" >

                </td>
            </tr>

        </table>
        </form>

    </div>

</div>

<?php

    if(isset($_POST['submit']))
    {
 
    //get the data
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //sql query to save the data into database
    $sql = "INSERT Into tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";
    
    // Executing Query and Saving data into database
    $res = mysqli_query($conn, $sql);


    //check data is insert or not
    if($res==TRUE)
    {
        echo "Data Inserted";
        header("Location: add-admin.php");
    }
    else
    {
        echo"Faild";
        echo $sql;
    }
    }

?>