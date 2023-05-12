<h1>Fixkosten</h1>

<button id="new_entry">neuer Eintrag</button>
<form id="new_entry_form" action="../forms/fixed_action.php" method="post">

// Sollte man eventuell selbst anlegen können?
<legend>Fixkosten: Eintrag hinzufügen</legend>
  <input type="text" placeholder="Verwendungszweck">
  <input type="number" placeholder="Betrag">
  <select id="category" name="category">
  <option value="none">(bitte auswählen)</option>  
  <option value="verkehr">Verkehr</option>
    <option value="kommunikation">Handy/Internet</option>
    <option value="unterhaltung">Unterhaltung (Streaming)</option>
    <option value="miete">Miete</option>
    <option value="sonstiges">Sonstiges</option>
</select>
<div>  
  <input type="reset" id="reset" value="zurücksetzen">
<input type="button" id="cancel" value="abbrechen">
  <input type="submit" value="speichern">
</div>
</form>

<h2> hier kommen die fixkosten hin </h2>

<table>
<tr>
  <th>Bezeichnung</th>
  <th>Kategorie</th>
  <th>Betrag</th>
</tr>
<tr><td>hier dynamische tabelle</td></tr>
</table>
