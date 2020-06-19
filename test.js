

// console.log(window);
//chargement script coté client offre la variable gobale window contenant un ensempnble de prop et methode
// la variable a se retrouve affectée à l'objet window en tant que propriété consultable
//en faisant window.a, toute variable globle est une propriété de window

function randomNum(){

	let number = Math.round(Math.random()*10) 

	return Math.floor(number)

}

// (function (){

// 	var num = randomNum()
// 	console.log(num);



// for(var i = 0 ; i < 3 ; i++){
	
// 	var essai = window.prompt("quel est le chiffre mystere ?")
// 	essai = parseInt(essai, 10)//en base 10

// 	if(essai === num){

// 		alert("gagné")
// 		break
// 	}else if(essai > num){

// 		alert("moins")

// 	}else
// 		alert('plus')


// }

// if (essai == num){


// 	alert('bravo')
// }else
// 	alert('c\'est un echec')

// })()

//alert bloque l exécution du script
//prompt = alert avec un champ texte
//confirm = alert ac demande de confirmation
//on peut se passer de l'ecriture de window


//les timer = execution d'un code a partir d'un certain moment = methode de l'objet window
//setInterval = execute la fonction toute les interval en 2d param, set time out execute en 1
//seule fois au bout de tant de seconde
//clear timeout stop un settimeout et clear interval stop un setinterval
//fonction callback est uen fonction passée en parametre

// (function(){


// 	var i = 0

// 	var timer = window.setInterval( function(){
// 		i++
// 		console.log(i)
// 		if(i === 10){
// 			window.clearInterval(timer)
// 		}
// 	}, 1000 )

// 	console.log(timer)


// })()

// LE DOM

//document = objet représentant la page html 
//javascript recupere un noeud et agit dessus


//recuperer un element
document.getElementById('intro')
document.getElementsByClassName('btn')
document.getElementsByTagName('p')//tagname = elemt html
document.querySelector('.btn')//on passe le selecteur CSS de l'ememt en param 
document.querySelector('#intro')//renvoie le 1er resultat slmnt
document.querySelectorAll('p')//renvoie tous les p

//interaction ac elements

// document.querySelector('#intro').className = 'btno' //
//change le nom de la classe et passe dc le p en jaune (voir btno css)
var p = document.querySelector('p')
p.classList //renvoie toute les valeur contenues ds l'attirbut class
p.classList.remove('nom') //retire un nom de class

var btn = document.querySelector('.btn')
// btn.classList.remove('btn') retire la classbtn
// btn.classList.add('btno') rajoute une classe

//récupérer le style d'un élémnent 
btn.style
//modification du style
// btn.style.fontSize = '50px'

//modifier un élément html
btn.innerHTML //= le contenu d'un elemet html
// btn.innerHTML = "<strong> salut les gent </strong>"

//innerText nous donne le noeud texte slmnt et pas <strong> par exemple
//textContent = innerText selon le navigateur

// var demo = document.getElementById('jumbotron')
// if (demo.textContent){
// 
	// demo.textContent = 'salut'
// 
// }else
	// demo.innerText = 'au revoir'


// var p = document.querySelector('#jumbotron')
// window.setInterval(function(){

// 	p.classList.toggle('btno')//toggle peremt de switcher la classe de l'elemt


// }, 200)

//acceder aux elements de meme niveuaux ac previousSibling & previousElemnSibling

var option = document.querySelector('option')

// console.log(option.previousSibling)

// parentElement donne le noeud parent, parentNode = le noeud parent

//supprimer un element: selectionner le parent et appliquer removeChild(elemetàsuppr)

//gerer les evenements
//les evt permettent d'execcuter du code js en créant des écouteurs d'evts

// var p = document.querySelector('p')

// function changeColor(){

// 	p.style.color = 'red'

// }

// function changeColorOut(){

// 	p.style.color = 'white'

// }

// p.addEventListener('mouseover', changeColor)
// p.addEventListener('mouseout', changeColorOut)


var danger = document.querySelector('a.btn.btn-danger')


danger.addEventListener('click', function(evt){ 


		let deco = confirm('souhaitez-vous réellement vous déconnecter ?')
		console.log(evt.currentTarget)
		if(!deco){
			evt.preventDefault()//permet d'eviter la propagation de l'evt
		}


})
//un evt se propage des enfants vers les parents, pr l'eviter utiliser methode stopPropagation de l'evt


//p.removeEventListener('evenement a retirer' , fonction associée au addeventlistener mais stocker ds une var)
//recupérer la valeur d'un input remplli par utilisatuer ac .value
//verifier qu'un champ a été coché ac document.query...checked -> renvoie true si coché
exampleRadios1
exampleRadios2

var radio_1 = document.querySelector('#exampleRadios1')
var radio_2 = document.querySelector('#exampleRadios2')
var form = document.querySelector('#formInscription')

form.addEventListener('submit', function(e){

	if(!radio_1.checked && !radio_2.checked){

		e.preventDefault()
		alert("veuillez renseigner un statut utilisateur")
		
	}
})

//systeme de spoiler 









































































































