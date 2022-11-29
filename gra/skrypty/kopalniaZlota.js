    async function goldenCooldown(){
        const response = await fetch("./skrypty/goldencooldown.php",{
          headers: {
            'Accept': 'application/json',
            'Content-type':'application/json'
          },
          method: "POST"
        })
        const czas = await response.json();
        return czas.czas
      }
    async function goldenCooldownCount(rok, miesiac, dzien, godzina, minuta, sekunda){
        var aktualnyCzas = new Date();
        const div = document.querySelector("#za-ile");
        const form = document.querySelector("#zbierz-zloto");
        const gornicy = document.querySelector("#gornicy");
        const zloto = document.querySelector('#zloto');
        var dataWydarzenia = new Date(rok, miesiac, dzien, godzina, minuta, sekunda);
        var pozostalyCzas = dataWydarzenia.getTime() - aktualnyCzas.getTime();
        var s = pozostalyCzas / 1000;
        var min = s / 60;
        var h = min / 60;
        var hLeft = Math.floor(h);
        var sLeft = Math.floor(s  % 60);
        var minLeft = Math.floor(min % 60);
        if (minLeft < 10) minLeft = "0" + minLeft;
        if (sLeft < 10) sLeft = "0" + sLeft;
        div.innerHTML = hLeft + " : " + minLeft + " : " + sLeft;
        if(isNaN(pozostalyCzas) == true||pozostalyCzas <= 0)
        {
            div.classList.add('zbierz-zloto-hidden')
            
        }
        else
        {
            div.classList.remove('zbierz-zloto-hidden');
        }

        if (pozostalyCzas <= 0) {
            form.classList.remove('zbierz-zloto-hidden');
            form.classList.add('zbierz-zloto');

            
            
          } else {
            form.classList.remove('zbierz-zloto');
            form.classList.add('zbierz-zloto-hidden');

            
          }
        if(isNaN(pozostalyCzas) == true)
        {
          gornicy.classList.remove('hidden')
        }
        else
        {
          gornicy.classList.add('hidden')
        }
        if(pozostalyCzas > 0){
          zloto.classList.remove('hidden')
          zloto.classList.add('fall')
        }
        else
        {
          zloto.classList.add('hidden')
          zloto.classList.remove('fall')
        }
      }

    async function koszt(){
      const response = await fetch("./skrypty/kosztzlota.php", {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        method: "POST"
      })
      var x = await response.json();
      document.querySelector('.koszt-zbioru').innerHTML = x.koszt
    }
    async function cenaObroncy(){
      const response = await fetch("./skrypty/cena-obroncy.php", {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        method: "POST"
      })
      var x = await response.json();
      document.querySelector('.obronca-cena').innerHTML = x.koszt
    }
    async function cenaWojownika(){
      const response = await fetch("./skrypty/cena-wojownika.php", {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        method: "POST"
      })
      var x = await response.json();
      document.querySelector('.wojownik-cena').innerHTML = x.koszt
    }
    async function gracze(){
      const response = await fetch("./skrypty/atak-gracza.php", {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        method: "POST"
      })
      var x = await response.json();

      const div = document.querySelector('#gracze');
      for(var i = 0; i<x.gracz.length;i++){
        const gracz = document.createElement('div');

        const info1 = document.createElement('p'); 
        info1.innerHTML = "Nick: ";
        const nick = document.createElement('div');
        nick.innerHTML = x.gracz[i][1];



        gracz.appendChild(info1);
        gracz.appendChild(nick);
        div.appendChild(gracz);

      }
    }
















    window.setInterval('refresh()', 1000); 	
        async function refresh() {
        goldenCooldownCount(goldcd[4],goldcd[3],goldcd[2],goldcd[0].split(":")[0],goldcd[0].split(":")[1],goldcd[1]);
        }
        
  var goldcd = goldenCooldown().then((value) => { goldcd = value;
   goldenCooldownCount(goldcd[4],goldcd[3],goldcd[2],goldcd[0].split(":")[0],goldcd[0].split(":")[1],goldcd[1]); });

  koszt();
  cenaObroncy();
  cenaWojownika();
  
  