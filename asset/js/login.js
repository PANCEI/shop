let cek = $(".cek").data('cek');
if (cek) {
  swal.fire({
    title: "Warning",
    text: cek,
    icon: "warning"
  });
}
let berhasil=$('.oke').data('cek');
if(berhasil){
  swal.fire({
    title: "success",
    text: berhasil,
    icon: "success"
  });
}
