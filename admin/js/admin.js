function showlogpass(){
  var z = document.getElementById('passwordLog');
  if(z.type === "password"){
    z.type = 'text';
  }else{
    z.type = 'password';
  }
}
