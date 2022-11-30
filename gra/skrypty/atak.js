var s = false;
function start(){
    const div = document.querySelector("#rozpocznij-bitwe");
    div.remove();
    start_ataku();
    s = true;
    window.setInterval('refresh()', 1000); 	
}
async function pasek(stan,max){


    var pasek = document.querySelector('#pasek');
    var wytrzymalosc = document.querySelector('#wytrzymalosc');
    
    wytrzymalosc.innerHTML = stan+"/"+max;
    pasek.style.width = 100*(stan/max) + "%";
}
async function czasDoKonca()
{
    const response = await fetch("./skrypty/czas-ataku-gracza.php", {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        method: "POST"
      })
      var x = await response.text();
      if(x<=0) { return "koniec" } else
      return x+" s" ;
}
async function start_ataku()
{
    const response = await fetch("./skrypty/start-ataku-gracza.php", {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        method: "POST"
      })
}
async function uderzenie(){
    const response = await fetch("./skrypty/uderzenie-ataku-gracza.php", {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        method: "POST"
      })
      var x = await response.json();
      pasek(x.stan,x.max);
      stan();
}
async function stan(){
    const response = await fetch("./skrypty/stan-ataku-gracza.php", {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        method: "POST"
      })
    var x = await response.json();
    
    if(x == "wygrana"){window.location.href = './zloto.php';}
    if(x == "przegrana"){window.location.href = './zloto.php';}
}




async function refresh() {
    czasDoKonca().then((value) => { 
        var czas = value;
        const div = document.querySelector('#czas');
        div.innerHTML = czas;
    })
    stan()

}
if(s=="true"){
    console.log("d")
    
}