var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
let req = $(".req").data("text");
if (req) {
    swal.fire({
        title: "Berhasil",
        text: req,
        icon: 'success'
    });
    
}
let valide = $('.warn').data('text');
if(valide){
    swal.fire({
        title: "warning",
        text: valide,
        icon:'warning'
    })
}
let conf = $(".conf").data('conf');
if (conf) {
    swal.fire({
        title: "Warning",
        html: conf,
        icon: 'warning'
    });
}
let conff = $(".conff").data('conff');
if (conff) {
    swal.fire({
        title: "Warning",
        html: conff,
        icon: 'warning'
    });
}

let hapus = $(".hapus").on('click', function (e) {
    e.preventDefault();
    let href = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "You Will Delete Menu",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    });
});

// let menuCheck = $('.menuCheck').on('click', function () {
//     const id_hak = $(this).data('role');
//     const url = $(this).data('url');
//     const id_sub = $(this).data('menuid');
//     $.ajax({
//         url: url,
//         type: 'post',
//         data: {
//             id_hak: id_hak,
//             id_sub:id_sub
//         },
//         success: function () {
//             document.location.href = url;
//         }
//     })

// });
let checkMenu = $('.menuCheck').on('click', function () {
    //   ambil data dari kelas cek data role dan sub
    const role = $(this).data('role');
    const sub = $(this).data('menuid');
    const base = $(this).data('url');
    const id = $(this).data('id');
    //   jlankan ajax
    
    $.ajax({
        url: base + "menu/checkRole?id="+id,
        type: 'post',
        data: {
            role: role,
            sub: sub
        },
        success: function () {
            document.location.href = base + 'menu/userRole/' + role+"?id="+id;
        }
    });
});
// event yang ada di sub menu user 
let subMenuActive=$(".subMenu").on('click', function () {
    let id = $(this).data('menuid');
    let url = $(this).data('base');
    let active = $(this).data('cek');
    let idm = $(this).data('menu');
    $.ajax({
        url: url + "menu/subMenuActive" +"?id="+idm,
        type: 'post',
        data: {
            active: active,
            id:id
        },
        success: function () {
            document.location.href = url + 'menu/sub'+"?id="+idm;
        }
    });
});
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#ecommerceToko').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
});
let hapusJenis = $(".jenis").on("click", function (e) {
    e.preventDefault();
    let href = $(this).attr("href");
    let id = $(this).data('id');
    let idm = $(this).data('idm');
    $.ajax({
        url: href +'menu/jenisDelete' + "?id=" + idm,
        type: 'post',
        data: {
            id:id
        },
        success: function () {
            document.location.href = href+'menu/jenis' + "?id=" + idm;
        }
    });
})
let hapusIklan = $(".iklan").on("click", function (e) {
    e.preventDefault();
    let href = $(this).attr("href");
    let idm = $(this).data('idm');
    let id = $(this).data('id');
    let gambar = $(this).data('gambar');
    $.ajax({
        url: href + "config/deleteiklan" + "?id=" + idm,
        type: 'post',
        data: {
            id: id,
            gambar:gambar
        },
        success: function () {
            document.location.href = href + "config/iklan" + "?id=" + idm;
        }
   })
    
});

