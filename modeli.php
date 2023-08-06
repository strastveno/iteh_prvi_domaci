<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modeli lopti</title>
  <link rel="stylesheet" href="global.css">
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

  <?php include 'header.php'; ?>
  <div class='centerDiv'>

    <div class='left_div grid-item'>

    </div>

    <div class='middle_div grid-item'>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">/Modeli</li>
        </ol>
      </nav>

      <div class='h_div'>
        <h1 class='h1_text'>Modeli lopti</h1>

        <br>
        <hr>
      </div>
      <div class="row">
        <div class="col-3">
          <label>Sortiraj po marci</label>
          <select id='sortiraj' class='form-control'>
            <option value="asc">Abecedno</option>
            <option value="desc">Obrnuto od abecede</option>
          </select>
        </div>
      </div>
      <div class='table_div'>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Marka</th>
              <th scope="col">Naziv modela</th>
              <th scope="col">Tip</th>
              <th scope="col">Velicina</th>
            </tr>
          </thead>
          <tbody id='modeli'>

          </tbody>
        </table>
      </div>



    </div>



  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    let modeli = [];
    $(document).ready(function () {

      $.getJSON('./server/vratiSveModele.php', function (data) {

        if (!data.status) {
          alert(data.greska);
          return;
        }
        modeli = data.modeli;
        modeli.sort(function (a, b) {
          return a.marka_naziv.localeCompare(b.marka_naziv);

        })
        napuniTabelu();
      });

      $('#sortiraj').change(function () {
        const option = $('#sortiraj').val();
        if (option === 'asc') {
          modeli.sort(function (a, b) {
            return a.marka_naziv.localeCompare(b.marka_naziv);

          })
        } else {
          modeli.sort(function (a, b) {
            console.log(b.marka_naziv);
            return b.marka_naziv.localeCompare(a.marka_naziv);
          })
        }

        napuniTabelu();
      })
    })



    function napuniTabelu() {
      $('#modeli').html('');
      let i = 0;
      for (let model of modeli) {
        $('#modeli').append(`
            <tr>
              <td>${++i}</td>
              <td>${model.marka_naziv}</td>
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