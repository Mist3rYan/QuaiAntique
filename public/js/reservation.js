//return la date du jour au format yyyy-mm-dd
function formateDate() {
  const aujourdHui = new Date();
  const annee = aujourdHui.getFullYear();
  const mois = String(aujourdHui.getMonth() + 1).padStart(2, "0");
  const jour = String(aujourdHui.getDate()).padStart(2, "0");
  return annee + "-" + mois + "-" + jour;
}

//retourne la date minimum
function dateMinimum() {
  const dateFormatee = formateDate();
  let dateInput = document.getElementById("reservation_date");
  dateInput.setAttribute("min", dateFormatee);
  return dateInput.value;
}

//retourne un tableau avec les horaires en string
function formateHoraire() {
  const table = document.getElementById("maTable");
  let tdArray = [];
  for (let i = 1; i < table.rows.length; i++) {
    let row = table.rows[i];
    let rowArray = [];
    // Parcourez toutes les cellules de chaque ligne
    for (let j = 0; j < row.cells.length; j++) {
      let cell = row.cells[j];
      if (cell.innerHTML != "&nbsp;&nbsp;") {
        // Ajoutez la valeur de la cellule au tableau
        let buffer = cell.innerHTML;
        buffer = buffer.replace(/[\s-]/g, "");
        rowArray.push(buffer);
      }
    }
    tdArray.push(rowArray);
  }
  return tdArray;
}

//retourne le jour de la semaine en chiffre
function jourSemaineNumber(date) {
  let jourSemaineNb = new Date(date).getDay();
  if (jourSemaineNb == 0) {
    jourSemaineNb = 7;
  }
  jourSemaineNb = jourSemaineNb - 1;
  return jourSemaineNb;
}

