<!DOCTYPE html>
<html>
<head>
    <title>Sparziele</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
    <h1>Sparziele</h1>
    <form id="sparzielForm">
        <input type="text" id="name" placeholder="Name des Sparziels" required>
        <input type="date" id="zieldatum" placeholder="Datum" required>
        <input type="number" step="0.01" id="zielbetrag" placeholder="Zu sparender Betrag" required>
        <button type="submit">Sparziel hinzufügen</button>
    </form>
    <div id="sparzielContainer">
        <!-- Hier werden die Sparziele angezeigt -->
    </div>

    <script>
    const sparzielForm = document.getElementById('sparzielForm');
    const sparzielContainer = document.getElementById('sparzielContainer');

    let sparziele = JSON.parse(localStorage.getItem('sparziele')) || [];

    const renderSparziele = () => {
  sparzielContainer.innerHTML = '';
  sparziele.forEach((sparziel, index) => {
    const div = document.createElement('div');
    div.innerHTML = `
      <h2>${sparziel.name}</h2>
      <p>Zieldatum: ${sparziel.zieldatum}</p>
      <p>Zielbetrag: ${sparziel.zielbetrag}€</p>
      <p>Bereits gespart: ${sparziel.gespart}€</p>
      ${sparziel.gespart >= sparziel.zielbetrag ? '<p>Sparziel erreicht!</p>' : ''}
      <form class="erhoehungForm" data-index="${index}">
        <input type="number" step="0.01" class="erhoehung" placeholder="Betrag zum Hinzufügen" required>
        <button type="submit">Gesparten Betrag erhöhen</button>
      </form>
      <button class="loeschenButton" data-index="${index}">Sparziel löschen</button>
    `;
    sparzielContainer.appendChild(div);
  });
};

renderSparziele();

    sparzielForm.addEventListener('submit', event => {
        event.preventDefault();
        const name = document.getElementById('name').value;
        const zieldatum = document.getElementById('zieldatum').value;
        const zielbetrag = document.getElementById('zielbetrag').value;
        sparziele.push({ name, zieldatum, zielbetrag, gespart: 0 });
        localStorage.setItem('sparziele', JSON.stringify(sparziele));
        renderSparziele();
        sparzielForm.reset();
    });

    sparzielContainer.addEventListener('submit', event => {
        event.stopPropagation();
        if (event.target.matches('.erhoehungForm')) {
            event.preventDefault();
            const index = event.target.dataset.index;
            const erhoehung = event.target.querySelector('.erhoehung').value;
            sparziele[index].gespart += parseFloat(erhoehung);
            localStorage.setItem('sparziele', JSON.stringify(sparziele));
            renderSparziele();
            event.target.reset();
        }
    });

    sparzielContainer.addEventListener('click', event => {
        if (event.target.matches('.loeschenButton')) {
            const index = event.target.dataset.index;
            sparziele.splice(index, 1);
            localStorage.setItem('sparziele', JSON.stringify(sparziele));
            renderSparziele();
        }
    });

    renderSparziele();
</script>
</body>
</html>