<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['submit']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems=array_column($_SESSION['cart'],'title');
            if(in_array($_POST['title'],$myitems))
            {
                echo"<script>
                    alert('Item Already Added');
                    window.location.href='cart2.php';
                </script>";
            }

            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('i_id'=>$_POST['id'], 'title'=>$_POST['title'],'price'=>$_POST['price'],'Quantity'=>1);
            // print_r($_SESSION['cart']);
        }
        else
        {
            $_SESSION['cart'][0]=array('i_id'=>$_POST['id'], 'title'=>$_POST['title'],'price'=>$_POST['price'],'Quantity'=>1);
            // print_r($_SESSION['cart']);
            echo"<script>
                    alert('Item Added');
                    window.location.href='cart2.php';
                </script>";
        }
    }

    if(isset($_POST['Remove_item']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['title']==$_POST['title'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"<script>
                    alert('Item Removed');
                    window.location.href='cart2.php'
                </script>";
            }
        }
    }

    if(isset($_POST['Mod_Quantity']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['title']==$_POST['title'])
            {
                $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
                // print_r($_SESSION['cart']);
                echo"<script>
                    window.location.href='cart2.php'
                </script>";
            }
        }

    }
}

?>