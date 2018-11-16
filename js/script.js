var src = 'http://cdn1ff2.porno365.xxx/uploads/posts/2018-11/chiksa-zashla-v-komnatu-k-lyubovnikam-i-upala-na-chlen-.jpg'
var href = 'http://porno365.xxx/movie/15600'
var site = 0;
function addVideo(src, href, site) {
var newel = document.createElement('li');
var sil = document.createElement('a');
var imgfo = document.createElement('img');
sil.appendChild(imgfo);
newel.appendChild(sil);
var dob = document.getElementsByTagName('ul')[site];
dob.appendChild(newel);
sil.setAttribute('href', href);
sil.setAttribute('target', 'blank');
imgfo.setAttribute('src', src);
console.log(src);
}
//addVideo(src, href, site);