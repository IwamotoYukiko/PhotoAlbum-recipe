'use strict';
{
    
const race = document.getElementById('race');
const paddok = document.getElementById('paddok');
const winners = document.getElementById('winners');
const horse = document.getElementById('horse');
const jockey= document.getElementById('jockey');

const thumbnails =document.getElementById('thumbnails')
    
race.addEventListener('mouseover',()=>{
    race.classList.remove('blur');
});
race.addEventListener('mouseleave',()=>{
    race.classList.add('blur');
});

paddok.addEventListener('mouseover',()=>{
    paddok.classList.remove('blur');
});
paddok.addEventListener('mouseleave',()=>{
    paddok.classList.add('blur');
});

winners.addEventListener('mouseover',()=>{
    winners.classList.remove('blur');
});
winners.addEventListener('mouseleave',()=>{
    winners.classList.add('blur');
});

horse.addEventListener('mouseover',()=>{
    horse.classList.remove('blur');
});
horse.addEventListener('mouseleave',()=>{
    horse.classList.add('blur');
});

jockey.addEventListener('mouseover',()=>{
    jockey.classList.remove('blur');
});
jockey.addEventListener('mouseleave',()=>{
    jockey.classList.add('blur');
});


}