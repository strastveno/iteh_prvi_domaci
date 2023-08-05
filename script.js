let marke = [];
    let drzave = [];
    let trenutniId = -1;
    $(document).ready(function () {
      $('#button_sacuvaj').click(function () {
        if (trenutniId == -1) {
          return;
        }
        const naziv = $('#naziv_marke').val();
        const drzava = $('#zemlja_porekla').val();
        $.post('./server/izmeniMarku.php', { id: trenutniId, naziv: naziv, drzava: drzava }, function (data) {
          console.log(data);
          if (data != 1) {
            alert(data);
            return;
          }
          ucitajMarke();
          trenutniId = -1;
        })
      })
      $('#button_delete').click(function () {
        if (trenutniId == -1) {
          return;
        }
        $.post('./server/obrisiMarku.php', { id: trenutniId }, function (data) {
          if (data != 1) {
            alert(data);
          }
          console.log({ trenutniId: trenutniId });
          if (data == 1) {
            console.log('filter')
            marke = marke.filter(function (elem) { return elem.id != trenutniId });
            iscrtajTabelu();
          }

          trenutniId = -1;
        })
      })
      ucitajMarke();
      ucitajDrzave();
      $('#button_dodaj').click(function (e) {
        const naziv = $('#naziv_marke_dodaj').val();
        const drzava = $('#zemlja_porekla_dodaj').val();
        $.post('./server/kreirajMarku.php', { naziv: naziv, drzava: drzava }, function (data) {
          console.log(data);
          if (data != 1) {
            alert(data);
            return;
          }
          ucitajMarke();
        })
      })
      $('#exampleModal').on('show.bs.modal', function (e) {

        $('#zemlja_porekla_dodaj').html('');
        for (let drzava of drzave) {
          $('#zemlja_porekla_dodaj').append(`
            <option value='${drzava.id}'>${drzava.naziv}</option>
          `)
        }
      })
      $('#exampleModal2').on('show.bs.modal', function (e) {


        const button = $(e.relatedTarget);
        const id = button.data('id');
        trenutniId = id;
        $('#zemlja_porekla').html('');
        for (let drzava of drzave) {
          $('#zemlja_porekla').append(`
            <option value='${drzava.id}'>${drzava.naziv}</option>
          `)
        }
        const marka = marke.find(function (elem) {
          return elem.id == id;
        });
        if (!marka) {
          return;
        }
        $('#sviModeli').attr('href', 'model.php?id=' + id)
        $('#zemlja_porekla').val(marka.drzava);
        $('#naziv_marke').val(marka.naziv);
        $('#broj_modela').val(marka.broj_modela);
      })
    })
    function ucitajDrzave() {
      $.getJSON('./server/vratiDrzave.php', function (data) {
        if (!data.status) {
          alert(data.greska);
          return;
        }
        drzave = data.drzave;

      })
    }
    function ucitajMarke() {
      $.getJSON('./server/vratiMarke.php', function (data) {
        if (!data.status) {
          alert(data.greska);
          return;
        }
        console.log(data.marke)
        marke = data.marke;
        iscrtajTabelu();
      })
    }
    function iscrtajTabelu() {
      $('#marke').html('');
      let index = 1;
      for (let marka of marke) {
        $('#marke').append(`
          <tr data-toggle="modal" data-target="#exampleModal2" data-id=${marka.id}  >
              <th scope="row">${index++}</th>
              <td>${marka.naziv}</td>
              <td>${marka.drzava_naziv}</td>
              <td>${marka.broj_modela}</td>
            </tr>
          `)
      }
    }