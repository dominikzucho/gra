async function oferty(){
    const div = document.querySelector(".oferty")
    const response = await fetch("./skrypty/oferty.php", {
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      method: "POST",
      body: JSON.stringify({wood: "Stone!"})
    })
    const oferty = await response.json();

    var itemy =document.querySelectorAll(".oferty .oferta").length
    if(itemy != oferty.oferty.length){ 
      czyszczenieOfert()
      for(var i = 0; i<oferty.oferty.length;i++){
        
        const oferta = document.createElement("div");
        oferta.classList.add('oferta');
        div.appendChild(oferta);

        const info1 = document.createElement('p'); 
        info1.innerHTML = "sprzedawca: ";
        const sprzedawca = document.createElement('div');
        sprzedawca.innerHTML = oferty.oferty[i][1];

        const info2 = document.createElement('p'); 
        info2.innerHTML = "towar: ";
        const towar = document.createElement('div');
        towar.innerHTML = oferty.oferty[i][2];

        const info3 = document.createElement('p'); 
        info3.innerHTML = "ilość: ";
        const ilosc = document.createElement('div');
        ilosc.innerHTML = oferty.oferty[i][3];

        const info4 = document.createElement('p'); 
        info4.innerHTML = "cena: ";
        const cena = document.createElement('div');
        cena.innerHTML = oferty.oferty[i][4];

        //zakup
        var hidden = document.createElement("input");
        hidden.value = oferty.oferty[i];
        hidden.name = "oferta"
        hidden.type = "hidden"
        var button = document.createElement("input");
        button.type = "submit";
        button.value = "Kup";
        var form = document.createElement("form");
          form.method = "POST";
          form.action = "./skrypty/kup.php"
          form.appendChild(hidden);
          form.appendChild(button);
        
        ///ustawiamy elementy
        oferta.appendChild(info1)
        oferta.appendChild(sprzedawca)
        oferta.appendChild(info2)
        oferta.appendChild(towar)
        oferta.appendChild(info3)
        oferta.appendChild(ilosc)
        oferta.appendChild(info4)
        oferta.appendChild(cena)
        oferta.appendChild(form);
        ///
      }
    }
  }
  oferty();
async function czyszczenieOfert(){
    //dokonczyc
      var oferty = document.querySelectorAll(".oferty .oferta");
      oferty.forEach(oferta => {
        oferta.remove();
      });
  }



  window.setInterval('refresh()', 1000); 	
    function refresh() {
      oferty();
    }
    
  