$(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
})
// membuat search dengan js 
$("#cari").on('keyup', function () {
    let  filter, table, tr, td, i, tetxValues;
    filter = $(this).val().toUpperCase();
    table = document.getElementById('mailTable');
    tr =document.getElementsByTagName('tr');

    for (i = 0; i < tr.length; i++){
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            tetxValues = td.textContent || td.innerText;
            if (tetxValues.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
  
})
// button refresh
let refresh = $(".refresh").on('click', function () {
    location.reload();
})
$(function () {
    //Add text editor
    $('#compose-textarea').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ],
        height:300
    });
})
// $('#summernote').summernote({
//     toolbar: [
//       // [groupName, [list of button]]
//       ['style', ['bold', 'italic', 'underline', 'clear']],
//       ['font', ['strikethrough', 'superscript', 'subscript']],
//       ['fontsize', ['fontsize']],
//       ['color', ['color']],
//       ['para', ['ul', 'ol', 'paragraph']],
//       ['height', ['height']]
//     ]
//   });
let area = $(".area").on('click', function (e) {
    e.preventDefault();
    let href = $(".areaform").attr("action")
let daerah=$('#sub').val();
if(daerah==""){
    Toast.fire({
        icon: 'error',
        title: 'Anda Tidak Memilih Daerah Manapun Harap Pilih Salah Satu Daerah'

    })
}else{
    $.ajax({
        url: href,
        type: 'post',
        data: {
            daerah:daerah
        },

        success: function () {
            location.reload();
        }
    })
}
})
let hapusarea = $('.hapusarea').on('click', function (e) {
    e.preventDefault();
    let href = $(this).attr('href');
    let id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You Will Delete Menu",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: href,
                type: 'post',
                data: {
                    id:id
                },
                success: function () {
                    location.reload();
                }
        })
        }
    });
});
let tambahArea = $('.areaCheck').on('click', function () {
    let idArea = $(this).data('menuid');
    let idToko = $(this).data('role');
    let href = $(this).data('url');
    let id=$(this).data('id')
    $.ajax({
        url: href + "config/setArea"+"?id=" + id,
        type: 'post',
        data: {
            idArea: idArea,
            idToko:idToko
        },
        success: function () {
            location.reload();
        }
    })
});
let tokoArea = $(".tokoArea").on('click', function () {
    let id_area = $(this).data('daerah');
    let url = $(this).data('url');
    let id_toko=$(this).data('toko')
    $.ajax({
        url: url + "profile/area"+"?id=2",
        type: 'post',
        data: {
            idToko: id_toko,
            idArea:id_area
        },
        success: function () {
            location.reload();
        }
    });
});

// $('.tambahjualan').on('submit',function(e) {
//     e.preventDefault();
//     let gambar1 = $('.gambar1').val();
//     let ukuran =$('.gambar1').[0].files[0].size;
//     let ekstensi = /(\.jpg|\.jpeg|\.png)$/i;
//     if (!ekstensi.exec(gambar1)) {
    
//     } else {
//         alert('amans',gambar1.files.size);
//     }
  
// })


let ekstensi = /(\.png|\.jpg|\.jpeg)$/i;
let gambartoko = $('.gambartoko').on('change', function () {
    if (!ekstensi.exec(this.value) || this.files[0].size>2000000) {
        Toast.fire({
            icon: 'error',
            title: 'Silahkan Cek Ukuran File Tidak melebihi 2mb dan Juga Ekstensi File JPG PNG JPEg'
    
        })
        this.value = ""; 
    } else {
        $('.subgambar1').removeAttr('disabled');
   }
});
let subgambar1= $('.subgambar1').on('change', function () {  
    if (!ekstensi.exec(this.value) || this.files[0].size>2000000) {
        Toast.fire({
            icon: 'error',
            title: 'Silahkan Cek Ukuran File Tidak melebihi 2mb dan Juga Ekstensi File JPG PNG JPEg'
    
        })
        this.value = ""; 
    } else {
        $('.subgambar2').removeAttr('disabled');
   }
});
let subgambar2 = $('.subgambar2').on('change', function () {
    if (!ekstensi.exec(this.value) || this.files[0].size>2000000) {
        Toast.fire({
            icon: 'error',
            title: 'Silahkan Cek Ukuran File Tidak melebihi 2mb dan Juga Ekstensi File JPG PNG JPEg'
    
        })
        this.value = ""; 
    } else {
        $('.subgambar3').removeAttr('disabled');
   }
});
let subgambar3 = $('.subgambar3').on('change', function () {
    if (!ekstensi.exec(this.value) || this.files[0].size>2000000) {
        Toast.fire({
            icon: 'error',
            title: 'Silahkan Cek Ukuran File Tidak melebihi 2mb dan Juga Ekstensi File JPG PNG JPEg'
    
        })
        this.value = ""; 
    } else {
        $('.subgambar4').removeAttr('disabled');
   }   
});
let subgambar4 = $('.subgambar4').on('change', function () {
    if (!ekstensi.exec(this.value) || this.files[0].size>2000000) {
        Toast.fire({
            icon: 'error',
            title: 'Silahkan Cek Ukuran File Tidak melebihi 2mb dan Juga Ekstensi File JPG PNG JPEg'
    
        })
        this.value = ""; 
    }
});
let gtk = $('.gtk').on('change', function () {
    if (!ekstensi.exec(this.value) || this.files[0].size > 2000000) {
        Toast.fire({
            icon: 'error',
            title: 'Silahkan Cek Ukuran File Tidak melebihi 2mb dan Juga Ekstensi File JPG PNG JPEg'
    
        });
        this.value = "";
        this.focus();
   } 
});
let tambahjualan = $('.tambahjualan').on('submit', function (e) {
    if ($('.deskripsibarang').summernote('isEmpty')) {
        Toast.fire({
            icon: 'error',
            title: 'Deskripsi barang Tidak Boleh Kosong Harap Di isi'
    
        })
        e.preventDefault();
    } 
});
   
