<!--   Banniere header-->

<div id="banniere_entete">
    <div id="logo">
        <a href = "../Accueil/accueilv2.php"><img src="../images/Logo1.png" alt="Logo_Sportymates"/></a>

        <!--<div id="Titre_Principal">
<h1>Sportymates</h1>
<h2>Find your Sportymates</h2>
</div>-->
    </div>

    <div id="btnConnexInscrip">
        <a href=#><button type="button" class="bouton">Connexion</button></a>
        <a href=#><button type="button" class="bouton">Inscription</button></a>
    </div>
</div>


<!--
/*Header*/
#banniere_entete {
    display: flex;;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;

}

#logo img {
    width: 150px;
    height:70px;
    margin-right: 1em;
}

#Titre_Principal {
    white-space: nowrap;
    color:darkorange;
}

header h1 {
    text-align: center;
    color: #fff5e1;
    text-transform: uppercase;

}

nav ul {
    list-style-type: none;
    display: flex;
}

nav li {
    margin-right: 15px;
    display: inline-block;

}

nav a {
    font-size: 1.3em;
    color: #f8fada;
    padding-bottom: 3px;
    text-decoration: none;
}

nav a:hover
{ 
    border-bottom: 3px solid coral;
}

#btnConnexInscrip {
    width: 25%;
    display: flex;
    justify-content: space-around;
    padding-right: 10px;
}

.bouton {
    background-color: #ffa44f;
    border-style:outset;
    border-width : 2px;
    border-color:#ffa44f;
    padding: 5px 10px;
    box-sizing: border-box;
    font-size:13px;
    font-weight: normal;
    letter-spacing: 2px;
    margin-right: 10px;
    text-transform: uppercase;
    color: white;
    white-space: nowrap;
    height: 2.5em;

}

.bouton:hover{
    background-color: white;
    color: #ffa44f;
    cursor: pointer;
}

header {
    
    background-size:cover;
    height:20em;
    display: flex;
    flex-direction: column;
    justify-content:space-between;
}

#Menu {
    white-space: nowrap;
    padding: 0.8em 0 0.8em 0;
    background-color: rgba(70, 79, 82, 0.89);
    display: flex;
    justify-content: space-around;
}

#logo {
    display: flex;

}

#rechSimple {
    display: flex;
    justify-content: center; 

}

input[name="champ"] {
    border-style: solid;
    border-width: 1px;
    border-color: #dddddd;
    padding: 5px 10px;
    width: 98.5%;
    box-sizing: border-box;
    font-size: 12px;
    font-weight: normal;
    /*letter-spacing: 1px;*/
    margin-right: 1em;
    white-space: nowrap;
    height: 2.8em;
}

#formRechSimple {
    display: flex;
}

.bouton[value=Rechercher] {
    height: 2.5em;
    width: 10em;
    align-self: center;
}


/*fin Header*/
-->
