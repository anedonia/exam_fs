<!DOCTYPE html>
<html lang="en">
<head>
<title>Main page</title>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<style>
.bg-light{
    background-color: #ababab!important;
}
.main {
  margin-top: 2rem;
}

</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <a class="navbar-brand" href="#"> Site Name </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
                <form id="log_out" action="routeur.php" method='GET'>
                        <input type="hidden" name="action" value="log_out"/>
                </form>
              <a class="nav-link active" aria-current="page" href="#" onclick='document.getElementById("log_out").submit()'>Log out</a>

        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            
            <li>
                <form id="admin" action="routeur.php" method='GET'>
                        <input type="hidden" name="action" value="admin"/>
                </form>
                <a class="dropdown-item" href="#" onclick='document.getElementById("admin").submit()'>Admin</a></li>

            <li>
              <form id="modify" action="routeur.php" method='GET'>
                        <input type="hidden" name="action" value="modify"/>
              </form>
              <a class="dropdown-item" href="#" href="#" onclick='document.getElementById("modify").submit()'>Modify account</a></li>

          </ul>
        </li>
      </ul>
      <form class="d-flex" action="" method='GET'>
        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search" >
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container main">
  <div class="row row-cols-3">

    <?php 
      if (isset($content))
      {
        echo $content; 
      }
    ?>

  </div>
</div>
    



</body>
</html>