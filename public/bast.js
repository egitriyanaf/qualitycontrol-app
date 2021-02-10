$('#4226402115e7c27e5336d37010473538').hide();
$('#5671371725e7c27e535ee98075586146').hide();
$('#5947130825e7c27e534a586081716997').hide();

$('#jenisMediaItem1').setOnchange(showOtherItem1);
$('#visualItem1').setOnchange(showVisualOtherItem1);
$('#jenisMediaItem2').setOnchange(showOtherItem2);
$('#visualItem2').setOnchange(showVisualOtherItem2);
$('#jenisMediaItem3').setOnchange(showOtherItem3);
$('#visualItem3').setOnchange(showVisualOtherItem3);

$('#visualOtherItem1').hide();
$('#jenisMediaItem1').hide();
$('#ukuranMediaItem1').hide();
$('#jumlahItem1').hide();
$('#bastQtyItem1').hide();
$('#bastUkuranItem1').hide();
$('#poUkuranItem1').hide();
$('#keteranganSelisihItem1').hide();
$('#peneranganItem1').hide();
$('#visualItem1').hide();
$('#formatMediaItem1').hide();
$('#materiTerpasangItem1').hide();
$('#labelBastUkuranItem1').hide();
$('#labelPoUkuranItem1').hide();
$('#labelUkuranMediaItem1').hide();
$('#jenisMediaOtherItem1').hide();
//============================
$('#fotoSiangJarakDekatItem1').hide();
$('#fotoSiangJarakJauhItem1').hide();
$('#keteranganFotoSiangItem1').hide();
$('#keteranganFotoSiangJauhItem1').hide();
$('#fotoMalamJarakDekatItem1').hide();
$('#fotoMalamJarakJauhItem1').hide();
$('#keteranganFotoMalamDekatItem1').hide();
$('#keteranganFotoMalamJauhItem1').hide();
$('#fotoAwalIndoorItem1').hide();
$('#fotoAkhirIndoorItem1').hide();
$('#tanggalPenggantianItem1').hide();
$('#temaVisualAwalItem1').hide();
$('#temaVisualAkhirItem1').hide();
$('#fotoVisualAwalItem1').hide();
$('#fotoVisualAkhirItem1').hide();

$('#fotoSiangJarakDekatFileItem1M').hide();
$('#fotoSiangJarakJauhFileItem1M').hide();
$('#fotoMalamJarakDekatFileItem1M').hide();
$('#fotoMalamJarakJauhFileItem1M').hide();

$('#fotoVisualAwalFileItem1M').hide();
$('#fotoVisualAkhirFileItem1M').hide();
$('#fotoAwalIndoorFileItem1M').hide();
$('#fotoAkhirIndoorFileItem1M').hide();

$('#visualOtherItem2').hide();
$('#jenisMediaItem2').hide();
$('#ukuranMediaItem2').hide();
$('#jumlahItem2').hide();
$('#bastQtyItem2').hide();
$('#bastUkuranItem2').hide();
$('#poUkuranItem2').hide();
$('#keteranganSelisihItem2').hide();
$('#peneranganItem2').hide();
$('#visualItem2').hide();
$('#formatMediaItem2').hide();
$('#materiTerpasangItem2').hide();
$('#labelBastUkuranItem2').hide();
$('#labelPoUkuranItem2').hide();
$('#labelUkuranMediaItem2').hide();
$('#jenisMediaOtherItem2').hide();
//============================
$('#fotoSiangJarakDekatItem2').hide();
$('#fotoSiangJarakJauhItem2').hide();
$('#keteranganFotoSiangItem2').hide();
$('#keteranganFotoSiangJauhItem2').hide();
$('#fotoMalamJarakDekatItem2').hide();
$('#fotoMalamJarakJauhItem2').hide();
$('#keteranganFotoMalamDekatItem2').hide();
$('#keteranganFotoMalamJauhItem2').hide();
$('#fotoAwalIndoorItem2').hide();
$('#fotoAkhirIndoorItem2').hide();
$('#tanggalPenggantianItem2').hide();
$('#temaVisualAwalItem2').hide();
$('#temaVisualAkhirItem2').hide();
$('#fotoVisualAwalItem2').hide();
$('#fotoVisualAkhirItem2').hide();

