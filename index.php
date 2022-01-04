<?php
    $result = file_get_contents('https://jsonplaceholder.typicode.com/posts');
    $posts = json_decode($result,true);
    $result1 = file_get_contents('https://jsonplaceholder.typicode.com/users');
    $users = json_decode($result1,true);

    $postArr = array();
    foreach($posts as $post){
        foreach($users as $user){
            if($post['userId'] == $user['id']){
                $postAr = array();
                $postAr['pid'] = $post['id'];
                $postAr['uid'] = $user['id'];
                $postAr['ptitle'] = $post['title'];
                $postAr['uname'] = $user['name'];
                $postAr['uemail'] = $user['email'];
            }            
        }
        $postArr[] = $postAr;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webrival data</title>	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
</head>
<body>
<div class="container">
    <h3 style="text-align:center;margin:20px auto 40px;">Convert and display posts and users data from jsonformat to normal array with PHP</h3>
    <table id="postUserData" class="table table-striped table-bordered" style="width:100%">
        <thead><tr><th>Post Title</th><th>User Name</th><th>User Email</th></tr></thead>
        <?php if(!empty($postArr)){
            $html = "<tbody>";
            foreach($postArr as $postAr){
                $html .= "<tr><td>".$postAr['ptitle']."</td><td>".$postAr['uname']."</td><td>".$postAr['uemail']."</td></tr>";
            }
            $html .= "</tbody>";

            echo $html;
        }?>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready( function () {
        $('#postUserData').DataTable();
    } );
</script>
</body>
</html>