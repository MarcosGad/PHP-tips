<?php
session_start();
if(isset($_SESSION['username'])){
include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajax Upload file</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstraprtl.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<style>
	.active{
		background-color: #fff; 
		color: #777 !important; 
	}
	.navbar-inverse .navbar-nav > li > a:hover,
	 .navbar-inverse .navbar-nav > li > a:focus{
	 	background-color: #fff; 
	 	color: #777; 
	 }
	.navbar > .container .navbar-brand, 
	.navbar > .container-fluid .navbar-brand{
		margin-right: 0; 
	}
	body{
		padding-top: 0; 
	}
	.form-control{
		text-align: right;
	}
	.navbar{
		border-radius: 0;
	}
	.navbar-brand{
	    font-size: 22px;
	    font-weight: bold;
	    color: #000;
    }

    .panel-title {
	    color: #a94442;
	    text-align: right;
	    font-size: 19px;
    }
	.form-group{
		font-size: 18px; 
	}

	.panel-default{
		margin-top: 60px;
	}

	.btn-primary {
	    font-weight: bold;
	    font-size: 18px;
	    width: 22%;
    }

    .search {
	   width: 100%;
	   position: relative
	}

	.searchTerm {
	    float: left;
	    width: 100%;
	    border: 3.2px solid #eee;
	    padding: 15.7px;
	    height: 20px;
	    border-radius: 5px;
		outline: none;
	    color: #9DBFAF;
		text-align: right;
			    
	}

   .searchButton {
     position: absolute;
    left: -70px;
    width: 67px;
    height: 39px;
    border: 3px solid #f5f5f5;
    background: #f5f5f5;
    text-align: center;
    color: #000;
    border-radius: 5px;
    cursor: pointer;
    font-size: 17px;
    bottom: -38px;
    }

	.searchTerm:focus{
		color: #000; 
	}

	.wrap{
	    width: 50%;
		position: absolute;
	    top: 22px;
	    left: 50%;
	    transform: translate(-50%, -50%);	 
	    z-index: 999;        
	}
	
	.navbar-inverse .navbar-nav > li > a{
       color: #fff; 
    }

</style>


<nav class="navbar navbar-inverse">

  <div class="container">

    <div class="navbar-header">


      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">


        <span class="sr-only">Toggle navigation</span>


        <span class="icon-bar"></span>


        <span class="icon-bar"></span>


        <span class="icon-bar"></span>


      </button>

    </div>

    <div class="collapse navbar-collapse" id="app-nav">


      <ul class="nav navbar-nav">


          <li><a class="navbar-brand active" href="http://localhost/ajax-data/add-post.php">?????????? ???????????????? </a></li>
	      <li><a class="navbar-brand" href="http://localhost/ajax-data/search.php">?????? ???????????????? </a></li>

		</ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="navbar-brand" href="http://localhost/ajax-data/logout.php">?????????? ????????????</a></li>
      </ul>
    </div>
  </div>
</nav>

	<div class="container">
	<div class="row">
	<div class="col-sm-12">
	<div class="wrap">
	  <form class="search" method="get" action="search.php">
		   <input type="text" name="user_query" class="searchTerm" placeholder="???????? ???? ??????" data-text="???????? ???? ??????">
			<button type="submit" name="search" class="searchButton">
			  ??????
			</button>
      </form>
   </div>
</div>
</div>
</div>



	<div class="container-fluid admin-gcontainer">
		<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">??????????  ????????????????</h3>
		</div>
		<div class="panel-body">	
		  	<form class="form-rtl has-validation-callback" method="post" action="" id="form-add-post" enctype="multipart/form-data">

		  		<?php
		  			$stmt=$con->prepare("select * FROM posts order by id DESC limit 1");

	                $stmt->execute();

	                $rows=$stmt->fetchall();

	                if(empty($rows)){ ?>
	                	
	                	<div class="row form-group">
							<label for="post_name" class="col-sm-2 control-label">??????  ????????????</label>
							<div class="col-sm-10">
								  <input type="text" value="1" class="form-control" id="post_name" autocomplete="off" readonly>
							</div>
				        </div>

	                 <?php } ?> 

	                <?php 
	                foreach($rows as $row ){ 
	                ?>

	                	<div class="row form-group">
							<label for="post_name" class="col-sm-2 control-label">??????  ????????????</label>
							<div class="col-sm-10">
								  <input type="text" value="<?php echo $row['id'] + 1 ?>" class="form-control" id="post_name" autocomplete="off" readonly>
							</div>
				        </div>

			            <?php 
			                }
				  		?>
				
					<div class="row form-group">
						<label for="post_name" class="col-sm-2 control-label">?????? ????????????</label>
						<div class="col-sm-10">
							<div class="row">
							  <div class="col-sm-4">
							  <input type="text" class="form-control" id="post_name" name="post_name" autocomplete="off" data-validation="required" data-validation-error-msg="?????????? ???????? ?????? ???????????? ??????????" placeholder="?????????? ??????????" >
                              </div>
                               <div class="col-sm-4">
							  <input type="text" class="form-control" id="post_name" name="post_name_two" autocomplete="off" data-validation="required" data-validation-error-msg="?????????? ???????? ?????? ???????????? ????????????"   placeholder="?????????? ????????????" >
							  </div>
							  <div class="col-sm-4">
							  <input type="text" class="form-control" id="post_name" name="post_name_three" autocomplete="off" data-validation="required" data-validation-error-msg="?????????? ???????? ?????? ???????????? ????????????"  placeholder="?????????? ????????????" >
							 </div>
							 </div>
						</div>
				    </div>	

					<div class="row form-group">
						<label for="post_number" class="col-sm-2 control-label">?????? ??????????????</label>
						<div class="col-sm-10">
							  <input type="text" class="form-control" id="post_number" name="post_number" autocomplete="off" placeholder="?????? ??????????????" >
						</div>
				    </div>	

				    <div class="row form-group">
						<label for="post_namehusband" class="col-sm-2 control-label">?????? ??????????</label>
						<div class="col-sm-10">
							<div class="row">
							  <div class="col-sm-4">
							   <input type="text" class="form-control" id="post_namehusband" name="post_namehusband" data-validation="required" data-validation-error-msg="?????????? ???????? ?????? ?????????? ??????????"  autocomplete="off" placeholder="?????????? ??????????" >
                              </div>
                               <div class="col-sm-4">
							  <input type="text" class="form-control" id="post_name" name="post_namehusband_two" autocomplete="off" data-validation="required"  data-validation-error-msg="?????????? ???????? ?????? ?????????? ????????????" placeholder="?????????? ????????????" >
							  </div>
							  <div class="col-sm-4">
							  <input type="text" class="form-control" id="post_name" name="post_namehusband_three" autocomplete="off" data-validation="required"  data-validation-error-msg="?????????? ???????? ?????? ?????????? ????????????" placeholder="?????????? ????????????" >
							 </div>
							 </div>
						</div>
				    </div>	


				    <div class="row form-group">
						<label for="post_phone" class="col-sm-2 control-label">?????? ????????????????</label>
						<div class="col-sm-10">
							  <input type="text" data-validation="required" data-validation-error-msg="?????????? ???????? ?????? ????????????????" class="form-control" id="post_phone" name="post_phone" autocomplete="off" placeholder="?????? ????????????????" >
						</div>
				    </div>	
				
				  <div class="row form-group">
						<label for="post_address" class="col-sm-2 control-label">??????????????</label>
						<div class="col-sm-10">
							  <input type="text" data-validation="required" data-validation-error-msg="?????????? ?????????? ??????????????" class="form-control" id="post_address" autocomplete="off" name="post_address" placeholder="??????????????" >
						</div>
				    </div>
				
				  <div class="row form-group">
						<label for="post_date" class="col-sm-2 control-label">??????????</label>
						<div class="col-sm-10">
							  <input type="text" class="form-control" id="post_date" readonly autocomplete="off" name="post_date"   value="<?php echo date('d-m-Y')?>"placeholder="??????????????" >
						</div>
				    </div>

					<div class="row form-group">
						<label for="post_note" class="col-sm-2 control-label">??????????????</label>
						<div class="col-sm-10">
							  <textarea class="form-control" rows="8" id="post_note" name="post_note" placeholder="??????????????"></textarea>
						</div>
				    </div>
					
					<div class="row form-group text-center">
						<div class="col-sm-10 cmd_btn">
							<button id="btn-save-post" type="submit" class="btn btn-primary">??????????????????????</button>
						</div>
					</div>
		    </form>
		</div>
		</div>
		</div>
	</div>
	

	<div class="container-fluid footer text-center" style="background-color: #000;">
		<div class="container">
			<p style="font-weight: bold; color: #fff;"> Polycarpus 01288019733 &copy;</p>
		</div>
	</div>

	<div id="loading"></div>
	<div id="overlay"></div>

	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/form-validator/jquery.form-validator.js"></script>
    <script src="js/myform.js"></script>    
    <script src="js/add-post.js"></script>




</body>
</html>

<?php }else {
	header('location:index.php');
} ?> 