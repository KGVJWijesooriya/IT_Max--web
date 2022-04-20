<?php include('part/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        

        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter Your Full Name">
                </td>
            </tr>

            <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="username" placeholder="Enter Your Username">
                </td>
            </tr>

            <tr>
                <td>Password: </td>
                <td>
                    <input type="password" name="password" placeholder="Enter Your Pasword">
                </td>
            </tr>

            <tr>
                <td colspan="2">
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