function onChangeDate(event) {
  const date = dateMinimum();
  const arrayHoraire = formateHoraire();
  const jourSemaine = jourSemaineNumber(date);

  document.getElementById("champRadioMidi").style.display = "block";
  document.getElementById("champRadioSoir").style.display = "block";

  const containerMidi = document.getElementById("radioContainerMidi"); // ID du conteneur où vous souhaitez ajouter les boutons radio
  const containerSoir = document.getElementById("radioContainerSoir"); // ID du conteneur où vous souhaitez ajouter les boutons radio

  while (containerMidi.firstChild) {
    //supprime les champs radio midi
    containerMidi.removeChild(containerMidi.firstChild);
  }
  while (containerSoir.firstChild) {
    //supprime les champs radio soir
    containerSoir.removeChild(containerSoir.firstChild);
  }

  let openMidi = arrayHoraire[jourSemaine][1]; //recupere l'horaire d'ouverture midi
  let closeMidi = arrayHoraire[jourSemaine][2]; //recupere l'horaire de fermeture midi
  let openSoir = arrayHoraire[jourSemaine][3]; //recupere l'horaire d'ouverture soir
  let closeSoir = arrayHoraire[jourSemaine][4]; //recupere l'horaire de fermeture soir

  let nombreTotalMidi =
    document.getElementsByClassName("js-nombre-total")[0].innerHTML; // affecte le nombre total de place midi
  let nombreTotalSoir =
    document.getElementsByClassName("js-nombre-total")[0].innerHTML; // affecte le nombre total de place soir

  let dates = document.querySelectorAll(".js-date-reservation");
  let nombres = document.querySelectorAll(".js-nombre-reservation");
  let heures = document.querySelectorAll(".js-heure-reservation");

  //Création des boutons radio
  let midiStartTime = new Date();
  let midiEndTime = new Date();
  let soirStartTime = new Date();
  let soirEndTime = new Date();
  // Convertir l'heure de début et de fin en objets Date
  let midiDebutSplit = openMidi.split(":");
  midiStartTime.setHours(
    parseInt(midiDebutSplit[0], 10),
    parseInt(midiDebutSplit[1], 10),
    0
  );
  let midiFinSplit = closeMidi.split(":");
  midiEndTime.setHours(
    parseInt(midiFinSplit[0], 10),
    parseInt(midiFinSplit[1], 10),
    0
  );
  let soirDebutSplit = openSoir.split(":");
  soirStartTime.setHours(
    parseInt(soirDebutSplit[0], 10),
    parseInt(soirDebutSplit[1], 10),
    0
  );
  let soirFinSplit = closeSoir.split(":");
  soirEndTime.setHours(
    parseInt(soirFinSplit[0], 10),
    parseInt(soirFinSplit[1], 10),
    0
  );
  // Période de 15 minutes
  let timeIncrement = 15;

  let heureArray = [];
  //Place restante midi et soir
  for (let i = 0; i < dates.length; i++) {
    let dateReservation = dates[i].innerText;
    if (dateReservation === date) {
      let nombre = nombres[i].innerText;
      let heure = heures[i].innerText;
      heureArray.push(heure);
      if (closeMidi != "Fermé") {
        if (heure >= openMidi && heure <= closeMidi) {
          nombreTotalMidi = nombreTotalMidi - nombre;
        }
      }
      if (closeSoir != "Fermé") {
        if (heure >= openSoir && heure <= closeSoir) {
          nombreTotalSoir = nombreTotalSoir - nombre;
        }
      }
    }
  }
  while (midiStartTime < midiEndTime) {
    const radioBtn = document.createElement("input");
    radioBtn.type = "radio";
    radioBtn.name = "timePeriod";
    radioBtn.value = midiStartTime.toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });

    const label = document.createElement("label");
    label.textContent = midiStartTime.toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });

    const heureCourante = midiStartTime.toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });

    if (!heureArray.includes(heureCourante)) {
      containerMidi.appendChild(radioBtn);
      containerMidi.appendChild(label);
    }
    midiStartTime.setMinutes(midiStartTime.getMinutes() + timeIncrement);
  }
  while (soirStartTime < soirEndTime) {
    const radioBtn = document.createElement("input");
    radioBtn.type = "radio";
    radioBtn.name = "timePeriod";
    radioBtn.value = soirStartTime.toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });

    const label = document.createElement("label");
    label.textContent = soirStartTime.toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });

    const heureCourante = soirStartTime.toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });

    if (!heureArray.includes(heureCourante)) {
      containerSoir.appendChild(radioBtn);
      containerSoir.appendChild(label);
    }

    soirStartTime.setMinutes(soirStartTime.getMinutes() + timeIncrement);
  }
  if (closeMidi === "Fermé") {
    nombreTotalMidi = 0;
  }
  if (closeSoir === "Fermé") {
    nombreTotalSoir = 0;
  }

  document.getElementById("reservation_visiteur_nbConviveM").innerText =
    nombreTotalMidi;
  document.getElementById("reservation_visiteur_nbConviveS").innerText =
    nombreTotalSoir;

  const inputElement = document.getElementById("reservation_heure");
  const radioButtons = document.querySelectorAll('input[name="timePeriod"]');
  radioButtons.forEach((radioButton) => {
    radioButton.addEventListener("change", function () {
      if (this.checked) {
        inputElement.value = this.value;
      }
    });
  });
}

document.querySelectorAll(".js-date").forEach((link) => {
  link.addEventListener("change", onChangeDate);
});
document.getElementById("reservation_visiteur_nbConviveM").innerText = "0";
document.getElementById("reservation_visiteur_nbConviveS").innerText = "0";
document.getElementById("champRadioMidi").style.display = "none"; //rend invisible les champs radio midi
document.getElementById("champRadioSoir").style.display = "none"; //rend invisible les champs radio soir
document.getElementById("reservation-date").readOnly = true; //rend le champ heure en lecture seule
document.getElementById("reservation_heure").readOnly = true; //rend le champ heure en lecture seule

const date = dateMinimum(); // appel la fonction dateMinimum pour recuperer la date minimum
const allergenesList = document.querySelectorAll("#allergenes"); //recupere tous les allergenes

for (let i = 0; i < allergenesList.length; i++) {
  //parcours les allergenes
  const allergene = allergenesList[i].innerHTML; //recupere les allergenes
  const allergeneInputs = document.querySelectorAll("label"); //recupere tous les labels

  for (let j = 0; j < allergeneInputs.length; j++) {
    //parcours les labels
    const allergeneInput = allergeneInputs[j]; //recupere le label
    if (allergeneInput.innerHTML === allergene) {
      const input = allergeneInput.htmlFor; //recupere l'id de l'input
      document.getElementById(input).checked = true; //coche les allergenes
    }
  }
}
