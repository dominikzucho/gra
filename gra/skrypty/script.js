//sprawdzenie czy mamy nick
async function nick() {
    const response = await fetch("./skrypty/script.php", {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        method: "POST",
        body: JSON.stringify({Status: "ok"})
    })
    const x = await response.json();
    console.log(x);
    if(x.nick.nick==null){
        const setnick = document.querySelector('.SetNick');
        setnick.classList.remove('hidden')
    }
    else{
      setnick.classList.add('hidden')
    }
}
//aktualizacja stytystyk
async function clickStats(){
  const response = await fetch("./skrypty/stats.php", {
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
    method: "POST",
    body: JSON.stringify({stats: "ok"})
})
    const stats = await response.json();
    const stat = document.querySelectorAll('.stats h4');
    stat.forEach(e => {
      // console.log(e.className)
      if(e.className == "nick") e.innerHTML = "nick: "+stats.stats.nick;
      if(e.className == "lvl") e.innerHTML = "lvl: "+stats.stats.lvl;
      if(e.className == "zloto") e.innerHTML = "złoto: "+stats.stats.zloto;
      if(e.className == "dnivip")e.innerHTML = "dni_vipa: "+stats.stats.dni_vip;
      if(e.className == "drewno")e.innerHTML = "drewno: "+stats.stats.drewno;
      if(e.className == "zelazo")e.innerHTML = "żelazo: "+stats.stats.zelazo;
      if(e.className == "kamien")e.innerHTML = "kamień: "+stats.stats.kamien;
    });
    // stat[0].innerHTML = "nick: "+stats.stats.nick;
    // stat[1].innerHTML = "lvl: "+stats.stats.lvl;
    // stat[2].innerHTML = "złoto: "+stats.stats.zloto;
    // stat[3].innerHTML = "dni_vipa: "+stats.stats.dni_vip;
    // stat[4].innerHTML = "drewno: "+stats.stats.drewno;
    // stat[5].innerHTML = "żelazo: "+stats.stats.zelazo;
    // stat[6].innerHTML = "kamień: "+stats.stats.kamien;
  }
//liczenie ile drewna zebralismy
async function clickWood(){
const response = await fetch("./skrypty/wood.php", {
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
  },
  method: "POST",
  body: JSON.stringify({wood: "Wood!"})
})
}
//liczenie ile zelaza zebralismy
async function clickIron(){
  const response = await fetch("./skrypty/iron.php", {
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
    method: "POST",
    body: JSON.stringify({wood: "Iron!"})
  })  
}
//liczenie ile kamienia zebralismy
async function clickStone(){
  const response = await fetch("./skrypty/stone.php", {
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
    method: "POST",
    body: JSON.stringify({wood: "Stone!"})
  })
  }


  
async function click(){
  clickStats();
}
window.onclick = e => {
  click();
}
function start(){
  nick();
  clickStats();
}
document.onload(start()); //gdy strona sie załaduje to wywoła start()