// tes validasi angka 
let angka = /^[0-9]+$/;
let hargabarang = $('.hargabarang').on('keyup', function () {
    if (!this.value.match(angka)) {
        this.value = "";
        this.focus();
   }
})
let jumlahbarang = $('.jumlahbarang').on('keyup', function () {
    if (!this.value.match(angka)) {
        this.value = "";
        this.focus();
    }
})
let deletejulan = $('.deletejualan').on('click', function (e) {
    e.preventDefault();
    let href = $(this).attr('href');
    let gambar1 = $(this).data('gambar1');
    let gambar2 = $(this).data('gambar2');
    let gambar3 = $(this).data('gambar3');
    let gambar4 = $(this).data('gambar4');
    let gambar = $(this).data('gambar');
    let id_juala = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You Will Delete Menu",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: href,
                type: 'post',
                data: {
                    id: id_juala,
                    gambar: gambar,
                    gambar1: gambar1,
                    gambar2: gambar2,
                    gambar3: gambar3,
                    gambar4:gambar4
                    
                }, success: function () {
                    location.reload();
                }
            })
        }
    });
 
})
let input=$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
let diskon = $('.setdiskon').on('keyup', function () {
    if (!this.value.match(angka)) {
        this.value = "";
        this.focus();

    } else if (this.value > 100 || this.value < 1) {
        Toast.fire({
            icon: 'error',
            title: 'Diskon Tidak Bisa di Isi melebihi 100 Atau kurang dari 1'
        })
    } else {
         let diskon = parseInt(this.value);
    let harga=parseInt($('.harga').val());
    let hargadiskon = Math.floor((harga * diskon / 100));
        $('.diskon').val(hargadiskon);
        $('.hargaakhir').val(harga - hargadiskon);
    }
  
});
let changepass = $('.pass').on('submit', function (e) {
    let newpass, repeat;    
    newpass = $('.newpass').val();
    repeat = $('.repeatpass').val();
    if (newpass.length < 3) {
        e.preventDefault();
        Toast.fire({
            icon: 'error',
            title: 'Password MInimal Harus Di Isi Dengan 3 Karakter'
        })
    } else {
        if (newpass !== repeat) {
            e.preventDefault();
            Toast.fire({
                icon: 'error',
                title: 'Password Baru dan Ulangi Password Baru Tidak Sama Harap isi Dengan Benar'
            })
        } 
 }
});
let nohp = $('.hp').on('keyup', function () {
    if (!this.value.match(angka)) {
        this.value = "";
        this.focus();
   } 
});
let setprofile = $('.setprofil').on('submit', function (e) {
 

    let number = $('.hp').val();
    let desktoko = $('.desktoko').val();
    if (number.length < 10) {
        Toast.fire({
            icon: 'error',
            title: 'Nomor Yang Anda Masukan Tidak Boleh Kurang Dari 10 Angka'
        })
        e.preventDefault();
    };
    if (desktoko.trim()=== "") {
        Toast.fire({
            icon: 'error',
            title: 'Deskripsi barang Tidak Boleh Kosong Harap Di isi'
    
        })
        e.preventDefault();
    }
});
let tamahAdmin=$('.tambahAdmin').on('submit',function(e){
let hp=$('.hp').val();
if(hp.length<10){
    Toast.fire({
        icon: 'error',
        title: 'Nomor Yang Anda Masukan Tidak Boleh Kurang Dari 10 Angka'
    });
    e.preventDefault();
};
});
let adminactive=$('.admin').on('click',function(){
let nama,id,active,base,hak;
nama=$(this).data('nama');
id=$(this).data('id');
active=$(this).data('active');
base=$(this).data('base');
hak=$(this).data('hak');
$.ajax({
    url:base+"menu/setaktifadmin"+"?id="+hak,
    type:'post',
    data:{
        id:id,
        active:active,
        nama:nama
    },success:function(){
    location.reload();
    }
}) 
});
let deleteadmin=$('.deleteadmin').on('click',function(e){
    e.preventDefault();
let href=$(this).attr('href');
let id=$(this).data('id');
let nama=$(this).data('nama');
Swal.fire({
    title: 'Are you sure?',
    text: "You Will Delete Menu",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
}).then((result)=>{
    if(result.isConfirmed){

        $.ajax({
        url:href,
        type:'post',
        data:{
            id:id,
            nama:nama
        },success:function(){
        location.reload();
        }
        });
    }
})

});
let pembeli=$('.pembeli').on('click',function(){
   let nama=$(this).data('nama');
   let id=$(this).data('id');
   let href=$(this).data('base');
   let hak=$(this).data('hak')
   let active=$(this).data('active');
   $.ajax({
       url:href+"menu/pembeliactive"+"?id="+hak,
       type:'post',
       data:{
           id:id,
           nama:nama,
           active:active
       },
       success:function(){
           location.reload();
       }
   })
});
let deletepembeli=$('.deletepembeli').on('click',function(e){
    e.preventDefault();
    let href=$(this).attr('href');
    let id=$(this).data('id');
    let nama=$(this).data('nama');
    Swal.fire({
        title: 'Are you sure?',
        text: "You Will Delete Menu",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result)=>{
        if(result.isConfirmed){
    
            $.ajax({
            url:href,
            type:'post',
            data:{
                id:id,
                nama:nama
            },success:function(){
            location.reload();
            }
            });
        };
    });
});

