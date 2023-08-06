<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modeli lopti</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>



  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="naslovModala">Dodavanje novog modela</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="naziv_modela">Naziv modela:</label>
              <input type="text" class="form-control" id="naziv_modela" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="tip">Tip:</label>
              <input type="text" class="form-control" id="tip" placeholder="" required>
            </div>

            <div class="form-group">
              <label for="velicina">Velicina:</label>
              <input type="text" class="form-control" id="velicina" placeholder="" required>
            </div>
            

          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_sacuvaj">Sacuvaj</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" hidden id="button_delete">Obrisi</button>
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
          <li class="breadcrumb-item active" id='breadcrumb' aria-current="page">nazivMarke/NazivModela</li>
        </ol>
      </nav>

      <div class='h_div'>
        <h1 class='h1_text' id='marka_naziv'>Marka: nazivMarke</h1>
        <h2 class='h1_text'>Modeli</h2>
        <i>- detalji -</i>
        <br>
        <hr>
      </div>

      <div class='table_div'>
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Naziv modela</th>
              <th scope="col">Tip</th>
              <th scope="col">Velicina</th>
            </tr>
          </thead>
          <tbody id='modeli'>

          </tbody>
        </table>
      </div>

      <div class="button_div1">
        <button data-toggle="modal" data-target="#exampleModal" data-id='-1' type="button"
          class="btn btn-secondary btn-lg btn-block">NOVI MODEL</button>
      </div>

      <div class="alert alert-warning alert-dismissible fade show align_center" role="alert">
        <strong>Dodajte novi model!</strong> Naziv modela i velicina su obavezni!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    </div>

    <div class='right_div grid-item'>
      <input type="text" id='markaId' value="<?php echo $_GET['id']; ?>" hidden>

      </input>
    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script>
    let marka = undefined;
    let modeli = [];
    let trenutniModelId = -1;
    $(document).ready(function () {
      $('#button_sacuvaj').click(function () {
        const naziv = $('#naziv_modela').val();
        const tip = $('#tip').val();
        const velicina = $('#velicina').val();
        if (trenutniModelId == -1) {
          $.post('./server/kreirajModel.php', { naziv: naziv, tip: tip, velicina: velicina, marka: marka.id }, function (data) {
            vratiModele();
          })
        } else {
          $.post('./server/izmeniModel.php', { id: trenutniModelId, naziv: naziv, tip: tip, velicina: velicina, marka: marka.id }, function (data) {
            vratiModele();
          })
        }

      });
      $('#button_delete').click(function () {
        if (trenutniModelId == -1) {
          return;
        }
        $.post('./server/obrisiModel.php', { id: trenutniModelId, marka: marka.id }, function (data) {
          vratiModele();
        })
      })
      const markaId = $('#markaId').val();
      console.log(markaId);
      $("#exampleModal").on('show.bs.modal', function (e) {
        const tr = $(e.relatedTarget);
        trenutniModelId = tr.data('id');
        if (trenutniModelId == -1) {
          $('#naslovModala').html('Dodavanje novog modela');
          $('#button_delete').attr('hidden', true);
          $('#naziv_modela').val('');
          $('#tip').val('');
          $('#velicina').val('');
        } else {
          const model = modeli.find(function (element) { return element.id == trenutniModelId });
          $('#naslovModala').html('Izmena modela');
          $('#button_delete').attr('hidden', false);
          $('#naziv_modela').val(model.naziv);
          $('#tip').val(model.tip);
          $('#velicina').val(model.velicina);
        }
      })
      $.getJSON('./server/vratiMarku.php', { id: markaId }, function (data) {
        console.log(data);
        if (data.status != 1) {
          alert(data.greska);
          // window.location.replace('./');
          return;
        }
        marka = data.marka;
        console.log(marka);
        $('#breadcrumb').html(marka.naziv + '/modeli');
        $('#marka_naziv').html('Marka: ' + marka.naziv);
        vratiModele();
      })
    })
    function vratiModele() {
      $.getJSON('./server/vratiModeleIzMarke.php', { marka: marka.id }, function (data) {
        if (data.status != 1) {
          alert(data.greska);
          // window.location.replace('./');
          return;
        }
        modeli = data.modeli;
        napuniTabelu();
      })
    }
    function napuniTabelu() {
      $('#modeli').html('');
      let i = 0;
      for (let model of modeli) {
        $('#modeli').append(`
            <tr data-toggle='modal' data-target='#exampleModal' data-id=${model.id} >
              <td>${++i}</td>
              <td>${model.naziv}</td>
              <td>${model.tip}</td>
              <td>${model.velicina}</td>
            </tr>
          `)
      }
    }
  </script>


</body>

</html> 