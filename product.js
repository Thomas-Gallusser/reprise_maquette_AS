function test() {
  if (document.getElementById("btn").value == "test") {
    document.getElementById("btn").value = "click";
  } else {
    document.getElementById("btn").value = "test";
  }
}

function dah(){
  $.ajax({type: 'POST', url: '../wp-content/themes/take/post_product.php', data: '', dataType: 'json'});
}
