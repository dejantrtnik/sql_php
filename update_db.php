<?php
include 'db_conn.php';

$id = "";
$ime = "";
$uporabnisko_ime = "";
$geslo = "";
//$slika = "";
$stevilo = "";
$timestamp = "";
$timestamp_reaktivacije = "";
$active = "";

if (isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $update = true;

    $result = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM table WHERE clanId =$id"));
    //print_r($result['clanId']);
    $id = $result['clanId'];
    $ime = $result['ime'];
    $uporabnisko_ime = $result['uporabnisko_ime'];
    $geslo = $result['geslo'];
    //$slika = $result['slika'];
    $stevilo = $result['stevilo'];
    $status = $result['status'];
    $timestamp = $result['datum_izbrisa'];
    $timestamp_reaktivacije = $result['datum_reaktivacije'];
    //$prijava = $result[''];
}
function getPosts ()
{
    $posts = array();
    $posts[0] = $_POST['clanId'];
    $posts[1] = $_POST['ime'];
    $posts[2] = $_POST['uporabnisko_ime'];
    $posts[3] = sha1($_POST['geslo']);
    //$posts[4] = $_POST['slika'];
    $posts[5] = $_POST['stevilo'];
    $posts[6] = $_POST['status'];
    $posts[7] = $_POST['datum_izbrisa'];
    $posts[8] = $_POST['datum_reaktivacije'];
    //$posts[9] = $_POST[''];
    return $posts;
}

// search
if(isset($_POST['search']))
{
    $data = getPosts();
    $search_Query = "SELECT * FROM table WHERE clanId = $data[0]";

    $search_Result = mysqli_query($conn, $search_Query);

    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $id = $row['clanId'];
                $ime = $row['ime'];
                $uporabnisko_ime = $row['uporabnisko_ime'];
                $tretja = $row['geslo'];
                $slika = $row['slika'];
                $stevilo = $row['stevilo'];
            }
        }
        else
        {
            echo "Ni najdenega zapisa!";
        }
    }
    else
    {
        echo "Result Error!!";
    }
}

//insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `table`(`clanId`, `ime`, `uporabnisko_ime`, `geslo`, `slika`, `stevilo`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]')";
    try
    {
        $insert_Result = mysqli_query($conn, $insert_Query);
        if($insert_Query)
        {
            if(mysqli_affected_rows($conn)> 0)
            {
                echo "Podatki shranjeni";
            }
            else
            {
                echo "Napaka pri shranjevanju";
            }
        }
    }
    catch(Exception $ex)
    {
        echo 'Error inserting!!'.$ex->getMassage();
    }
}

//softdelete
if(isset($_POST['soft_delete']))
{
    $data = getPosts();
    $update_Query = "UPDATE table SET clanId = '$data[0]', ime = '$data[1]', uporabnisko_ime = '$data[2]', geslo = '$data[3]', datum_izbrisa = '$data[7]', status = '0', slika = '$data[4]', stevilo = 1 WHERE  clanId = '$data[0]'";
    try
    {
        $update_Query = mysqli_query($conn, $update_Query);
        if($update_Query)
        {
            if(mysqli_affected_rows($conn)> 0)
            {
                echo "Podatki zbrisani";
            }
            else
            {
                echo "Napaka pri brisanju!!";
            }
        }
    }
    catch(Exception $ex)
    {
        echo 'Error Delete!!'.$ex->getMassage();
    }
}


//delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `table` WHERE clanId = $data[0]";
    try
    {
        $delete_Result = mysqli_query($conn, $delete_Query);
        if($delete_Query)
        {
            if(mysqli_affected_rows($conn)> 0)
            {
                echo "Podatki zbrisani";
            }
            else
            {
                echo "Napaka pri brisanju!!";
            }
        }
    }
    catch(Exception $ex)
    {
        echo 'Error Delete!!'.$ex->getMassage();
    }
}

//update
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE table SET clanId = '$data[0]', ime = '$data[1]', uporabnisko_ime = '$data[2]', geslo = '$data[3]', status = '$data[6]', datum_reaktivacije = '$data[8]', stevilo = 1 WHERE  clanId = '$data[0]'";
    try
    {
        $update_Result = mysqli_query($conn, $update_Query);
        if($update_Query)
        {
            if(mysqli_affected_rows($conn)> 0)
            {
                echo "Vnos posodobljen";
            }
            else
            {
                echo "Napaka pri posodabljanju!!";
            }
        }
    }
    catch(Exception $ex)
    {
        echo 'Error Update!!'.$ex->getMassage();
    }
}

//update aktivnost člana
if(isset($_POST['update_active']))
{
    $data = getPosts();
    $update_Query = "UPDATE table SET active = 1 WHERE clanId = '$data[0]'";
    try
    {
        $update_Result = mysqli_query($conn, $update_Query);
        if($update_Query)
        {
            if(mysqli_affected_rows($conn)> 0)
            {
                //echo "Vnos posodobljen";
                header('Location:http://193.77.83.59/web2chat/ok.php');
            }
            else
            {
                //echo "Napaka pri posodabljanju!!";
                header('Location:http://193.77.83.59/web2chat/not_ok.php');
            }
        }
    }
    catch(Exception $ex)
    {
        echo 'Error Update!!'.$ex->getMassage();
    }
}

?>
