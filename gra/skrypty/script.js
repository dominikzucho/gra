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
      if(e.className == "wojownicy")e.innerHTML = "wojownicy: "+stats.stats.wojownicy;
      if(e.className == "obroncy")e.innerHTML = "obroncy: "+stats.stats.obroncy;
      if(e.className == "mur")e.innerHTML = "mur: "+stats.stats.mur;
    });
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
function recruitArmies(){ //stare okienka
  div = document.querySelector('#rekrutuj');
  
  if(div.className == "rekrutuj"){
    div.classList.remove('rekrutuj');
    div.classList.add('rekrutuj-show');
  } else {
    div.classList.remove('rekrutuj-show');
    div.classList.add('rekrutuj');
  }
}
function show_or_hide(elementId,show,hide){
var element = document.querySelectorAll(`#`+elementId.toString());

if(element[1].classList.item(0) == hide.toString()){
  element[1].classList.replace(element[1].classList.item(0),show.toString());
  // if(element[0].className == "") {element[0].classList.add('$$$');}
  // element[0].classList.replace(element[0].classList.item(0),hide.toString());
} else {
  // if(element[0].className == "")element[0].classList.add('$$$');
  // element[0].classList.replace(element[0].classList.item(0),null);
  element[1].classList.replace(element[1].classList.item(0),hide.toString());
}
}
async function notifications(){
  const response = await fetch("./skrypty/notifications.php",{
    headers: {
      'Accept':'application/json',
      'Content-Type':'application/json'
    },
    method: "POST"
  });
  var n = await response.json();
  
  const notifications = document.querySelector('#notifications');

  if(n.notification!=null){
    notifications.innerHTML=n.notification;
    notifications.classList.add("notification");
    setTimeout(notiClear,2000); 
  }
} 
function notiClear(){
  document.querySelector('#notifications').classList.remove("notification");
  document.querySelector('#notifications').innerHTML = "";
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
  notifications();
}
start();
// document.onload(start()); //gdy strona sie załaduje to wywoła start()