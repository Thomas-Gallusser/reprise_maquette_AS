// jq2 = jQuery.noConflict();
// jq2(function( $ ) {
//
// });
async function envoieProduct(){
  if (document.getElementById("img").files[0] != null) {
    getBase64(document.getElementById("img").files[0]);
  } else {
    $.ajax({type: 'POST', url: '../wp-content/themes/take/post_product.php', data:'tag=' + document.getElementById("tag").value + '&title=' + document.getElementById("title").value + '&comment=' + document.getElementById("comment").value + '&price=' + document.getElementById("price").value + '&img=', dataType: 'html',  success: function(rep){
        if (rep == '1') {
          console.log("Ok bien envoyer");
        } else {
          console.log("Pas envoyer !");
        }
       }});
  }
}

function getBase64(f) {
    var reader = new FileReader();
    reader.onload = function () {
    var b64 = reader.result;
      $.ajax({type: 'POST', url: '../wp-content/themes/take/post_product.php', data:'tag=' + document.getElementById("tag").value + '&title=' + document.getElementById("title").value + '&comment=' + document.getElementById("comment").value + '&price=' + document.getElementById("price").value + '&img=' + b64, dataType: 'html',  success: function(rep){
          if (rep == '1') {
            console.log("Ok bien envoyer");
          } else {
            console.log("Pas envoyer !");
          }
       }});
  };
  reader.readAsDataURL(f);
}
