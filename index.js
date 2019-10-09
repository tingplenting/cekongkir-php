function getKotaSelectList() {
  var provinsi_select = document.getElementById("provinsi-select");

  var provinsi_id = provinsi_select.options[provinsi_select.selectedIndex].value;
  console.log('provinceId : ' + provinsi_id);

  var xhr = new XMLHttpRequest();
  var url = 'kota.php?provinsi_id=' + provinsi_id;
  // open function
  xhr.open('GET', url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // check response is ready with response kota = 4
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var text = xhr.responseText;
      console.log('response from kota.php : ' + xhr.responseText);
      var kota_select = document.getElementById("kota-select");
      var kota_box = document.getElementById("kota");
      kota_select.innerHTML = text;
      kota_box.style.display = 'inline';
    }
  }

  xhr.send();
}

var provinsi_select = document.getElementById("provinsi-select");
provinsi_select.addEventListener("change", getKotaSelectList);


function getHargaOngkir() {
  var kota_select = document.getElementById("kota-select");
  var pengiriman_select = document.getElementById("pengiriman-select");

  var kota_id = kota_select.options[kota_select.selectedIndex].value;
  var pengiriman_id = pengiriman_select.options[pengiriman_select.selectedIndex].value
  console.log('kotaId : ' + kota_id);
  console.log('pengirimanId : ' + pengiriman_id);

  var url = 'harga.php?pengiriman_id='+ pengiriman_id +'&kota_id=' + kota_id;
  var xhr = new XMLHttpRequest();
  // open function
  xhr.open('GET', url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // check response is ready with response kota = 4
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log('response from harga.php : ' + xhr.responseText);
      // var text = xhr.responseText;
      var harga = document.getElementById("harga");
      harga.innerHTML = xhr.responseText;
      // harga.style.display = 'inline';
    }
  }

  xhr.send();
}

var kota_select = document.getElementById("kota-select");
kota_select.addEventListener("change", getHargaOngkir);