$('#fotoSiangJarakDekatFileItem2M').hide();
$('#fotoSiangJarakJauhFileItem2M').hide();
$('#fotoMalamJarakDekatFileItem2M').hide();
$('#fotoMalamJarakJauhFileItem2M').hide();

$('#fotoVisualAwalFileItem2M').hide();
$('#fotoVisualAkhirFileItem2M').hide();
$('#fotoAwalIndoorFileItem2M').hide();
$('#fotoAkhirIndoorFileItem2M').hide();

$('#visualOtherItem3').hide();
$('#jenisMediaItem3').hide();
$('#ukuranMediaItem3').hide();
$('#jumlahItem3').hide();
$('#bastQtyItem3').hide();
$('#bastUkuranItem3').hide();
$('#poUkuranItem3').hide();
$('#keteranganSelisihItem3').hide();
$('#peneranganItem3').hide();
$('#visualItem3').hide();
$('#formatMediaItem3').hide();
$('#materiTerpasangItem3').hide();
$('#labelBastUkuranItem3').hide();
$('#labelPoUkuranItem3').hide();
$('#labelUkuranMediaItem3').hide();
$('#jenisMediaOtherItem3').hide();
//============================
$('#fotoSiangJarakDekatItem3').hide();
$('#fotoSiangJarakJauhItem3').hide();
$('#keteranganFotoSiangItem3').hide();
$('#keteranganFotoSiangJauhItem3').hide();
$('#fotoMalamJarakDekatItem3').hide();
$('#fotoMalamJarakJauhItem3').hide();
$('#keteranganFotoMalamDekatItem3').hide();
$('#keteranganFotoMalamJauhItem3').hide();
$('#fotoAwalIndoorItem3').hide();
$('#fotoAkhirIndoorItem3').hide();
$('#tanggalPenggantianItem3').hide();
$('#temaVisualAwalItem3').hide();
$('#temaVisualAkhirItem3').hide();
$('#fotoVisualAwalItem3').hide();
$('#fotoVisualAkhirItem3').hide();

$('#fotoSiangJarakDekatFileItem3M').hide();
$('#fotoSiangJarakJauhFileItem3M').hide();
$('#fotoMalamJarakDekatFileItem3M').hide();
$('#fotoMalamJarakJauhFileItem3M').hide();

$('#fotoVisualAwalFileItem3M').hide();
$('#fotoVisualAkhirFileItem3M').hide();
$('#fotoAwalIndoorFileItem3M').hide();
$('#fotoAkhirIndoorFileItem3M').hide();