let deletediskon=$('.deletediskon').on('click',function(e){
    e.preventDefault();
    let id=$(this).data('id');
    let href=$(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "You Will Delete Menu",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url:href,
                type:'post',
                data:{
                    id:id
                },success:function(){
                    location.reload();
                }
            });
        }
    })
   
})
let keluar=$('.keluar').on('click',function(e){
    let href=$(this).attr('href');
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You Will Exit",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Exit!'
    }).then((resutt)=>{
        if(resutt.isConfirmed){
            document.location.href=href;
        }
    })
})
let deletepesanan=$('.deletepesanan').on('click',function(e){
    e.preventDefault();
    let href=$(this).attr('href');
    let id=$(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You Wiil Delete This",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete!'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url:href,
                type:'post',
                data:{
                    id:id
                },
                success:function(){
                location.reload();
                }
            })
        }
    })

})
let hapusemail=$('.hapusemail').on('click',function(){
    let id=$('input[type=checkbox]:checked');
// id.map(function(e){
//     console.log(e.val());
// })
var data=[];
for(let i=0;i<id.length;i++){
data.push(id[i].value);
}
let url=$('.url').data('url');
if(data.length!=0){
    $.ajax({
        url:url,
        type:'post',
        data:{
            id:data
        },
        success:function(){
        location.reload();
        }
    })
}else{
    Toast.fire({
        icon: 'error',
        title: 'Tidak Ada pesan Yang Di Pilih'
    });
}

})
let kirimEmail=$('.kirimeamil').on('submit',function(e){

let note=$('.pesan').val();
if(note.trim()===""){
    Toast.fire({
        icon: 'error',
        title: 'Isi Pesan Tidak Boleh Ksoong'
    });
    e.preventDefault();
}
});

let hapustoko=$(".hapustoko").on('click',function(e){
    e.preventDefault();
    let id=$(this).data('id');
    let href=$(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "You Wiil Delete This",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete!'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url:href,
                type:'post',
                data:{
                    id:id
                },
                success:function(){
                location.reload();
                }
            })
        }
    })
})
let status=$('.status').on('change',function(){
let id=$(this).data('id');
let respon=$(this).val();
let url=$(this).data('url');
$.ajax({
    url:url,
    type:'post',
    data:{
        id:id,
        respon:respon   
    },
    success:function(){
        location.reload();
    }
})
})