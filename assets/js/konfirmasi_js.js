var base_url = window.location.origin;

function konfirmasi_aktivasi(value){
  var r = confirm("Apakah anda yakin ingin mengaktivasi akun ini ?");
  if (r === true) {
      return true;
  } else {
      return false;
  } 
}

function konfirmasi_non_aktif(value){
  var r = confirm("Apakah anda yakin ingin menonaktifkan akun ini ?");
  if (r === true) {
      return true;
  } else {
      return false;
  } 
}