$('document').ready(function(){
  
  var jenisBast = $('#jenisBast').getValue();
  var kategoriBranding = $('#kategoriBranding').getValue();
  
  var qtyItemPO = $('#qtyItemPO').getValue();
  
  var panel = $('#formItem1').getValue();
  //document.getElementById("panelItem1").innerHTML = '<center><h3>'+panel+'</h3></center>';
  
  var panel2 = $('#formItem2').getValue();
  //document.getElementById("panelItem2").innerHTML = '<center><h3>'+panel2+'</h3></center>';
  
  var panel3 = $('#formItem3').getValue();
  //document.getElementById("panelItem3").innerHTML = '<center><h3>'+panel3+'</h3></center>';
  
  
  if(panel != 'Masukkan Nama Item'){
    $("#formItem1").getControl().attr('readonly', true);
    $("#formItem2").getControl().attr('readonly', true);
    $("#formItem3").getControl().attr('readonly', true);
  }
  if(panel != '' && 1 <= qtyItemPO){
  $('#4226402115e7c27e5336d37010473538').show();
    
    if(jenisBast == 'Pemasangan Pertama' || jenisBast == 'Retensi'){
      $('#peneranganItem1').show();
      $('#visualItem1').show();
      $('#formatMediaItem1').show();
      $('#materiTerpasangItem1').show();
      $("#materiTerpasangItem1").getControl().attr('required', true);

      if(kategoriBranding == 'Outdoor'){
        $('#jenisMediaItem1').show();
        $('#ukuranMediaItem1').show();
        $('#jumlahItem1').show();
        $('#labelUkuranMediaItem1').show();
        
        $("#ukuranMediaItem1").getControl().attr('required', true);
        $("#ukuranMediaItem1").getControl().attr('step', '0.01');
        $("#ukuranMediaItem1").getControl().attr('type', 'number');
        
        $("#jumlahItem1").getControl().attr('required', true);
        $("#jumlahItem1").getControl().attr('type', 'number');
        
        $('#keteranganFotoSiangItem1').show();
        $('#keteranganFotoSiangJauhItem1').show();
        $('#keteranganFotoMalamDekatItem1').show();
        $('#keteranganFotoMalamJauhItem1').show();

        $('#fotoSiangJarakDekatFileItem1M').show();
        $('#fotoSiangJarakJauhFileItem1M').show();
        $('#fotoMalamJarakDekatFileItem1M').show();
        $('#fotoMalamJarakJauhFileItem1M').show();
        
        // $('#fotoSiangJarakDekatFileItem1M').find('input[type=file]').attr('required', true);
        // $('#fotoSiangJarakJauhFileItem1M').find('input[type=file]').attr('required', true);
        // $('#fotoMalamJarakDekatFileItem1M').find('input[type=file]').attr('required', true);
        // $('#fotoMalamJarakJauhFileItem1M').find('input[type=file]').attr('required', true);

      }else if(kategoriBranding == 'Indoor'){
        $('#bastQtyItem1').show();
        $('#bastUkuranItem1').show();
        $('#poUkuranItem1').show();
        $('#keteranganSelisihItem1').show();
        $('#labelBastUkuranItem1').show();
        $('#labelPoUkuranItem1').show();
        $('#fotoAwalIndoorItem1').show();
        $('#fotoAkhirIndoorItem1').show();

        $('#fotoAwalIndoorFileItem1M').show();
        //$('#fotoAwalIndoorFileItem1M').find('input[type=file]').attr('required', true);
        
        $('#fotoAkhirIndoorFileItem1M').show();
        //$('#fotoAkhirIndoorFileItem1M').find('input[type=file]').attr('required', true);
        
        $("#bastQtyItem1").getControl().attr('required', true);
        $("#bastQtyItem1").getControl().attr('type', 'number');
        
        $("#bastUkuranItem1").getControl().attr('required', true);
        $("#bastUkuranItem1").getControl().attr('step', '0.01');
        $("#bastUkuranItem1").getControl().attr('type', 'number');
        
        $("#poUkuranItem1").getControl().attr('required', true);
        $("#poUkuranItem1").getControl().attr('step', '0.01');
        $("#poUkuranItem1").getControl().attr('type', 'number');

      }

    }else if(jenisBast == 'Pergantian Visual (Non Free)'){
        $('#tanggalPenggantianItem1').show();
        $('#temaVisualAwalItem1').show();
        $('#temaVisualAkhirItem1').show();
      
        $("#tanggalPenggantianItem1").getControl().attr('required', true);
        $("#temaVisualAwalItem1").getControl().attr('required', true);
        $("#temaVisualAkhirItem1").getControl().attr('required', true);
      
        $('#fotoVisualAwalFileItem1M').show();
        $('#fotoVisualAkhirFileItem1M').show();
      
        // $('#fotoVisualAwalFileItem1M').find('input[type=file]').attr('required', true);
        // $('#fotoVisualAkhirFileItem1M').find('input[type=file]').attr('required', true);

    }
  }
  
  if(panel2 != '' && 2 <= qtyItemPO){
    $('#5671371725e7c27e535ee98075586146').show();
    
     if(jenisBast == 'Pemasangan Pertama' || jenisBast == 'Retensi'){
        $('#peneranganItem2').show();
        $('#visualItem2').show();
        $('#formatMediaItem2').show();
        $('#materiTerpasangItem2').show();
        $("#materiTerpasangItem2").getControl().attr('required', true);

        if(kategoriBranding == 'Outdoor'){
          $('#jenisMediaItem2').show();
          $('#ukuranMediaItem2').show();
          $('#jumlahItem2').show();
          $('#labelUkuranMediaItem2').show();
          
          $("#ukuranMediaItem2").getControl().attr('required', true);
          $("#ukuranMediaItem2").getControl().attr('step', '0.01');
          $("#ukuranMediaItem2").getControl().attr('type', 'number');
          
          $("#jumlahItem1").getControl().attr('required', true);
          $("#jumlahItem1").getControl().attr('type', 'number');
      
          $('#keteranganFotoSiangItem2').show();
          $('#keteranganFotoSiangJauhItem2').show();
          $('#keteranganFotoMalamDekatItem2').show();
          $('#keteranganFotoMalamJauhItem2').show();

          $('#fotoSiangJarakDekatFileItem2M').show();
          $('#fotoSiangJarakJauhFileItem2M').show();
          $('#fotoMalamJarakDekatFileItem2M').show();
          $('#fotoMalamJarakJauhFileItem2M').show();
          
          // $('#fotoSiangJarakDekatFileItem2M').find('input[type=file]').attr('required', true);
          // $('#fotoSiangJarakJauhFileItem2M').find('input[type=file]').attr('required', true);
          // $('#fotoMalamJarakDekatFileItem2M').find('input[type=file]').attr('required', true);
          // $('#fotoMalamJarakJauhFileItem2M').find('input[type=file]').attr('required', true);

          //=======================================

        }else if(kategoriBranding == 'Indoor'){
          $('#bastQtyItem2').show();
          $('#bastUkuranItem2').show();
          $('#poUkuranItem2').show();
          $('#keteranganSelisihItem2').show();
          $('#labelBastUkuranItem2').show();
          $('#labelPoUkuranItem2').show();
          $('#fotoAwalIndoorItem2').show();
          $('#fotoAkhirIndoorItem2').show();

          $('#fotoAwalIndoorFileItem2M').show();
          $('#fotoAkhirIndoorFileItem2M').show();
          
          $('#fotoAwalIndoorFileItem2M').find('input[type=file]').attr('required', true);
          $('#fotoAkhirIndoorFileItem2M').find('input[type=file]').attr('required', true);
          
          $("#bastQtyItem2").getControl().attr('required', true);
          $("#bastQtyItem2").getControl().attr('type', 'number');

          $("#bastUkuranItem2").getControl().attr('required', true);
          $("#bastUkuranItem2").getControl().attr('step', '0.01');
          $("#bastUkuranItem2").getControl().attr('type', 'number');

          $("#poUkuranItem2").getControl().attr('required', true);
          $("#poUkuranItem2").getControl().attr('step', '0.01');
          $("#poUkuranItem2").getControl().attr('type', 'number');
        }

      }else if(jenisBast == 'Pergantian Visual (Non Free)'){
          $('#tanggalPenggantianItem2').show();
          $('#temaVisualAwalItem2').show();
          $('#temaVisualAkhirItem2').show();
          $('#fotoVisualAwalFileItem2M').show();
          $('#fotoVisualAkhirFileItem2M').show();
          
          $("#tanggalPenggantianItem2").getControl().attr('required', true);
          $("#temaVisualAwalItem2").getControl().attr('required', true);
          $("#temaVisualAkhirItem2").getControl().attr('required', true);
        
          $('#fotoVisualAwalFileItem2M').find('input[type=file]').attr('required', true);
          $('#fotoVisualAkhirFileItem2M').find('input[type=file]').attr('required', true);
      }
  }
  
  if(panel3 != '' && 3 <= qtyItemPO){
    $('#5947130825e7c27e534a586081716997').show();
    
    if(jenisBast == 'Pemasangan Pertama' || jenisBast == 'Retensi'){
      $('#peneranganItem3').show();
      $('#visualItem3').show();
      $('#formatMediaItem3').show();
      $('#materiTerpasangItem3').show();
      
      $("#materiTerpasangItem3").getControl().attr('required', true);

      if(kategoriBranding == 'Outdoor'){
        $('#jenisMediaItem3').show();
        $('#ukuranMediaItem3').show();
        $('#jumlahItem3').show();
        $('#labelUkuranMediaItem3').show();
  
        $("#ukuranMediaItem3").getControl().attr('required', true);
        $("#ukuranMediaItem3").getControl().attr('step', '0.01');
        $("#ukuranMediaItem3").getControl().attr('type', 'number');

        $("#jumlahItem3").getControl().attr('required', true);
        $("#jumlahItem3").getControl().attr('type', 'number');

        $('#keteranganFotoSiangItem3').show();
        $('#keteranganFotoSiangJauhItem3').show();
        $('#keteranganFotoMalamDekatItem3').show();
        $('#keteranganFotoMalamJauhItem3').show();

        $('#fotoSiangJarakDekatFileItem3M').show();
        $('#fotoSiangJarakJauhFileItem3M').show();
        $('#fotoMalamJarakDekatFileItem3M').show();
        $('#fotoMalamJarakJauhFileItem3M').show();
        
        // $('#fotoSiangJarakDekatFileItem3M').find('input[type=file]').attr('required', true);
        // $('#fotoSiangJarakJauhFileItem3M').find('input[type=file]').attr('required', true);
        // $('#fotoMalamJarakDekatFileItem3M').find('input[type=file]').attr('required', true);
        // $('#fotoMalamJarakJauhFileItem3M').find('input[type=file]').attr('required', true);
      //==============================================

      }else if(kategoriBranding == 'Indoor'){
        $('#bastQtyItem3').show();
        $('#bastUkuranItem3').show();
        $('#poUkuranItem3').show();
        $('#keteranganSelisihItem3').show();
        $('#labelBastUkuranItem3').show();
        $('#labelPoUkuranItem3').show();
        $('#fotoAwalIndoorItem3').show();
        $('#fotoAkhirIndoorItem3').show();

        $('#fotoAwalIndoorFileItem3M').show();
        $('#fotoAkhirIndoorFileItem3M').show();
    
        $('#fotoAwalIndoorFileItem3M').find('input[type=file]').attr('required', true);
        $('#fotoAkhirIndoorFileItem3M').find('input[type=file]').attr('required', true);

        $("#bastQtyItem3").getControl().attr('required', true);
        $("#bastQtyItem3").getControl().attr('type', 'number');

        $("#bastUkuranItem3").getControl().attr('required', true);
        $("#bastUkuranItem3").getControl().attr('step', '0.01');
        $("#bastUkuranItem3").getControl().attr('type', 'number');

        $("#poUkuranItem3").getControl().attr('required', true);
        $("#poUkuranItem3").getControl().attr('step', '0.01');
        $("#poUkuranItem3").getControl().attr('type', 'number');
      }
    }else if(jenisBast == 'Pergantian Visual (Non Free)'){
        $('#tanggalPenggantianItem3').show();
        $('#temaVisualAwalItem3').show();
        $('#temaVisualAkhirItem3').show();
        $('#fotoVisualAwalFileItem3M').show();
        $('#fotoVisualAkhirFileItem3M').show();
      
        $("#tanggalPenggantianItem3").getControl().attr('required', true);
        $("#temaVisualAwalItem3").getControl().attr('required', true);
        $("#temaVisualAkhirItem3").getControl().attr('required', true);

        $('#fotoVisualAwalFileItem3M').find('input[type=file]').attr('required', true);
        $('#fotoVisualAkhirFileItem3M').find('input[type=file]').attr('required', true);
    }
  }
  
  
  //===========================================================
  
  $("#submit0000000001").click(function() {
    $('#2803141485e7c27e5358c54027618880').setOnSubmit(function(){
    
      var jenisMedia1 = $('#jenisMediaItem1').getValue();
        var visual1 = $('#visualItem1').getValue();
        var jenisMedia2 = $('#jenisMediaItem2').getValue();
        var visual2 = $('#visualItem2').getValue();
        var jenisMedia3 = $('#jenisMediaItem3').getValue();
        var visual3 = $('#visualItem3').getValue();
      
        var bastUkuranItem1 = $('#bastUkuranItem1').getValue();
        var poUkuranItem1 = $('#poUkuranItem1').getValue();
      
      var bastUkuranItem2 = $('#bastUkuranItem2').getValue();
        var poUkuranItem2 = $('#poUkuranItem2').getValue();
      
      var bastUkuranItem3 = $('#bastUkuranItem2').getValue();
        var poUkuranItem3 = $('#poUkuranItem2').getValue();
    
      var keteranganSelisih1 = $("#keteranganSelisihItem1").getValue();
      var keteranganSelisih2 = $("#keteranganSelisihItem2").getValue();
      var keteranganSelisih3 = $("#keteranganSelisihItem3").getValue();
      
      var formItem1 = $('#formItem1').getValue();
      var formItem2 = $('#formItem2').getValue();
      var formItem3 = $('#formItem3').getValue();
      
      if(formItem1 == 'Masukkan Nama Item'){
      alert('Item PO pertama masih kosong!');
        return false;
      }
      
      if(formItem2 == 'Masukkan Nama Item' && qtyItemPO ==2){
      alert('Item PO kedua masih kosong!');
        return false;
      }
      
      if(formItem3 == 'Masukkan Nama Item' && qtyItemPO == 3){
      alert('Item PO ketiga masih kosong!');
        return false;
      }
      
      
        if(kategoriBranding == 'Indoor' && panel != '' && bastUkuranItem1 != poUkuranItem1 && keteranganSelisih1 == ''){
            //alert('other jenis media masih kosong!');
            //return false;
          //$("#keteranganSelisihItem1").getControl().attr('required', true);
            alert('Keterangan selisih pada item pertama masih kosong');
            return false;
        }
      
      if(kategoriBranding == 'Indoor' && panel2 != '' && bastUkuranItem2 != poUkuranItem2 && keteranganSelisih2 == ''){
            alert('Keterangan selisih pada item kedua masih kosong');
            return false;
        }
      
      if(kategoriBranding == 'Indoor' && panel3 != '' && bastUkuranItem3 != poUkuranItem3 && keteranganSelisih3 == ''){
            alert('Keterangan selisih pada item ketiga masih kosong');
            return false;
        }
      


      // ===============================================================================
        if(jenisBast == 'Pemasangan Pertama' && kategoriBranding == 'Outdoor' && qtyItemPO == 1){
          a = $("#fotoSiangJarakDekatFileItem1M").getInfo().fileCollection.length;
          b = $("#fotoSiangJarakJauhFileItem1M").getInfo().fileCollection.length;
          c = $("#fotoMalamJarakDekatFileItem1M").getInfo().fileCollection.length;
          d = $("#fotoMalamJarakJauhFileItem1M").getInfo().fileCollection.length;
          if (a == 0 || b == 0 || c == 0 || d == 0) {
            // alert('pertama');
            alert('File tidak boleh ada yang kosong!');
            return false;
          }
        }

        if(jenisBast == 'Pemasangan Pertama' && kategoriBranding == 'Outdoor' && qtyItemPO == 2){
          e = $("#fotoSiangJarakDekatFileItem2M").getInfo().fileCollection.length;
          f = $("#fotoSiangJarakJauhFileItem2M").getInfo().fileCollection.length;
          g = $("#fotoMalamJarakDekatFileItem2M").getInfo().fileCollection.length;
          h = $("#fotoMalamJarakJauhFileItem2M").getInfo().fileCollection.length;
          if (e == 0 || f == 0 || g == 0 || h == 0) {
            // alert('Kedua');
            alert('File tidak boleh ada yang kosong!');
            return false;
          }
        }

        if(jenisBast == 'Pemasangan Pertama' && kategoriBranding == 'Outdoor' && qtyItemPO == 3){
          j = $("#fotoSiangJarakDekatFileItem3M").getInfo().fileCollection.length;
          k = $("#fotoSiangJarakJauhFileItem3M").getInfo().fileCollection.length;
          l = $("#fotoMalamJarakDekatFileItem3M").getInfo().fileCollection.length;
          m = $("#fotoMalamJarakJauhFileItem3M").getInfo().fileCollection.length;
          if (j == 0 || k == 0 || l == 0 || m == 0) {
            // alert('Ketiga');
            alert('File tidak boleh ada yang kosong!');
            return false;
          }
        }
      // ===============================================================================
      if(jenisBast == 'Pemasangan Pertama' && kategoriBranding == 'Indoor' && qtyItemPO == 1){
        awal = $("#fotoAwalIndoorFileItem1M").getInfo().fileCollection.length;
        akhir = $("#fotoAkhirIndoorFileItem1M").getInfo().fileCollection.length;
        if (awal == 0 || akhir == 0) {
          alert('File tidak boleh ada yang kosong!');
          return false;
        }
      }
      if(jenisBast == 'Pemasangan Pertama' && kategoriBranding == 'Indoor' && qtyItemPO == 2){
        awal = $("#fotoAwalIndoorFileItem2M").getInfo().fileCollection.length;
        akhir = $("#fotoAkhirIndoorFileItem2M").getInfo().fileCollection.length;
        if (awal == 0 || akhir == 0) {
          alert('File tidak boleh ada yang kosong!');
          return false;
        }
      }
      if(jenisBast == 'Pemasangan Pertama' && kategoriBranding == 'Indoor' && panel3 != 3){
        awal = $("#fotoAwalIndoorFileItem3M").getInfo().fileCollection.length;
        akhir = $("#fotoAkhirIndoorFileItem3M").getInfo().fileCollection.length;
        if (awal == 0 || akhir == 0) {
          alert('File tidak boleh ada yang kosong!');
          return false;
        }
      }
      // ================================
      if(jenisBast == 'Pergantian Visual (Non Free)' && kategoriBranding == 'Outdoor' && qtyItemPO == 1){
        awal = $("#fotoVisualAwalFileItem1M").getInfo().fileCollection.length;
        akhir = $("#fotoVisualAkhirFileItem1M").getInfo().fileCollection.length;
        if (awal == 0 || akhir == 0) {
          alert('File tidak boleh ada yang kosong!');
          return false;
        }
      }
      if(jenisBast == 'Pergantian Visual (Non Free)' && kategoriBranding == 'Outdoor' && qtyItemPO == 2){
        awal = $("#fotoVisualAwalFileItem2M").getInfo().fileCollection.length;
        akhir = $("#fotoVisualAkhirFileItem2M").getInfo().fileCollection.length;
        if (awal == 0 || akhir == 0) {
          alert('File tidak boleh ada yang kosong!');
          return false;
        }
      }
      if(jenisBast == 'Pergantian Visual (Non Free)' && kategoriBranding == 'Outdoor' && qtyItemPO == 3){
        awal = $("#fotoVisualAwalFileItem3M").getInfo().fileCollection.length;
        akhir = $("#fotoVisualAkhirFileItem3M").getInfo().fileCollection.length;
        if (awal == 0 || akhir == 0) {
          alert('File tidak boleh ada yang kosong!');
          return false;
        }
      }
      // ================================
        if(jenisMedia1 == 'Other' && $('#jenisMediaOtherItem1').getValue() == ''){
          alert('other jenis media masih kosong!');
          return false;
        }
        if(visual1 == 'Other' && $('#visualOtherItem1').getValue() == ''){
          alert('other visual masih kosong!');
          return false;
        }
        if(jenisMedia2 == 'Other' && $('#jenisMediaOtherItem2').getValue() == ''){
          alert('other jenis media masih kosong!');
          return false;
        }
        if(visual2 == 'Other' && $('#visualOtherItem2').getValue() == ''){
          alert('Other visual masih kosong!');
          return false;
        }
        if(jenisMedia3 == 'Other' && $('#jenisMediaOtherItem3').getValue() == ''){
          alert('Other jenis media masih kosong!');
          return false;
        }
        if(visual3 == 'Other' && $('#visualOtherItem3').getValue() == ''){
          alert('Other visual masih kosong!');
          return false;
        }
        
      //if($('#fotoSiangJarakDekatFileItem1M').getValue() == ''){
        //alert("Sebagian file foto masih ada yang kosong, silahkan periksa kembali!");
        //return false;
      //}
      
      //if($('#fotoMalamJarakDekatFileItem1M_label').getValue() == 'empty'){
        //alert("Sebagian file foto masih ada yang kosong, silahkan periksa kembalidkjnkjsdnf!");
        //return false;
      //}
      
      //alert($('#form[fotoMalamJarakDekatFileItem1M_label]').getValue());
      //return false;

    });
  });
});


