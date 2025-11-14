class Macka {
  constructor(ime, boja, dob, spol) {
    this.ime = ime;
    this.boja = boja;
    this.dob = dob;
    this.spol = spol;
  }

  promijeniDob(novaDob) {
    this.dob = novaDob;
  }

  ispisMacke(){
    document.write("Ime macke je: " + this.ime + ", boja: " + this.boja + ", dob: " + this.dob + ", i spol: " + this.spol + "<br>");
  }

  ispisDobiMacke(){
    document.write("Dob macke "+ this.ime + " je: " + this.dob + "<br>");
  }
}

var tigar = new Macka("Tigar", "narančasta", 12, "M");
var micika = new Macka("Micika", "siva", 2, "F");

tigar.ispisMacke();

micika.promijeniDob(3);
micika.ispisDobiMacke();

let mojJSON = JSON.stringify(tigar);
document.write("<h1>JSON</h1>");
document.write(mojJSON + "<br>");

document.write("<h1>Zadnja izmjena dokumenta</h1>");
document.write(document.lastModified);