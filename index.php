<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lopte.com</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="script.js"></script>
</head>



<body>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Izmena marke</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group centered">
              <label for="naziv_marke">Naziv marke:</label>
              <!-- value imas ovde -->
              <input type="text" class="form-control" id="naziv_marke" value='' required>
            </div>
            <div class="form-group">
              <label for="zemlja_porekla">Zemlja porekla:</label>
              <!-- value imas ovde -->
              <select type="text" class="form-control" id="zemlja_porekla" value='' required></select>
            </div>
            <fieldset disabled>
              <div class="form-group">
                <label for="broj_modela">Broj modela</label>
                <!-- placeholder/value -->
                <input type="text" id="broj_modela" class="form-control" placeholder="0">
              </div>
            </fieldset>
            <div class="d-grid gap-2">
              <a href='./model.php' id='sviModeli'><button class="btn btn-warning" type="button">Svi modeli</button></a>
            </div>
          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_sacuvaj">Sacuvaj</button>
          <button type='button' class="btn btn-danger" data-dismiss="modal" id="button_delete">Obrisi</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dodavanje nove marke</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="naziv_marke_dodaj">Naziv marke:</label>
              <input type="text" class="form-control" id="naziv_marke_dodaj" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="zemlja_porekla_dodaj">Zemlja porekla:</label>
              <select class="form-control" id="zemlja_porekla_dodaj" placeholder="" required>

              </select>
            </div>
            <fieldset disabled>
              <div class="form-group">
                <label for="broj_modela_dodaj">Broj modela</label>
                <input type="text" id="broj_modela_dodaj" class="form-control" placeholder="0">
              </div>
            </fieldset>
          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_dodaj">Dodaj</button>
        </div>
      </div>
    </div>
  </div>

  <?php include 'header.php'; ?>
  <div class='centerDiv'>

    <div class='left_div grid-item'>

    </div>

    <div class='middle_div grid-item'>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">/Marke</li>
        </ol>
      </nav>

      <div class='h_div'>
        <h1 class='h1_text'>Lopte</h1>
        <i>- detalji -</i>
        <br>
        <hr>
      </div>

      <div class='table_div table-hover'>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Marka</th>
              <th scope="col">Zemlja porekla</th>
              <th scope="col">Broj modela</th>
            </tr>
          </thead>
          <tbody id='marke'>


          </tbody>
        </table>
      </div>

      <div class="button_div1">
        <button data-toggle="modal" data-target="#exampleModal" type="button"
          class="btn btn-secondary btn-lg btn-block">NOVA MARKA</button>
      </div>

      <div class="alert alert-warning alert-dismissible fade show align_center" role="alert">
        <strong>Dodajte novu marku!</strong> Naziv marke i zemlja porekla su obavezni!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    </div>

    <div class='right_div grid-item'>

    </div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</body>

</html> 