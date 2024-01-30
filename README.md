<font size= "4">
<h1>Flowerapi PHP projekts</h1>
<i>
Tas ir README datne. Lai palaist projekta preikšgalu uzmanīgi lasiet un palaidiet comandas patektajā secībā.
</i>

<h1>Ka palaist prekšgalu lokali:</h1>

1. Uzstādiet Node.js<br>
 (https://nodejs.org/en/download/)

2. Uzstādiet Angular CLI<br>
Palaidiet ši komandu terminalā vai command prompt: 
```sh
npm install -g @angular/cli
```

3. Uzstādiet Projekta atkarības
Install the necessary npm packages defined in package.json by running:
Uzstādiet nepieciešamas npm pakotnes paladot sekoošu komandu
```sh
npm install
```

4. Palaidiet priekšgalu
Kad viss ir uzstadīts palaidiet programmu palažot sekojošu kodu terminalā
```sh
ng serve -o
```
<h1>Ka pievienot programmas aizmugurieni (PHP REST API un MySQL):</h1>

1. Importejiet datubazi<br>
    php_flowers.sql ir datubazes eksporta fails, importejiet to sava servera mysql datu bāzē

2. Parveitojiet REST API<br>
    Parvietojiet mapi "flowerapi" ar visu PHP kodu sava servera htdocs mape. Ta izskatas mans mapes ceļš
```sh
D:\Program Files\xampp\htdocs\flowerapi
```
3. Parbaudiet datubazes piesleguma datni<br>
    Parbaudiet Sekojošu datni un parliecienaties ka $host, $user, $pwd ir pareizie lai piekļut datu bazei
```sh
../flowerapi/Classes/Dbh.class.php
```


<h2>Kas programmā strada</h2>

<h4>1. Registracija strada, ka arī pieteikšanas ar registreto epastu<br></h4>
    Adminestratora informacija:

```sh
email: admin
pass: admin
```
Parasta lietotaja informacija:
```sh
email: iqwndqwnq@sdfasf.com
pass: 1234
```
<h4>2. Ir realizeti 3 lietotaja klases<br></h4>

To var redzēt ienacot ziedu katalogā: 
* Adminestratoram: poga objektu dzešanai<br>
<i>(Poga nestrada, bet php kods lai to izdarīt ir izstradats. Sk. ../flowerapi/Classes/Controller.class.php metode: deleteListings($listings))</i>

* Lietotajam: Paradas poga lai pasutīt produktu<br>
<i>(Poga nestrada, bet php kods lai to izdarīt ir izstradats. Sk. ../flowerapi/Classes/Controller.class.php metode: saveOrder($listing, $user))</i>

* Viesim: Apskatīt katalogu


<h4>3. Ierakstu atlasīšana<br></h4>
Visiem lietotajiem ir iespeja atlasīt produktus pēc zieda nosaukuma.<br>Atlase notiek izmantojot php un sql un atlasītie dati ir paradīti saskarsnē


<h2>[Nav izstradāts saskarne bet ir PHP kods]</h2>
<h3>1. Saskarsne lai paradīt  parasta lietotāja pasutijumus.<br></h3>
Tur Lietotājam butu iespeja apskatīts, nodzest, vai filtrēt pēc pasutījuma produkta savus pasutījumus
Sk. ../flowerapi/Classes/Controller.class.php

* deleteOrders($orders)

Sk. ../flowerapi/Classes/View.class.php

* showOrderByUser($user_id)
* showOrderByListing($listing_id)
