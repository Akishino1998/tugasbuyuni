<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nyervisga? | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/zebra_datepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
         #mapBox {
				height: 300px;
                width: 100%;
                bottom: 30px;
            }
    </style>
<!--===============================================================================================-->
</head>
<body>
	<div class="container-contact100">
		<div class="container-fluid">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-3">
                    <div class="wrap-contact10000">
                        <span class="contact100-form-title image-title">
                            <a href="/home"><img src="logo/logonyervisga.png" alt="" width="200" height="200"></a>
                        </span>
                    </div>
                    <br>
                    <div class="wrap-contact1000">
                        <span class="contact100-form-title">
                            Fotomu
                        </span>
                        <span class="contact100-form-title image-title">
                            <a href="/home"><img src="logo/logonyervisga.png" alt="" width="200" height="200"></a>
                        </span>
                        <hr>
                        {{-- <label class="label-input100" for="password">Ubah Password</label> --}}
                    </div>
                </div>
                {{-- <div class="col-1"></div> --}}
                <div class="col-7">
                    <div class="wrap-contact100">
                        <form class="contact100-form form-kontak" method="POST" action="/biodata">
                            <span class="contact100-form-title">
                                Tentangmu
                            </span>
                            <div class="row">
                                <div class="col-6">
                                    <label class="label-input100" for="nama_depan">Nama Depan</label>
                                    <div class="wrap-input100">
                                        <input id="nama_depan" class="input100" type="text" name="nama_depan" placeholder="Nama Depan" value="{{ $data->nama_depan }}" disabled>
                                        {{-- <span class="focus-input100"></span> --}}
                                    </div>
                                </div>
                                <div class="col-6"> 
                                    <label class="label-input100" for="nama_belakang">Nama Belakang</label>
                                    <div class="wrap-input100">
                                        <input id="nama_belakang" class="input100" type="text" name="nama_belakang" placeholder="Nama Belakang" value="{{ $data->nama_belakang }}" disabled>
                                        {{-- <span class="focus-input100"></span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="label-input100" for="tanggal_lahir">Tanggal Lahir</label>
                                    <div class="wrap-input100">
                                        <input id="tanggal_lahir" class="input100" type="text" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ $data->tanggal_lahir }}" disabled>		
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="label-input100" for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class="wrap-input100">
                                        <input id="jenis_kelamin" class="input100" type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" value="{{ $data->jenis_kelamin }}" disabled>		
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="">
                                    <label class="label-input100" for="no_hp">No. HP</label>
                                    <div class="wrap-input100">
                                        <input id="no_hp" class="input100" type="password" name="no_hp" placeholder="No. HP" value="{{ $data->no_hp }}" disabled>		
                                    </div>
                                </div>
                                
                            </div>
                            <div class="container-contact100-form-btn btn-update-tentang">
                                <div class="contact100-form-btn">
                                    <span>
                                        Ubah
                                        <i class="zmdi zmdi-arrow-right m-l-8"></i>
                                    </span>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-3"></div>
                <div class="col-7">
                    <div class="wrap-contact100">
                        <div class="contact100-form" method="POST" action="/biodata">
                            <span class="contact100-form-title">
                                Alamatmu
                            </span>
                            <div id="mapBox"></div>
                                <input type="text" name="latitude" id="latclicked"  ><br>
		                            <input type="text" name="longtitude" id="longclicked"><br>
                                <label class="label-input100" for="alamat">Alamat Lengkap</label>
                                <div class="wrap-input100 validate-input">
                                    <textarea id="alamat" class="input100" name="alamat" placeholder="Alamat Lengkap" disabled>{{ $data->alamat }}</textarea>
                                    
                                </div>
                            <div class="row">
                                <div class="col-3">
                                    <label class="label-input100" for="no_rumah">No. Rumah</label>
                                    <div class="wrap-input100">
                                        <input id="no_rumah" class="input100" type="text" name="no_rumah" placeholder="No." {{ $data->no_rumah }}>		
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label class="label-input100" for="rt">RT</label>
                                    <div class="wrap-input100">
                                        <input id="rt" class="input100" type="text" name="rt" placeholder="RT" {{ $data->rt }}>		
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label class="label-input100" for="rt">RW</label>
                                    <div class="wrap-input100">
                                        <input id="rw" class="input100" type="text" name="rw" placeholder="RW" {{ $data->rw }}>		
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label class="label-input100" for="kode_pos">Kode POS</label>
                                    <div class="wrap-input100">
                                        <input id="kode_pos" class="input100" type="text" name="kode_pos" placeholder="Kode POS" {{ $data->nama_belakang }}>
                                        {{-- <span class="focus-input100"></span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="label-input100" for="provinsi">Provinsi</label>
                                    <div class="wrap-input100">
                                        <input id="provinsi" class="input100" type="text" name="provinsi" placeholder="Provinsi" {{ $data->provinsi }}>		
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="label-input100" for="kabupaten">Kabupaten</label>
                                    <div class="wrap-input100">
                                        <input id="kabupaten" class="input100" type="text" name="kabupaten" placeholder="Kabupaten" {{ $data->kabupaten }}>		
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="label-input100" for="kelurahan">Kelurahan</label>
                                    <div class="wrap-input100">
                                        <input id="kelurahan" class="input100" type="text" name="kelurahan" placeholder="Kelurahan" {{ $data->kelurahan }}>		
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="label-input100" for="kecamatan">Kecamatan</label>
                                    <div class="wrap-input100">
                                        <input id="kecamatan" class="input100" type="text" name="kecamatan" placeholder="Kecamatan" {{ $data->kecamatan }}>		
                                    </div>
                                </div>
                                
                            </div>
                             <div class="container-contact100-form-btn">
                                <button class="contact100-form-btn">
                                    <span>
                                        Simpan
                                        <i class="zmdi zmdi-arrow-right m-l-8"></i>
                                    </span>
                                </button>
                            </div>
                            @csrf
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/zebra_datepicker.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/sweetalert.min.js"></script>
    {{-- <script src="js/main.js"></script> --}}
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback=initMap" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-23581568-13');
</script>
<script>
    var map;
    var markers = [];

    function initMap() {
        var haightAshbury = {lat: -0.489776, lng: 117.144242};
        map = new google.maps.Map(document.getElementById('mapBox'), {
            zoom: 15,
            center: haightAshbury,
            mapTypeId: 'roadmap'
        });
        

        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function(event) {
            addMarker(event.latLng);
            document.getElementById('latclicked').value = event.latLng.lat();
            document.getElementById('longclicked').value =  event.latLng.lng();

            var input = document.getElementById('searchTextField');
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({"latLng":event.latLng}, function (results) {
              $("#alamat").val(results[0].formatted_address);
              $("#kode_pos").val(results[0].address_components[7].long_name);
              $("#provinsi").val(results[1].address_components[5].long_name);
              $("#kabupaten").val(results[1].address_components[4].long_name);
              $("#kecamatan").val(results[1].address_components[2].long_name);
              $("#kelurahan").val(results[1].address_components[3].long_name);
            //   $("#no_rumah").val(results[0].address_components[].long_name);
            });
        });
    }

      // Adds a marker to the map and push to the array.
    function addMarker(location) {
        setMapOnAll(null);
        var marker = new google.maps.Marker({
            position: location,
            map: map  
        });
        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }
    var stat = 1;
    $('.btn-update-tentang').click(function(){
        if(stat == 1){
            $('.btn-update-tentang').empty();
            $('.btn-update-tentang').append('<button class="contact100-form-btn btn-simpan"><span>Simpan<i class="zmdi zmdi-arrow-right m-l-8"></i></span></button>');
            $('#nama_depan').prop('disabled',false);
            $('#nama_belakang').prop('disabled',false);
            stat = 2;
        }
        
    });

</script>
<script>
    document.querySelector('.form-kontak').addEventListener('submit', function(e) {
      var form = this;

      e.preventDefault();

      swal({
        title: "Sudah Yakin?",
        text: "Pastikan data yang kamu input sudah benar, ya!",
        icon: "warning",
        buttons: [
          'Aku mau cek ulang.',
          'Iya, aku yakin!'
        ],
        // dangerMode: true,
      }).then(function(isConfirm) {
        if (isConfirm) {
          swal({
            title: 'Data Tersimpan',
            text: 'Sukses Disimpan kakak >_<',
            icon: 'success'
          }).then(function() {
            // form.submit();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/biodata',
                method: 'post',
                data: $('.form-kontak').serialize(), // prefer use serialize method
                success:function(data){
                    console.log(data);     
                }
            });
          });
        } 
      });
    });
</script>
</body>
</html>

