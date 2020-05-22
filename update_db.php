<?php
include 'db_conn.php';

$id = "";
$stolpec1 = "";
$stolpec2 = "";
$stolpec3 = "";
$stolpec4 = "";

if (isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $update = true;

    $result = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM testno WHERE clanId =$id"));
    //print_r($result['clanId']);
    $id = $result['id'];
    $stolpec1 = $result['tabela1'];
    $stolpec2 = $result['tabela2'];
    $stolpec3 = $result['tabela3'];
    $stolpec4 = $result['tabela4'];
}
function getPosts ()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['tabela1'];
    $posts[2] = $_POST['tabela2'];
    $posts[3] = $_POST['tabela3'];
    $posts[4] = $_POST['tabela4'];
    return $posts;
}

// search
if(isset($_POST['search']))
{
    $data = getPosts();
    $search_Query = "SELECT * FROM testno WHERE clanId = $data[0]";

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
    $insert_Query = "INSERT INTO `testno`(`id`, `tabela1`, `tabela2`, `tabela3`, `tabela4`) VALUES (NULL, '$data[1]', '$data[2]', '$data[3]', '$data[4]')";
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
    $update_Query = "UPDATE testno SET id = '$data[0]', tabela1 = '$data[1]', tabela2 = '$data[2]', tabela3 = '$data[3]', tabela4 = '$data[4]' WHERE  id = '$data[0]'";
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
    $delete_Query = "DELETE FROM `testno` WHERE id = $data[0]";
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
    $update_Query = "UPDATE testno SET id = '$data[0]', tabela1 = '$data[1]', tabela2 = '$data[2]', tabela3 = '$data[3]', tabela4 = '$data[4]'  WHERE  id = '$data[0]'";
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
    $update_Query = "UPDATE testno SET active = 1 WHERE id = '$data[0]'";
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

?>
