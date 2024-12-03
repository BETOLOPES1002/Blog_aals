<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="manifest" href="/Blog/manifest.json">

</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
    	      action="php/signup.php" 
    	      method="post">

    		<h4 class="display-4  fs-1">Crear nueva cuenta</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo htmlspecialchars($_GET['error']); ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo htmlspecialchars($_GET['success']); ?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label class="form-label">Nombre Completo</label>
		    <input type="text" 
		           class="form-control"
		           name="fname"
		           value="<?php echo (isset($_GET['fname']))? htmlspecialchars($_GET['fname']):"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Nombre de Usuario</label>
		    <input type="text" 
		           class="form-control"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))? htmlspecialchars($_GET['uname']):"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Contraseña</label>
		    <input type="password" 
		           class="form-control"
		           name="pass">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Registrar</button>
		  <a href="login.php" class="link-secondary">Iniciar Sesion</a>
		</form>
    </div>
</body>
</html>