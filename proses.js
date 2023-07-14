$(document).ready(function(){
    $("#jenis_kendaraan").change(function(){
      var jns = $("#jenis_kendaraan").val();
        $.ajax({
          type: "GET",
          dataType: "html",
          url: "getJenis.php",
          data: "jns="+jns,
          success: function(data){
            $("#gol_kendaraan").html(data);
          }
        });
    });

    $("#gol_kendaraan").change(function(){
      var by = $("#gol_kendaraan").val();
        $.ajax({
          type: "GET",
          dataType: "html",
          url: "getBiaya.php",
          data: "by="+by,
          success: function(data){
            $("#biaya").val(data);
          }
        });
    });

    $("#bayar").keyup(function(){
        var biaya = $("#biaya").val();
        var bayar = $("#bayar").val();
        $("#kembalian").val(bayar - biaya);
        $("#total").val(biaya);
    });
});