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

        return pozostalyCzas;
      }
    var goldcd =  goldenCooldown().then((value) => { goldcd = value });

    window.setInterval('refresh()', 1000); 	
        async function refresh() {
        goldenCooldownCount(goldcd[4],goldcd[3],goldcd[2],goldcd[0].split(":")[0],goldcd[0].split(":")[1],goldcd[1]);
        }