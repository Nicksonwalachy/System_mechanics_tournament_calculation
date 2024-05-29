function calculateTraction() {
  var force = document.getElementById("force").value;
  var distance = document.getElementById("distance").value;
  var traction = force * distance;
  document.getElementById("result").innerHTML = "A tração é: " + traction + " N.m";
}

function saveSpeed() {
  let carnumber = document.getElementById("carnumber").value;
  let car = carnumber
  console.log(car)
  var time = document.getElementById("time").value;
  timev = time
  console.log(time)
  
}