function showOtherItem1(){
  jenisMedia = $('#jenisMediaItem1').getValue();
  if(jenisMedia == 'Other'){
    $('#jenisMediaOtherItem1').show();
  }else{
    $('#jenisMediaOtherItem1').hide();
  }
}

function showVisualOtherItem1(){
  visual = $('#visualItem1').getValue();
  if(visual == 'Other'){
    $('#visualOtherItem1').show();
  }else{
    $('#visualOtherItem1').hide();
  }
}


function showOtherItem2(){
  jenisMedia = $('#jenisMediaItem2').getValue();
  if(jenisMedia == 'Other'){
    $('#jenisMediaOtherItem2').show();
  }else{
    $('#jenisMediaOtherItem2').hide();
  }
}

function showVisualOtherItem2(){
  visual = $('#visualItem2').getValue();
  if(visual == 'Other'){
    $('#visualOtherItem2').show();
  }else{
    $('#visualOtherItem2').hide();
  }
}


function showOtherItem3(){
  jenisMedia = $('#jenisMediaItem3').getValue();
  if(jenisMedia == 'Other'){
    $('#jenisMediaOtherItem3').show();
  }else{
    $('#jenisMediaOtherItem3').hide();
  }
}

function showVisualOtherItem3(){
  visual = $('#visualItem3').getValue();
  if(visual == 'Other'){
    $('#visualOtherItem3').show();
  }else{
    $('#visualOtherItem3').hide();
  }
}